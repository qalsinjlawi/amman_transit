<div class="sidebar">
    <h3>👥 Online Users</h3>
    <ul class="online-users" id="onlineUsers">
        @forelse($onlineUsers as $user)
            @include('community.partials.online-user', ['user' => $user])
        @empty
            <li class="no-users">No users online</li>
        @endforelse
    </ul>
</div>

<style>
    .sidebar {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .sidebar h3 {
        margin-bottom: 15px;
        color: #333;
        font-size: 1.1rem;
    }

    .online-users {
        list-style: none;
    }

    .no-users {
        text-align: center;
        color: #666;
        font-style: italic;
        padding: 20px 0;
    }
</style>