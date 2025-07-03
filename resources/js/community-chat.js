class CommunityChat {
    constructor() {
        this.initializeElements();
        this.bindEvents();
        this.setupEcho(); // For real-time with Laravel Echo
    }

    initializeElements() {
        this.chatMessages = document.getElementById('chatMessages');
        this.messageForm = document.getElementById('messageForm');
        this.messageInput = document.getElementById('messageInput');
        this.onlineUsers = document.getElementById('onlineUsers');
    }

    bindEvents() {
        this.messageForm.addEventListener('submit', (e) => {
            e.preventDefault();
            this.sendMessage();
        });
    }

    setupEcho() {
        // Laravel Echo setup for real-time messaging
        window.Echo.channel('chat-room.1')
            .listen('MessageSent', (e) => {
                this.addMessage(e.message);
            });
    }

    async sendMessage() {
        const content = this.messageInput.value.trim();
        if (!content) return;

        try {
            const response = await fetch('/community/messages', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': window.Laravel.csrfToken,
                },
                body: JSON.stringify({
                    message: content,
                    chat_room_id: 1
                })
            });

            if (response.ok) {
                this.messageInput.value = '';
            }
        } catch (error) {
            console.error('Error sending message:', error);
        }
    }

    addMessage(message) {
        // Add message to chat dynamically
        const messageElement = this.createMessageElement(message);
        this.chatMessages.appendChild(messageElement);
        this.chatMessages.scrollTop = this.chatMessages.scrollHeight;
    }

    createMessageElement(message) {
        const div = document.createElement('div');
        div.className = 'message';
        div.innerHTML = `
            <div class="message-header">
                <div class="avatar">${message.user.name.charAt(0).toUpperCase()}</div>
                <span class="username">${message.user.name}</span>
                <span class="timestamp">${new Date(message.created_at).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}</span>
            </div>
            <div class="message-content">${message.content}</div>
        `;
        return div;
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new CommunityChat();
});