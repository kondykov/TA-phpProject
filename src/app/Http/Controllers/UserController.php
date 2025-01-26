<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function GetRegisterPage()
    {
        return view('account.register', [
            'title' => 'Register page'
        ]);
    }

    public function GetLoginPage()
    {
        return view('account.login', [
            'title' => 'Login page'
        ]);
    }

    public function Login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            return to_route('home');
        } else {
            return Redirect::back();
        }
    }

    public function Logout(Request $request)
    {
        $user = $request->user();
        $request->session()->invalidate();
        return to_route('home');
    }

    public function Register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new User([
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($user->exists) return Redirect::back(409)->withErrors('User already exists');
        $user->save();

        return to_route('login');
    }
}
