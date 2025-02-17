<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];
    public function posts(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'category_id', 'id');
    }
}
