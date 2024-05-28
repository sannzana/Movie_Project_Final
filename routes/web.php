<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\TaskController;
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
Route::get('/a2movies/{movie}', [MovieController::class, 'show'])->name('movies.show2');

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
    Route::post('/submit-review', [ReviewController::class, 'store'])->name('review.submit');
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
    // Route::post('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout'])->name('exampleHostedCheckout');

    // Route::get('/bookings/{booking}/pay', [BookingController::class, 'exampleHosted'])->name('exampleHosted');
    Route::post('/exampleHostedCheckout', [BookingController::class, 'exampleHostedCheckout'])->name('exampleHostedCheckout');


    Route::post('/create-and-redirect', [SslCommerzPaymentController::class, 'createAndRedirect'])->name('createAndRedirect');
  

    Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
    Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);
    





    Route::post('/movies/{movie}/book/{date}/{showtime}/prepare', [BookingController::class, 'prepare'])->name('bookings.prepare');








    Route::post('/book-and-pay', [SslCommerzPaymentController::class, 'bookAndPay'])->name('bookAndPay');


    Route::post('/success', [SslCommerzPaymentController::class, 'success']);
    Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
    Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
    
    Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
Route::post('/exampleHosted', [BookingController::class, 'exampleHosted'])->name('exampleHosted');

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
Route::post('/exampleHostedCheckout', [BookingController::class, 'exampleHostedCheckout'])->name('exampleHostedCheckout');


Route::get('/admin/reviews', [ReviewController::class, 'showReviews'])->name('admin.reviews');
Route::patch('/review/{review}/toggle', [ReviewController::class, 'togglePost'])->name('review.toggle');

 // Task routes
 Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
 Route::patch('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
 Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');



});







// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
