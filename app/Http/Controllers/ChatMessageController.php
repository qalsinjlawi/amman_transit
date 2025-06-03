<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Models\BusStop;
use App\Models\User;
use Illuminate\Http\Request;

class ChatMessageController extends Controller
{
    public function index()
    {
        $chatMessages = ChatMessage::with(['busStop', 'user'])->get();
        return view('chat_messages.index', compact('chatMessages'));
    }

    public function create()
    {
        $busStops = BusStop::all();
        $users = User::all();
        return view('chat_messages.create', compact('busStops', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'stop_id' => 'required|exists:bus_stops,id',
            'user_id' => 'required|exists:users,id',
            'message_type' => 'required|in:text,image',
            'content' => 'required|string',
            'image_url' => 'nullable|string|max:255',
            'reply_to_message_id' => 'nullable|exists:chat_messages,id',
            'is_hidden' => 'boolean',
        ]);

        ChatMessage::create($request->all());

        return redirect()->route('chat_messages.index')->with('success', 'تم إنشاء الرسالة بنجاح');
    }

    public function show(ChatMessage $chatMessage)
    {
        $chatMessage->load(['busStop', 'user', 'replyToMessage']);
        return view('chat_messages.show', compact('chatMessage'));
    }

    public function edit(ChatMessage $chatMessage)
    {
        $busStops = BusStop::all();
        $users = User::all();
        return view('chat_messages.edit', compact('chatMessage', 'busStops', 'users'));
    }

    public function update(Request $request, ChatMessage $chatMessage)
    {
        $request->validate([
            'stop_id' => 'required|exists:bus_stops,id',
            'user_id' => 'required|exists:users,id',
            'message_type' => 'required|in:text,image',
            'content' => 'required|string',
            'image_url' => 'nullable|string|max:255',
            'reply_to_message_id' => 'nullable|exists:chat_messages,id',
            'is_hidden' => 'boolean',
        ]);

        $chatMessage->update($request->all());

        return redirect()->route('chat_messages.index')->with('success', 'تم تحديث الرسالة بنجاح');
    }

    public function destroy(ChatMessage $chatMessage)
    {
        $chatMessage->delete();
        return redirect()->route('chat_messages.index')->with('success', 'تم حذف الرسالة بنجاح');
    }
}