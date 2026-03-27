@extends('layouts.app')

@section('content')
<!-- Header Info Section -->
<div class="bg-gradient-to-b from-pink-50 to-white py-12 px-8">
    <div class="container mx-auto">
        <div class="flex justify-between items-start mb-12">
            <div>
                <p class="text-xs text-gray-500 tracking-widest font-light mb-2">AYLA'S COLLECTION</p>
                <h1 class="text-6xl font-light tracking-widest text-pink-400 mb-1">JEAUONIA</h1>
            </div>
            <div class="text-right text-xs text-gray-600 font-light leading-relaxed max-w-xs">
                <p class="mb-2">NEW STORY DESIGN UPLOAD</p>
                <p>OF JEAUONIA INSTAGRAM</p>
            </div>
        </div>

        <div class="text-center space-y-2 mb-8">
            <p class="text-xs text-gray-600 tracking-widest font-light">FOLLOW & LIKE FOR SUPPORT ME & NEW DESIGN TO UPLOAD</p>
            <p class="text-xs text-gray-600 tracking-widest font-light">PLEASE DON'T COPY MY DESIGN IDEA</p>
        </div>

        <div class="text-center">
            <a href="{{ route('projects.create') }}" class="inline-block bg-pink-300 hover:bg-pink-400 text-white px-6 py-2 rounded-full text-xs font-semibold tracking-widest transition">
                + PUBLISH
            </a>
        </div>
    </div>
</div>

<!-- Divider -->
<div class="h-1 bg-gradient-to-r from-transparent via-gray-300 to-transparent"></div>

