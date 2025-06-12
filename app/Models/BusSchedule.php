<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'line_id',
        'departure_time',
        'day_type',
        'direction',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // العلاقة المطلوبة
    public function busLine()
    {
        return $this->belongsTo(BusLine::class, 'line_id');
    }
}