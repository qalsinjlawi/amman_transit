<div class="chat-main">
    @include('community.partials.chat-header')
    @include('community.partials.chat-messages', ['messages' => $messages])
    @include('community.partials.typing-indicator')
    @include('community.partials.chat-input')
</div>

<style>
    .chat-main {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        display: flex;
        flex-direction: column;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
</style>