<?php

namespace App\Http\Controllers;

use App\Enums\BookingStatus;
use App\Models\Booking;
use App\Models\DateShowtime;
use App\Models\Movie;
use App\Models\Date;
use App\Models\Seat;
use App\Models\Showtime;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Create returns the booking page.
     *
     * @param Movie $movie
     * @param Date $date
     * @param Showtime $showtime
     * @return View|RedirectResponse
     */
    public function create(Movie $movie, Date $date, Showtime $showtime): View|RedirectResponse
    {
        $user = User::find(auth()->id());

        // check if the user is old enough to watch the movie
        if ($user->age < $movie->age_rating) {
            return back()
                ->with('error', 'You are not old enough to watch this movie!');
        }

        $currentDate = today('Asia/Jakarta')->format('Y-m-d');
        $currentTime = now('Asia/Jakarta')->format('H:i:s');

        // date formatting
        $formattedDate = $date->date->format('Y-m-d');
        $isToday = $formattedDate == $currentDate;
        $isPastDate = $formattedDate < $currentDate;
        $isPastShowtime = $showtime->start_time < $currentTime;

        // check if the date and showtime is in the past of the current date and time
        if ($isPastDate || ($isToday && $isPastShowtime)) {
            return back()
                ->with('error', 'Cannot book tickets for past dates and showtimes!');
        }

        $seats = Seat::all();

        return view('bookings.create', compact('movie', 'date', 'showtime', 'seats'));
    }

    /**
     * Store the booking.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'seats' => ['required', 'array', 'min:1', 'max:6', 'exists:seats,id'],
        ]);

        $user = User::find(auth()->id());
        $movie = Movie::find($request->movie);
        $date = Date::find($request->date);
        $showtime = Showtime::find($request->showtime);
        $seats = Seat::find($request->seats);
        $date_showtime = DateShowtime::where('date_id', $date->id)
            ->where('showtime_id', $showtime->id)
            ->first();

        $booking = new Booking();
        $booking->user_id = $user->id;
        $booking->movie_id = $movie->id;
        $booking->date_showtime_id = $date_showtime->id;
        $booking->total_price = count($request->seats) * $movie->ticket_price;
        $booking->status = 'booked'; 

        // check if the user has enough balance to book the tickets
        // if ($user->balance < $booking->total_price) {
        //     return back()
        //         ->with('error', 'You do not have enough balance to book these tickets!');
        // }

        // $user->balance -= $booking->total_price;

        $user->update();
        $booking->save();

        foreach ($seats as $seat) {
            $booking->seats()->attach($seat->id, ['date_showtime_id' => $date_showtime->id]);
        }

        return redirect()
            ->route('home')
            ->with('success', 'Successfully booked tickets!');
    }







    public function prepare(Request $request, Movie $movie, Date $date, Showtime $showtime): View
    {
        $request->validate([
            'seats' => ['required', 'array', 'min:1', 'max:6', 'exists:seats,id'],
        ]);
    
        $user = User::find(auth()->id());
        $seats = Seat::find($request->seats);
    
        $date_showtime = DateShowtime::where('date_id', $date->id)
            ->where('showtime_id', $showtime->id)
            ->first();
    
        if (!$date_showtime) {
            return back()->with('error', 'Invalid date or showtime!');
        }
    
        $booking = new Booking();
        $booking->user_id = $user->id;
        $booking->movie_id = $movie->id;
        $booking->date_showtime_id = $date_showtime->id;
        $booking->total_price = count($request->seats) * $movie->ticket_price;
        $booking->status = 'pending';
    
        $booking->save();
    
        foreach ($seats as $seat) {
            $booking->seats()->attach($seat->id, ['date_showtime_id' => $date_showtime->id]);
        }
    
        $movieTitle = $movie->title;
        $showDate = $date->date->format('D, j M Y');
        $showTime = $showtime->start_time . ' - ' . $showtime->end_time;
        $ticketPrice = $movie->ticket_price;
        $seatNumbers = $seats->pluck('seat_number')->implode(', ');
        $totalPrice = $booking->total_price;
    
        return view('exampleHosted', compact('movieTitle', 'showDate', 'showTime', 'ticketPrice', 'seatNumbers', 'totalPrice', 'user'));
    }
    











    

    
    /**
     * Index returns the booking history page.
     *
     * @return View
     */
    public function index(): View
    {
        $user = User::find(auth()->id());
        $bookings = Booking::where('user_id', $user->id)
            ->with('movie', 'dateShowtime.date', 'dateShowtime.showtime', 'seats')
            ->latest()
            ->paginate(5);

        $currentDate = today('Asia/Jakarta')->format('Y-m-d');
        $currentTime = now('Asia/Jakarta')->format('H:i:s');

        return view('bookings.index', compact('bookings', 'currentDate', 'currentTime'));
    }

    /**
     * Update the booking status.
     *
     * @param Booking $booking
     * @return RedirectResponse
     */
    public function update(Booking $booking): RedirectResponse
    {
        $booking->status = BookingStatus::CANCELLED;
        $booking->update();

        foreach ($booking->seats as $seat) {
            $booking->seats()->detach($seat->id);
        }

        $user = User::find(auth()->id());
        // $user->balance += $booking->total_price;
        $user->update();

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking cancelled!');
    }





    public function index2(Request $request)
{
    $timeframe = $request->input('timeframe', 'all'); // Defaults to 'all' if not specified

    $query = Booking::with(['movie', 'user', 'dateShowtime.date', 'dateShowtime.showtime', 'seats']);

    switch ($timeframe) {
        case 'day':
            $query->whereDate('created_at', Carbon::today());
            break;
        case 'week':
            $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            break;
        case 'month':
            $query->whereMonth('created_at', Carbon::now()->month);
            break;
    }

    $bookings = $query->get()->map(function ($booking) {
        return [
            'id' => $booking->id,  // Ensure this line is added to include the booking ID
            'movie_title' => $booking->movie->title ?? 'N/A',
            'date' => $booking->dateShowtime->date->date ?? 'N/A',
            'start_time' => $booking->dateShowtime->showtime->start_time ?? 'N/A',
            'end_time' => $booking->dateShowtime->showtime->end_time ?? 'N/A',
            'seat_numbers' => $booking->seats->pluck('seat_number')->toArray(),
            'total_price' => $booking->total_price,
            'user_id' => $booking->user->id ?? 'User Deleted',
            'user_name' => $booking->user->name ?? 'User Deleted',
        ];
    });

    return view('admin.bookinginfo', compact('bookings', 'timeframe'));
}




    
        // Existing methods...
    
        public function editDate(Movie $movie, Date $date)
        {
            // Load edit form for specific date of a movie
            return view('admin.edit_date', compact('movie', 'date'));
        }
    
        public function updateDate(Request $request, Movie $movie, Date $date)
        {
            // Validate input
            $validated = $request->validate([
                'date' => 'required|date',
            ]);
    
            // Update the date
            $date->update($validated);
    
            return redirect()->route('admin.movies.datetime', $movie)->with('success', 'Date updated successfully!');
        }
    
        public function deleteDate(Movie $movie, Date $date)
        {
            // Delete the date
            $date->delete();
    
            return redirect()->route('admin.movies.datetime', $movie)->with('success', 'Date deleted successfully!');
        }



        public function destroy($id)
{
    $booking = Booking::findOrFail($id);
    $booking->delete();

    return redirect()->route('admin.bookings')->with('success', 'Booking deleted successfully');
}





public function exampleHosted(Request $request)
{
    $movieTitle = $request->input('movie_title');
    $showDate = $request->input('show_date');
    $showTime = $request->input('show_time');
    $seatNumbers = $request->input('seat_numbers');
    $ticketPrice = $request->input('ticket_price');
    $totalPrice = $request->input('total_price');
    $movieId = $request->input('movie_id');
    $dateId = $request->input('date_id');
    $showtimeId = $request->input('showtime_id');
    $user = auth()->user();

    return view('exampleHosted', compact('movieTitle', 'showDate', 'showTime', 'seatNumbers', 'ticketPrice', 'totalPrice', 'movieId', 'dateId', 'showtimeId', 'user'));
}

}
