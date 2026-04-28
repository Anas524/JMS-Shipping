@extends('layouts.app')

@section('title', 'JMS | Resources & Insights')

@section('hideHeaderSpacer', '1')

@section('content')

<!-- Hero Section with Dynamic Particles -->
<section id="resourcesHero" class="relative min-h-[80vh] flex items-center justify-center overflow-hidden bg-slate-900">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1494412574643-ff11b0a5c1c3?w=1920&q=80')] bg-cover bg-center opacity-20"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900 via-slate-900/90 to-slate-900"></div>
        <div id="particles" class="absolute inset-0 opacity-30"></div>
    </div>

    <div class="relative z-10 text-center px-4 max-w-5xl mx-auto pt-36 md:pt-44 pb-20">
        <div class="inline-flex items-center gap-2 px-4 py-2 bg-cyan-500/10 backdrop-blur-md rounded-full text-cyan-400 text-sm font-semibold mb-6 border border-cyan-500/20 animate-pulse-slow" data-aos="fade-down">
            <span class="w-2 h-2 bg-cyan-400 rounded-full animate-ping"></span>
            Industry Insights
        </div>

        <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold text-white mb-6 leading-tight" data-aos="fade-up" data-aos-delay="100">
            Resources & <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-blue-500 to-cyan-400 animate-gradient">Insights</span>
        </h1>

        <p class="text-xl md:text-2xl text-slate-300 max-w-3xl mx-auto font-light leading-relaxed mb-10" data-aos="fade-up" data-aos-delay="200">
            Stay ahead in global logistics with expert analysis, industry trends, and shipping best practices.
        </p>

        <!-- Search Bar -->
        <div class="max-w-2xl mx-auto relative" data-aos="fade-up" data-aos-delay="300">
            <form method="GET" action="{{ route('resources') }}">
                <div class="relative group">
                    <input
                        type="text"
                        name="search"
                        value="{{ $search ?? '' }}"
                        placeholder="Search articles, guides, and insights..."
                        class="w-full px-6 py-5 pl-14 bg-white/10 backdrop-blur-xl border border-white/20 rounded-2xl text-white placeholder-slate-400 focus:outline-none focus:border-cyan-500/50 focus:bg-white/15 transition-all duration-300">
                    <svg class="absolute left-5 top-1/2 -translate-y-1/2 w-6 h-6 text-slate-400 group-focus-within:text-cyan-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </form>
        </div>

        <!-- Category Pills -->
        <div class="flex flex-wrap justify-center gap-3 mt-8 pb-10" data-aos="fade-up" data-aos-delay="400">
            <a href="{{ route('resources', array_filter(['search' => $search ?? null])) }}"
                class="cat-pill px-5 py-2.5 rounded-full font-medium transition-all duration-300 hover:scale-105 {{ empty($category) || strtolower($category) === 'all' ? 'bg-cyan-500 text-white hover:bg-cyan-400' : 'bg-white/10 text-slate-300 border border-white/20 hover:bg-white/20 hover:text-white' }}">
                All
            </a>

            @foreach($categories as $cat)
                <a href="{{ route('resources', array_filter(['category' => $cat, 'search' => $search ?? null])) }}"
                    class="cat-pill px-5 py-2.5 rounded-full font-medium transition-all duration-300 hover:scale-105 {{ ($category ?? '') === $cat ? 'bg-cyan-500 text-white hover:bg-cyan-400' : 'bg-white/10 text-slate-300 border border-white/20 hover:bg-white/20 hover:text-white' }}">
                    {{ $cat }}
                </a>
            @endforeach
        </div>
    </div>

    <div class="absolute bottom-3 left-1/2 -translate-x-1/2 z-10 animate-bounce-slow hidden lg:block">
        <div class="w-8 h-12 border-2 border-white/30 rounded-full flex justify-center pt-2">
            <div class="w-1 h-3 bg-cyan-400 rounded-full animate-scroll-down"></div>
        </div>
    </div>
