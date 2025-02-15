<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use Illuminate\Http\Request;

class ChatMessageController extends Controller
{
    public function index()
    {
        return ChatMessage::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => ['required', 'integer'],
            'message' => ['required'],
        ]);

        return ChatMessage::create($data);
    }

    public function show(ChatMessage $chatMessage)
    {
        return $chatMessage;
    }

    public function update(Request $request, ChatMessage $chatMessage)
    {
        $data = $request->validate([
            'user_id' => ['required', 'integer'],
            'message' => ['required'],
        ]);

        $chatMessage->update($data);

        return $chatMessage;
    }

    public function destroy(ChatMessage $chatMessage)
    {
        $chatMessage->delete();

        return response()->json();
    }
}
