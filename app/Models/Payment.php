<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'video_id',
        'subscription_id',
        'amount',
        'payment_method',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function video()
    {
        return $this->belongsTo(Video::class);
    }
    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

}
