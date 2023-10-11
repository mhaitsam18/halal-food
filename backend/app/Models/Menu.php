<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $with = ['restaurant'];

    // Belongs To
    public function restaurant(){
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'id');
    }

    public function review_menu(){
        return $this->hasMany(ReviewMenu::class, 'menu_id', 'id');
    }
}
