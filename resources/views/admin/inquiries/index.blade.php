@extends('layouts.app')

@section('title', 'Admin | Inquiries')

@section('hideHeaderSpacer', '1')

@section('content')
{{-- Header Section --}}
<div class="bg-slate-950 min-h-screen">
    <div class="relative pt-28 md:pt-32 pb-8 overflow-hidden rounded-b-3xl">
        <div class="absolute inset-0 pointer-events-none bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-cyan-900/35 via-slate-950 to-slate-950"></div>
        <div class="absolute inset-0 pointer-events-none bg-[linear-gradient(rgba(6,182,212,0.04)_1px,transparent_1px),linear-gradient(90deg,rgba(6,182,212,0.04)_1px,transparent_1px)] bg-[size:48px_48px] [mask-image:radial-gradient(ellipse_at_center,black,transparent_70%)]"></div>

        <div class="relative max-w-7xl mx-auto px-4 py-8">
            <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-6">

                <div class="flex items-start gap-4">
                    <a href="{{ route('admin.dashboard') }}"
                        class="w-11 h-11 rounded-2xl bg-slate-800/60 border border-slate-700/60 flex items-center justify-center text-slate-300 hover:text-white hover:border-cyan-500/40 hover:bg-slate-800 transition">
                        <i class="bi bi-arrow-left text-lg"></i>
                    </a>

                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-500/10 border border-cyan-500/20 mb-3">
                            <i class="bi bi-inbox text-cyan-300 text-sm"></i>
                            <span class="text-cyan-200 text-xs font-semibold uppercase tracking-wider">Communications</span>
                        </div>
                        <h1 class="text-4xl font-extrabold text-white">Inquiries Hub</h1>
                        <p class="text-slate-300/80 mt-2">Manage and respond to customer inquiries and quote requests.</p>
                    </div>
                </div>

                {{-- Filter Form (modern) --}}
                <form class="w-full xl:w-auto flex flex-col sm:flex-row flex-wrap items-stretch sm:items-center gap-3 bg-slate-900/40 p-4 rounded-2xl border border-slate-700/50 backdrop-blur-sm"
                    method="GET">

                    <div class="relative">
                        <select name="type"
                            class="appearance-none pl-4 pr-10 py-2.5 rounded-xl bg-slate-950/40 border border-slate-700/60 text-slate-100 text-sm focus:border-cyan-500/50 focus:outline-none transition">
                            <option value="">All Types</option>
                            <option value="contact" @selected($type==='contact' )>Contact</option>
                            <option value="quote" @selected($type==='quote' )>Quote</option>
                        </select>
                        <!-- <i class="bi bi-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i> -->
                    </div>

                    <div class="relative">
                        <select name="read"
                            class="appearance-none pl-4 pr-10 py-2.5 rounded-xl bg-slate-950/40 border border-slate-700/60 text-slate-100 text-sm focus:border-cyan-500/50 focus:outline-none transition">
                            <option value="">All Status</option>
                            <option value="0" @selected($read==='0' )>Unread</option>
                            <option value="1" @selected($read==='1' )>Read</option>
                        </select>
                        <!-- <i class="bi bi-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i> -->
                    </div>

                    <div class="relative">
                        <i class="bi bi-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-500"></i>
                        <input name="q" value="{{ $q }}" placeholder="Search name / email..."
                            class="pl-10 pr-4 py-2.5 rounded-xl bg-slate-950/40 border border-slate-700/60 text-slate-100 text-sm w-full sm:w-64 focus:border-cyan-500/50 focus:outline-none transition">
                    </div>

                    <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-cyan-500 text-white font-semibold hover:bg-cyan-400 transition">
                        Filter
                    </button>

                    @if(request()->hasAny(['type', 'read', 'q']))
                    <a href="{{ route('admin.inquiries.index') }}"
                        class="px-4 py-2.5 rounded-xl border border-slate-700/70 text-slate-300 hover:text-white hover:border-slate-500 transition">
                        Clear
                    </a>
                    @endif
                </form>

            </div>
        </div>
    </div>

    {{-- Status Messages --}}
    @if(session('status'))
    <div class="max-w-7xl mx-auto px-4 mb-6">
        <div class="p-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex items-center gap-3" data-aos="fade-down">
            <i class="bi bi-check-circle-fill text-xl"></i>
            <span>{{ session('status') }}</span>
        </div>
    </div>
    @endif

    {{-- Table Section --}}
    <div class="max-w-7xl mx-auto px-4 pb-12">
        <div class="bg-slate-900/40 border border-slate-700/50 rounded-3xl overflow-hidden backdrop-blur-sm">
            <div class="overflow-x-auto">
                <div class="min-w-[900px]">

                    {{-- Table Header --}}
                    <div class="grid grid-cols-12 gap-4 p-4 bg-slate-900/50 border-b border-slate-700/50 text-xs font-semibold text-slate-400 uppercase tracking-wider">
                        <div class="col-span-1">Status</div>
                        <div class="col-span-1">Type</div>
                        <div class="col-span-2">Name</div>
                        <div class="col-span-2">Email</div>
                        <div class="col-span-2">Phone</div>
                        <div class="col-span-2">Date</div>
                        <div class="col-span-2 text-right">Actions</div>
                    </div>

                    {{-- Table Body --}}
                    <div class="divide-y divide-slate-700/30">
                        @forelse($items as $i)
                        <div class="grid grid-cols-12 gap-4 p-4 items-center hover:bg-slate-700/20 transition-colors group {{ !$i->is_read ? 'bg-cyan-500/5' : '' }}">

                            {{-- Status --}}
                            <div class="col-span-1">
                                @if(!$i->is_read)
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-amber-500/10 border border-amber-500/20 text-amber-400 text-xs font-medium">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                                    New
                                </span>
                                @else
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs">
                                    <i class="bi bi-check2"></i>
                                    Read
                                </span>
                                @endif
                            </div>

                            {{-- Type --}}
                            <div class="col-span-1">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg {{ $i->type === 'quote' ? 'bg-purple-500/10 text-purple-400' : 'bg-cyan-500/10 text-cyan-400' }}">
                                    <i class="bi {{ $i->type === 'quote' ? 'bi-calculator' : 'bi-envelope' }}"></i>
                                </span>
                            </div>

                            {{-- Name --}}
                            <div class="col-span-2">
                                <p class="text-white font-medium truncate">{{ $i->name ?? 'N/A' }}</p>
                            </div>

                            {{-- Email --}}
                            <div class="col-span-2">
                                <p class="text-slate-400 text-sm truncate">{{ $i->email ?? 'N/A' }}</p>
                            </div>

                            {{-- Phone --}}
                            <div class="col-span-2">
                                <p class="text-slate-400 text-sm">{{ $i->phone ?? '-' }}</p>
                            </div>

                            {{-- Date --}}
                            <div class="col-span-2">
                                <p class="text-slate-400 text-sm">{{ $i->created_at?->format('M d, Y') }}</p>
                                <p class="text-slate-500 text-xs">{{ $i->created_at?->format('h:i A') }}</p>
                            </div>

                            {{-- Actions --}}
                            <div class="col-span-2 flex items-center justify-end gap-2">
                                <a href="{{ route('admin.inquiries.show', $i) }}"
                                    class="w-9 h-9 rounded-lg bg-slate-700 flex items-center justify-center text-slate-300 hover:bg-cyan-500 hover:text-white transition-all"
                                    title="View Details">
                                    <i class="bi bi-eye"></i>
                                </a>

                                @if(!$i->is_read)
                                <form method="POST" action="{{ route('admin.inquiries.read', $i) }}" class="inline">
                                    @csrf @method('PATCH')
                                    <button type="submit"
                                        class="w-9 h-9 rounded-lg bg-slate-700 flex items-center justify-center text-slate-300 hover:bg-emerald-500 hover:text-white transition-all"
                                        title="Mark as Read">
                                        <i class="bi bi-check2-all"></i>
                                    </button>
                                </form>
                                @endif

                                <form method="POST" action="{{ route('admin.inquiries.destroy', $i) }}" class="inline" onsubmit="return confirm('Delete this inquiry permanently?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        class="w-9 h-9 rounded-lg bg-slate-700 flex items-center justify-center text-slate-300 hover:bg-red-500 hover:text-white transition-all"
                                        title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @empty
                        <div class="p-12 text-center">
                            <div class="w-20 h-20 rounded-2xl bg-slate-800 flex items-center justify-center mx-auto mb-4">
                                <i class="bi bi-inbox text-4xl text-slate-600"></i>
                            </div>
                            <p class="text-slate-400 text-lg">No inquiries found</p>
                            <p class="text-slate-500 text-sm mt-1">Try adjusting your filters</p>
                        </div>
                        @endforelse
                    </div>

                    {{-- Pagination --}}
                    @if($items->hasPages())
                    <div class="p-4 border-t border-slate-700/50">
                        {{ $items->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection