<?php

namespace App\Http\Controllers;

use App\Contracts\PostRepositoryInterface;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DashboardPostController extends Controller
{
    private PostRepositoryInterface $postRepository;

    public function __construct(
        PostRepositoryInterface $postRepository
    )
    {
        $this->postRepository = $postRepository;
    }

    public function GetPostsView(Request $request)
    {
        $posts = Post::paginate(15);

        return view('dashboard.body.posts.postList', [
            'posts' => $posts,
        ]);
    }

    public function GetCreatePostView(Request $request)
    {
        return view('dashboard.body.posts.postCreate');
    }

    public function CreatePost(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'file' => 'required|file|mimes:jpeg,jpg,png,gif',
        ]);

        $post = new Post();
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->user_id = auth()->id();
        $post->save();
        $file = $request->file('file');
        if ($file) {
            $this->postRepository->UploadImage($post, $file);
        }

        return redirect(route('dashboard.posts.show'));
    }

    public function GetEditPostView(Request $request, $id)
    {
        $post = Post::find($id);
        $postImage = PostImage::where('post_id', $id)->first();

        return view('dashboard.body.posts.postEdit', [
            'post' => $post,
            'postImage' => $postImage ?? null,
        ]);
    }

    public function UpdatePost(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'visible' => '',
        ]);

        $this->postRepository->Update($id, $validated);
        return redirect(route('dashboard.posts.show'));
    }

    public function DeletePost(Request $request, $id)
    {
        PostImage::where('post_id', $id)->delete();
        Post::destroy($id);
        return redirect(route('dashboard.posts.show'));
    }

    /**
     * Ajax request
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function UpdateThumbnail(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required|file|mimes:jpeg,jpg,png,gif',
            'post_id' => 'required|integer',
        ]);
        $post = Post::find($request->post_id);
        $image = $this->postRepository->UpdateImage($post, $request->file('file'));

        return response()->json([
            'url' => $image->url,
            'title' => $image->title,
        ]);
    }

    public function DeleteThumbnail(Request $request) {
        $validated = $request->validate([
            'post_id' => 'required|integer',
        ]);
        $post = Post::find($request->post_id);
        $image = $this->postRepository->DeleteImage($post, "");

        return response()->json([
            'message' => 'success',
        ]);
    }
}
