<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Validator;

class ReviewView extends Controller
{
    protected function save(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'review' => 'required',
                'email' => 'required|email|regex:/(.+)@(.+)\.(.+)/i',
            ],
            $messages
        );

        if (!$validator->passes()) {
            return response()->json([
                'valid' => false,
                'errors' => $validator->errors()->toarray(),
            ]);
        } else {
            $review = new Contact();
            $review->product_id = $request->product_id;
            $review->name = $request->name;
            $review->email = $request->email;
            $review->review = $request->review;
            $result = $review->save();
            if ($result) {
                return response()->json([
                    'valid' => true,
                    'message' => 'Your review has been recorded successfully.',
                ]);
            }
        }
    }
}
