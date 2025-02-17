<?php

namespace App\Http\Controllers\api;

use App\Contracts\PostRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class ApiPostController extends Controller
{
    private PostRepositoryInterface $postRepository;

    /**
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(
        PostRepositoryInterface $postRepository,
    )
    {
        $this->postRepository = $postRepository;
    }

    public function getAll(Request $request)
    {
        $user = $request->User();

        $posts = Post::where("user_id", $user->id)->get();

        return response()->json([
            'data' => $posts,
        ]);
    }

    public function getById(Request $request, $id)
    {
        $user = $request->User();
        $post = Post::where("user_id", $user->id)->where('id', $id)->first();
        return response()->json([
            'data' => $post,
        ]);
    }

    public function create(Request $request)
    {
        if (!$request->has('title')) {
            return response()->json([
                'field' => 'title',
                'message' => 'Поле обязательно к заполнению'

            ], 422);
        }
        if (!$request->has('content')) {
            return response()->json([
                'field' => 'content',
                'message' => 'Поле обязательно к заполнению'
            ], 422);
        }

        $post = $this->postRepository->create(
            $request->get('title'),
            $request->get('content'),
            $request->User(),
            PostCategory::where('name', $request->get('category'))->first(),
        );
        $file = $request->file('file');
        if ($file) {
            $this->postRepository->UploadImage($post, $file);
        }

        return response()->json([
            'data' => $post,
        ]);
    }

    public function update(Request $request)
    {
        if (!$request->has('id')) {
            return response()->json([
                'field' => 'id',
                'message' => 'Поле обязательно к заполнению'
            ], 422);
        }

        $post = Post::find($request->get('id'));

        if (!$post || $post->user_id != $request->user()->id) {
            return response()->json([
                'message' => 'Пост не найден'
            ], 404);
        }

        if ($request->has('title')) {
            $post->title = $request->get('title');
        }
        if ($request->has('content')) {
            $post->content = $request->get('content');
        }
        if ($request->has('visible')) {
            $post->visible = $request->get('visible');
        }
        if ($request->hasFile('file')) {
            $this->postRepository->UpdateImage($post, $request->get('file'));
        }
        if ($request->has('category')) {
            $post->category()->associate(PostCategory::where('name', $request->get('category'))->first());
        }
        $post->save();

        return response()->json([
            'data' => $post,
        ]);
    }

    public function delete(Request $request) {
        $post = Post::find($request->get('id'));
        if (!$post || $post->user_id != $request->user()->id) {
            return response()->json([
               'data' => 'Пост не найден'
            ]);
        }

        $post->delete();
        return response()->json([
            'data' => 'success'
        ]);
    }
}
