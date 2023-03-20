@extends('layouts.default')

@section('content')
    <div class="categories-wrapper">
        <h2>Browse Categories</h2>
        <div class="categories-grid">
            @foreach ($categories as $category)
                <div class="category-item">
                    <a href="{{route('products', ['category' => $category->slug])}}">{{$category->category}}</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection