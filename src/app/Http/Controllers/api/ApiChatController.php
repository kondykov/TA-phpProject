<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class ApiChatController extends Controller
{
    public function getAll(Request $request)
    {
        if ($request->input('is_manager')) {
            $userToken = $request->query('user_token');
            if (!$this->verify($userToken)) {
                return response()->json([
                    'error' => 'User token is invalid',
                ], 401);
            }
            $user = $this->getUser($userToken);
        } else {
            /** @var User $user */
            $user = $request->User();
        }

        $chatsWhenCreator = Chat::where('created_by', $user->id)->get();
        $chatsWhenCompanion = Chat::where('companion', $user->id)->get();


        $chats = array_unique(
            array_merge($chatsWhenCreator->toArray(), $chatsWhenCompanion->toArray()),
            SORT_REGULAR
        );

        $users = User::whereIn('id', array_column($chats, 'created_by'))->get();

        foreach ($chats as &$chat) {
            $createdBy = User::firstWhere('id', $chat['created_by']);
            $chat['creator_name'] = $createdBy->name ?? 'Unknown';

            $companion = User::firstWhere('id', $chat['companion']);
            $chat['companion_name'] = $companion->name ?? 'Unknown';
        }

        return response()->json([
            'data' => $chats,
            'fakeImages' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Outdoors-man-portrait_%28cropped%29.jpg/1200px-Outdoors-man-portrait_%28cropped%29.jpg',
        ]);
    }

    public function create(Request $request)
    {
        if (!$this->verify($request->input('user_token'))) {
            return response()->json([
                'error' => 'User token is invalid',
            ]);
        }

        $creatorId = $request->input('creator_id');
        $companionId = $request->input('companion_id');

        if ($creatorId === null || $companionId === null) {
            return response()->json(
                [
                    'data' => $request->all(),
                    'error' => 'creator_id and companion_id is required',
                ],
                422);
        }

        $creator = User::find($creatorId);
        $companion = User::find($companionId);

        if ($creator === null || $creator->email == 'manager@no.reply' || $companion === null) {
            return response()->json([
                'error' => 'One or more users do not exist',
            ],
                404);
        }

        $chatExistsV1 = Chat::where('created_by', $creatorId)->where('companion', $companionId)->first();
        $chatExistsV2 = Chat::where('companion', $creatorId)->where('created_by', $companionId)->first();

        if ($chatExistsV1 || $chatExistsV2) {
            return response()->json([
                'error' => 'Chat is exist'
            ], 409);
        }

        $chat = new Chat();
        $chat->created_by = $creatorId;
        $chat->companion = $companion->id;
        $chat->save();

        return response()->json([
            'chat_id' => $chat->id,
            'creator' => [
                'token' => $creator->createToken('creator')->plainTextToken,
                'name' => $creator->name,
            ],
            'companion' => [
                'token' => $companion->createToken('companion')->plainTextToken,
                'name' => $companion->name,
            ],
        ]);
    }

    public function receive(Request $request)
    {
        $userToken = $request->input('token');
        if (!$this->verify($userToken)) {
            return response()->json([
                'error' => 'User token is invalid',
            ]);
        }

        $data = $request->input('data');
        $chatId = $data['chat_id'] ?? null;
        $content = $data['content'] ?? null;
        $chat = Chat::find($chatId);

        if ($chat === null) {
            return response()->json([
                'error' => 'Chat not found',
            ], 404);
        }

        if ($content === null) {
            return response()->json([
                'error' => 'Content is required'
            ], 422);
        }
        /** @var User $user */
        $user = $this->getUser($userToken);
        if ($chat->created_by == $user->id || $chat->companion == $user->id) {
            $receiver = null;
            if ($chat->created_by == $user->id) {
                $receiver = $chat->companion;
            } else {
                $receiver = $chat->created_by;
            }

            $message = new ChatMessage();
            $message->user_id = $user->id;
            $message->chat_id = $chat->id;
            $message->content = (string)$content;
            $message->save();
            $chat->messages()->save($message);

            return response()->json([
                'data' => [
                    'chat_id' => $chat->id,
                    'receiver' => $receiver,
                ],
            ]);
        }
        return response()->json([
            'error' => 'Chat is not owned by you',
        ]);
    }

    public function getAllMessages(Request $request)
    {
        if ($request->input('is_manager')) {
            $userToken = $request->query('user_token');
            if (!$this->verify($userToken)) {
                return response()->json([
                    'error' => 'User token is invalid',
                ], 401);
            }
            $user = $this->getUser($userToken);
        } else {
            $user = $request->User();
        }

        if ($user === null) {
            return response()->json([
                'error' => 'Token is invalid',
            ], 401);
        }

        $chatId = $request->input('chat_id');
        $chat = Chat::find($chatId);

        if ($chat === null) {
            return response()->json([
                'error' => 'chat_id not found',
            ], 404);
        }

        $messages = $chat->messages()->paginate(500);

        return response()->json([
            'total_pages' => $messages->lastPage(),
            'current_page' => $messages->currentPage(),
            'data' => $messages->all()
        ]);
    }

    private function verify(?string $token)
    {
        if (!$token) {
            return false;
        }

        $user = User::whereHas('tokens', function ($query) use ($token) {
            $query->where('id', $token);
        })->first();

        return (bool)$user;
    }

    private function getUser(?string $token)
    {
        return PersonalAccessToken::findToken($token)?->tokenable;
    }
}
