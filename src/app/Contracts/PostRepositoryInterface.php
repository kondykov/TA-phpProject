<?php

namespace App\Contracts;

use App\Models\Post;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

interface PostRepositoryInterface
{
    public function Create(string $title, ?string $content = null);
    public function FindById(int $id);
    public function Update(int $id, array $validatedFields);
    public function Delete(int $id);
    public function UploadImage(Post $post, UploadedFile $file);
    public function UpdateImage(Post $post, UploadedFile $image);
    public function DeleteImage(Post $post, string $imageUrl);
}
