<div class="stats">
    <div class="stat-card">
        <div class="stat-number" id="totalMembers">{{ number_format($totalMembers) }}</div>
        <div class="stat-label">Total Members</div>
    </div>
    <div class="stat-card">
        <div class="stat-number" id="onlineNow">{{ $onlineNow }}</div>
        <div class="stat-label">Online Now</div>
    </div>
    <div class="stat-card">
        <div class="stat-number" id="todaysMessages">{{ $todaysMessages }}</div>
        <div class="stat-label">Today's Messages</div>
    </div>
    <div class="stat-card">
        <div class="stat-number" id="activeDiscussions">{{ $activeDiscussions }}</div>
        <div class="stat-label">Active Topics</div>
    </div>
</div>