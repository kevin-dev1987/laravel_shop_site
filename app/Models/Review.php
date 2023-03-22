<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class, 'stock_id', 'stock_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function helpfulness(){
        return $this->hasMany(ReviewHelpful::class, 'review_id', 'id');
    }
}
