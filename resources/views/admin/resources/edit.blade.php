@extends('layouts.app')

@section('title', 'Admin | Edit Resource')

@section('hideHeaderSpacer', '1')

@section('content')
<div class="min-h-screen bg-slate-950 pt-32 pb-16 px-4">
    <div class="max-w-5xl mx-auto">
        <h1 class="text-3xl font-bold text-white mb-2">Edit Resource Post</h1>
        <p class="text-slate-400 mb-8">Update this blog or insight.</p>

        <div class="rounded-3xl border border-slate-800 bg-slate-900/60 p-6">
            <form method="POST" action="{{ route('admin.resources.update', $post) }}" enctype="multipart/form-data">
                @include('admin.resources._form', ['post' => $post])
            </form>
        </div>
    </div>
</div>
@endsection