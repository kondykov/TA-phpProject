<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        return view('layouts.chat.chat');
    }

    public function getAllChats(Request $request)
    {
        return Chat::getAllChats($request);
    }

    public function getChat(Request $request)
    {
        return [
            'users' => User::all(),
            'fakeImages' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Outdoors-man-portrait_%28cropped%29.jpg/1200px-Outdoors-man-portrait_%28cropped%29.jpg',
        ];
    }
}
