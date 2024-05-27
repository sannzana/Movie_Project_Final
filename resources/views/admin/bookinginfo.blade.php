

@extends('admin.dashlay')

@section('body2')








<style>
    /* CSS for delete button */
    .btn-delete {
        background-color: red;
        color: white;
        border: none;
        border-radius: 5px; /* Adding border-radius */
        padding: 5px 10px; /* Adjusting padding */
        cursor: pointer; /* Changing cursor to pointer */
    }

     .btn-delete:hover {
        background: linear-gradient(to right, #f44336, #c73e2c);
    }
</style>
<h1>Booking Information</h1>

<div>
    <form action="{{ route('admin.bookings') }}" method="GET">  <!-- Update the route accordingly -->
        <select name="timeframe">
            <option value="all" {{ $timeframe === 'all' ? 'selected' : '' }}>All Bookings</option>
            <option value="day" {{ $timeframe === 'day' ? 'selected' : '' }}>Today's Bookings</option>
            <option value="week" {{ $timeframe === 'week' ? 'selected' : '' }}>This Week's Bookings</option>
            <option value="month" {{ $timeframe === 'month' ? 'selected' : '' }}>This Month's Bookings</option>
        </select>
        <button type="submit">Filter</button>
    </form>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Movie Title</th>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Seats</th>
            <th>Total Price</th>
            <th>User ID</th>
            <th>User Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bookings as $booking)
            <tr>
                <td>{{ $booking['movie_title'] }}</td>
                <td>{{ $booking['date'] }}</td>
                <td>{{ $booking['start_time'] }}</td>
                <td>{{ $booking['end_time'] }}</td>
                <td>{{ implode(', ', $booking['seat_numbers']) }}</td>
                <td>{{ $booking['total_price'] }}</td>
                <td>{{ $booking['user_id'] }}</td>
                <td>{{ $booking['user_name'] }}</td>
                <td>
                    <form action="{{ route('bookings.destroy', $booking['id']) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this booking?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<button onclick="goBackToDashboard()" class="btn btn-secondary">Back to Dashboard</button>

<script>
    function goBackToDashboard() {
        window.location.href = '/dashboard'; // Directly redirect
    }
</script>
@endsection
