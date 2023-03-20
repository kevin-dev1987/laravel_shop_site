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

    public function scopeFilter($query, array $filter){
        if($filter['brand'] ?? false){
            $query->where('brand', '=', $filter['brand']);
        }
    }
}
