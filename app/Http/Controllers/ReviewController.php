<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\ReviewHelpful;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    


    //Submit review helpfulness
    public function submitReviewHelpfulness(Request $request){
        $response = [];
        if(auth()->user()){
            $response = [
                'auth' => 'not_auth',
            ];

            return response()->json($response);
        } else{
            $id = $request->id;
            $id_check = Review::find($id);
            if(!$id_check){
                $response = [
                    'review' => 'no_review',
                ];
                return response()->json($response);
            } else{
                $user_id = 777;
                $review_helpful_check = ReviewHelpful::where('review_id', $id)->pluck('user_id')->toArray();
                if(in_array($user_id, $review_helpful_check)){
                    $response = [
                        'status' => 'selection_exists',
                    ];
                    return response()->json($response);
                } else{
                    ReviewHelpful::create([
                        'review_id' => $id,
                        'helpful' => $request->helpful,
                        'user_id' => 777,
                    ]);
    
                    $response = [
                        'status' => 'success',
                    ];
                    return response()->json($response);
                }

            }
        }
    }
}
