<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'bio',
        'birth_date',
        'profile_image',
    ];
     public function videos()
    {
        return $this->belongsToMany(Video::class, 'actor_video');
    }
}
