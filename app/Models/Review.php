<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'rating',
        'summary',
        'comment',
        'stock_id',
        'user_id',
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'stock_id', 'stock_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function helpful(){
        return $this->hasMany(ReviewHelpful::class, 'review_id', 'id')->where('helpful', 1);
    }

    public function unhelpful(){
        return $this->hasMany(ReviewHelpful::class, 'review_id', 'id')->where('helpful', 0);
    }
}
