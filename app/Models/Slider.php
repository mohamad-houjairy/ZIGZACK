<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'video_id',
        'position', // ordering
    ];

    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
