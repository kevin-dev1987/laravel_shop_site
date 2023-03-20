<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $offers_def = Product::where('category_id', 1)->limit(6)->get();
        return view('main.index',
        [
            'offers_def' => $offers_def,
        ]);
    }

    public function getOffers(){
       if(isset($_GET['category'])){
            $category = $_GET['category'];
            $offers = Product::where('category_id', $category)->limit(6)->get();

            return response()->json([
                'offers' => $offers
            ]);
       }
    }
}
