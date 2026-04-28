@csrf
@if(isset($post))
@method('PUT')
@endif

@if ($errors->any())
<div class="mb-6 rounded-2xl border border-red-500/20 bg-red-500/10 px-4 py-4 text-red-300">
    <div class="font-semibold mb-2">Please fix the following:</div>
    <ul class="list-disc pl-5 space-y-1 text-sm">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="grid lg:grid-cols-2 gap-6">
    <div class="lg:col-span-2">
        <label class="block text-sm font-medium text-slate-300 mb-2">Title <span class="text-red-400">*</span></label>
        <input
            type="text"
            name="title"
            required
            value="{{ old('title', $post->title ?? '') }}"
            class="resource-input">
        @error('title')
        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-slate-300 mb-2">Category</label>
        <input
            type="text"
            name="category"
            value="{{ old('category', $post->category ?? '') }}"
            class="resource-input">
        @error('category')
        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-slate-300 mb-2">Author Name</label>
        <input
            type="text"
            name="author_name"
            value="{{ old('author_name', $post->author_name ?? 'JMS Shipping Team') }}"
            class="resource-input">
        @error('author_name')
        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-slate-300 mb-2">Read Time (minutes)</label>
        <input
            type="number"
            name="read_time"
            min="1"
            value="{{ old('read_time', $post->read_time ?? 5) }}"
            class="resource-input resource-number">
        @error('read_time')
        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-slate-300 mb-2">Published At</label>
        <div class="resource-date-wrap">
            <input
                type="datetime-local"
                name="published_at"
                id="published_at_input"
                value="{{ old('published_at', isset($post) && $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}"
                class="resource-input resource-datetime">
            <button type="button" class="resource-date-trigger" id="published_at_trigger" aria-label="Open date picker">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M6 2a1 1 0 012 0v1h4V2a1 1 0 112 0v1h1.5A2.5 2.5 0 0118 5.5v9A2.5 2.5 0 0115.5 17h-11A2.5 2.5 0 012 14.5v-9A2.5 2.5 0 014.5 3H6V2zm9.5 6h-11a.5.5 0 00-.5.5v6a.5.5 0 00.5.5h11a.5.5 0 00.5-.5v-6a.5.5 0 00-.5-.5z" />
                </svg>
            </button>
        </div>
        @error('published_at')
        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div class="lg:col-span-2">
        <label class="block text-sm font-medium text-slate-300 mb-2">Excerpt</label>
        <textarea
            name="excerpt"
            rows="4"
            class="resource-textarea">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
        @error('excerpt')
        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div class="lg:col-span-2">
        <label class="block text-sm font-medium text-slate-300 mb-2">Content</label>
        <textarea
            name="content"
            rows="10"
            class="resource-textarea">{{ old('content', $post->content ?? '') }}</textarea>
        @error('content')
        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-slate-300 mb-2">Featured Image</label>

        <div class="resource-file-wrap">
            <input
                type="file"
                name="featured_image"
                accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                class="resource-file-input"
                id="featured_image_input">
            <div class="resource-file-ui">
                <span class="resource-file-btn">Choose Image</span>
                <span class="resource-file-name" id="featured_image_name">No file selected</span>
            </div>
        </div>

        @error('featured_image')
        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
        @enderror

        @if(isset($post) && $post->featured_image)
        <div class="mt-3">
            <img src="{{ asset('storage/' . $post->featured_image) }}" class="w-28 h-28 rounded-xl object-cover" alt="Current image">
        </div>
        @endif
    </div>

    <div class="space-y-4 pt-2">
        <label class="flex items-center gap-3 text-slate-200 cursor-pointer">
            <input
                type="checkbox"
                name="is_featured"
                value="1"
                class="resource-check"
                {{ old('is_featured', $post->is_featured ?? false) ? 'checked' : '' }}>
            <span>Featured Post</span>
        </label>

        <label class="flex items-center gap-3 text-slate-200 cursor-pointer">
            <input
                type="checkbox"
                name="is_published"
                value="1"
                class="resource-check"
                {{ old('is_published', $post->is_published ?? true) ? 'checked' : '' }}>
            <span>Published</span>
        </label>
    </div>

    <div class="lg:col-span-2">
        <label class="block text-sm font-medium text-slate-300 mb-2">Meta Title</label>
        <input
            type="text"
            name="meta_title"
            value="{{ old('meta_title', $post->meta_title ?? '') }}"
            class="resource-input">
        @error('meta_title')
        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div class="lg:col-span-2">
        <label class="block text-sm font-medium text-slate-300 mb-2">Meta Description</label>
        <textarea
            name="meta_description"
            rows="3"
            class="resource-textarea">{{ old('meta_description', $post->meta_description ?? '') }}</textarea>
        @error('meta_description')
        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="mt-8 flex items-center gap-4">
    <button
        type="submit"
        id="resourceSubmitBtn"
        class="resource-submit-btn inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-cyan-500 text-white font-semibold hover:bg-cyan-400 transition">
        <span class="resource-submit-label">{{ isset($post) ? 'Update Post' : 'Create Post' }}</span>
    </button>

    <a
        href="{{ route('admin.resources.index') }}"
        class="px-6 py-3 rounded-xl border border-slate-700 text-slate-300 hover:border-slate-500 transition">
        Cancel
    </a>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const fileInput = document.getElementById('featured_image_input');
        const fileName = document.getElementById('featured_image_name');
        const submitBtn = document.getElementById('resourceSubmitBtn');
        const form = submitBtn ? submitBtn.closest('form') : null;

        const publishedInput = document.getElementById('published_at_input');
        const publishedTrigger = document.getElementById('published_at_trigger');

        if (fileInput && fileName) {
            fileInput.addEventListener('change', function () {
                fileName.textContent = this.files && this.files.length ? this.files[0].name : 'No file selected';
            });
        }

        if (publishedInput && publishedTrigger) {
            publishedTrigger.addEventListener('click', function () {
                publishedInput.focus();

                if (typeof publishedInput.showPicker === 'function') {
                    publishedInput.showPicker();
                } else {
                    publishedInput.click();
                }
            });
        }

        if (form && submitBtn) {
            form.addEventListener('submit', function () {
                submitBtn.disabled = true;
                submitBtn.innerHTML = `
                    <span class="resource-submit-spinner"></span>
                    <span>Please wait...</span>
                `;
            });
        }
    });
</script>