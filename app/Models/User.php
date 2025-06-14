<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'role',
        'preferred_area',
        'status',
    ];

    protected $casts = [
        'role' => 'string',
        'status' => 'string',
    ];

    // العلاقات
    public function chatMessages()
    {
        return $this->hasMany(ChatMessage::class);
    }

    public function stopImages()
    {
        return $this->hasMany(StopImage::class);
    }
}