<?php

namespace App\Http\Controllers;

use App\Models\ResourcePost;

class HomeController extends Controller
{
    public function index()
    {
        $homeFeaturedPost = ResourcePost::query()
            ->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('is_featured', true)
            ->latest('published_at')
            ->first();

        $homeSidePosts = ResourcePost::query()
            ->where('is_published', true)
            ->whereNotNull('published_at')
            ->when($homeFeaturedPost, function ($q) use ($homeFeaturedPost) {
                $q->where('id', '!=', $homeFeaturedPost->id);
            })
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('pages.home', compact('homeFeaturedPost', 'homeSidePosts'));
    }
}