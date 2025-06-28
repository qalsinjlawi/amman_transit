<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'read_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Subject options with Arabic labels
     */
    public static function getSubjectOptions(): array
    {
        return [
            'general' => 'استفسار عام',
            'support' => 'دعم العملاء',
            'partnership' => 'شراكة',
            'feedback' => 'تعليقات',
            'other' => 'أخرى',
        ];
    }

    /**
     * Get the Arabic label for the subject
     */
    public function getSubjectLabelAttribute(): string
    {
        $options = self::getSubjectOptions();
        return $options[$this->subject] ?? $this->subject;
    }

    /**
     * Mark message as read
     */
    public function markAsRead(): void
    {
        $this->update([
            'is_read' => true,
            'read_at' => now(),
        ]);
    }

    /**
     * Mark message as unread
     */
    public function markAsUnread(): void
    {
        $this->update([
            'is_read' => false,
            'read_at' => null,
        ]);
    }

    /**
     * Scope for unread messages
     */
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    /**
     * Scope for read messages
     */
    public function scopeRead($query)
    {
        return $query->where('is_read', true);
    }

    /**
     * Scope for messages by subject
     */
    public function scopeBySubject($query, string $subject)
    {
        return $query->where('subject', $subject);
    }

    /**
     * Scope for recent messages (last 30 days)
     */
    public function scopeRecent($query)
    {
        return $query->where('created_at', '>=', Carbon::now()->subDays(30));
    }

    /**
     * Get formatted creation date
     */
    public function getFormattedDateAttribute(): string
    {
        return $this->created_at->format('Y-m-d H:i');
    }

    /**
     * Get time since creation in Arabic
     */
    public function getTimeAgoAttribute(): string
    {
        $diff = $this->created_at->diffInMinutes(now());
        
        if ($diff < 60) {
            return "منذ {$diff} دقيقة";
        } elseif ($diff < 1440) { // 24 hours
            $hours = floor($diff / 60);
            return "منذ {$hours} ساعة";
        } else {
            $days = floor($diff / 1440);
            return "منذ {$days} يوم";
        }
    }
}