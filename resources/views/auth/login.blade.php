@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <section class="container mx-auto px-8 py-16">
        <div class="max-w-md mx-auto">
            <div class="bg-white/80 backdrop-blur rounded-xl border border-black/5 shadow-[0_20px_60px_rgba(0,0,0,0.08)] overflow-hidden">
                <div class="px-8 pt-10 pb-6 text-center">
                    <h1 class="text-2xl font-semibold tracking-[0.2em] text-gray-800 uppercase">Welcome Back</h1>
                    <p class="mt-2 text-sm text-gray-500 tracking-wide">Login untuk melanjutkan</p>
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

                    <form method="POST" action="{{ route('login.store') }}" class="space-y-5">
                        @csrf

                        <div>
                            <label class="block text-xs font-semibold tracking-[0.2em] uppercase text-gray-600" for="email">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                                   class="mt-2 w-full rounded-lg border border-black/10 bg-white px-4 py-3 text-sm outline-none focus:border-gray-400 focus:ring-2 focus:ring-gray-200" />
                        </div>

                        <div>
                            <label class="block text-xs font-semibold tracking-[0.2em] uppercase text-gray-600" for="password">Password</label>
                            <input id="password" name="password" type="password" required
                                   class="mt-2 w-full rounded-lg border border-black/10 bg-white px-4 py-3 text-sm outline-none focus:border-gray-400 focus:ring-2 focus:ring-gray-200" />
                        </div>

                        <div class="flex items-center justify-between">
                            <label class="flex items-center gap-2 text-sm text-gray-600">
                                <input type="checkbox" name="remember" class="rounded border-black/20" />
                                Remember
                            </label>

                            <a href="{{ route('register.show') }}" class="text-sm text-gray-700 hover:text-[#8b7d6f] underline underline-offset-4">
                                Buat akun
                            </a>
                        </div>

                        <button type="submit" class="w-full btn-primary !rounded-lg !py-3">
                            Login
                        </button>

                        <div class="pt-2 text-center text-sm text-gray-500">
                            <span>Belum punya akun?</span>
                            <a href="{{ route('register.show') }}" class="text-gray-700 hover:text-[#8b7d6f] underline underline-offset-4">Register</a>
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
