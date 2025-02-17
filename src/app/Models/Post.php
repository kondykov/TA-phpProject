<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'category_id',
        'visible'
    ];

    public function images(): HasMany
    {
        return $this->hasMany(PostImage::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class);
    }

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
