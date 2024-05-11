<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;



class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'review' => 'required|string',
        ]);

        $review = new Review([
            'user_id' => auth()->user()->id, // Ensure user is logged in
            'review' => $request->review,
            'post' => 'N', // Default value
        ]);

        $review->save();

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }

    

    public function showReviews()
    {
        $reviews = Review::with('user')->get(); // Fetch all reviews and associated user data
    
        return view('admin.review', compact('reviews'));
    }

    public function togglePost(Request $request, Review $review)
    {
        $review->post = $request->post; // 'Y' or 'N'
        $review->save();
    
        return back()->with('status', 'Review posting status updated successfully!');
    }
}