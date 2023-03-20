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

    public function productsList(Request $request){
        if (!isset($_GET['category'])){
            return redirect('/');
        } else{
            $category = $request->category;

            $products = Product::whereHas('category' ,function($query) use ($category){
                $query->where('category', $category);
            })->filter(request(['brand']))->with(['category'])->get();

            return view('products.products', ['products' => $products]);

        }
        
    
    }
}
