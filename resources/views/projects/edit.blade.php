@extends('layouts.app')

@section('content')
<div class="container mx-auto px-8 py-16 max-w-3xl">
    <!-- Header -->
    <div class="text-center mb-16">
        <h1 class="text-5xl md:text-6xl font-light tracking-widest text-gray-800 mb-4">EDIT DESIGN</h1>
        <div class="h-1 w-16 bg-gradient-to-r from-pink-400 to-orange-400 mx-auto rounded-full mb-6"></div>
        <p class="text-gray-600 font-light text-sm tracking-widest uppercase">Update your design details</p>
    </div>

    <!-- Error Messages -->
    @if($errors->any())
        <div class="mb-8 bg-gradient-to-r from-red-50 to-pink-50 border border-red-300 text-red-800 px-6 py-4 rounded-lg">
            <h3 class="font-semibold mb-3 text-sm tracking-widest uppercase">⚠ Validation Errors</h3>
            <ul class="space-y-2">
                @foreach($errors->all() as $error)
                    <li class="text-xs font-light">• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form -->
    <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Section 1: Basic Info -->
        <div class="bg-white p-8 rounded-xl border border-gray-200 shadow-sm">
            <h2 class="text-lg font-semibold tracking-widest text-gray-800 mb-6 flex items-center">
                <span class="text-pink-400 mr-3">①</span> DESIGN BASICS
            </h2>

            <!-- Title -->
            <div class="mb-6">
                <label for="title" class="block text-xs font-semibold tracking-widest text-gray-700 mb-3">DESIGN TITLE <span class="text-red-500">*</span></label>
                <input type="text" id="title" name="title" value="{{ old('title', $project->title) }}" 
                       placeholder="Give your design a memorable name..." 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 font-light text-sm @error('title') border-red-500 @enderror">
                @error('title')
                    <p class="text-red-500 text-xs mt-2 font-light">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-xs font-semibold tracking-widest text-gray-700 mb-3">DESCRIPTION</label>
                <textarea id="description" name="description" rows="4" placeholder="Tell the story of your design..." 
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 font-light text-sm @error('description') border-red-500 @enderror">{{ old('description', $project->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-2 font-light">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Section 2: Media -->
        <div class="bg-white p-8 rounded-xl border border-gray-200 shadow-sm">
            <h2 class="text-lg font-semibold tracking-widest text-gray-800 mb-6 flex items-center">
                <span class="text-pink-400 mr-3">②</span> MEDIA
            </h2>

            <!-- Current Media -->
            @if($project->media_path)
                <div class="mb-8 p-6 bg-gradient-to-b from-gray-50 to-white rounded-lg border border-gray-200">
                    <h3 class="font-semibold text-gray-700 mb-4 tracking-widest text-xs">✓ CURRENT MEDIA:</h3>
                    <div class="rounded-lg overflow-hidden border border-gray-300 shadow-md">
                        @if($project->media_type === 'image')
                            <img src="{{ asset('storage/' . $project->media_path) }}" alt="{{ $project->title }}" class="max-h-72 w-full object-cover">
                        @else
                            <video class="max-h-72 w-full object-cover" controls>
                                <source src="{{ asset('storage/' . $project->media_path) }}" type="video/mp4">
                            </video>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Media Upload -->
            <label for="media" class="block text-xs font-semibold tracking-widest text-gray-700 mb-4">CHANGE MEDIA <span class="text-gray-500 font-light">(Optional)</span></label>
            <div class="border-2 border-dashed border-gray-300 rounded-lg p-12 text-center cursor-pointer hover:border-pink-400 hover:bg-pink-50 transition duration-300" id="dropZone">
                <div class="mb-4">
                    <i class="fas fa-cloud-upload-alt text-4xl text-gray-400"></i>
                </div>
                <p class="text-gray-700 font-light text-sm mb-1">Drag your media here or <span class="font-semibold text-gray-900">click to browse</span></p>
                <p class="text-gray-500 text-xs font-light tracking-wide">JPG, PNG, GIF, MP4 • Max 100MB</p>
                <input type="file" id="media" name="media" accept="image/jpeg,image/png,image/gif,video/mp4,video/x-msvideo,video/quicktime" class="hidden" />
            </div>

            <!-- Preview -->
            <div id="preview" class="mt-6"></div>
            
            @error('media')
                <p class="text-red-500 text-xs mt-2 font-light">{{ $message }}</p>
            @enderror
        </div>

        <!-- Section 3: Links -->
        <div class="bg-white p-8 rounded-xl border border-gray-200 shadow-sm">
            <h2 class="text-lg font-semibold tracking-widest text-gray-800 mb-6 flex items-center">
                <span class="text-pink-400 mr-3">③</span> PROJECT LINKS
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Figma Link -->
                <div>
                    <label for="figma_link" class="block text-xs font-semibold tracking-widest text-gray-700 mb-2 flex items-center">
                        <i class="fab fa-figma mr-2 text-pink-400"></i> FIGMA DESIGN
                    </label>
                    <input type="url" id="figma_link" name="figma_link" value="{{ old('figma_link', $project->figma_link) }}" 
                           placeholder="https://figma.com/..." 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 font-light text-sm @error('figma_link') border-red-500 @enderror">
                    @error('figma_link')
                        <p class="text-red-500 text-xs mt-1 font-light">{{ $message }}</p>
                    @enderror
                </div>

                <!-- GitHub Link -->
                <div>
                    <label for="github_link" class="block text-xs font-semibold tracking-widest text-gray-700 mb-2 flex items-center">
                        <i class="fab fa-github mr-2 text-gray-800"></i> GITHUB REPO
                    </label>
                    <input type="url" id="github_link" name="github_link" value="{{ old('github_link', $project->github_link) }}" 
                           placeholder="https://github.com/..." 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 font-light text-sm @error('github_link') border-red-500 @enderror">
                    @error('github_link')
                        <p class="text-red-500 text-xs mt-1 font-light">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Live Link -->
                <div>
                    <label for="live_link" class="block text-xs font-semibold tracking-widest text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-globe mr-2 text-blue-500"></i> LIVE WEBSITE
                    </label>
                    <input type="url" id="live_link" name="live_link" value="{{ old('live_link', $project->live_link) }}" 
                           placeholder="https://yoursite.com" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 font-light text-sm @error('live_link') border-red-500 @enderror">
                    @error('live_link')
                        <p class="text-red-500 text-xs mt-1 font-light">{{ $message }}</p>
                    @enderror
                </div>

                <!-- TikTok Link -->
                <div>
                    <label for="tiktok_link" class="block text-xs font-semibold tracking-widest text-gray-700 mb-2 flex items-center">
                        <i class="fab fa-tiktok mr-2 text-gray-800"></i> TIKTOK
                    </label>
                    <input type="url" id="tiktok_link" name="tiktok_link" value="{{ old('tiktok_link', $project->tiktok_link) }}" 
                           placeholder="https://tiktok.com/..." 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 font-light text-sm @error('tiktok_link') border-red-500 @enderror">
                    @error('tiktok_link')
                        <p class="text-red-500 text-xs mt-1 font-light">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Section 4: Tags -->
        <div class="bg-white p-8 rounded-xl border border-gray-200 shadow-sm">
            <h2 class="text-lg font-semibold tracking-widest text-gray-800 mb-6 flex items-center">
                <span class="text-pink-400 mr-3">④</span> TAGS
            </h2>

            <label for="tags" class="block text-xs font-semibold tracking-widest text-gray-700 mb-3">DESIGN TAGS</label>
            <input type="text" id="tags" name="tags" value="{{ old('tags', $project->tags) }}" 
                   placeholder="UI Design, Web Design, Animation, Branding..." 
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 font-light text-sm @error('tags') border-red-500 @enderror">
            <p class="text-gray-500 text-xs mt-2 font-light">Separate tags with commas for easy discovery</p>
            @error('tags')
                <p class="text-red-500 text-xs mt-2 font-light">{{ $message }}</p>
            @enderror
        </div>

        <!-- Action Buttons -->
        <div class="flex gap-4 pt-4 border-t border-gray-200">
            <a href="{{ route('projects.index') }}" class="flex-1 text-center py-3 px-6 rounded-lg border-2 border-gray-300 text-gray-800 font-semibold tracking-widest text-xs hover:bg-gray-100 transition uppercase">
                CANCEL
            </a>
            <button type="submit" class="flex-1 text-center py-3 px-6 rounded-lg bg-gradient-to-r from-pink-400 to-orange-400 hover:from-pink-500 hover:to-orange-500 text-white font-semibold tracking-widest text-xs transition shadow-lg hover:shadow-xl uppercase">
                UPDATE DESIGN
            </button>
        </div>
    </form>
