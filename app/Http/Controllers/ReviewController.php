<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ReviewHelpful;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    


    //Submit review helpfulness
    public function submitReviewHelpfulness(Request $request){
        $response = [];
        if(!auth()->user()){
            $response = [
                'auth' => 'not_auth',
            ];
            return response()->json($response);

        } else{
            $id = $request->id;
            $review_check = Review::where('id', $id)->pluck('user_id')->toArray();
            if(in_array(auth()->user()->id, $review_check)){
                $response = [
                    'review' => 'user_review',
                    ];
                return response()->json($response);
            } else{
                $id_check = Review::find($id);
                if(!$id_check){
                    $response = [
                        'review' => 'no_review',
                    ];
                return response()->json($response);
            } else{
                $user_id = auth()->user()->id;
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
                        'user_id' => $user_id,
                    ]);

                    $count = ReviewHelpful::where('helpful', $request->helpful)->where(
                        function($query) use($id){
                            return $query
                            ->where('review_id', $id);
                        })->count();
    
                    $response = [
                        'status' => 'success',
                        'type' => $request->helpful,
                        'count' => $count,
                    ];
                    return response()->json($response);
                }

            }
            }
        }
    }

    //report review
    public function reportReview(Request $request){
        $response = [];
        if(empty($request->report_reason)){
            $response = [
                'input' => 'empty',
            ];
            return response()->json($response);
        }

        if(!auth()->user()){
            $response = [
                'auth' => 'not_auth',
            ];
            return response()->json($response);
        } else{
            Report::create([
                'type' => $request->type,
                'offending_id' => $request->review_id,
                'reporter_id' => auth()->user()->id,
                'reason' => $request->report_reason,
            ]);

            $response = [
                'status' => 'success',
            ];
            return response()->json($response);
        }

    }

    public function createReview(Category $category, Product $product, Request $request){
        $request->validate([
            'rating' => [
                'required',
            ],

            'summary' => [
                'required', 'min:10',
            ],

            'comment' => [
                'required', 'min:50',
            ],
        ],

        [
            'rating' => 'Please select a star rating!',
        ]);

        $request['user_id'] = auth()->user()->id;
        $request['stock_id'] = $product->stock_id;

        $form = $request->all();

    

        Review::create($form);

        return redirect('/products/' . $category->slug . '/' . $product->stock_id)->with('review_success', 'Thank you for your review!');
    }
}
