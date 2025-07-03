<div class="chat-input">
    <form id="messageForm" class="input-group">
        @csrf
        <input type="text" 
               id="messageInput" 
               name="message"
               placeholder="Type your message..." 
               maxlength="500"
               required>
        <button type="submit" class="send-btn" id="sendBtn">Send</button>
    </form>
</div>

<style>
    .chat-input {
        padding: 20px;
        background: white;
        border-top: 1px solid #e2e8f0;
    }

    .input-group {
        display: flex;
        gap: 10px;
    }

    .input-group input {
        flex: 1;
        padding: 12px 16px;
        border: 2px solid #e2e8f0;
        border-radius: 25px;
        font-size: 1rem;
        outline: none;
        transition: border-color 0.3s ease;
    }

    .input-group input:focus {
        border-color: #667eea;
    }

    .send-btn {
        background: linear-gradient(45deg, #667eea, #764ba2);
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 25px;
        cursor: pointer;
        font-weight: 600;
        transition: transform 0.2s ease;
    }

    .send-btn:hover {
        transform: scale(1.05);
    }
</style>

