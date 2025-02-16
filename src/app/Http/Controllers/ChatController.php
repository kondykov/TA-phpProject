<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $token = $user->createToken(env('APP_NAME'))->plainTextToken;
        return view('layouts.chat.chat', [
            'token' => $token,
            'user' => $user,
            ]);
    }

    public function getAllChats(Request $request)
    {
        return Chat::getAllChats($request);
    }

    public function getChat(Request $request)
    {
        $user = auth()->user();
        $chatsWhenCreator = Chat::where('created_by', $user->id)->get();
        $chatsWhenCompanion = Chat::where('companion', $user->id)->get();

        $result = array_unique(
            array_merge($chatsWhenCreator->toArray(), $chatsWhenCompanion->toArray()),
            SORT_REGULAR
        );

        return [
            'chats' => $result,
            'fakeImages' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Outdoors-man-portrait_%28cropped%29.jpg/1200px-Outdoors-man-portrait_%28cropped%29.jpg',
        ];
    }
}
