@extends('layouts.default')

@section('content')
    @include('includes.hero')
    <div class="promo-banner">
        <i class="bi bi-truck promo-icon"></i>
        <div class="promo-title">
            <h2>FREE DELIVERY ON ORDERS OVER £60</h2>
            <a href="#" class="btn-promo-shop">
                SHOP
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
    <div>
        @auth
            YOU ARE LOGGED IN {{auth()->user()->name}}
        @endauth
    </div>

    <section>
        <h2>On Offer</h2>
        <div class="on-offer-wrapper">

            <ul>
                <a class="offer-cat-link" href="javascript:void(0)" data-category="1">Electronics</a>
                <a class="offer-cat-link" href="javascript:void(0)" data-category="2">Gardening</a>
                <a class="offer-cat-link" href="javascript:void(0)" data-category="3">Computing</a>
                <a class="offer-cat-link" href="javascript:void(0)" data-category="4">Toys</a>
                <a class="offer-cat-link" href="javascript:void(0)" data-category="5">Health</a>
            </ul>
        
            <div class="offer-items-grid">
                @foreach ($offers_def as $offer)
                    <div class="item">
                        <img src="{{$offer->image}}" alt="">
                        <a href="#">{{$offer->name}}</a>
                        <div class="footer">
                            <span>£{{$offer->price}}</span>
                            @if ($offer->out_of_stock == true)
                                <div class="stock-false">
                                    OUT OF STOCK
                                </div>
                            @else
                                <div class="stock-true">
                                    IN STOCK
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section>
        <h2>Popular Now</h2>
        <div class="popular-now-wrapper">
            <div class="popular-now-flex">
                <div class="popular-card">
                    <img src="https://picsum.photos/200" alt="">
                    <p>Snappy Title</p>
                    <span>Small Description here. Also snappy</span>
                    <a href="#">Shop Now</a>
                </div>

                <div class="popular-card">
                    <img src="https://picsum.photos/200" alt="">
                    <p>Snappy Title</p>
                    <span>Small Description here. Also snappy</span>
                    <a href="#">Shop Now</a>
                </div>

                <div class="popular-card">
                    <img src="https://picsum.photos/200" alt="">
                    <p>Snappy Title</p>
                    <span>Small Description here. Also snappy</span>
                    <a href="#">Shop Now</a>
                </div>

                <div class="popular-card">
                    <img src="https://picsum.photos/200" alt="">
                    <p>Snappy Title</p>
                    <span>Small Description here. Also snappy</span>
                    <a href="#">Shop Now</a>
                </div>

                <div class="popular-card">
                    <img src="https://picsum.photos/200" alt="">
                    <p>Snappy Title</p>
                    <span>Small Description here. Also snappy</span>
                    <a href="#">Shop Now</a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="store-card-wrapper">
            <div class="details">
                <p>Buy now, pay later with MyStore Card</p>
                <p>Representitive 34.9% APR variable.</p>
                <span>Credit subject to status. T&Cs apply.</span>
                <a href="#">Learn More</a>
            </div>
            <div class="card">
                IMAGE OF STORE CARD
            </div>
        </div>
    </section>

    <section>
        <div class="store-finder-wrapper">
            <p>Find your nearest store</p>
            <form action="#" method="get">
                <input type="text" name="store_search" placeholder="Search stores">
                <button type="submit">Find!</button>
            </form>
        </div>
    </section>
@endsection
