@extends('layouts.app')

@section('title', 'Skills')

@section('content')
    <section class="container mx-auto px-8 py-16">
        <div class="max-w-5xl mx-auto">
            <div class="flex items-center justify-between gap-6 flex-wrap">
                <div>
                    <h1 class="text-3xl font-semibold tracking-[0.18em] uppercase text-gray-800">Skills</h1>
                    <p class="mt-2 text-sm text-gray-500">Kelola skill untuk portfolio kamu.</p>
                </div>
                <a href="{{ route('skills.create') }}" class="btn-secondary">+ Add Skill</a>
            </div>

            <div class="divider"></div>

            @if($skills->isEmpty())
                <div class="rounded-xl border border-black/5 bg-white/70 backdrop-blur px-6 py-10 text-center">
                    <p class="text-gray-600">Belum ada skill. Tambahkan skill pertama kamu.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($skills as $skill)
                        <div class="rounded-xl border border-black/5 bg-white/80 backdrop-blur p-6 shadow-[0_12px_40px_rgba(0,0,0,0.06)]">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <h2 class="text-lg font-semibold text-gray-800">{{ $skill->name }}</h2>
                                    <p class="mt-1 text-xs tracking-[0.25em] uppercase text-gray-500">
                                        {{ $skill->category ?: 'uncategorized' }} • order {{ $skill->sort_order }}
                                    </p>
                                </div>
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('skills.edit', $skill) }}" class="text-sm underline underline-offset-4 text-gray-700 hover:text-[#8b7d6f]">Edit</a>
                                    <form method="POST" action="{{ route('skills.destroy', $skill) }}" onsubmit="return confirm('Hapus skill ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm underline underline-offset-4 text-red-600 hover:text-red-700">Hapus</button>
                                    </form>
                                </div>
                            </div>

                            <div class="mt-5">
                                <div class="flex items-center justify-between text-sm text-gray-600">
                                    <span>Level</span>
                                    <span class="font-semibold text-gray-800">{{ $skill->level }}%</span>
                                </div>
                                <div class="mt-2 h-2 rounded-full bg-black/5 overflow-hidden">
                                    <div class="h-full bg-gray-800" style="width: {{ $skill->level }}%"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
