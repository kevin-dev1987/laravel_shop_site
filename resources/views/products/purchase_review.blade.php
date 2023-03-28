@extends('layouts.default')

@section('content')
@php
    
@endphp
    <div class="purchase-review-wrapper">
        @if ($response != null)
            <a href="{{route('view_product', [$category->slug, $product->stock_id])}}"><i class="bi bi-arrow-left"></i>Back</a>
            <h2 class="review-error-title">{{ $response['title'] }}</h2>
            <p class="review-error-message">{{ $response['message'] }}</p>
        @else
            
            <div class="review-flex">
                <div class="review">
                    <p>Review your purchase of <strong>{{$product->name}}</strong></p>
                    <form action="{{route('create_review', [$category->slug, $product->stock_id], '/create_review')}}" method="post">
                        @csrf
                        @error('rating')
                                <p style="color: red;">{{$message}}</p>
                            @enderror
                        <div class="review-stars">
                            <div class="star-array">
                                <i class="bi bi-star review-star"></i>
                                <i class="bi bi-star review-star"></i>
                                <i class="bi bi-star review-star"></i>
                                <i class="bi bi-star review-star"></i>
                                <i class="bi bi-star review-star"></i>
                            </div>

                            <span class="review-star-number">0/5</span>
                            <input type="hidden" name="rating" id="review_rating_number" value="">
                        </div>

                        <div class="review-summary-input">
                            <p>Please leave a summary of your review.</p>
                            <input type="text" name="summary" max="200">
                            @error('summary')
                            <p style="color: red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="review-comment-input">
                            <p>Please leave a comment with your review.</p>
                            <textarea name="comment" rows="10" placeholder="Min 50 chars - Max 500 chars" maxlength="500"></textarea>
                            @error('comment')
                                <p style="color: red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="buttons">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="item-details">
                    <div class="details-box">
                        
                        <img src="{{$product->image}}" alt="">
                       
                        <div class="details">
                            <strong>{{$product->name}}</strong>
                            <span>Stock ID: {{$product->stock_id}}</span>
                            <span>Last Purchased: {{date('d M, Y', strtotime($order_info->created_at))}}</span>
                        </div>
                    </div>
                </div>
            </div>







        @endif
    </div>
@endsection
