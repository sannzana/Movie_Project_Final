<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\BookingStatus;
use App\Models\Booking;
use App\Models\DateShowtime;
use App\Models\Movie;
use App\Models\Date;
use App\Models\Seat;
use App\Models\Showtime;

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
    return view('admin.iinfo', compact('movies')); 


}












}