</section>

<!-- Featured Article -->
@if($featuredPost)
<section class="relative py-24 overflow-hidden bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="relative group" data-aos="fade-right">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                    <div class="aspect-[4/3] overflow-hidden">
                        <img
                            src="{{ $featuredPost->featured_image ? asset('storage/' . $featuredPost->featured_image) : 'https://images.unsplash.com/photo-1578575437130-527eed3abbec?w=1200&q=80' }}"
                            alt="{{ $featuredPost->title }}"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 parallax-img"
                            data-speed="0.5">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    <div class="absolute top-6 left-6 px-4 py-2 bg-cyan-500 text-white text-sm font-bold rounded-full shadow-lg animate-float">
                        Featured
                    </div>
                </div>

                <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-cyan-100 rounded-full blur-3xl opacity-60"></div>
                <div class="absolute -top-6 -left-6 w-24 h-24 bg-blue-100 rounded-full blur-2xl opacity-60"></div>
            </div>

            <div class="lg:pl-8" data-aos="fade-left">
                <div class="flex flex-wrap items-center gap-3 mb-4">
                    @if($featuredPost->category)
                        <span class="px-3 py-1 bg-cyan-100 text-cyan-700 text-xs font-bold uppercase tracking-wider rounded-full">
                            {{ $featuredPost->category }}
                        </span>
                    @endif

                    <span class="text-slate-400 text-sm">
                        {{ optional($featuredPost->published_at)->format('M d, Y') }}
                    </span>

                    <span class="text-slate-400 text-sm">
                        {{ $featuredPost->read_time ?? 5 }} min read
                    </span>
                </div>

                <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mb-6 leading-tight hover:text-cyan-600 transition-colors">
                    <a href="{{ route('resources.show', $featuredPost->slug) }}">
                        {{ $featuredPost->title }}
                    </a>
                </h2>

                <p class="text-lg text-slate-600 mb-8 leading-relaxed">
                    {{ $featuredPost->excerpt }}
                </p>

                <div class="flex items-center gap-4 mb-8">
                    <div>
                        <div class="font-semibold text-slate-900">{{ $featuredPost->author_name ?: 'JMS Shipping Team' }}</div>
                        <div class="text-sm text-slate-500">Logistics Experts</div>
                    </div>
                </div>

                <a href="{{ route('resources.show', $featuredPost->slug) }}" class="inline-flex items-center gap-2 px-8 py-4 bg-slate-900 text-white rounded-full font-semibold hover:bg-cyan-600 transition-all duration-300 hover:shadow-xl hover:shadow-cyan-500/30 group">
                    Read Full Article
                    <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Latest Articles Grid -->
