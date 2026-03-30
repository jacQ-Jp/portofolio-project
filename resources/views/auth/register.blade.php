@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <section class="container mx-auto px-8 py-16">
        <div class="max-w-md mx-auto">
            <div class="bg-white/80 backdrop-blur rounded-xl border border-black/5 shadow-[0_20px_60px_rgba(0,0,0,0.08)] overflow-hidden">
                <div class="px-8 pt-10 pb-6 text-center">
                    <h1 class="text-2xl font-semibold tracking-[0.2em] text-gray-800 uppercase">Create Account</h1>
                    <p class="mt-2 text-sm text-gray-500 tracking-wide">Register biar bisa login</p>
                </div>

                <div class="px-8 pb-10">
                    @if ($errors->any())
                        <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register.store') }}" class="space-y-5">
                        @csrf

                        <div>
                            <label class="block text-xs font-semibold tracking-[0.2em] uppercase text-gray-600" for="name">Name</label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                                   class="mt-2 w-full rounded-lg border border-black/10 bg-white px-4 py-3 text-sm outline-none focus:border-gray-400 focus:ring-2 focus:ring-gray-200" />
                        </div>

                        <div>
                            <label class="block text-xs font-semibold tracking-[0.2em] uppercase text-gray-600" for="email">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required
                                   class="mt-2 w-full rounded-lg border border-black/10 bg-white px-4 py-3 text-sm outline-none focus:border-gray-400 focus:ring-2 focus:ring-gray-200" />
                        </div>

                        <div>
                            <label class="block text-xs font-semibold tracking-[0.2em] uppercase text-gray-600" for="password">Password</label>
                            <input id="password" name="password" type="password" required
                                   class="mt-2 w-full rounded-lg border border-black/10 bg-white px-4 py-3 text-sm outline-none focus:border-gray-400 focus:ring-2 focus:ring-gray-200" />
                            <p class="mt-2 text-xs text-gray-500">Min 8 karakter.</p>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold tracking-[0.2em] uppercase text-gray-600" for="password_confirmation">Confirm Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" required
                                   class="mt-2 w-full rounded-lg border border-black/10 bg-white px-4 py-3 text-sm outline-none focus:border-gray-400 focus:ring-2 focus:ring-gray-200" />
                        </div>

                        <button type="submit" class="w-full btn-primary !rounded-lg !py-3">
                            Register
                        </button>

                        <div class="pt-2 text-center text-sm text-gray-500">
                            <span>Sudah punya akun?</span>
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-[#8b7d6f] underline underline-offset-4">Login</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="mt-10 text-center">
                <a href="{{ route('projects.index') }}" class="text-xs tracking-[0.2em] uppercase text-gray-600 hover:text-gray-900">← Back to Portfolio</a>
            </div>
        </div>
    </section>
@endsection
