<?php

namespace App\Http\Controllers\User;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        // Create comment
        $review = new Review();
        $review->text = $request->input('text');
        $review->user_id = $request->user()->id;

        $review->save();

        return response()->json(['message' => 'Review submitted successfully'], 201);


    }

    public function getUserReviews($id)
    {

        $success['reviews'] = Review::where('user_id', $id)->select('text')->get();
        $success['success'] = true;

        return response()->json($success, 200);
    }

    public function getAllReviews()
    {

        $success['reviews'] = Review::select('user_id', 'text')->get();
        $success['success'] = true;
        return response()->json($success, 200);
    }
}

// $success['user'] = $user;
// $success['success'] = true;
// $success['message'] = 'profile updated successfully';
// return response()->json($success,200);
