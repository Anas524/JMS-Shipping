<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResourcePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ResourcePostAdminController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->get('search'));

        $posts = ResourcePost::query()
            ->when($search !== '', function ($q) use ($search) {
                $q->where(function ($qq) use ($search) {
                    $qq->where('title', 'like', "%{$search}%")
                        ->orWhere('category', 'like', "%{$search}%")
                        ->orWhere('author_name', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.resources.index', compact('posts', 'search'));
    }

    public function create()
    {
        return view('admin.resources.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'author_name' => ['nullable', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'read_time' => ['nullable', 'integer', 'min:1'],
            'is_featured' => ['nullable', 'boolean'],
            'is_published' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
            'featured_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
        ]);

        $data['slug'] = Str::slug($request->title);
        $data['slug'] = $this->uniqueSlug($data['slug']);
        $data['author_name'] = $data['author_name'] ?? 'JMS Shipping Team';
        $data['read_time'] = $data['read_time'] ?? 5;
        $data['published_at'] = $data['published_at'] ?? now();
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('resources', 'public');
        }

        ResourcePost::create($data);

        return redirect()
            ->route('admin.resources.index')
            ->with('success', 'Resource post created successfully.');
    }

    public function edit(ResourcePost $resource)
    {
        return view('admin.resources.edit', ['post' => $resource]);
    }

    public function update(Request $request, ResourcePost $resource)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'author_name' => ['nullable', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'read_time' => ['nullable', 'integer', 'min:1'],
            'is_featured' => ['nullable', 'boolean'],
            'is_published' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
            'featured_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
        ]);

        $newSlug = Str::slug($request->title);
        if ($newSlug !== $resource->slug) {
            $data['slug'] = $this->uniqueSlug($newSlug, $resource->id);
        }

        $data['author_name'] = $data['author_name'] ?? 'JMS Shipping Team';
        $data['read_time'] = $data['read_time'] ?? 5;
        $data['published_at'] = $data['published_at'] ?? now();
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('featured_image')) {
            if ($resource->featured_image && Storage::disk('public')->exists($resource->featured_image)) {
                Storage::disk('public')->delete($resource->featured_image);
            }

            $data['featured_image'] = $request->file('featured_image')->store('resources', 'public');
        }

        $resource->update($data);

        return redirect()
            ->route('admin.resources.index')
            ->with('success', 'Resource post updated successfully.');
    }

    public function destroy(ResourcePost $resource)
    {
        if ($resource->featured_image && Storage::disk('public')->exists($resource->featured_image)) {
            Storage::disk('public')->delete($resource->featured_image);
        }

        $resource->delete();

        return redirect()
            ->route('admin.resources.index')
            ->with('success', 'Resource post deleted successfully.');
    }

    private function uniqueSlug(string $slug, ?int $ignoreId = null): string
    {
        $original = $slug;
        $count = 1;

        while (
            ResourcePost::where('slug', $slug)
                ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $original . '-' . $count++;
        }

        return $slug;
    }
}