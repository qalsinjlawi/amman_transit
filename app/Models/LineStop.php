<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineStop extends Model
{
    use HasFactory;

    protected $fillable = [
        'line_id',
        'stop_id',
        'stop_order',
        'direction',
        'arrival_time_offset',
    ];

    protected $casts = [
        'direction' => 'string',
    ];

    // العلاقات
    public function busLine()
    {
        return $this->belongsTo(BusLine::class, 'line_id');
    }

    public function busStop()
    {
        return $this->belongsTo(BusStop::class, 'stop_id');
    }
}