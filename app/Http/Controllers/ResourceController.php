<?php

namespace App\Http\Controllers;

use App\Models\ResourcePost;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->get('search'));
        $category = trim((string) $request->get('category'));

        $query = ResourcePost::query()
            ->where('is_published', true)
            ->whereNotNull('published_at');

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        if ($category !== '' && strtolower($category) !== 'all') {
            $query->where('category', $category);
        }

        $featuredPost = (clone $query)
            ->where('is_featured', true)
            ->latest('published_at')
            ->first();

        $latestPosts = (clone $query)
            ->when($featuredPost, function ($q) use ($featuredPost) {
                $q->where('id', '!=', $featuredPost->id);
            })
            ->latest('published_at')
            ->paginate(6)
            ->withQueryString();

        $categories = ResourcePost::query()
            ->where('is_published', true)
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('pages.resources', compact(
            'featuredPost',
            'latestPosts',
            'categories',
            'search',
            'category'
        ));
    }

    public function show(string $slug)
    {
        $post = ResourcePost::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $relatedPosts = ResourcePost::where('is_published', true)
            ->where('id', '!=', $post->id)
            ->when($post->category, function ($q) use ($post) {
                $q->where('category', $post->category);
            })
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('pages.resource-show', compact('post', 'relatedPosts'));
    }
}
