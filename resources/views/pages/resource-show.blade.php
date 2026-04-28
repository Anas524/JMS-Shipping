@extends('layouts.app')

@section('title', ($post->meta_title ?: $post->title) . ' | JMS Resources')

@section('hideHeaderSpacer', '1')

@section('content')
<section class="bg-slate-950 pt-36 pb-20">
    <div class="max-w-4xl mx-auto px-4">
        <a href="{{ route('resources') }}" class="inline-flex items-center gap-2 text-cyan-400 hover:text-cyan-300 mb-8">
            <span>←</span>
            <span>Back to Resources</span>
        </a>

        <div class="flex flex-wrap items-center gap-3 mb-5">
            @if($post->category)
                <span class="px-3 py-1 bg-cyan-500/10 border border-cyan-500/20 text-cyan-300 text-xs font-bold uppercase tracking-wider rounded-full">
                    {{ $post->category }}
                </span>
            @endif

            <span class="text-slate-300 text-sm">{{ optional($post->published_at)->format('M d, Y') }}</span>
            <span class="text-slate-300 text-sm">{{ $post->read_time ?? 5 }} min read</span>
        </div>

        <h1 class="text-4xl md:text-6xl font-bold text-white leading-tight mb-6">
            {{ $post->title }}
        </h1>

        @if($post->excerpt)
            <p class="text-xl text-slate-200 leading-relaxed mb-8">
                {{ $post->excerpt }}
            </p>
        @endif

        <div class="text-slate-300 mb-10">
            By <span class="text-white font-semibold">{{ $post->author_name ?: 'JMS Shipping Team' }}</span>
        </div>

        <div class="rounded-3xl overflow-hidden mb-12 shadow-2xl">
            <img
                src="{{ $post->featured_image ? asset('storage/' . $post->featured_image) : 'https://images.unsplash.com/photo-1494412574643-ff11b0a5c1c3?w=1600&q=80' }}"
                alt="{{ $post->title }}"
                class="w-full h-[260px] md:h-[460px] object-cover"
                onerror="this.src='https://images.unsplash.com/photo-1494412574643-ff11b0a5c1c3?w=1600&q=80';">
        </div>

        <article class="text-slate-200 text-lg leading-8 space-y-6">
            @foreach(preg_split("/\\r\\n|\\r|\\n\\n+/", trim($post->content)) as $paragraph)
                @if(trim($paragraph) !== '')
                    <p class="text-slate-200">
                        {{ $paragraph }}
                    </p>
                @endif
            @endforeach
        </article>
    </div>
</section>

@if($relatedPosts->count())
<section class="py-20 bg-slate-900">
    <div class="max-w-7xl mx-auto px-4">
        <div class="mb-12">
            <span class="text-cyan-400 font-semibold tracking-wider uppercase text-sm">Continue Reading</span>
            <h2 class="text-3xl md:text-4xl font-bold text-white mt-3">Related Articles</h2>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($relatedPosts as $related)
                <article class="group bg-white/5 rounded-2xl overflow-hidden border border-white/10 hover:border-cyan-500/30 transition-all duration-300">
                    <div class="h-56 overflow-hidden">
                        <img
                            src="{{ $related->featured_image ? asset('storage/' . $related->featured_image) : 'https://images.unsplash.com/photo-1494412574643-ff11b0a5c1c3?w=800&q=80' }}"
                            alt="{{ $related->title }}"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                            onerror="this.src='https://images.unsplash.com/photo-1494412574643-ff11b0a5c1c3?w=800&q=80';">
                    </div>

                    <div class="p-6">
                        <div class="flex items-center gap-3 text-sm text-slate-300 mb-3">
                            <span>{{ optional($related->published_at)->format('M d, Y') }}</span>
                            <span class="w-1 h-1 bg-slate-500 rounded-full"></span>
                            <span>{{ $related->read_time ?? 5 }} min read</span>
                        </div>

                        <h3 class="text-xl font-bold text-white mb-3 line-clamp-2">
                            <a href="{{ route('resources.show', $related->slug) }}" class="hover:text-cyan-400 transition-colors">
                                {{ $related->title }}
                            </a>
                        </h3>

                        <p class="text-slate-300 text-sm line-clamp-3 mb-4">
                            {{ $related->excerpt }}
                        </p>

                        <a href="{{ route('resources.show', $related->slug) }}" class="inline-flex items-center gap-2 text-cyan-400 font-semibold text-sm">
                            Read More
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection