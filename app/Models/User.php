<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    // User has many messages (sent by this user)
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    // User belongs to many chat rooms
    public function chatRooms(): BelongsToMany
    {
        return $this->belongsToMany(ChatRoom::class, 'chat_room_users');
    }

    // Existing relationships
    
    public function stopImages(): HasMany
    {
        return $this->hasMany(StopImage::class);
    }
}
