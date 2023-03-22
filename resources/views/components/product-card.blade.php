<div class="product-card">
    <div class="image">
        <a href="{{route('view_product', [$product->category->slug, $product->stock_id])}}">
            <img src="{{$product->image}}" alt="">
        </a>
    </div>
    <div class="name">
        <a href="{{route('view_product', [$product->category->slug, $product->stock_id])}}">{{$product->name}}</a>
    </div>
    <div class="footer">
        <div class="price">
            £{{number_format($product->price, 2)}}
        </div>
        @if ($product->out_of_stock == false)
            <div class="stock-true">
                IN STOCK
            </div>
        @else
            <div class="stock-false">
                NOT IN STOCK
            </div>
        @endif
    </div>
</div>