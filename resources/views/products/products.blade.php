@extends('layouts.default')

@section('content')
    @php
        $min_price = $products->min('price');
        $max_price = $products->max('price');
        $brands = $products->unique('brand');
    @endphp
    <div class="products-list-wrapper">
        <div class="wrapper-flex">
            <div class="product-filter">
                <h3>Filter</h3>
                
            </div>
            <div class="product-list">
                @foreach ($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
