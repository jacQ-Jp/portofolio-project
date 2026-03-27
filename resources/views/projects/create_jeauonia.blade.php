@extends('layouts.app')

@section('content')
<div class="container mx-auto px-8 py-16">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="section-title">CREATE DESIGN</h1>
            <p class="text-gray-600 font-light text-sm tracking-widest">UPLOAD YOUR NEW DESIGN</p>
        </div>

        <!-- Error Messages -->
        @if($errors->any())
            <div class="mb-8 bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded">
                <h3 class="font-semibold mb-3 text-sm tracking-widest">VALIDATION ERRORS</h3>
                <ul class="space-y-1">
                    @foreach($errors->all() as $error)
                        <li class="text-xs font-light">• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded border border-gray-200">
            @csrf

            <!-- Title -->
            <div class="mb-8">
                <label for="title" class="block text-xs font-semibold tracking-widest text-gray-700 mb-3">DESIGN TITLE <span class="text-red-500">*</span></label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" 
                       placeholder="Enter your design title..." 
                       class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-gray-500 font-light text-sm @error('title') border-red-500 @enderror">
                @error('title')
                    <p class="text-red-500 text-xs mt-2 font-light">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-8">
                <label for="description" class="block text-xs font-semibold tracking-widest text-gray-700 mb-3">DESCRIPTION</label>
                <textarea id="description" name="description" rows="5" placeholder="Tell the story of your design..." 
                          class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-gray-500 font-light text-sm @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-2 font-light">{{ $message }}</p>
                @enderror
            </div>

            <!-- Media Upload -->
            <div class="mb-8">
                <label for="media" class="block text-xs font-semibold tracking-widest text-gray-700 mb-4">MEDIA UPLOAD</label>
                <div class="border-2 border-dashed border-gray-300 rounded p-8 text-center cursor-pointer hover:border-gray-500 transition" id="dropZone">
                    <div class="mb-3">
                        <i class="fas fa-cloud-upload-alt text-3xl text-gray-400"></i>
                    </div>
                    <p class="text-gray-700 font-light text-sm">Drag your files here or <span class="text-gray-900 font-semibold">click to browse</span></p>
                    <p class="text-gray-500 text-xs mt-2 font-light tracking-wide">JPG, PNG, GIF, MP4 • Max 100MB</p>
                    <input type="file" id="media" name="media" accept="image/jpeg,image/png,image/gif,video/mp4,video/x-msvideo,video/quicktime" class="hidden" />
                </div>

                <!-- Preview -->
                <div id="preview" class="mt-6"></div>
                
                @error('media')
                    <p class="text-red-500 text-xs mt-2 font-light">{{ $message }}</p>
                @enderror
            </div>

            <!-- Links Section -->
            <div class="mb-8 p-6 bg-gray-50 rounded border border-gray-200">
                <h3 class="text-xs font-semibold tracking-widest text-gray-700 mb-6">PROJECT LINKS</h3>

                <!-- Figma Link -->
                <div class="mb-4">
                    <label for="figma_link" class="block text-xs font-semibold tracking-widest text-gray-600 mb-2">FIGMA DESIGN</label>
                    <input type="url" id="figma_link" name="figma_link" value="{{ old('figma_link') }}" 
                           placeholder="https://figma.com/..." 
                           class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-gray-500 font-light text-sm @error('figma_link') border-red-500 @enderror">
                    @error('figma_link')
                        <p class="text-red-500 text-xs mt-1 font-light">{{ $message }}</p>
                    @enderror
                </div>

                <!-- GitHub Link -->
                <div class="mb-4">
                    <label for="github_link" class="block text-xs font-semibold tracking-widest text-gray-600 mb-2">GITHUB REPOSITORY</label>
                    <input type="url" id="github_link" name="github_link" value="{{ old('github_link') }}" 
                           placeholder="https://github.com/..." 
                           class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-gray-500 font-light text-sm @error('github_link') border-red-500 @enderror">
                    @error('github_link')
                        <p class="text-red-500 text-xs mt-1 font-light">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Live Link -->
                <div class="mb-4">
                    <label for="live_link" class="block text-xs font-semibold tracking-widest text-gray-600 mb-2">LIVE WEBSITE</label>
                    <input type="url" id="live_link" name="live_link" value="{{ old('live_link') }}" 
                           placeholder="https://yoursite.com" 
                           class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-gray-500 font-light text-sm @error('live_link') border-red-500 @enderror">
                    @error('live_link')
                        <p class="text-red-500 text-xs mt-1 font-light">{{ $message }}</p>
                    @enderror
                </div>

                <!-- TikTok Link -->
                <div class="mb-4">
                    <label for="tiktok_link" class="block text-xs font-semibold tracking-widest text-gray-600 mb-2">TIKTOK VIDEO</label>
                    <input type="url" id="tiktok_link" name="tiktok_link" value="{{ old('tiktok_link') }}" 
                           placeholder="https://tiktok.com/..." 
                           class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-gray-500 font-light text-sm @error('tiktok_link') border-red-500 @enderror">
                    @error('tiktok_link')
                        <p class="text-red-500 text-xs mt-1 font-light">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tags -->
                <div>
                    <label for="tags" class="block text-xs font-semibold tracking-widest text-gray-600 mb-2">TAGS</label>
                    <input type="text" id="tags" name="tags" value="{{ old('tags') }}" 
                           placeholder="e.g., UI Design, Web Design, Animation" 
                           class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-gray-500 font-light text-sm @error('tags') border-red-500 @enderror">
                    <p class="text-gray-500 text-xs mt-1 font-light">Separate tags with commas</p>
                    @error('tags')
                        <p class="text-red-500 text-xs mt-1 font-light">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex gap-4 pt-6 border-t border-gray-200">
                <a href="{{ route('projects.index') }}" class="flex-1 text-center btn-secondary">
                    CANCEL
                </a>
                <button type="submit" class="flex-1 text-center btn-primary">
                    PUBLISH DESIGN
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .section-title {
        font-size: 2.5rem;
        font-weight: 300;
        letter-spacing: 3px;
        color: #4a4a4a;
    }
