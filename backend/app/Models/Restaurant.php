<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Restaurant extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $with = ['user'];

    // Belongs To
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }

    // Has Many
    public function menu()
    {
        return $this->hasMany(Menu::class, 'restaurant_id', 'id');
    }
    public function image()
    {
        return $this->hasMany(Image::class, 'restaurant_id', 'id');
    }
    public function reviewer()
    {
        return $this->hasMany(Reviewer::class, 'restaurant_id', 'id');
    }
    public function review()
    {
        return $this->hasMany(Review::class, 'restaurant_id', 'id');
    }

    public function favorite()
    {
        return $this->hasMany(Favorite::class, 'restaurant_id', 'id');
    }
    public function claim()
    {
        return $this->hasMany(Claim::class, 'restaurant_id', 'id');
    }
    public function report()
    {
        return $this->hasMany(Report::class, 'restaurant_id', 'id');
    }
    public function restaurantfeedback()
    {
        return $this->hasMany(RestaurantFeedback::class, 'restaurant_id', 'id');
    }

    // Has One
    public function restauranthalalcertificate()
    {
        return $this->hasOne(RestaurantHalalCertificate::class, 'restaurant_id', 'id');
    }
}
