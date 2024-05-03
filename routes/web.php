<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MovieController::class, 'index'])->name('home');
// Route::get('/', [MovieController::class, 'home'])->name('home');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');

Route::middleware('guest')->group(function () {
    Route::get('/register', [UserController::class, 'create'])->name('register');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'auth'])->name('auth');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/movies/{movie}/book/{date}/{showtime}', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/movies/{movie}/book/{date}/{showtime}', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
    Route::patch('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');
});



Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/movies', [AdminController::class, 'movie'])->name('admin.iinfo'); // Add this line
    Route::post('/movies', [AdminController::class, 'store'])->name('movies.store');
    Route::get('/moviesinfo', [AdminController::class, 'movieInfo'])->name('admin.movies.show');
    // Route::get('/admin/{movie}', [AdminController::class, 'show'])->name('admin.movies.datetime');

    Route::get('/movies/{movie}/datetime', [AdminController::class, 'show'])->name('admin.movies.datetime'); // Added this line

 
   

    Route::delete('/movies/date/{date}', [AdminController::class, 'deleteDate'])->name('admin.date.delete');
    // Route::get('/dates/{date}/edit', [AdminController::class, 'editDate'])->name('admin.date.edit');

  
    Route::put('/dates/{date}', [AdminController::class, 'updateDate'])->name('admin.date.update');



// movie update and delete
Route::delete('/movies/{id}', [AdminController::class, 'delete'])->name('admin.movies.delete');

// These should already be added, but double check if they are correctly set
Route::get('/movies/{id}/edit', [AdminController::class, 'edit'])->name('admin.movies.edit');
Route::put('/movies/{id}', [AdminController::class, 'update'])->name('admin.movies.update');


Route::get('/admin/bookings', [BookingController::class, 'index2'])->name('admin.bookings');
Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');

});



// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
