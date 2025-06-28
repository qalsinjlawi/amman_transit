<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Models\ChatRoom;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    public function index()
    {
        $stats = [
            'total_members' => User::count(),
            'online_now' => User::whereNotNull('last_active_at')
                                ->where('last_active_at', '>=', now()->subMinutes(5))
                                ->count(),
            'todays_messages' => Message::whereDate('created_at', today())->count(),
            'active_discussions' => ChatRoom::where('is_active', true)->count(),
        ];

        $messages = Message::with('user')
                           ->where('chat_room_id', 1)
                           ->latest()
                           ->take(50)
                           ->get()
                           ->reverse();

        $onlineUsers = User::whereNotNull('last_active_at')
                           ->where('last_active_at', '>=', now()->subMinutes(5))
                           ->get();

       $currentUser = Auth::user();

        return view('community.index', compact(
            'stats', 
            'messages', 
            'onlineUsers', 
            'currentUser'
        ));
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:500',
            'chat_room_id' => 'required|exists:chat_rooms,id'
        ]);

        $message = Message::create([
            'user_id' => Auth::id(),
            'chat_room_id' => $request->chat_room_id,
            'content' => $request->message,
        ]);

        $message->load('user');

        broadcast(new MessageSent($message))->toOthers();

        return response()->json([
            'status' => 'success',
            'message' => $message
        ]);
    }
}
