<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = [
        'creator_id',
        'category_id',
        'title',
        'description',
        'video_url',
        'price',
        'distribution',
    ];
    public function creator()
    {
        return $this->belongsTo(ContentCreator::class, 'creator_id');
    }
public function festival()
{
    return $this->hasOne(FestivalVideo::class);
}

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'actor_video');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    public function sliders()
    {
        return $this->hasMany(Slider::class);
    }
}
