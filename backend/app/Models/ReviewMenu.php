<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewMenu extends Model
{
    use HasFactory;
    protected $guarded = [''];

    public function review(){
        return $this->belongsTo(Review::class, 'review_id', 'id' );
    }
    public function menu(){
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
}
