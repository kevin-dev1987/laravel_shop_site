<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewHelpful extends Model
{
    use HasFactory;

    public $table = 'review_helpfulness';

    protected $fillable = [
        'review_id',
        'user_id',
        'helpful',
    ];

    public function reviewFor(){
        return $this->belongsTo(Review::class, 'id', 'review_id');
    }
}
