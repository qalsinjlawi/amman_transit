<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'line_number',
        'line_name',
        'start_station',
        'end_station',
        'ticket_price',
        'frequency_minutes',
        'start_time',
        'end_time',
        'status',
    ];

    protected $casts = [
        'ticket_price' => 'decimal:2',
        'status' => 'string',
    ];

    // العلاقات
    public function lineStops()
    {
        return $this->hasMany(LineStop::class, 'line_id'); // تعديل لاستخدام 'line_id' بدلاً من 'bus_line_id'
    }

    public function schedules()
    {
        return $this->hasMany(BusSchedule::class);
    }
}