<section class="py-24 bg-slate-50 relative overflow-hidden">
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, #0f172a 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
            <div>
                <span class="text-cyan-600 font-semibold tracking-wider uppercase text-sm">Latest Updates</span>
                <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mt-3">Recent Articles</h2>
            </div>

            @if(($search ?? '') || ($category ?? ''))
                <a href="{{ route('resources') }}" class="inline-flex items-center gap-2 text-cyan-600 font-semibold hover:text-cyan-700 transition-colors group">
                    Clear Filters
                    <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </a>
            @endif
        </div>

        @if($latestPosts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($latestPosts as $index => $post)
                    <article class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="relative h-56 overflow-hidden">
                            <img
                                src="{{ $post->featured_image ? asset('storage/' . $post->featured_image) : 'https://images.unsplash.com/photo-1494412574643-ff11b0a5c1c3?w=800&q=80' }}"
                                alt="{{ $post->title }}"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                            @if($post->category)
                                <div class="absolute top-4 left-4 px-3 py-1 bg-white/90 backdrop-blur text-slate-900 text-xs font-bold rounded-full">
                                    {{ $post->category }}
                                </div>
                            @endif
                        </div>

                        <div class="p-6">
                            <div class="flex items-center gap-3 text-sm text-slate-500 mb-3">
                                <span>{{ optional($post->published_at)->format('M d, Y') }}</span>
                                <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
                                <span>{{ $post->read_time ?? 5 }} min read</span>
                            </div>

                            <h3 class="text-xl font-bold text-slate-900 mb-3 line-clamp-2 group-hover:text-cyan-600 transition-colors">
                                <a href="{{ route('resources.show', $post->slug) }}">
                                    {{ $post->title }}
                                </a>
                            </h3>

                            <p class="text-slate-600 text-sm line-clamp-3 mb-4">
                                {{ $post->excerpt }}
                            </p>

                            <a href="{{ route('resources.show', $post->slug) }}" class="inline-flex items-center gap-2 text-cyan-600 font-semibold text-sm group/link">
                                Read More
                                <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-12">
                {{ $latestPosts->links() }}
            </div>
        @else
            <div class="text-center py-20">
                <div class="text-5xl mb-4">📚</div>
                <h3 class="text-2xl font-bold text-slate-900 mb-3">No articles found</h3>
                <p class="text-slate-600 mb-6">Try a different search or category.</p>
                <a href="{{ route('resources') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-slate-900 text-white rounded-full font-semibold hover:bg-cyan-600 transition-all duration-300">
                    View All Resources
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Newsletter Section -->
<section class="relative py-24 overflow-hidden">
    <div class="absolute inset-0 bg-slate-900">
        <img src="https://images.unsplash.com/photo-1494412574643-ff11b0a5c1c3?w=1920&q=80"
            alt="Background"
            class="w-full h-full object-cover opacity-10">
        <div class="absolute inset-0 bg-gradient-to-r from-cyan-900/90 to-slate-900/90"></div>
    </div>

    <div class="max-w-4xl mx-auto px-4 relative z-10 text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-6" data-aos="fade-up">
            Stay Updated
        </h2>
        <p class="text-xl text-slate-300 mb-10" data-aos="fade-up" data-aos-delay="100">
            Subscribe to our newsletter for the latest industry insights, regulatory updates, and shipping tips delivered to your inbox.
        </p>

        <form id="newsletterFormResources"
            action="{{ route('newsletter.store') }}"
            method="POST"
            class="flex flex-col sm:flex-row gap-4 max-w-2xl mx-auto"
            data-aos="fade-up" data-aos-delay="200">
            @csrf

            <input type="hidden" name="source" value="resources">

            <input type="email" name="email" required
                placeholder="Enter your email address"
                class="flex-1 px-6 py-4 bg-white/10 backdrop-blur border border-white/20 rounded-full text-white placeholder-slate-400 focus:outline-none focus:border-cyan-500/50 focus:bg-white/15 transition-all">

            <button type="submit"
                class="px-8 py-4 bg-cyan-500 text-white rounded-full font-semibold hover:bg-cyan-400 transition-all duration-300 hover:shadow-xl hover:shadow-cyan-500/30 hover:scale-105">
                Subscribe
            </button>
        </form>

        <p id="newsletterMsgResources" class="mt-4 text-sm text-white/80 hidden"></p>

        <p class="text-slate-400 text-sm mt-6">
            Join 10,000+ logistics professionals. No spam, unsubscribe anytime.
        </p>
    </div>
</section>

<!-- Topics Cloud -->
@if($categories->count())
<section class="py-24 bg-white">
    <div class="max-w-5xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-slate-900 mb-12">Popular Topics</h2>
        <div class="flex flex-wrap justify-center gap-4">
            @foreach($categories as $cat)
                <a href="{{ route('resources', ['category' => $cat]) }}"
                    class="px-6 py-3 bg-slate-100 text-slate-700 rounded-full font-medium hover:bg-cyan-100 hover:text-cyan-700 transition-all duration-300 hover:scale-105">
                    {{ $cat }}
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection