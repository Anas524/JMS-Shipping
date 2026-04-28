@extends('layouts.app')

@section('title', 'Admin | Resources')

@section('hideHeaderSpacer', '1')

@section('content')
<div class="min-h-screen bg-slate-950 pt-32 pb-16 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-bold text-white">Resources</h1>
                <p class="text-slate-400">Manage blogs, articles, and insights for the frontend resources page.</p>
            </div>

            <a href="{{ route('admin.resources.create') }}"
                class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-cyan-500 text-white font-semibold hover:bg-cyan-400 transition">
                <i class="bi bi-plus-lg"></i>
                Add New Post
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 rounded-2xl border border-emerald-500/20 bg-emerald-500/10 px-4 py-3 text-emerald-300">
                {{ session('success') }}
            </div>
        @endif

        <form method="GET" class="mb-6">
            <div class="flex flex-col md:flex-row gap-4">
                <input type="text" name="search" value="{{ $search }}"
                    placeholder="Search title, category, author..."
                    class="flex-1 rounded-2xl border border-slate-700 bg-slate-900 px-4 py-3 text-white placeholder-slate-400 focus:outline-none focus:border-cyan-500">
                <button type="submit"
                    class="px-5 py-3 rounded-2xl bg-slate-800 text-white border border-slate-700 hover:border-cyan-500 transition">
                    Search
                </button>
            </div>
        </form>

        <div class="overflow-hidden rounded-3xl border border-slate-800 bg-slate-900/60">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[950px]">
                    <thead class="bg-slate-900/80">
                        <tr class="text-left text-sm text-slate-400">
                            <th class="px-6 py-4">Image</th>
                            <th class="px-6 py-4">Title</th>
                            <th class="px-6 py-4">Category</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Featured</th>
                            <th class="px-6 py-4">Published</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $post)
                            <tr class="border-t border-slate-800 text-white">
                                <td class="px-6 py-4">
                                    @if($post->featured_image)
                                        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}"
                                            class="w-16 h-16 rounded-xl object-cover">
                                    @else
                                        <div class="w-16 h-16 rounded-xl bg-slate-800 flex items-center justify-center text-slate-500">
                                            <i class="bi bi-image"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-semibold">{{ $post->title }}</div>
                                    <div class="text-sm text-slate-400 mt-1">{{ $post->author_name ?: 'JMS Shipping Team' }}</div>
                                </td>
                                <td class="px-6 py-4 text-slate-300">{{ $post->category ?: '-' }}</td>
                                <td class="px-6 py-4">
                                    @if($post->is_published)
                                        <span class="px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-300 text-xs font-semibold border border-emerald-500/20">
                                            Published
                                        </span>
                                    @else
                                        <span class="px-3 py-1 rounded-full bg-amber-500/10 text-amber-300 text-xs font-semibold border border-amber-500/20">
                                            Draft
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if($post->is_featured)
                                        <span class="px-3 py-1 rounded-full bg-cyan-500/10 text-cyan-300 text-xs font-semibold border border-cyan-500/20">
                                            Yes
                                        </span>
                                    @else
                                        <span class="text-slate-500">No</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-slate-300">
                                    {{ optional($post->published_at)->format('d M Y') ?: '-' }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-end gap-3">
                                        <a href="{{ route('admin.resources.edit', $post) }}"
                                            class="px-4 py-2 rounded-xl bg-blue-500/10 text-blue-300 border border-blue-500/20 hover:bg-blue-500/20 transition">
                                            Edit
                                        </a>

                                        <form method="POST" action="{{ route('admin.resources.destroy', $post) }}"
                                            onsubmit="return confirm('Delete this post?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-4 py-2 rounded-xl bg-red-500/10 text-red-300 border border-red-500/20 hover:bg-red-500/20 transition">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-10 text-center text-slate-400">
                                    No resource posts found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection