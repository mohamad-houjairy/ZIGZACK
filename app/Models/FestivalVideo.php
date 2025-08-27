<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FestivalVideo extends Model
{
    use HasFactory;
    protected $fillable = [
        'video_id',
        'starting_date',
        'ending_date',
        'location',
        'latitude',
        'longitude',
        'organizer_name',
        'organizer_phone',
    ];
    protected $casts = [
    'starting_date' => 'date',
    'ending_date' => 'date',
];

    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
