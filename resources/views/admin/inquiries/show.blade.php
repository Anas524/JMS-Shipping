@extends('layouts.app')

@section('title', 'Admin | Inquiry Details')

@section('hideHeaderSpacer', '1')

@section('content')
<div class="bg-slate-950 min-h-[70vh]">
    <div class="max-w-5xl mx-auto px-4 py-8">
        {{-- Navigation --}}
        <div class="flex items-center gap-4 mb-8">
            <a href="{{ route('admin.inquiries.index') }}"
                class="w-10 h-10 rounded-xl bg-slate-800 border border-slate-700 flex items-center justify-center text-slate-400 hover:text-white hover:border-cyan-500/50 transition-all">
                <i class="bi bi-arrow-left"></i>
            </a>
            <div>
                <div class="flex items-center gap-3">
                    <h1 class="text-2xl font-bold text-white">Inquiry Details</h1>
                    @if(!$inquiry->is_read)
                    <span class="px-3 py-1 rounded-full bg-amber-500/10 border border-amber-500/20 text-amber-400 text-sm font-medium animate-pulse">
                        Unread
                    </span>
                    @endif
                </div>
                <p class="text-slate-400 text-sm">Received {{ $inquiry->created_at?->diffForHumans() }}</p>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-6">
            {{-- Main Content --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Customer Info Card --}}
                <div class="bg-slate-800/50 border border-slate-700/50 rounded-3xl p-6 backdrop-blur-sm">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-cyan-500 to-purple-500 flex items-center justify-center text-white text-2xl font-bold">
                            {{ substr($inquiry->name, 0, 1) }}
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-white">{{ $inquiry->name }}</h2>
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full {{ $inquiry->type === 'quote' ? 'bg-purple-500/10 text-purple-400' : 'bg-cyan-500/10 text-cyan-400' }} text-xs font-medium uppercase">
                                {{ $inquiry->type }}
                            </span>
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="p-4 rounded-2xl bg-slate-900/50 border border-slate-700/30">
                            <div class="flex items-center gap-2 text-slate-500 text-xs uppercase tracking-wider mb-1">
                                <i class="bi bi-envelope"></i> Email
                            </div>
                            <a href="mailto:{{ $inquiry->email }}" class="text-white hover:text-cyan-400 transition-colors">
                                {{ $inquiry->email ?? 'N/A' }}
                            </a>
                        </div>

                        <div class="p-4 rounded-2xl bg-slate-900/50 border border-slate-700/30">
                            <div class="flex items-center gap-2 text-slate-500 text-xs uppercase tracking-wider mb-1">
                                <i class="bi bi-telephone"></i> Phone
                            </div>
                            <a href="tel:{{ $inquiry->phone }}" class="text-white hover:text-cyan-400 transition-colors">
                                {{ $inquiry->phone ?? 'N/A' }}
                            </a>
                        </div>

                        @if($inquiry->subject)
                        <div class="sm:col-span-2 p-4 rounded-2xl bg-slate-900/50 border border-slate-700/30">
                            <div class="flex items-center gap-2 text-slate-500 text-xs uppercase tracking-wider mb-1">
                                <i class="bi bi-tag"></i> Subject
                            </div>
                            <p class="text-white">{{ $inquiry->subject }}</p>
                        </div>
                        @endif
                    </div>
                </div>

                {{-- Quote Details (if applicable) --}}
                @if($inquiry->type === 'quote')
                <div class="bg-slate-800/50 border border-slate-700/50 rounded-3xl p-6 backdrop-blur-sm">
                    <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                        <i class="bi bi-calculator text-purple-400"></i>
                        Quote Specifications
                    </h3>

                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="p-4 rounded-2xl bg-slate-900/50 border border-slate-700/30">
                            <span class="text-slate-500 text-xs uppercase tracking-wider">Origin</span>
                            <p class="text-white font-medium mt-1">{{ $inquiry->origin ?? 'Not specified' }}</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-900/50 border border-slate-700/30">
                            <span class="text-slate-500 text-xs uppercase tracking-wider">Destination</span>
                            <p class="text-white font-medium mt-1">{{ $inquiry->destination ?? 'Not specified' }}</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-900/50 border border-slate-700/30">
                            <span class="text-slate-500 text-xs uppercase tracking-wider">Shipment Type</span>
                            <p class="text-white font-medium mt-1">{{ $inquiry->shipment_type ?? 'Not specified' }}</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-900/50 border border-slate-700/30">
                            <span class="text-slate-500 text-xs uppercase tracking-wider">Weight</span>
                            <p class="text-white font-medium mt-1">{{ $inquiry->weight ?? 'Not specified' }}</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-900/50 border border-slate-700/30">
                            <span class="text-slate-500 text-xs uppercase tracking-wider">Dimensions</span>
                            <p class="text-white font-medium mt-1">{{ $inquiry->dimensions ?? 'Not specified' }}</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-900/50 border border-slate-700/30">
                            <span class="text-slate-500 text-xs uppercase tracking-wider">Incoterm</span>
                            <p class="text-white font-medium mt-1">{{ $inquiry->incoterm ?? 'Not specified' }}</p>
                        </div>
                    </div>
                </div>
                @endif

                {{-- Message --}}
                <div class="bg-slate-800/50 border border-slate-700/50 rounded-3xl p-6 backdrop-blur-sm">
                    <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                        <i class="bi bi-chat-left-text text-cyan-400"></i>
                        Message
                    </h3>
                    <div class="p-6 rounded-2xl bg-slate-900/50 border border-slate-700/30">
                        <p class="text-slate-300 whitespace-pre-wrap leading-relaxed">{{ $inquiry->message ?? $inquiry->notes ?? 'No message provided.' }}</p>
                    </div>
                </div>

            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">

                {{-- Actions Card --}}
                <div class="bg-slate-800/50 border border-slate-700/50 rounded-3xl p-6 backdrop-blur-sm">
                    <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-4">Actions</h3>

                    <div class="space-y-3">
                        @if(!$inquiry->is_read)
                        <form method="POST" action="{{ route('admin.inquiries.read', $inquiry) }}">
                            @csrf @method('PATCH')
                            <button type="submit" class="w-full py-3 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 font-medium hover:bg-emerald-500/20 transition-all flex items-center justify-center gap-2">
                                <i class="bi bi-check2-all"></i>
                                Mark as Read
                            </button>
                        </form>
                        @endif

                        <a href="mailto:{{ $inquiry->email }}?subject=Re: {{ $inquiry->subject ?? 'Your Inquiry' }}"
                            class="block w-full py-3 rounded-xl bg-cyan-500 text-white font-medium hover:bg-cyan-400 transition-all text-center flex items-center justify-center gap-2">
                            <i class="bi bi-reply"></i>
                            Reply via Email
                        </a>

                        <form method="POST" action="{{ route('admin.inquiries.destroy', $inquiry) }}" onsubmit="return confirm('Permanently delete this inquiry?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="w-full py-3 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400 font-medium hover:bg-red-500/20 transition-all flex items-center justify-center gap-2">
                                <i class="bi bi-trash"></i>
                                Delete Inquiry
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Metadata Card --}}
                <div class="bg-slate-800/50 border border-slate-700/50 rounded-3xl p-6 backdrop-blur-sm">
                    <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-4">Metadata</h3>

                    <div class="space-y-4 text-sm">
                        <div>
                            <span class="text-slate-500 block text-xs uppercase tracking-wider mb-1">Page Source</span>
                            <a href="{{ $inquiry->page_url }}" target="_blank" class="text-cyan-400 hover:underline break-all">
                                {{ $inquiry->page_url ?? 'Direct Access' }}
                            </a>
                        </div>

                        <div>
                            <span class="text-slate-500 block text-xs uppercase tracking-wider mb-1">IP Address</span>
                            <span class="text-slate-300 font-mono">{{ $inquiry->ip_address ?? 'Unknown' }}</span>
                        </div>

                        <div>
                            <span class="text-slate-500 block text-xs uppercase tracking-wider mb-1">User Agent</span>
                            <span class="text-slate-400 text-xs line-clamp-2" title="{{ $inquiry->user_agent }}">
                                {{ Str::limit($inquiry->user_agent, 60) ?? 'Unknown' }}
                            </span>
                        </div>

                        <div class="pt-4 border-t border-slate-700/30">
                            <span class="text-slate-500 block text-xs uppercase tracking-wider mb-1">Submitted</span>
                            <span class="text-slate-300">{{ $inquiry->created_at?->format('F d, Y \a\t h:i A') }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection