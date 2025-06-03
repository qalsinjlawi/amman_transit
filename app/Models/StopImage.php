<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StopImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'stop_id',
        'user_id',
        'image_url',
        'caption',
        'is_approved',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
    ];

    // العلاقات
    public function busStop()
    {
        return $this->belongsTo(BusStop::class, 'stop_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}