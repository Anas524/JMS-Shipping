@extends('layouts.app')

@section('title', 'Admin | Command Center')

@section('hideHeaderSpacer', '1')

@section('content')
<div class="bg-slate-950 min-h-screen">
    {{-- Hero Section with Parallax --}}
    <div class="relative min-h-[60vh] flex items-center justify-center overflow-hidden pt-28 md:pt-32 pb-28 md:pb-32">
        {{-- Animated Background --}}
        <div class="absolute inset-0 bg-slate-900 pointer-events-none">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-cyan-900/40 via-slate-900 to-slate-900"></div>

            {{-- Grid Animation --}}
            <div class="absolute inset-0 bg-[linear-gradient(rgba(6,182,212,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(6,182,212,0.03)_1px,transparent_1px)] bg-[size:50px_50px] [mask-image:radial-gradient(ellipse_at_center,black,transparent_70%)]"></div>

            {{-- Floating Orbs --}}
            <div class="absolute top-20 left-10 w-72 h-72 bg-cyan-500/20 rounded-full blur-[100px] animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-purple-500/20 rounded-full blur-[100px] animate-pulse delay-1000"></div>
        </div>

        {{-- Content --}}
        <div class="relative z-10 text-center px-4" data-aos="fade-up">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-cyan-500/10 border border-cyan-500/20 mb-6">
                <span class="w-2 h-2 rounded-full bg-cyan-400 animate-ping"></span>
                <span class="text-cyan-400 text-sm font-medium uppercase tracking-wider">System Online</span>
            </div>

            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 tracking-tight">
                Command <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-400">Center</span>
            </h1>

            <p class="text-xl text-slate-400 max-w-2xl mx-auto mb-8">
                Real-time monitoring and management of JMS Shipping operations, inquiries, and communications.
            </p>

            {{-- Stats Row --}}
            <div class="flex flex-wrap justify-center gap-6 mt-12">
                <div class="px-6 py-4 rounded-2xl bg-slate-800/50 border border-slate-700/50 backdrop-blur-sm">
                    <div class="text-3xl font-bold text-white mb-1">{{ $stats['total_inquiries'] ?? 0 }}</div>
                    <div class="text-sm text-slate-400">Total Inquiries</div>
                </div>
                <div class="px-6 py-4 rounded-2xl bg-slate-800/50 border border-slate-700/50 backdrop-blur-sm">
                    <div class="text-3xl font-bold text-cyan-400 mb-1">{{ $stats['unread_count'] ?? 0 }}</div>
                    <div class="text-sm text-slate-400">Unread Messages</div>
                </div>
                <div class="px-6 py-4 rounded-2xl bg-slate-800/50 border border-slate-700/50 backdrop-blur-sm">
                    <div class="text-3xl font-bold text-purple-400 mb-1">{{ $stats['newsletter_count'] ?? 0 }}</div>
                    <div class="text-sm text-slate-400">Subscribers</div>
                </div>
                <div class="px-6 py-4 rounded-2xl bg-slate-800/50 border border-slate-700/50 backdrop-blur-sm">
                    <div class="text-3xl font-bold text-emerald-400 mb-1">{{ $stats['today_count'] ?? 0 }}</div>
                    <div class="text-sm text-slate-400">Today's Activity</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Navigation Cards --}}
    <div class="bg-slate-950 pb-20">
        <div class="max-w-7xl mx-auto px-4 mt-10 md:mt-12 relative z-20">

            <div class="grid md:grid-cols-2 gap-6">

                {{-- Inquiries Card --}}
                <a href="{{ route('admin.inquiries.index') }}"
                    class="group relative overflow-hidden rounded-3xl bg-slate-900/50 border border-slate-700/50 p-8 backdrop-blur-sm transition-all duration-300 hover:bg-slate-900/70 hover:border-cyan-500/30 hover:shadow-2xl hover:shadow-cyan-500/10">

                    <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    <div class="relative z-10">
                        <div class="w-16 h-16 rounded-2xl bg-cyan-500/10 flex items-center justify-center mb-6">
                            <i class="bi bi-inbox-fill text-cyan-300 text-3xl"></i>
                        </div>

                        <h3 class="text-2xl font-bold text-white mb-2">Inquiries</h3>
                        <p class="text-slate-300/80 mb-6">View and manage all contact + quote requests.</p>

                        <div class="flex items-center justify-between">
                            <span class="text-cyan-300 font-semibold">Open Module</span>
                            <div class="w-10 h-10 rounded-full bg-cyan-500/10 flex items-center justify-center group-hover:bg-cyan-500 transition-all">
                                <i class="bi bi-arrow-right text-cyan-300 group-hover:text-white"></i>
                            </div>
                        </div>
                    </div>
                </a>

                {{-- Newsletter Card --}}
                <a href="{{ route('admin.newsletter.index') }}"
                    class="group relative overflow-hidden rounded-3xl bg-slate-900/50 border border-slate-700/50 p-8 backdrop-blur-sm transition-all duration-300 hover:bg-slate-900/70 hover:border-purple-500/30 hover:shadow-2xl hover:shadow-purple-500/10">

                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    <div class="relative z-10">
                        <div class="w-16 h-16 rounded-2xl bg-purple-500/10 flex items-center justify-center mb-6">
                            <i class="bi bi-envelope-paper-fill text-purple-300 text-3xl"></i>
                        </div>

                        <h3 class="text-2xl font-bold text-white mb-2">Newsletter</h3>
                        <p class="text-slate-300/80 mb-6">Search subscribers and export CSV anytime.</p>

                        <div class="flex items-center justify-between">
                            <span class="text-purple-300 font-semibold">Open Module</span>
                            <div class="w-10 h-10 rounded-full bg-purple-500/10 flex items-center justify-center group-hover:bg-purple-500 transition-all">
                                <i class="bi bi-arrow-right text-purple-300 group-hover:text-white"></i>
                            </div>
                        </div>
                    </div>
                </a>

            </div>

            {{-- Recent + Status --}}
            <div class="mt-10 grid lg:grid-cols-3 gap-6">

                {{-- Recent Inquiries --}}
                <div class="lg:col-span-2 rounded-3xl bg-slate-900/50 border border-slate-700/50 p-6 backdrop-blur-sm">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-white flex items-center gap-2">
                            <i class="bi bi-lightning-charge-fill text-amber-300"></i>
                            Recent Inquiries
                        </h3>
                        <a href="{{ route('admin.inquiries.index') }}" class="text-sm text-cyan-300 hover:text-cyan-200 font-semibold transition-colors">View All</a>
                    </div>

                    <div class="space-y-3">
                        @forelse($recentInquiries ?? [] as $inquiry)
                        <div class="flex items-center justify-between p-4 rounded-2xl bg-slate-950/40 border border-slate-700/30 hover:border-slate-600/60 transition">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-slate-900 flex items-center justify-center">
                                    <span class="text-lg">{{ $inquiry->type === 'quote' ? '📦' : '✉️' }}</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-white">{{ $inquiry->name }}</p>
                                    <p class="text-sm text-slate-400">{{ $inquiry->email }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                @if(!$inquiry->is_read)
                                <span class="px-2 py-1 rounded-full bg-amber-500/10 border border-amber-500/20 text-amber-300 text-xs font-semibold">New</span>
                                @endif
                                <span class="text-xs text-slate-500 hidden sm:inline">{{ $inquiry->created_at->diffForHumans() }}</span>
                                <a href="{{ route('admin.inquiries.show', $inquiry) }}"
                                    class="w-9 h-9 rounded-xl bg-slate-900 flex items-center justify-center text-slate-200 hover:bg-cyan-500 transition">
                                    <i class="bi bi-arrow-right-short text-xl"></i>
                                </a>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-10 text-slate-400">
                            <i class="bi bi-inbox text-4xl mb-2 opacity-50"></i>
                            <p>No recent inquiries</p>
                        </div>
                        @endforelse
                    </div>
                </div>

                {{-- Simple Status --}}
                <div class="rounded-3xl bg-slate-900/50 border border-slate-700/50 p-6 backdrop-blur-sm">
                    <h3 class="text-xl font-bold text-white mb-5 flex items-center gap-2">
                        <i class="bi bi-shield-check text-emerald-300"></i>
                        Admin Status
                    </h3>

                    <div class="space-y-3 text-sm">
                        <div class="p-4 rounded-2xl bg-slate-950/40 border border-slate-700/30">
                            <div class="flex items-center justify-between">
                                <span class="text-slate-400">System</span>
                                <span class="text-emerald-300 font-semibold">Online</span>
                            </div>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-950/40 border border-slate-700/30">
                            <div class="flex items-center justify-between">
                                <span class="text-slate-400">Access</span>
                                <span class="text-cyan-300 font-semibold">Admin</span>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full mt-2 py-3 rounded-xl bg-red-500/10 border border-red-500/20 text-red-300 font-semibold hover:bg-red-500/20 transition">
                                <i class="bi bi-power"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection