<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    public function __invoke()
    {
        $posts = Post::where('visible', 1)
            ->orderBy('created_at', 'desc')
            ->with('user')
            ->get();

        return view('home', [
            'posts' => $posts,
            'fakeImages' => [
                'https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Outdoors-man-portrait_%28cropped%29.jpg/1200px-Outdoors-man-portrait_%28cropped%29.jpg',
                'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThgvtbGZaid9GYER_WaEI5pitR4W32IRwWsQ&s',
                'https://t4.ftcdn.net/jpg/03/26/98/51/360_F_326985142_1aaKcEjMQW6ULp6oI9MYuv8lN9f8sFmj.jpg',
                'https://www.shutterstock.com/image-photo/portrait-positive-cheerful-man-show-260nw-1531460657.jpg',
                'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqhFDeHoLAVh8hH4adf7GwcQPyNcck3eLn2g&s',
                'https://www.shutterstock.com/image-photo/smiling-middle-aged-african-american-600nw-2099982595.jpg',
            ]
        ]);
    }
}
