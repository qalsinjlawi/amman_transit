<div class="message" data-message-id="{{ $message->id }}">
    <div class="message-header">
        <div class="avatar">{{ strtoupper(substr($message->user->name, 0, 1)) }}</div>
        <span class="username">{{ $message->user->name }}</span>
        <span class="timestamp">{{ $message->created_at->format('H:i') }}</span>
    </div>
    <div class="message-content">{{ $message->content }}</div>
</div>

<style>
    .message {
        margin-bottom: 15px;
        animation: slideIn 0.3s ease;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .message-header {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 5px;
    }

    .avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: linear-gradient(45deg, #667eea, #764ba2);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        font-size: 0.8rem;
    }

    .username {
        font-weight: 600;
        color: #333;
    }

    .timestamp {
        color: #666;
        font-size: 0.8rem;
    }

    .message-content {
        background: white;
        padding: 12px 16px;
        border-radius: 12px;
        margin-left: 42px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }
</style>