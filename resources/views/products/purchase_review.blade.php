@extends('layouts.default')

@section('content')
@php
    // dd($user);
@endphp
    <div class="purchase-review-wrapper">
        @if ($response != null)
            <h2 class="review-error-title">{{ $response['title'] }}</h2>
            <p class="review-error-message">{{ $response['message'] }}</p>
        @else
            
            <div class="review-flex">
                <div class="review">
                    <p>Review your purchase of <strong>{{$product->name}}</strong></p>
                    <form action="#" method="post">
                        @csrf
                        <div class="review-stars">
                            <i class="bi bi-star review-star"></i>
                            <i class="bi bi-star review-star"></i>
                            <i class="bi bi-star review-star"></i>
                            <i class="bi bi-star review-star"></i>
                            <i class="bi bi-star review-star"></i>
                            <span>0/5</span>
                            <input type="hidden" name="rating" id="review_rating" value="">
                        </div>
                        <div>
                            <p class="review-summary-input">Please leave a summary of your review.</p>
                            <input type="text" name="summary">
                        </div>
                        <div>
                            <p class="review-comment-input">Please leave a comment with your review.</p>
                            <textarea name="comment" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="buttons">
                            <button class="btn btn-primay">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="item-details">
                    <div class="details-box">
                        <div class="image">
                            <img src="{{$product->image}}" alt="">
                        </div>
                        <div class="details">
                            <strong>{{$product->name}}</strong>
                            <span>Stock ID: {{$product->stock_id}}</span>
                            <span>Purchase Date: Purchase DAte</span>
                        </div>
                    </div>
                </div>
            </div>







        @endif
    </div>
@endsection
