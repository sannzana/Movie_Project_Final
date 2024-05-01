<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Enums\BookingStatus;
use App\Models\Booking;
use App\Models\DateShowtime;
use App\Models\Movie;
use App\Models\Date;
use App\Models\Seat;
use App\Models\Showtime;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function dashboard()
{
    // Just an example to fetch some data
    return view('admin.dashboard');
}

public function movieInfo()
{
    $movies = Movie::all(); 
    return view('admin.information', compact('movies')); 


}
public function movie()
{
    
    return view('admin.iinfo'); 


}




public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'genre' => 'required|string',
            'description' => 'required|string',
            'release_date' => 'required|date',
            'poster_url' => 'required|image',
            'starring' => 'required|string',
            'director' => 'required|string',
            'producer' => 'required|string',
            'type' => 'required|string',
            'duration' => 'required|string',
            'age_rating' => 'required|string',
            'ticket_price' => 'required|numeric',
            'dates' => 'array', // Ensure 'dates' is an array of dates
            'dates.*' => 'date', // Each item in dates array should be a date
        ]);

        // Handle the file upload
        if ($request->hasFile('poster_url')) {
            $path = $request->file('poster_url')->store('public/posters');
        }
        $showtimeIds = Showtime::pluck('id')->toArray();
        // Create a new movie record
        $movie = new Movie([
            'title' => $request->title,
            'genre' => $request->genre,
            'description' => $request->description,
            'release_date' => $request->release_date,
            'poster_url' => $path ?? null,
            'starring' => $request->starring,
            'director' => $request->director,
            'producer' => $request->producer,
            'type' => $request->type,
            'duration' => $request->duration,
            'age_rating' => $request->age_rating,
            'ticket_price' => $request->ticket_price,
        ]);

        $movie->save(); // Save the movie to get an ID

        // Handle the dates
        foreach ($request->dates as $dateValue) {
            $newDate = new Date([
                'date' => $dateValue,
                'movie_id' => $movie->id, // associate the date with the movie
            ]);
            $newDate->save();
    
            // Attach the date to the movie using the pivot table
            $movie->dates()->attach($newDate->id);
    
            // Now attach each showtime to this date using the date_showtime pivot table
            foreach ($showtimeIds as $showtimeId) {
                DB::table('date_showtime')->insert([
                    'date_id' => $newDate->id,
                    'showtime_id' => $showtimeId,
                ]);
            }
        }

        // foreach ($request->dates as $dateValue) {
        //     // Create a new date record
        //     $date = new Date(['date' => $dateValue]);
        //     $date->save(); // Save the date to get an ID
    
        //     // Attach the date to the movie using the many-to-many relationship
        //     // This assumes that you have defined the dates() relationship in the Movie model correctly
        //     $movie->dates()->attach($date->id);
        // }


        return redirect()->route('admin.iinfo')->with('success', 'Movie and dates saved successfully!');
    }


    public function show(Movie $movie): View
{
    $currentDate = today('Asia/Jakarta')->format('Y-m-d');
    $currentTime = now('Asia/Jakarta')->format('H:i:s');
    
    return view('admin.times', compact('movie', 'currentDate', 'currentTime'));
}

    


public function deleteDate(Date $date)
{
   // Delete all showtimes associated with this date
    $date->delete(); // Then delete the date
    return back()->with('success', 'Date and associated showtimes deleted successfully.');
}


// public function deleteShowtime(Showtime $showtime)
// {
//     // Retrieve the IDs of the dates associated with the given showtime
//     $dateIds = $showtime->dates()->pluck('dates.id');

//     // Delete records from the date_showtime pivot table where the showtime_id matches the given showtime's ID
//     // and the date_id is one of the retrieved date IDs
//     DB::table('date_showtime')
//         ->whereIn('date_id', $dateIds)
//         ->where('showtime_id', $showtime->id)
//         ->delete();

//     // Now you can safely delete the Showtime record
//     $showtime->delete();

//     return back()->with('success', 'Showtime deleted successfully.');
// }




public function editDate(Date $date)
{
    return view('admin.edit-date', compact('date')); // Assuming you have a view for editing dates
}

public function updateDate(Request $request, Date $date)
{
    $request->validate([
        'date' => 'required|date', // Validation for the new date
    ]);
    $date->update($request->only('date'));
    return redirect()->route('admin.movies.show', $date->movie_id)->with('success', 'Date updated successfully.');
}







public function update(Request $request, $id)
{
    $movie = Movie::findOrFail($id);
    $movie->update($request->all());

    // Handle file upload if there is a new file
    if ($request->hasFile('poster_url')) {
        $path = $request->file('poster_url')->store('public/posters');
        $movie->poster_url = $path;
        $movie->save();
    }

    return redirect()->route('admin.movies.show')->with('success', 'Movie updated successfully!');
}

public function edit($id)
{
    $movie = Movie::findOrFail($id);  // Fetch the movie or fail with a 404 error if not found
    return view('admin.edit', compact('movie'));  // Return the edit view with the movie data
}

public function delete($id)
{
    $movie = Movie::findOrFail($id);  // Fetch the movie by ID or fail with a 404 error if not found
    $movie->delete();  // Delete the movie

    return redirect()->route('admin.movies.show')->with('success', 'Movie deleted successfully!');  // Redirect to the movies index with a success message
}



}