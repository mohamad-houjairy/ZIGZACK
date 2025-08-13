<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentCreator extends Model
{
    use HasFactory;
    protected $fillable = [
       'user_id','bio','profile_image',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function videos()
    {
        return $this->hasMany(Video::class, 'creator_id');
    }
}
