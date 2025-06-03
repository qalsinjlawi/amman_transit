<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'stop_id',
        'user_id',
        'message_type',
        'content',
        'image_url',
        'reply_to_message_id',
        'is_hidden',
    ];

    protected $casts = [
        'message_type' => 'string',
        'is_hidden' => 'boolean',
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

    public function replyToMessage()
    {
        return $this->belongsTo(ChatMessage::class, 'reply_to_message_id');
    }
}