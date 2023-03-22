<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function reviews(){
        return $this->hasMany(Review::class, 'stock_id', 'stock_id');
    }

    public function scopeFilter($query, array $filter){
        if($filter['brand'] ?? false){
            $query->where('brand', $filter['brand']);
        }
        if($filter['min_price'] ?? false){
            $query->where('price', '>=', $filter['min_price']);
        }
        if($filter['max_price'] ?? false){
            $query->where('price', '<=', $filter['max_price']);
        }
    }

  
}
