@extends('layouts.frontend')

@section('title', 'Register - PPP Water Hub')

@section('content')
<!-- Registration/Login Overlay -->
<div class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center z-50" id="authModal">
    <div class="bg-white rounded-2xl shadow-xl p-8 w-full max-w-md mx-4 relative">
        <!-- Close Button -->
        <div class="close-form cursor-pointer absolute top-[-19px] right-[-15px] flex p-[5px] rounded-full border bg-white">
            <a href="{{ route('home') }}" class="flex"><span class="material-symbols-outlined">close</span></a>
        </div>

        <!-- Register Form (Shown by default on register page) -->
        <div id="registerForm">
            <h2 class="text-2xl font-bold text-center text-gray-900 mb-1" style="color: #1E1D57;">
                Register to create your account
            </h2>
            <p class="text-sm text-center text-gray-500 mb-6">
                Already registered? <a href="javascript:void(0)" id="showLogin" class="text-gray-900 font-medium hover:underline">Log in</a>.
            </p>

            <form id="registerFormElement" method="POST" action="{{ route('register') }}" class="space-y-4" novalidate>
                @csrf

                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                    <input id="first_name" name="first_name" type="text" required value="{{ old('first_name') }}"
                        class="w-full border border-gray-300 rounded-[20px] px-3 py-2 text-gray-900 text-[15px] bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#37C6F4] @error('first_name') border-red-500 @enderror">
                    @error('first_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="organisation" class="block text-sm font-medium text-gray-700 mb-1">Organisation</label>
                    <input id="organisation" name="organisation" type="text" value="{{ old('organisation') }}"
                        class="w-full border border-gray-300 rounded-[20px] px-3 py-2 text-gray-900 text-[15px] bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#37C6F4] @error('organisation') border-red-500 @enderror">
                    @error('organisation')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input id="email" name="email" type="email" required value="{{ old('email') }}"
                        class="w-full border border-gray-300 rounded-[20px] px-3 py-2 text-gray-900 text-[15px] bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#37C6F4] @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <input id="password" name="password" type="password" required
                            class="w-full border border-gray-300 rounded-[20px] px-3 py-2 pr-10 text-gray-900 text-[15px] bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#37C6F4] @error('password') border-red-500 @enderror">
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

                <button type="submit" class="w-full bg-[#37C6F4] hover:bg-[#1E1D57] text-[#1E1D57] hover:text-[#37C6F4] rounded-[20px] py-2.5 mt-2 text-[16px] font-medium transition">
                    Register
                </button>
            </form>

            <p class="text-xs text-center text-gray-500 mt-6 leading-snug">
                By registering you agree with the
                <a href="{{ route('termsofservice') }}" class="text-blue-600 hover:underline">Terms and Conditions</a>
                and
                <a href="{{ route('privacypolicy') }}" class="text-blue-600 hover:underline">Privacy Policy</a>.
            </p>
        </div>

        <!-- Login Form (Hidden by default on register page) -->
        <div id="loginForm" class="hidden">
            <h2 class="text-2xl font-bold text-center text-gray-900 mb-1" style="color: #1E1D57;">
                Sign in to your account
            </h2>
            <p class="text-sm text-center text-gray-500 mb-6">
                Don't have an account? <a href="javascript:void(0)" id="showRegister" class="text-gray-900 font-medium hover:underline">Register</a>.
            </p>

            <form id="loginFormElement" method="POST" action="{{ route('login') }}" class="space-y-4" novalidate>
                @csrf

                <div>
                    <label for="login_email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input id="login_email" name="email" type="email" required value="{{ old('email') }}"
                        class="w-full border border-gray-300 rounded-[20px] px-3 py-2 text-gray-900 text-[15px] bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#37C6F4] @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="login_password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <input id="login_password" name="password" type="password" required
                            class="w-full border border-gray-300 rounded-[20px] px-3 py-2 pr-10 text-gray-900 text-[15px] bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#37C6F4] @error('password') border-red-500 @enderror">
                        <button type="button" id="toggleLoginPassword" class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-gray-600">
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

                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-900">Remember me</label>
                </div>

                <button type="submit" class="w-full bg-[#37C6F4] hover:bg-[#1E1D57] text-[#1E1D57] hover:text-[#37C6F4] rounded-[20px] py-2.5 mt-2 text-[16px] font-medium transition">
                    Sign in
                </button>

                <div class="text-center">
                    <a href="{{ route('password.request') }}" class="text-gray-500 text-sm hover:text-gray-700 hover:underline">Lost your password?</a>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Toggle between login and register forms
    document.getElementById('showLogin')?.addEventListener('click', function() {
        document.getElementById('registerForm').classList.add('hidden');
        document.getElementById('loginForm').classList.remove('hidden');
    });

    document.getElementById('showRegister')?.addEventListener('click', function() {
        document.getElementById('loginForm').classList.add('hidden');
        document.getElementById('registerForm').classList.remove('hidden');
    });

    // Password toggle for register
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

    // Password toggle for login
    const toggleLoginPassword = document.getElementById("toggleLoginPassword");
    const loginPassword = document.getElementById("login_password");
    if (toggleLoginPassword && loginPassword) {
        toggleLoginPassword.addEventListener("click", () => {
            const type = loginPassword.getAttribute("type") === "password" ? "text" : "password";
            loginPassword.setAttribute("type", type);
            toggleLoginPassword.innerHTML = type === "password" 
                ? '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>'
                : '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>';
        });
    }

    // Handle form submissions with AJAX to stay on page
    document.getElementById('registerFormElement')?.addEventListener('submit', async function(e) {
        e.preventDefault();
        const form = this;
        const formData = new FormData(form);
        const submitButton = form.querySelector('button[type="submit"]');
        const originalText = submitButton.textContent;

        submitButton.disabled = true;
        submitButton.textContent = 'Registering...';

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                }
            });

            const data = await response.json();

            if (response.ok && data.success) {
                window.location.href = data.redirect || window.location.href;
            } else {
                // Handle validation errors
                if (data.errors) {
                    Object.keys(data.errors).forEach(field => {
                        const input = form.querySelector(`[name="${field}"]`);
                        if (input) {
                            input.classList.add('border-red-500');
                            const errorDiv = document.createElement('p');
                            errorDiv.className = 'text-red-500 text-sm mt-1';
                            errorDiv.textContent = data.errors[field][0];
                            input.parentNode.appendChild(errorDiv);
                        }
                    });
                }
                submitButton.disabled = false;
                submitButton.textContent = originalText;
            }
        } catch (error) {
            console.error('Error:', error);
            submitButton.disabled = false;
            submitButton.textContent = originalText;
        }
    });

    document.getElementById('loginFormElement')?.addEventListener('submit', async function(e) {
        e.preventDefault();
        const form = this;
        const formData = new FormData(form);
        const submitButton = form.querySelector('button[type="submit"]');
        const originalText = submitButton.textContent;

        submitButton.disabled = true;
        submitButton.textContent = 'Signing in...';

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                }
            });

            const data = await response.json();

            if (response.ok && data.success) {
                window.location.href = data.redirect || window.location.href;
            } else {
                // Handle errors
                if (data.errors) {
                    Object.keys(data.errors).forEach(field => {
                        const input = form.querySelector(`[name="${field}"]`);
                        if (input) {
                            input.classList.add('border-red-500');
                            const errorDiv = document.createElement('p');
                            errorDiv.className = 'text-red-500 text-sm mt-1';
                            errorDiv.textContent = data.errors[field][0];
                            input.parentNode.appendChild(errorDiv);
                        }
                    });
                }
                submitButton.disabled = false;
                submitButton.textContent = originalText;
            }
        } catch (error) {
            console.error('Error:', error);
            submitButton.disabled = false;
            submitButton.textContent = originalText;
        }
    });
</script>
@endpush
@endsection
