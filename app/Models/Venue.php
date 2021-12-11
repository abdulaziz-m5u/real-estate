<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location_id',
        'slug', 
        'address', 
        'latitude', 
        'longitude',
        'description',
        'features',
        'people_minimum',
        'people_maximum',
        'price_per_hour',
        'is_featured',
    ];

    public function event_types()
    {
        return $this->belongsToMany(EventType::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }
}
