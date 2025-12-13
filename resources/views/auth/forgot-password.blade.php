@extends('layouts.frontend')

@section('title', 'Forgot Password - PPP Water Hub')

@section('content')
<section class="px-6 lg:px-16 py-16 md:py-24">
    <div class="max-w-7xl mx-auto">
        <div class="max-w-md mx-auto">
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-1" style="color: #1E1D57;">
                        Forgot your password?
                    </h2>
                    <p class="text-sm text-gray-500 mt-2">
                        No problem. Just let us know your email address and we will email you a password reset link.
                    </p>
                </div>

                <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                    @csrf

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

                    @if (session('status'))
                        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg text-sm">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <button type="submit"
                            class="w-full bg-[#37C6F4] hover:bg-[#1E1D57] text-[#1E1D57] hover:text-[#37C6F4] rounded-[20px] py-2.5 mt-2 text-[16px] font-medium transition">
                            Email Password Reset Link
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
@endsection

