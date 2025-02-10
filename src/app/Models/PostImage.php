<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $fillable = [
        'image_title',
        'post_id',
        'url'
    ];

    public function getPost()
    {
        return $this->belongsTo(Post::class);
    }
}
