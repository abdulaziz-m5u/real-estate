<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug', 
        'address', 
        'latitude', 
        'longtitude',
        'description',
        'features',
        'people_minimum',
        'people_maximum',
        'price_per_hour',
        'is_featured',
    ];
}
