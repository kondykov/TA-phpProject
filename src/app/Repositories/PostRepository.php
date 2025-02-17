<?php

namespace App\Repositories;

use App\Contracts\PostRepositoryInterface;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostImage;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PostRepository implements PostRepositoryInterface
{

    public function Create(string $title, string $content, User $user, ?PostCategory $category): Post
    {
        $post = new Post();
        $post->title = $title;
        $post->content = $content;
        $post->user_id = auth()->id();
        if($category) {
            $post->category()->associate($category);
        }
        $post->save();
        return $post;
    }

    public function FindById(int $id)
    {
        return Post::find($id);
    }

    public function Update(Post $post)
    {
        $title = $validatedFields['title'];
        $content = $validatedFields['content'];

        $post = $this->FindById($id);
        $post->title = $title;
        $post->content = $content;
        $post->visible = (bool)$validatedFields['visible'];
        return $post->save();
    }

    public function Delete(int $id)
    {
        // TODO: Implement Delete() method.
    }

    public function UploadImage(Post $post, UploadedFile $file)
    {
        if (!$post) {
            return false;
        }

        Storage::disk('public')->putFileAs('uploads/' . $post->id . '/', $file, $file->getClientOriginalName());

        $url = Storage::disk('public')->url('uploads/' . $post->id . '/' . $file->getClientOriginalName());

        $img = new PostImage();
        $img->url = $url;
        $img->image_title = $file->getClientOriginalName();
        $post->images()->save($img);

        return true;
    }

    public function DeleteImage(Post $post, string $imageUrl)
    {
        $img = $post->images()->first();

        if ($img) {
            $fileName = $post->images()->first()->image_title;
            $post->images()->first()->delete();
            Storage::disk('public')->delete('uploads/' . $post->id . '/' . $fileName);
        }

        return true;
    }

    public function UpdateImage(Post $post, UploadedFile $image)
    {
        if ($post->images()->first()) {
            $fileName = $post->images()->first()->image_title;
            $post->images()->first()->delete();
            Storage::disk('public')->delete('uploads/' . $post->id . '/' . $fileName);
        }

        Storage::disk('public')->putFileAs('uploads/' . $post->id . '/', $image, $image->getClientOriginalName());
        $url = Storage::disk('public')->url('uploads/' . $post->id . '/' . $image->getClientOriginalName());

        $img = new PostImage();
        $img->image_title = $image->getClientOriginalName();
        $img->url = $url;
        $post->images()->save($img);

        return $img;
    }
}
