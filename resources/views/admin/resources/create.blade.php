@extends('layouts.app')

@section('title', 'Admin | Create Resource')

@section('hideHeaderSpacer', '1')

@section('content')
<div class="min-h-screen bg-slate-950 pt-32 pb-16 px-4">
    <div class="max-w-5xl mx-auto">
        <h1 class="text-3xl font-bold text-white mb-2">Create Resource Post</h1>
        <p class="text-slate-400 mb-8">Add a new blog or insight for the frontend resources page.</p>

        <div class="rounded-3xl border border-slate-800 bg-slate-900/60 p-6">
            <form method="POST" action="{{ route('admin.resources.store') }}" enctype="multipart/form-data">
                @include('admin.resources._form')
            </form>
        </div>
    </div>
</div>
@endsection