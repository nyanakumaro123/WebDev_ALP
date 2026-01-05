<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{

    public function createView(){
        return view('user.review.createReview');
    }

    public function store(Request $request){
        $request->validate([
            'Rating' => 'required|integer|min:1|max:5',
            'Comment' => 'nullable|string|max:1000',
        ]);

        Review::create([
            'UserID' => $request->user()->id,
            'Rating' => $request->Rating,
            'Comment' => $request->Comment,
        ]);

        return redirect()->route('reviews.list.view');
    }

    public function listReview(){
        $reviews = Review::with('User')->get();
        return view('user.review.listReview', compact('reviews'));
    }
    //
}
