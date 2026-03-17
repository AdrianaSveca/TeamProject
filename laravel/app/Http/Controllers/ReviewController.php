<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required'
        ]);

        Review::create([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'email' => $request->email,
            'rating' => $request->rating,
            'review' => $request->review
        ]);

        return back();
    }
}