</div>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .bg-white {
        animation: fadeIn 0.3s ease-in-out;
    }

    input:focus, textarea:focus {
        background-color: #fdf8f6;
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
        dropZone.classList.add('border-pink-400', 'bg-pink-50');
    }, false);
});

['dragleave', 'drop'].forEach(eventName => {
    dropZone.addEventListener(eventName, () => {
        dropZone.classList.remove('border-pink-400', 'bg-pink-50');
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
                <div class="bg-gradient-to-b from-pink-50 to-white p-6 rounded-lg border border-pink-200">
                    <p class="text-xs font-semibold tracking-widest text-gray-700 mb-4">✓ NEW IMAGE PREVIEW:</p>
                    <img src="${e.target.result}" class="max-h-80 rounded-lg mx-auto border border-gray-200 shadow-md" />
                    <p class="text-xs text-gray-600 font-light text-center mt-3">${file.name}</p>
                </div>
            `;
            preview.innerHTML = html;
        };
        reader.readAsDataURL(file);
    } else if (isVideo) {
        const html = `
            <div class="bg-gradient-to-b from-blue-50 to-white p-6 rounded-lg border border-blue-200">
                <p class="text-xs font-semibold tracking-widest text-gray-700 mb-3">✓ NEW VIDEO SELECTED:</p>
                <div class="flex items-center gap-4">
                    <div class="text-3xl">🎬</div>
                    <div>
                        <p class="text-gray-700 font-light">${file.name}</p>
                        <p class="text-xs text-gray-600 font-light">Size: ${(file.size / (1024 * 1024)).toFixed(2)} MB</p>
                    </div>
                </div>
            </div>
        `;
        preview.innerHTML = html;
    }
}
</script>
@endsection

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
                    <p class="text-xs font-semibold tracking-widest text-gray-700 mb-3">NEW IMAGE PREVIEW:</p>
                    <img src="${e.target.result}" class="max-h-64 rounded mx-auto border border-gray-200" />
                </div>
            `;
            preview.innerHTML = html;
        };
        reader.readAsDataURL(file);
    } else if (isVideo) {
        const html = `
            <div class="mt-6 bg-gray-50 p-4 rounded border border-gray-200">
                <p class="text-xs font-semibold tracking-widest text-gray-700 mb-2">NEW VIDEO SELECTED:</p>
                <p class="text-gray-600 font-light text-sm">📹 ${file.name}</p>
                <p class="text-gray-500 text-xs font-light mt-1">Size: ${(file.size / (1024 * 1024)).toFixed(2)} MB</p>
            </div>
        `;
        preview.innerHTML = html;
    }
}
</script>
@endsection
