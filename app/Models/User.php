<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
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