<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Venue extends Model implements HasMedia
{
    use HasFactory ,InteractsWithMedia;

    protected $appends = [
        'gallery',
        'main_photo',
    ];

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

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
        $this->addMediaConversion('big_thumb')
            ->width(400)
            ->height(400);
    }

    public function getMainPhotoAttribute()
    {
        $file = $this->getMedia('main_photo')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    public function getGalleryAttribute()
    {
        $files = $this->getMedia('gallery');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
        });

        return $files;
    }
}
