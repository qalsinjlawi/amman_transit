@extends('layouts.app')

@section('title', 'Community Chat')

@push('styles')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        color: #333;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .header {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .header h1 {
        font-size: 2.5rem;
        background: linear-gradient(45deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 10px;
    }

    .header p {
        color: #666;
        font-size: 1.1rem;
    }

    .stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-number {
        font-size: 2rem;
        font-weight: bold;
        color: #667eea;
        margin-bottom: 5px;
    }

    .stat-label {
        color: #666;
        font-size: 0.9rem;
    }

    .chat-container {
        display: grid;
        grid-template-columns: 1fr 300px;
        gap: 20px;
        height: 600px;
    }

    @media (max-width: 768px) {
        .chat-container {
            grid-template-columns: 1fr;
            height: auto;
        }
        
        .sidebar {
            order: -1;
            margin-bottom: 20px;
        }
        
        .header h1 {
            font-size: 2rem;
        }
    }
</style>
@endpush

@section('content')
<div class="container">
    {{-- Header Component --}}
    @include('community.partials.header')

    {{-- Stats Component --}}
    @include('community.partials.stats', [
        'totalMembers' => $stats['total_members'] ?? 1247,
        'onlineNow' => $stats['online_now'] ?? 23,
        'todaysMessages' => $stats['todays_messages'] ?? 156,
        'activeDiscussions' => $stats['active_discussions'] ?? 8
    ])

    {{-- Chat Container --}}
    <div class="chat-container">
        {{-- Main Chat Component --}}
        @include('community.partials.chat-main', [
            'messages' => $messages ?? [],
            'currentUser' => $currentUser ?? auth()->user()
        ])

        {{-- Sidebar Component --}}
        @include('community.partials.sidebar', [
            'onlineUsers' => $onlineUsers ?? []
        ])
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Pass Laravel data to JavaScript
    window.Laravel = {
        csrfToken: '{{ csrf_token() }}',
        user: @json($currentUser ?? auth()->user()),
        chatRoom: '{{ $chatRoom ?? "general" }}',
        apiUrl: '{{ config("app.url") }}/api'
    };
</script>
@vite(['resources/js/community-chat.js'])
@endpush
