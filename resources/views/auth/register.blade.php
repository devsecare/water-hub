@extends('layouts.frontend')

@section('title', 'Register - PPP Water Hub')

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
    <div class="bg-white rounded-2xl shadow-md p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-gray-900 mb-1">
            Register to create your account
        </h2>
        <p class="text-sm text-center text-gray-500 mb-6">
            Already registered? <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:underline">Log in</a>.
        </p>

        <form method="POST" action="{{ route('register') }}" class="space-y-4" novalidate>
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input id="name" name="name" type="text" required value="{{ old('name') }}"
                    class="w-full border border-gray-300 rounded-[20px] px-3 py-2 text-gray-900 text-[15px] bg-gray-100 focus:outline-none @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input id="email" name="email" type="email" required value="{{ old('email') }}"
                    class="w-full border border-gray-300 rounded-[20px] px-3 py-2 text-gray-900 text-[15px] bg-gray-100 focus:outline-none @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <div class="relative">
                    <input id="password" name="password" type="password" required
                        class="w-full border border-gray-300 rounded-[20px] px-3 py-2 pr-10 text-gray-900 text-[15px] bg-gray-100 focus:outline-none @error('password') border-red-500 @enderror">
                    <button type="button" id="togglePassword" class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-gray-600">
                        👁️
                    </button>
                </div>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required
                    class="w-full border border-gray-300 rounded-[20px] px-3 py-2 text-gray-900 text-[15px] bg-gray-100 focus:outline-none">
            </div>

            <button type="submit" class="w-full bg-[#37C6F4] text-white rounded-[20px] py-2 mt-2 text-[16px] font-medium transition">
                Register
            </button>
        </form>

        <p class="text-xs text-center text-gray-500 mt-6 leading-snug">
            By registering you agree with the
            <a href="#" class="text-blue-600 hover:underline">Terms and Conditions</a>
            and
            <a href="#" class="text-blue-600 hover:underline">Privacy Policy</a>.
        </p>
    </div>
</div>

@push('scripts')
<script>
    const togglePassword = document.getElementById("togglePassword");
    const password = document.getElementById("password");

    togglePassword.addEventListener("click", () => {
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        togglePassword.textContent = type === "password" ? "👁️" : "🙈";
    });
</script>
@endpush
@endsection
