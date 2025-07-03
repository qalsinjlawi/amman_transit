<div class="typing-indicator" id="typingIndicator" style="display: none;">
    <span id="typingUser">Someone</span> is typing
    <div class="typing-dots">
        <div class="typing-dot"></div>
        <div class="typing-dot"></div>
        <div class="typing-dot"></div>
    </div>
</div>

<style>
    .typing-indicator {
        display: none;
        align-items: center;
        gap: 5px;
        padding: 10px 16px;
        margin-left: 42px;
        font-style: italic;
        color: #666;
        font-size: 0.9rem;
    }

    .typing-dots {
        display: flex;
        gap: 3px;
    }

    .typing-dot {
        width: 4px;
        height: 4px;
        background: #667eea;
        border-radius: 50%;
        animation: typing 1.4s infinite ease-in-out;
    }

    .typing-dot:nth-child(1) { animation-delay: -0.32s; }
    .typing-dot:nth-child(2) { animation-delay: -0.16s; }

    @keyframes typing {
        0%, 80%, 100% { transform: scale(0.8); opacity: 0.5; }
        40% { transform: scale(1.2); opacity: 1; }
    }
</style>