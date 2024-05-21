<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('reviewer')->get();
        return response()->json($reviews);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'reviewer_id' => 'required|exists:users,id',
            'ad_id' => 'required',
            'type' => 'required|in:A,B',
            'description' => 'required|string',
        ]);

        $review = Review::create($validatedData);

        return response()->json($review, 201);
    }

    public function show($id)
    {
        $review = Review::with('reviewer')->findOrFail($id);
        return response()->json($review);
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        $validatedData = $request->validate([
            'reviewer_id' => 'required|exists:users,id',
            'ad_id' => 'required|integer',
            'type' => 'required|in:A,B',
            'description' => 'required|string',
        ]);

        $review->update($validatedData);

        return response()->json($review, 200);
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return response()->json(null, 204);
    }

    public function getReviewsByAdAndType($ad_id, $type)
    {
        if (!in_array($type, ['A', 'B'])) {
            return response()->json(['error' => 'Invalid review type'], 400);
        }

        $reviews = Review::where('ad_id', $ad_id)->where('type', $type)->with('reviewer')->get();

        return response()->json($reviews);
    }
}

