<div class="chat-header">
    <h2>💬 General Chat</h2>
    <div class="online-indicator">
        <div class="status-dot"></div>
        <span id="onlineCount">{{ $onlineUsers->count() ?? 0 }} online</span>
    </div>
</div>

<style>
    .chat-header {
        background: linear-gradient(45deg, #667eea, #764ba2);
        color: white;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .online-indicator {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .status-dot {
        width: 12px;
        height: 12px;
        background: #4ade80;
        border-radius: 50%;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { opacity: 1; }
        50% { opacity: 0.5; }
        100% { opacity: 1; }
    }
</style>