<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class MovieController extends Controller
// {
//     /**
//      * Index returns the home page.
//      *
//      * @param Request $request
//      * @return View
//      */
//     public function index(Request $request): View
//     {
//         $title = request()->input('search');
//         $sort = request()->input('sort');

//         $movies = Movie::filter($title, $sort)
//             ->latest()
//             ->paginate(8);

//         return view('movies.home', compact('movies'));
//     }

//     /**
//      * Show returns the movie detail page.
//      *
//      * @param Movie $movie
//      * @return View
//      */
//     public function show(Movie $movie): View
//     {
//         $currentDate = today('Asia/Jakarta')->format('Y-m-d');
//         $currentTime = now('Asia/Jakarta')->format('H:i:s');

//         $movie = $movie->loadDatesForCurrentWeek();

//         return view('movies.show', compact('movie', 'currentDate', 'currentTime'));
//     }

//     public function home(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
//     {
//         $upperGalleryImages = [
//             'extra-left1.jpg', 'left1.jpg', 'left2.jpg', 'left3.jpg',
//             'left4.jpg',
//              'left5.jpg', 'left6.jpg', 'left7.jpg' ,'left8.jpg'
//             , 'left10.jpg',// ... add all upper images
//             'left4.jpg',
//              'left5.jpg', 'left6.jpg', 'left7.jpg' ,'left8.jpg'
//             , 'left10.jpg'//

//         ];

//         $imagel=['extra-right1.jpg'];
//         $imager=['extra-left1.jpg'];

//         $lowerGalleryImages = [
//             'right10.jpg', 'right1.jpg', 'right2.jpg', 'right3.jpg'
//             , 'right4.jpg'
//             , 'right5.jpg', 'right6.jpg', 'right7.jpg', 'right8.jpg'
//             ,'right10.jpg'// ... add all lower images
//         ];

//         return view('movies.home', compact('upperGalleryImages',
//             'lowerGalleryImages'));
//     }



// }


{
    /**
     * Index returns the home page with both movies and gallery images.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        // Handle movie listing with pagination
        $title = request()->input('search');
        $sort = request()->input('sort');
        $movies = Movie::filter($title, $sort)->latest()->paginate(8);

        // Prepare gallery images
        $upperGalleryImages = [
            'extra-left1.jpg', 'left1.jpg', 'left2.jpg', 'left3.jpg',
            'left4.jpg', 'left5.jpg', 'left6.jpg', 'left7.jpg' ,'left8.jpg',
            'left10.jpg', // ... add all upper images
            'left4.jpg', 'left5.jpg', 'left6.jpg', 'left7.jpg', 'left8.jpg',
            'left10.jpg'
        ];

        $lowerGalleryImages = [
            'right10.jpg', 'right1.jpg', 'right2.jpg', 'right3.jpg',
            'right4.jpg', 'right5.jpg', 'right6.jpg', 'right7.jpg', 'right8.jpg',
            'right10.jpg' // ... add all lower images
        ];

        // Return the view with both sets of data
        return view('movies.home', compact('movies', 'upperGalleryImages', 'lowerGalleryImages'));
    }

    /**
     * Show returns the movie detail page.
     *
     * @param Movie $movie
     * @return View
     */
    public function show(Movie $movie): View
    {
        $currentDate = today('Asia/Jakarta')->format('Y-m-d');
        $currentTime = now('Asia/Jakarta')->format('H:i:s');
        $movie = $movie->loadDatesForCurrentWeek();
        return view('movies.show', compact('movie', 'currentDate', 'currentTime'));
    }
}