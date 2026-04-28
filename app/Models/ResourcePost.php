<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResourcePost extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'author_name',
        'featured_image',
        'excerpt',
        'content',
        'read_time',
        'is_featured',
        'is_published',
        'published_at',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];
}
