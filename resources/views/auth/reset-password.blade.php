@extends('layouts.frontend')

@section('title', 'Reset Password - PPP Water Hub')

@section('content')
<section class="px-6 lg:px-16 py-16 md:py-24">
    <div class="max-w-7xl mx-auto">
        <div class="max-w-md mx-auto">
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-1" style="color: #1E1D57;">
                        Reset your password
                    </h2>
                    <p class="text-sm text-gray-500 mt-2">
                        Enter your email and new password below.
                    </p>
                </div>

                <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input id="email" name="email" type="email" required
                            class="w-full border border-gray-300 rounded-[20px] px-3 py-2 text-gray-900 text-[15px] bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#37C6F4] @error('email') border-red-500 @enderror"
                            value="{{ old('email') }}"
                            placeholder="Enter your email address">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                        <div class="relative">
                            <input id="password" name="password" type="password" required
                                class="w-full border border-gray-300 rounded-[20px] px-3 py-2 pr-10 text-gray-900 text-[15px] bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#37C6F4] @error('password') border-red-500 @enderror"
                                placeholder="Enter new password">
                            <button type="button" id="togglePassword" class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                        <div class="relative">
                            <input id="password_confirmation" name="password_confirmation" type="password" required
                                class="w-full border border-gray-300 rounded-[20px] px-3 py-2 pr-10 text-gray-900 text-[15px] bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#37C6F4]"
                                placeholder="Confirm new password">
                            <button type="button" id="togglePasswordConfirmation" class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full bg-[#37C6F4] hover:bg-[#1E1D57] text-[#1E1D57] hover:text-[#37C6F4] rounded-[20px] py-2.5 mt-2 text-[16px] font-medium transition">
                            Reset Password
                        </button>
                    </div>
                </form>

                <div class="mt-6 text-center">
                    <a href="{{ route('login') }}" class="text-gray-500 text-sm hover:text-gray-700 hover:underline">
                        Back to login
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    // Password toggle functionality
    const togglePassword = document.getElementById("togglePassword");
    const password = document.getElementById("password");
    if (togglePassword && password) {
        togglePassword.addEventListener("click", () => {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            togglePassword.innerHTML = type === "password"
                ? '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>'
                : '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>';
        });
    }

    const togglePasswordConfirmation = document.getElementById("togglePasswordConfirmation");
    const passwordConfirmation = document.getElementById("password_confirmation");
    if (togglePasswordConfirmation && passwordConfirmation) {
        togglePasswordConfirmation.addEventListener("click", () => {
            const type = passwordConfirmation.getAttribute("type") === "password" ? "text" : "password";
            passwordConfirmation.setAttribute("type", type);
            togglePasswordConfirmation.innerHTML = type === "password"
                ? '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>'
                : '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>';
        });
    }
</script>
@endpush
@endsection

