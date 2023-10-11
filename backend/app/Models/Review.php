<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $guarded = [''];

    // Belongs To
    public function restaurant(){
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'id');
    } 
    public function reviewer(){
        return $this->belongsTo(Reviewer::class, 'reviewer_id', 'id');
    }

    public function review_menu(){
        return $this->hasMany(ReviewMenu::class, 'review_id', 'id');
    }
}
