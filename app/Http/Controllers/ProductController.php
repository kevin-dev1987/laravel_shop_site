<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
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
}
