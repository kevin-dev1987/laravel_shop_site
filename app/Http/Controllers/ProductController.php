<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function categories(){
        $categories = Category::get();
        return view('products.categories', ['categories' => $categories]);
    }

    public function productsList(Category $category){
        $category = $category;
        // dd($category);

        $products = Product::filter(request(['brand', 'min_price', 'max_price']))->whereHas('category', function($query) use ($category) {
            $query->where('categories.slug', $category->slug);
        })->with(['category'])->get();

        $brands = $products->unique('brand')->pluck('brand');

        return view('products.products', [
            'products' => $products,
            'brands' => $brands,
            'category' => $category
        ]);
        
    }

    public function viewProduct(Category $category, Product $product){  
        $category = $category;
        $product = $product->load(['category', 'reviews' => function($query){
            $query->with(['user', 'helpfulness']);
        }])->loadCount(['reviews'])->loadAvg('reviews', 'rating');
        
        return view('products.product', [
            'product' => $product,
            'category' => $category
        ]);
    }

    public function showPurchaseReview(Category $category, Product $product){
        $response = [];
        
        if(!auth()->user()){
            $response['title'] = 'Sorry, not authorised!';
            $response['message'] = 'You must be logged in to do this!';
            
        }

        $purchase_check = Sale::where('stock_id', $product->stock_id)->pluck('user_id')->toArray();
        if(in_array(auth()->user()->id, $purchase_check)){
            $response['title'] = 'Sorry, not authorised!';
            $response['message'] = 'You need to have purchased this item in order to review it!';
        }
        

        return view('products.purchase_review', [
            'response' => $response,
            'category' => $category,
            'product' => $product,
            
        ]);
    }
}
