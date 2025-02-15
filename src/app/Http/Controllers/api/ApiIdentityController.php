<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\Sanctum;

class ApiIdentityController extends Controller
{
    public function authenticate(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'These credentials do not match our records.'], 401);
        }

        $token = $user->createToken(env('APP_NAME'))->plainTextToken;
        return response()->json(['token' => $token]);
    }

    public function verify(Request $request)
    {
        $token = $request->query('token');
        if (!$token) {
            return response()->json(['error' => 'Token is required'], 401);
        }

        $user = User::whereHas('tokens', function ($query) use ($token) {
            $query->where('id', $token);
        })->first();

        if ($user) {
            return response()->json(['data' => $user]);
        } else {
            return response()->json(['error' => 'Token is invalid'], 401);
        }
    }
}
