@extends('layouts.app')

@section('title', 'Edit Skill')

@section('content')
    <section class="container mx-auto px-8 py-16">
        <div class="max-w-xl mx-auto">
            <div class="flex items-center justify-between gap-4">
                <h1 class="text-2xl font-semibold tracking-[0.18em] uppercase text-gray-800">Edit Skill</h1>
                <a href="{{ route('skills.index') }}" class="text-xs tracking-[0.2em] uppercase text-gray-600 hover:text-gray-900">Back</a>
            </div>

            <div class="divider"></div>

            @if ($errors->any())
                <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="skillForm" method="POST" action="{{ route('skills.update', $skill) }}" class="bg-white/80 backdrop-blur rounded-xl border border-black/5 shadow-[0_20px_60px_rgba(0,0,0,0.08)] p-8 space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs font-semibold tracking-[0.2em] uppercase text-gray-600" for="name">Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name', $skill->name) }}" required maxlength="100"
                           class="mt-2 w-full rounded-lg border border-black/10 bg-white px-4 py-3 text-sm outline-none focus:border-gray-400 focus:ring-2 focus:ring-gray-200" />
                    <p class="mt-2 text-xs text-gray-500" id="nameError"></p>
                </div>

                <div>
                    <label class="block text-xs font-semibold tracking-[0.2em] uppercase text-gray-600" for="level">Level (1-100)</label>
                    <input id="level" name="level" type="number" value="{{ old('level', $skill->level) }}" required min="1" max="100"
                           class="mt-2 w-full rounded-lg border border-black/10 bg-white px-4 py-3 text-sm outline-none focus:border-gray-400 focus:ring-2 focus:ring-gray-200" />
                    <p class="mt-2 text-xs text-gray-500" id="levelError"></p>
                </div>

                <div>
                    <label class="block text-xs font-semibold tracking-[0.2em] uppercase text-gray-600" for="category">Category (optional)</label>
                    <input id="category" name="category" type="text" value="{{ old('category', $skill->category) }}" maxlength="50"
                           class="mt-2 w-full rounded-lg border border-black/10 bg-white px-4 py-3 text-sm outline-none focus:border-gray-400 focus:ring-2 focus:ring-gray-200" />
                </div>

                <div>
                    <label class="block text-xs font-semibold tracking-[0.2em] uppercase text-gray-600" for="sort_order">Sort Order</label>
                    <input id="sort_order" name="sort_order" type="number" value="{{ old('sort_order', $skill->sort_order) }}" min="0" max="65535"
                           class="mt-2 w-full rounded-lg border border-black/10 bg-white px-4 py-3 text-sm outline-none focus:border-gray-400 focus:ring-2 focus:ring-gray-200" />
                </div>

                <button type="submit" class="w-full btn-primary !rounded-lg !py-3">Update</button>
            </form>
        </div>
    </section>

    <script>
        // Client-side validation (simple)
        (function () {
            const form = document.getElementById('skillForm');
            if (!form) return;

            const name = document.getElementById('name');
            const level = document.getElementById('level');
            const nameError = document.getElementById('nameError');
            const levelError = document.getElementById('levelError');

            const setError = (el, msg) => {
                el.textContent = msg || '';
            };

            form.addEventListener('submit', (e) => {
                let ok = true;

                setError(nameError, '');
                setError(levelError, '');

                if (!name.value.trim()) {
                    ok = false;
                    setError(nameError, 'Name wajib diisi.');
                } else if (name.value.trim().length > 100) {
                    ok = false;
                    setError(nameError, 'Maksimal 100 karakter.');
                }

                const lvl = Number(level.value);
                if (!Number.isFinite(lvl) || lvl < 1 || lvl > 100) {
                    ok = false;
                    setError(levelError, 'Level harus 1 sampai 100.');
                }

                if (!ok) e.preventDefault();
            });
        })();
    </script>
@endsection
