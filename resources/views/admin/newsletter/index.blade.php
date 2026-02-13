@extends('layouts.app')

@section('title', 'Admin | Newsletter')
@section('hideHeaderSpacer', '1')

@section('content')
<div class="bg-slate-950 min-h-screen">

  {{-- Header / Hero --}}
  <div class="relative pt-28 md:pt-32 pb-8">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-purple-900/30 via-slate-950 to-slate-950"></div>
    <div class="absolute inset-0 bg-[linear-gradient(rgba(168,85,247,0.04)_1px,transparent_1px),linear-gradient(90deg,rgba(168,85,247,0.04)_1px,transparent_1px)] bg-[size:48px_48px] [mask-image:radial-gradient(ellipse_at_center,black,transparent_70%)]"></div>

    <div class="relative max-w-7xl mx-auto px-4 py-8">
      <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-6">

        <div class="flex items-start gap-4">
          <a href="{{ route('admin.dashboard') }}"
             class="w-11 h-11 rounded-2xl bg-slate-800/60 border border-slate-700/60 flex items-center justify-center text-slate-300 hover:text-white hover:border-purple-500/40 hover:bg-slate-800 transition">
            <i class="bi bi-arrow-left text-lg"></i>
          </a>

          <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-purple-500/10 border border-purple-500/20 mb-3">
              <i class="bi bi-envelope-paper text-purple-300 text-sm"></i>
              <span class="text-purple-200 text-xs font-semibold uppercase tracking-wider">Marketing</span>
            </div>
            <h1 class="text-4xl font-extrabold text-white">Newsletter Hub</h1>
            <p class="text-slate-300/80 mt-2">Manage subscriber list and export data for campaigns.</p>
          </div>
        </div>

        {{-- Total Card --}}
        <div class="px-6 py-4 rounded-2xl bg-slate-900/40 border border-slate-700/60 backdrop-blur-sm">
          <div class="text-3xl font-extrabold text-purple-300">{{ $subs->total() }}</div>
          <div class="text-sm text-slate-300/70">Total Subscribers</div>
        </div>

      </div>

      {{-- Search + Export --}}
      <div class="mt-6 flex flex-col lg:flex-row gap-4">
        <form class="w-full lg:flex-1 flex flex-col sm:flex-row gap-3" method="GET">
          <div class="relative flex-1">
            <i class="bi bi-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-500"></i>
            <input name="q" value="{{ $q }}" placeholder="Search by email address..."
                   class="w-full pl-12 pr-4 py-3 rounded-xl bg-slate-950/40 border border-slate-700/60 text-white placeholder-slate-500 focus:border-purple-500/50 focus:outline-none transition-colors">
          </div>

          <button type="submit"
                  class="px-6 py-3 rounded-xl bg-purple-500 text-white font-semibold hover:bg-purple-400 transition-colors">
            Search
          </button>

          @if($q)
            <a href="{{ route('admin.newsletter.index') }}"
               class="px-5 py-3 rounded-xl border border-slate-700 text-slate-300 hover:text-white hover:border-slate-500 transition">
              Clear
            </a>
          @endif
        </form>

        {{-- Export --}}
        <a href="{{ route('admin.newsletter.export') }}"
           class="px-6 py-3 rounded-xl bg-slate-900/40 border border-slate-700/60 text-white font-semibold hover:border-purple-500/40 hover:bg-slate-800/60 transition-all flex items-center justify-center gap-2">
          <i class="bi bi-download"></i>
          Export CSV
        </a>
      </div>

    </div>
  </div>

  {{-- Status Message --}}
  @if(session('status'))
    <div class="max-w-7xl mx-auto px-4 mb-6">
      <div class="p-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex items-center gap-3">
        <i class="bi bi-check-circle-fill"></i>
        <span>{{ session('status') }}</span>
      </div>
    </div>
  @endif

  {{-- Table --}}
  <div class="max-w-7xl mx-auto px-4 pb-12">
    <div class="bg-slate-900/40 border border-slate-700/50 rounded-3xl overflow-hidden backdrop-blur-sm">
      <div class="overflow-x-auto">
        <div class="min-w-[900px]">

          {{-- Header --}}
          <div class="grid grid-cols-12 gap-4 p-4 bg-slate-900/50 border-b border-slate-700/50 text-xs font-semibold text-slate-400 uppercase tracking-wider">
            <div class="col-span-5">Email Address</div>
            <div class="col-span-3">Source</div>
            <div class="col-span-3">Subscribed</div>
            <div class="col-span-1 text-right">Action</div>
          </div>

          <div class="divide-y divide-slate-700/30">
            @forelse($subs as $s)
              <div class="grid grid-cols-12 gap-4 p-4 items-center hover:bg-slate-700/20 transition-colors">

                <div class="col-span-5">
                  <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-purple-500/10 flex items-center justify-center">
                      <i class="bi bi-envelope text-purple-400"></i>
                    </div>
                    <span class="text-white font-medium truncate">{{ $s->email }}</span>
                  </div>
                </div>

                <div class="col-span-3">
                  <span class="inline-flex px-2.5 py-1 rounded-lg bg-slate-800/60 border border-slate-700/50 text-slate-300 text-sm">
                    {{ $s->source ?? 'Website' }}
                  </span>
                </div>

                <div class="col-span-3 text-slate-400 text-sm">
                  {{ $s->created_at?->format('M d, Y') }}
                </div>

                <div class="col-span-1 flex justify-end">
                  <form method="POST" action="{{ route('admin.newsletter.destroy', $s) }}" onsubmit="return confirm('Remove this subscriber?')">
                    @csrf @method('DELETE')
                    <button type="submit"
                            class="w-9 h-9 rounded-lg bg-slate-800/70 border border-slate-700/60 flex items-center justify-center text-slate-300 hover:bg-red-500 hover:border-red-500 hover:text-white transition-all">
                      <i class="bi bi-trash text-sm"></i>
                    </button>
                  </form>
                </div>

              </div>
            @empty
              <div class="p-12 text-center">
                <div class="w-20 h-20 rounded-2xl bg-slate-800 flex items-center justify-center mx-auto mb-4">
                  <i class="bi bi-envelope-open text-4xl text-slate-600"></i>
                </div>
                <p class="text-slate-400 text-lg">No subscribers found</p>
                <p class="text-slate-500 text-sm mt-1">Start building your list!</p>
              </div>
            @endforelse
          </div>

          @if($subs->hasPages())
            <div class="p-4 border-t border-slate-700/50">
              {{ $subs->links() }}
            </div>
          @endif

        </div>
      </div>
    </div>
  </div>

</div>
@endsection
