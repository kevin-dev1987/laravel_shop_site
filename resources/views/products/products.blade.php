@extends('layouts.default')

@section('content')
    <div class="products-list-wrapper" id="top">
        <div class="wrapper-flex">
            <div class="product-filter">
                <h3>Filter</h3>
                <div class="brand-filter filter">
                    <h4>Brand</h4>
                    <ul>
                        @foreach ($brands as $brand)
                        @php
                            $count = $products->groupBy('brand')->get($brand)->count();
                        @endphp
                            <li>
                                <a href="{{route('products', ['category' => $category->slug, 'brand' => $brand])}}">{{$brand}}</a>
                                <span>({{$count}})</span>
                            </li>
                            
                        @endforeach
                    </ul>
                </div>
                <div class="price-filter filter">
                    <h4>Price</h4>
                    <form action="{{request()->fullUrl(request('min_price'), request('max_price'))}}" method="get">
                        <div class="price-declare">
                            <div>
                                <span>From: </span>
                                <input type="text" name="min_price" id="" placeholder="£">
                            </div>
                            <div>
                                <span>To: </span>
                                <input type="text" name="max_price" id="" placeholder="£">
                            </div>
                        </div>
                        <button type="submit">Filter</button>
                    </form>
                </div>
                <div class="reset-filter">
                    <a class="btn-lg btn-danger" href="{{route('products', ['category' => $category->slug])}}">Reset</a>
                </div>
            </div>
            <div class="product-list">
                <div class="to-top">
                    <a href="#top">
                        <i class="bi bi-caret-up-fill"></i>
                    </a>
                </div>
                @foreach ($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