<!-- Main Content -->
<div class="container mx-auto px-8 py-16">
    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-8 bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded text-sm font-light">
            ✓ {{ session('success') }}
        </div>
    @endif

    @if($projects->count() > 0)
        <!-- Collection Section -->
        <div class="mb-20">
            <div class="text-center mb-12">
                <h2 class="text-5xl font-light text-gray-400 tracking-widest mb-4">COLLECTION<br>DESIGN</h2>
                <a href="{{ route('projects.create') }}" class="inline-block bg-pink-300 text-white px-6 py-2 rounded-full text-xs font-semibold">
                    ↓ REPORT
                </a>
            </div>

            <!-- Featured Gallery Grid -->
            <div class="grid grid-cols-4 gap-4 mb-20">
                @foreach($projects->take(4) as $project)
                    @if($project->media_type === 'image' && $project->media_path)
                        <div class="aspect-square bg-gray-200 rounded overflow-hidden hover:shadow-lg transition">
                            <img src="{{ asset('storage/' . $project->media_path) }}" 
                                 alt="{{ $project->title }}" 
                                 class="w-full h-full object-cover hover:scale-105 transition duration-300">
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Quote Section -->
            <div class="bg-gray-50 rounded-lg p-12 text-center mb-20">
                <p class="text-gray-700 font-light text-lg leading-relaxed max-w-2xl mx-auto">
                    "I think it's beautiful - the way you twist your losses into lessons, the way you fight even when you feel weak. You are not weak."
                </p>
                <div class="flex justify-center gap-8 mt-12">
                    <div class="text-center">
                        <div class="w-16 h-16 rounded-full bg-gray-300 mx-auto mb-3"></div>
                        <p class="text-xs text-gray-600 font-light">COLLECTION</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 rounded-full bg-pink-300 mx-auto mb-3"></div>
                        <p class="text-xs text-gray-600 font-light">DESIGN</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gallery Section -->
        <div class="mb-20">
            <h3 class="text-4xl font-light text-gray-400 tracking-widest text-center mb-12">GALLERY</h3>

            <div class="grid grid-cols-2 md:grid-cols-3 gap-6 mb-12">
                @foreach($projects as $project)
                    <div class="group">
                        @if($project->media_type === 'image' && $project->media_path)
                            <div class="aspect-square bg-gray-200 rounded overflow-hidden mb-3 relative">
                                <img src="{{ asset('storage/' . $project->media_path) }}" 
                                     alt="{{ $project->title }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition"></div>
                            </div>
                        @endif
                        <h4 class="text-xs font-semibold text-gray-800 tracking-widest uppercase mb-1">{{ $project->title }}</h4>
                        <p class="text-xs text-gray-600 font-light line-clamp-2 mb-3">{{ $project->description }}</p>

                        <!-- Tags -->
                        @if($project->tags)
                            <div class="flex flex-wrap gap-1 mb-4">
                                @foreach(array_slice(explode(',', $project->tags), 0, 2) as $tag)
                                    <span class="text-xs bg-pink-100 text-pink-700 px-2 py-1 rounded-full font-light">
                                        {{ trim($tag) }}
                                    </span>
                                @endforeach
                            </div>
                        @endif

                        <!-- Links -->
                        <div class="flex gap-2 mb-4">
                            @if($project->figma_link)
                                <a href="{{ $project->figma_link }}" target="_blank" class="w-6 h-6 flex items-center justify-center border border-gray-300 rounded hover:bg-gray-800 hover:text-white hover:border-gray-800 transition text-xs">
                                    <i class="fab fa-figma text-xs"></i>
                                </a>
                            @endif
                            @if($project->github_link)
                                <a href="{{ $project->github_link }}" target="_blank" class="w-6 h-6 flex items-center justify-center border border-gray-300 rounded hover:bg-gray-800 hover:text-white hover:border-gray-800 transition text-xs">
                                    <i class="fab fa-github text-xs"></i>
                                </a>
                            @endif
                            @if($project->live_link)
                                <a href="{{ $project->live_link }}" target="_blank" class="w-6 h-6 flex items-center justify-center border border-gray-300 rounded hover:bg-gray-800 hover:text-white hover:border-gray-800 transition text-xs">
                                    <i class="fas fa-globe text-xs"></i>
                                </a>
                            @endif
                            @if($project->tiktok_link)
                                <a href="{{ $project->tiktok_link }}" target="_blank" class="w-6 h-6 flex items-center justify-center border border-gray-300 rounded hover:bg-gray-800 hover:text-white hover:border-gray-800 transition text-xs">
                                    <i class="fab fa-tiktok text-xs"></i>
                                </a>
                            @endif
                        </div>

                        <!-- Actions -->
                        <div class="flex gap-2">
                            <a href="{{ route('projects.edit', $project) }}" 
                               class="flex-1 text-center text-xs font-semibold bg-gray-100 hover:bg-gray-800 text-gray-800 hover:text-white py-1.5 px-2 rounded transition">
                                EDIT
                            </a>
                            <form action="{{ route('projects.destroy', $project) }}" method="POST" class="flex-1" 
                                  onsubmit="return confirm('Delete this design?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full text-xs font-semibold bg-red-100 hover:bg-red-600 text-red-600 hover:text-white py-1.5 px-2 rounded transition">
                                    DEL
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Info Section -->
        <div class="bg-gradient-to-r from-pink-100 to-pink-50 rounded-lg p-12 text-center mb-20">
            <h4 class="text-2xl font-light text-gray-400 tracking-widest mb-6">JEAUONIA</h4>
            <p class="text-gray-700 font-light text-sm leading-relaxed max-w-2xl mx-auto mb-8">
                AYLA'S DESIGN - YOU ARE A RESOUNDING LEVEL OF COURAGE TO BE FOUND IN BEING THE PERSON WHO CONTINUES TO HEAL EVEN WHEN IT HURTS.
            </p>
            <p class="text-xs text-gray-600 font-light">MADE STORY BY AYLA'S JEAUONIA</p>
        </div>

        <!-- Stats Section -->
        <div class="text-center py-12 border-t border-b border-gray-200">
            <div class="grid grid-cols-3 gap-8 mb-8">
                <div>
                    <p class="text-2xl font-light text-gray-400 mb-1">200</p>
                    <p class="text-xs text-gray-600 font-light tracking-widest">LIKED</p>
                </div>
                <div>
                    <p class="text-2xl font-light text-gray-400 mb-1">50K</p>
                    <p class="text-xs text-gray-600 font-light tracking-widest">FOLLOWERS</p>
                </div>
                <div>
                    <p class="text-2xl font-light text-gray-400 mb-1">5000</p>
                    <p class="text-xs text-gray-600 font-light tracking-widest">VIEWS</p>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-12">
            {{ $projects->links() }}
        </div>

    @else
        <!-- Empty State -->
        <div class="text-center py-32">
            <h2 class="text-4xl font-light text-gray-400 tracking-widest mb-4">NO DESIGNS YET</h2>
            <p class="text-gray-600 font-light mb-8">START CREATING YOUR PORTFOLIO NOW</p>
            <a href="{{ route('projects.create') }}" class="inline-block bg-pink-300 hover:bg-pink-400 text-white px-6 py-2 rounded-full text-xs font-semibold">
                CREATE FIRST DESIGN
            </a>
        </div>
    @endif
</div>

<style>
    /* Pagination */
    .pagination {
        display: flex;
        gap: 0.5rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .pagination a, .pagination span {
        padding: 6px 10px;
        border: 1px solid #e5e7eb;
        border-radius: 3px;
        font-size: 11px;
        font-weight: 600;
        transition: all 0.2s;
    }

    .pagination a:hover {
        background: #3a3a3a;
        color: white;
        border-color: #3a3a3a;
    }

    .pagination .active span {
        background: #3a3a3a;
        color: white;
        border-color: #3a3a3a;
    }

    .pagination .disabled span {
        opacity: 0.5;
        cursor: not-allowed;
    }
</style>
@endsection
