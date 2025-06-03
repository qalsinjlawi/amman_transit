<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusStop extends Model
{
    use HasFactory;

    protected $fillable = [
        'stop_name',
        'latitude',
        'longitude',
        'address',
        'area',
        'status',
        'operating_hours',
    ];

    protected $casts = [
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
        'status' => 'string',
    ];

    // العلاقات
    public function lineStops()
    {
        return $this->hasMany(LineStop::class);
    }

    public function chatMessages()
    {
        return $this->hasMany(ChatMessage::class);
    }

    public function stopImages()
    {
        return $this->hasMany(StopImage::class);
    }
}