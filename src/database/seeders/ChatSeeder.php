<?php

namespace Database\Seeders;

use App\Models\Chat;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    public function run(): void
    {
        $chat = Chat::create();
        $chat->created_by= 2;
        $chat->companion = 3;
        $chat->save();

        $chat = Chat::create();
        $chat->created_by= 4;
        $chat->companion = 3;
        $chat->save();

        $chat = Chat::create();
        $chat->created_by= 2;
        $chat->companion = 4;
        $chat->save();
    }
}
