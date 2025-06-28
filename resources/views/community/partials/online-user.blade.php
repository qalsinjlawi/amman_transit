<li class="online-user" data-user-id="{{ $user->id }}">
    <div class="user-avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
    <div class="user-status">
        <div class="user-name">{{ $user->name }}</div>
        <div class="user-activity">{{ $user->status ?? 'Online' }}</div>
    </div>
</li>

<style>
    .online-user {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 0;
        border-bottom: 1px solid #f1f5f9;
    }

    .online-user:last-child {
        border-bottom: none;
    }

    .user-avatar {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: linear-gradient(45deg, #10b981, #059669);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 0.7rem;
        font-weight: bold;
    }

    .user-status {
        flex: 1;
    }

    .user-name {
        font-weight: 500;
        font-size: 0.9rem;
    }

    .user-activity {
        font-size: 0.7rem;
        color: #666;
    }
</style>