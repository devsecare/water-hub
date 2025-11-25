@extends('layouts.frontend')

@section('title', 'Login - PPP Water Hub')

@push('styles')
<style>
    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
    }
</style>
@endpush

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-2xl shadow-md p-8 w-full max-w-sm">
        <!-- Title -->
        <h2 class="text-2xl font-bold text-center text-gray-900">Sign in to your account</h2>
        <p class="text-center text-gray-500 mt-2">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-gray-500 hover:underline font-medium">Register.</a>
        </p>

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-4" novalidate>
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full text-gray-900 text-[15px] px-3 py-2 rounded-[20px] bg-gray-100 focus:outline-none @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="relative">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="password" required
                       class="w-full px-3 py-2 rounded-[20px] bg-gray-100 focus:outline-none pr-10 @error('password') border-red-500 @enderror">
                <button type="button" id="togglePassword" class="absolute inset-y-0 right-3 top-6 flex items-center text-gray-400 hover:text-gray-600">
                    <span class="material-symbols-outlined">visibility_off</span>
                </button>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-sm text-gray-900">Remember me</label>
            </div>

            <!-- Login Button -->
            <button type="submit" class="w-full py-3 bg-[#37C6F4] hover:bg-[#1E1D57] text-[#1E1D57] hover:text-[#37C6F4] font-medium rounded-full transition duration-200">
                Log in
            </button>

            <!-- Forgot Password -->
            <div class="text-center">
                <a href="{{ route('password.request') }}" class="text-gray-500 text-sm hover:text-gray-700 hover:underline">Lost your password?</a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', () => {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
         togglePassword.innerHTML = type === "password" ? '<span class="material-symbols-outlined">visibility_off</span>' : '<span class="material-symbols-outlined">visibility</span>';
    });
</script>
@endpush
@endsection
