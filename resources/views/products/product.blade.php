@extends('layouts.default')

@section('content')
@php
    // dd($product);
@endphp
    <div class="product-wrapper">
        <div class="breadcrumbs">
            <a href="{{route('categories')}}">All Categories</a>
            <a href="{{route('products', [$product->category->category])}}">{{$product->category->category}}</a>
            <span>{{$product->name}}</span>
        </div>

        <div class="product-flex">
            <div class="flex-left">
                <h2>{{$product->name}}</h2>
                <div class="item-stock-num">Stock #: {{$product->stock_id}}</div>
                <div class="review-stars">
                    @php
                        $avg_rating = round($product->reviews_avg_rating);
                        $remainder = 5 - $avg_rating;
                    @endphp
                    <div class="stars">
                        @for ($i = 0; $i < $avg_rating; $i++)
                            <i class="bi bi-star-fill"></i>
                        @endfor
                        @for ($i = 0; $i < $remainder; $i++)
                            <i class="bi bi-star"></i>
                        @endfor
                    </div>
                    ({{$product->reviews_count . ' ' . Str::plural('Review', $product->reviews)}})
                </div>
                <div class="image">
                    <img src="{{$product->image}}" alt="">
                </div>
            </div>
            <div class="flex-right">
                <div class="price">
                    <h2>£{{number_format($product->price, 2)}}</h2>
                </div>
                <div class="store-card-option">
                    <i class="bi bi-credit-card-fill"></i>
                    <p>Finance available <a href="#">Learn More</a> </p>
                </div>
                <div class="stock-check">
                    <form>
                        <p>Check your local store</p>
                        <div class="form-input">
                            <input type="text" name="local_stock_check" placeholder="Postcode, town, city">
                            <button type="submit">Check</button>
                        </div>
                    </form>
                </div>
                <div class="add-to-basket">
                    <h3>ADD TO BASKET</h3>
                    <form id="basket-add-form">
                        <select name="order_qty" id="">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <button class="basket-add-btn">ADD TO BASKET</button>
                    </form>
                </div>
                <div class="purchase-review">
                    <h3>LEAVE A REVIEW</h3>
                    <div class="main">
                        <a class="btn-lg btn-primary" href="{{route('review_purchase', [$product->category->slug, $product->stock_id], 'review')}}">REVIEW THIS ITEM</a> {{$product->reviews_count . ' ' . Str::plural('Review', $product->reviews)}}
                    </div>
                </div>
            </div>
        </div>
        <div class="product-information">
            <h2>Description</h2>
            {{$product->description}}
        </div>
        <div class="product-reviews">
            <div class="header" id="reviews-dropdown-toggle">
                <div class="summary">
                    <h3>Reviews</h3>
                    <div class="stars">
                        @for ($i = 0; $i < $avg_rating; $i++)
                            <i class="bi bi-star-fill"></i>
                        @endfor
                        @for ($i = 0; $i < $remainder; $i++)
                            <i class="bi bi-star"></i>
                        @endfor
                    </div>
                    <div class="review-avg">
                        ({{$avg_rating}}/5)
                    </div>
                </div>
                <i class="bi bi-caret-down-fill"></i>
            </div>
            <ul id="reviews-ul">
                @foreach ($product->reviews as $review)
                    <div class="review-box">
                        <div class="review-summary">
                            <strong>{{$review->summary}}</strong>
                        </div>
                        <div class="user-rating">
                            @php
                                $remainder_single = (5 - $review->rating);
                            @endphp
                            <div>
                                Rating:
                                @for ($i = 0; $i < round($review->rating); $i++)
                                    <i class="bi bi-star-fill"></i>
                                @endfor
                                @for ($i = 0; $i < $remainder_single; $i++)
                                    <i class="bi bi-star"></i>
                                @endfor
                                 ({{round($review->rating)}})
                            </div>
                            <div>
                                <span class="date">{{date('d M, Y', strtotime($review->created_at))}}</span>
                            </div>
                        </div>
                        <div class="review-comment">
                            {{$review->comment}}
                        </div>
                        <div class="user-details">
                            <div class="name">
                                {{$review->user->name}} &middot; 
                            </div>
                            <div class="age-range">
                                18-24 &middot;  
                            </div>
                            <div class="location">
                                City name here
                            </div>
                        </div>
                        <div class="review-tools">
                            @php
                                $helpful = $review->helpfulness->where('helpful', 1)->count();
                                $unhelpful = $review->helpfulness->where('helpful', 0)->count();
                            @endphp
                            <div class="tool-item review-helpful" data-id="{{$review->id}}">
                                Helpful({{$helpful}})
                            </div>
                            <div class="tool-item review-unhelpful" data-id="{{$review->id}}">
                                Unhelpful({{$unhelpful}})
                            </div>
                            <div class="tool-item review-report" data-user="{{$review->user->name}}" data-review_id="{{$review->id}}">
                                Report <i class="bi bi-flag-fill"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </ul>
        </div>
        <div class="window-message-danger">
            <p></p>
            <i class="bi bi-x close-window-message"></i>
        </div>
        <div class="window-message-success">
            <p></p>
            <i class="bi bi-x close-window-message"></i>
        </div>
        <div class="review-report-modal">
            <div class="modal-content">
                <p>Report this review by <strong></strong></p>
                <form id="report-review-form">
                    <span>Reason:</span>
                    <div class="reason-radio">
                        <div>
                            <input type="radio" name="report_reason" id="reason1" value="Reason 1">
                            <label for="reason1">Reason 1</label>
                        </div>
                        <div>
                            <input type="radio" name="report_reason" id="reason2" value="Reason 2">
                            <label for="reason2">Reason 2</label>
                        </div>
                        <div>
                            <input type="radio" name="report_reason" id="reason3" value="Reason 3">
                            <label for="reason3">Reason 3</label>
                        </div>
                        <div>
                            <input type="radio" name="report_reason" id="reason4" value="Reason 4">
                            <label for="reason4">Reason 4</label>
                        </div>
                        <div>
                            <input type="radio" name="report_reason" id="reason5" value="Reason 5">
                            <label for="reason5">Reason 5</label>
                        </div>
                    </div>
                    <input type="hidden" name="review_id" value="" id="input_review_id">
                    <div class="buttons">
                        <button class="btn btn-primary submit-review-report">Submit</button>
                        <button class="btn btn-danger cancel-review-report">Cancel</button>
                    </div>
                </form>
                <div class="review-report-errors">
                    
                </div>
            </div>
        </div>
    </div>
@endsection