</style>

<script>
const dropZone = document.getElementById('dropZone');
const fileInput = document.getElementById('media');
const preview = document.getElementById('preview');

dropZone.addEventListener('click', () => fileInput.click());

['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropZone.addEventListener(eventName, preventDefaults, false);
});

function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
}

['dragenter', 'dragover'].forEach(eventName => {
    dropZone.addEventListener(eventName, () => {
        dropZone.classList.add('border-gray-600', 'bg-gray-50');
    }, false);
});

['dragleave', 'drop'].forEach(eventName => {
    dropZone.addEventListener(eventName, () => {
        dropZone.classList.remove('border-gray-600', 'bg-gray-50');
    }, false);
});

dropZone.addEventListener('drop', handleDrop, false);

function handleDrop(e) {
    const dt = e.dataTransfer;
    const files = dt.files;
    fileInput.files = files;
    handleFile();
}

fileInput.addEventListener('change', handleFile);

function handleFile() {
    const file = fileInput.files[0];
    if (!file) return;

    preview.innerHTML = '';
    const ext = file.name.split('.').pop().toLowerCase();
    const isImage = ['jpg', 'jpeg', 'png', 'gif'].includes(ext);
    const isVideo = ['mp4', 'avi', 'mov'].includes(ext);

    if (isImage) {
        const reader = new FileReader();
        reader.onload = (e) => {
            const html = `
                <div class="mt-6">
                    <p class="text-xs font-semibold tracking-widest text-gray-700 mb-3">IMAGE PREVIEW:</p>
                    <img src="${e.target.result}" class="max-h-64 rounded mx-auto border border-gray-200" />
                </div>
            `;
            preview.innerHTML = html;
        };
        reader.readAsDataURL(file);
    } else if (isVideo) {
        const html = `
            <div class="mt-6 bg-gray-50 p-4 rounded border border-gray-200">
                <p class="text-xs font-semibold tracking-widest text-gray-700 mb-2">VIDEO SELECTED:</p>
                <p class="text-gray-600 font-light text-sm">📹 ${file.name}</p>
                <p class="text-gray-500 text-xs font-light mt-1">Size: ${(file.size / (1024 * 1024)).toFixed(2)} MB</p>
            </div>
        `;
        preview.innerHTML = html;
    }
}
</script>
@endsection
