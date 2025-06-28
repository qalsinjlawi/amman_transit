<div class="chat-messages" id="chatMessages">
    @forelse($messages as $message)
        @include('community.partials.message', ['message' => $message])
    @empty
        <div class="no-messages">
            <p>No messages yet. Start the conversation!</p>
        </div>
    @endforelse
</div>

<style>
    .chat-messages {
        flex: 1;
        padding: 20px;
        overflow-y: auto;
        background: #f8fafc;
    }

    .no-messages {
        text-align: center;
        padding: 40px;
        color: #666;
    }
</style>