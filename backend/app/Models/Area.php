<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    //Has Many
    public function restaurant()
    {
        return $this->hasMany(Restaurant::class, 'area_id', 'id');
    }
}
