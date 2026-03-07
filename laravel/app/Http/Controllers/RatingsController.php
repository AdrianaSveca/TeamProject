<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ratings;

class RatingsController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'rating_comment' => 'nullable|string|max:1000'
        ]);

        Ratings::create([
            'user_id' => auth()->id(),
            'product_id' => $id,
            'rating' => $request->rating,
            'rating_comment' => $request->rating_comment,
            'rating_date' => now(),
        ]);
        return back();
    }

    public function destroy($id)
    {
        $rating = Ratings::find($id);
        if ($rating->user_id == auth()->id()) {
            $rating->delete();
        }
        return back();
    }
}
