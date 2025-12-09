<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{

    public function createView(){
        return view('review.createReview');
    }

    public function create(Request $request){
        $request->validate([
            'Rating' => 'required|integer|min:1|max:5',
            'Comment' => 'nullable|string|max:1000',
        ]);

        Review::create([
            'UserID' => auth()->id(),
            'Rating' => $request->Rating,
            'Comment' => $request->Comment,
        ]);

        return redirect()->route('reviews.create.view');
    }
    //
}
