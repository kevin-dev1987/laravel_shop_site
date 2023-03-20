<div class="product-card">
    <img src="{{$product->image}}" alt="">
    <a href="#">{{$product->name}}</a>
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
        {{$product->brand}}
    </div>
</div>