@extends('layouts.frontend')

@section('title', 'PPP Water Hub')

@section('content')

<script src="https://unpkg.com/lucide@latest"></script>

<!-- HEADER SECTION -->
<section class="bg-gradient-to-r from-[#070648] to-[#2C75BE] text-white px-6 lg:px-16">
  <div class="max-w-7xl mx-auto py-20 sm:py-24 lg:py-28">
    <p class="text-xl text-[#37C6F4] font-semibold mb-2">MY ACCOUNT</p>
    <h1 class="text-3xl font-appetite sm:text-5xl font-bold leading-tight max-w-3xl">

    </h1>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
  </div>
</section>

<!-- MAIN SECTION -->
<section class=" bg-[#F7F7F7] lg:px-16 lg:py-16 py-8">
  <div class="max-w-7xl  mx-auto  flex flex-col md:flex-row">

    <!-- SIDEBAR -->
    <aside class="w-1/2 md:w-[35%] lg:w-[30%] p-6 lg:px-0 lg:pr-6">
      <h2 class="text-xl text-[#1E1D57] font-semibold mb-6">Filter</h2>

      <div class="space-y-6">

        <label class="flex text-[16px] items-center space-x-2 text-[#1E1D57] font-semibold">
          <svg id="book-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path id="Path_395" data-name="Path 395"
              d="M6,22a3,3,0,0,1-3.01-3.01V5a2.9,2.9,0,0,1,.88-2.13A2.883,2.883,0,0,1,6,1.99H17v16H6a1,1,0,1,0,0,2H19V4h2V22Zm3-6h6V4H9ZM7,16V4H6A.99.99,0,0,0,5,5V16.18c.17-.05.33-.09.49-.13A2.1,2.1,0,0,1,6,16H7ZM5,4V4Z"
              fill="#1e1d57"></path>
            <rect id="Rectangle_50" data-name="Rectangle 50" width="24" height="24" fill="none"></rect>
          </svg> My saved content
        </label>

    

      </div>
      <div class="w-full mt-6">
        <label class="block text-lg font-semibold text-[#000000] mb-3">Search</label>
        <div class="relative">
          <input type="text" id="my-account-search" placeholder="Search…" class="w-full bg-white shadow-sm rounded-full py-3 pl-4 pr-10 text-gray-700 
                   placeholder-gray-400 focus:ring-0 focus:outline-none">

          <!-- Search Icon -->
          <span class="absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18.095 18.095">
              <path
                d="M16.681,18.1h0l-5.145-5.145a7.2,7.2,0,1,1,1.414-1.414L18.1,16.681l-1.413,1.413ZM7.2,2a5.2,5.2,0,1,0,5.2,5.2A5.206,5.206,0,0,0,7.2,2Z"
                fill="#37c6f4" />
            </svg>
          </span>
        </div>
      </div>


      <div class="flex flex-col gap-4 max-w-xs py-8  rounded-md">
        <!-- Account details link -->
        <a href="#" class="flex items-center gap-3  py-2 rounded-md  ">
          <!-- Gear SVG -->
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none">
            <path
              d="M9.25,22l-.4-3.2a3.144,3.144,0,0,1-.61-.3c-.19-.12-.38-.24-.56-.38L4.7,19.37,1.95,14.62l2.58-1.95a2.041,2.041,0,0,1-.03-.34v-.68a1.343,1.343,0,0,1,.03-.34L1.95,9.36,4.7,4.61,7.68,5.86c.18-.13.38-.26.58-.38a4.2,4.2,0,0,1,.6-.3l.4-3.2h5.5l.4,3.2a3.144,3.144,0,0,1,.61.3c.19.12.38.24.56.38l2.98-1.25,2.75,4.75-2.58,1.95a2.041,2.041,0,0,1,.03.34v.68a1.4,1.4,0,0,1-.05.34l2.58,1.95-2.75,4.75-2.95-1.25c-.18.13-.38.26-.58.38a4.2,4.2,0,0,1-.6.3l-.4,3.2H9.26ZM11,20h1.98l.35-2.65a5.387,5.387,0,0,0,1.44-.59,5.782,5.782,0,0,0,1.21-.94l2.48,1.03.98-1.7-2.15-1.63a4.214,4.214,0,0,0,.18-.74,5.158,5.158,0,0,0,.05-.79,6.838,6.838,0,0,0-.05-.79,3.079,3.079,0,0,0-.18-.74l2.15-1.63-.98-1.7L15.98,8.18a5.808,5.808,0,0,0-1.21-.96,5.735,5.735,0,0,0-1.44-.59L13,3.98H11.02l-.35,2.65a5.387,5.387,0,0,0-1.44.59,5.782,5.782,0,0,0-1.21.94L5.54,7.13l-.98,1.7,2.15,1.6a4.548,4.548,0,0,0-.23,1.55,6.527,6.527,0,0,0,.05.78,3.409,3.409,0,0,0,.18.75L4.56,15.14l.98,1.7,2.48-1.05a5.808,5.808,0,0,0,1.21.96,5.735,5.735,0,0,0,1.44.59L11,19.99Zm1.05-4.5a3.517,3.517,0,0,0,3.51-3.51,3.517,3.517,0,0,0-3.51-3.51,3.483,3.483,0,0,0-3.5,3.51,3.428,3.428,0,0,0,1.01,2.48,3.327,3.327,0,0,0,2.49,1.03Z"
              fill="#1e1d57"></path>
            <rect width="24" height="24" fill="none"></rect>
          </svg>
          <span class="text-[16px] text-[#000000] font-normal">Account details</span>
        </a>

        <!-- Sign out link -->
        <a href="{{ route('logout') }}" class="flex items-center gap-3  py-2 rounded-md  " onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <!-- Sign out SVG -->
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none">
            <rect width="24" height="24" fill="none"></rect>
            <path
              d="M5,21a1.926,1.926,0,0,1-1.41-.59A1.926,1.926,0,0,1,3,19V5a1.926,1.926,0,0,1,.59-1.41A1.926,1.926,0,0,1,5,3h7V5H5V19h7v2Zm11-4-1.38-1.45L17.17,13H8.99V11h8.18L14.62,8.45,16,7l5,5Z"
              fill="#1e1d57"></path>
          </svg>
          <span class="text-[16px] text-[#000000] font-normal">Sign out</span>
        </a>
      </div>
    </aside>

    <!-- MAIN CONTENT -->
   <div class="bg-white rounded-2xl shadow-xl p-8 w-full max-w-md mx-4 relative">
        <!-- Register Form -->
        <div id="registerForm">



            <form id="registerFormElement" method="POST" action="{{ route('login') }}" class="space-y-4" novalidate="">
                <input type="hidden" name="_token" value="Sca0BxOdZY9KccbHe5oVs9putrnNpQ3OPebUt4hs" autocomplete="off">
                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                    <input id="first_name" name="first_name" type="text" required="" value="" class="w-full border border-gray-300 rounded-[20px] px-3 py-2 text-gray-900 text-[15px] bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#37C6F4] ">
                </div>

                <div>
                    <label for="organisation" class="block text-sm font-medium text-gray-700 mb-1">Organisation</label>
                    <input id="organisation" name="organisation" type="text" value="" class="w-full border border-gray-300 rounded-[20px] px-3 py-2 text-gray-900 text-[15px] bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#37C6F4] ">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input id="email" name="email" type="email" required="" value="" class="w-full border border-gray-300 rounded-[20px] px-3 py-2 text-gray-900 text-[15px] bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#37C6F4] ">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <input id="password" name="password" type="password" required="" class="w-full border border-gray-300 rounded-[20px] px-3 py-2 pr-10 text-gray-900 text-[15px] bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#37C6F4] ">
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                    <div class="relative">
                        <input id="password" name="password" type="password" required="" class="w-full border border-gray-300 rounded-[20px] px-3 py-2 pr-10 text-gray-900 text-[15px] bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#37C6F4] ">
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                    </div>
                </div>
                <button type="submit" class="w-full bg-[#37C6F4] text-white rounded-[20px] py-2.5 mt-2 text-[16px] font-medium transition hover:bg-[#2CB0D9] hidden">
                    Register
                </button>
            </form>


        </div>

        <!-- Login Form -->
        <div id="loginForm" class="hidden">
            <h2 class="text-2xl font-bold text-center text-gray-900 mb-1" style="color: #1E1D57;">
                Sign in to your account
            </h2>
            <p class="text-sm text-center text-gray-500 mb-6">
                Don't have an account? <a href="javascript:void(0)" id="showRegister" class="text-blue-600 font-medium hover:underline">Register</a>.
            </p>

            <form id="loginFormElement" method="POST" action="{{ route('register') }}" class="space-y-4" novalidate="">
                <input type="hidden" name="_token" value="Sca0BxOdZY9KccbHe5oVs9putrnNpQ3OPebUt4hs" autocomplete="off">
                <div>
                    <label for="login_email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input id="login_email" name="email" type="email" required="" value="" class="w-full border border-gray-300 rounded-[20px] px-3 py-2 text-gray-900 text-[15px] bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#37C6F4] ">
                </div>

                <div>
                    <label for="login_password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <input id="login_password" name="password" type="password" required="" class="w-full border border-gray-300 rounded-[20px] px-3 py-2 pr-10 text-gray-900 text-[15px] bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#37C6F4] ">
                        <button type="button" id="toggleLoginPassword" class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                    </div>
                </div>

                <button type="submit" class="w-full bg-[#37C6F4] text-white rounded-[20px] py-2.5 mt-2 text-[16px] font-medium transition hover:bg-[#2CB0D9]">
                    Sign in
                </button>
            </form>
        </div>
    </div>

  </div>
</section>

<!-- waves  -->

<div class=" bottom-0 left-0 right-0 bg-[#F7F7F7]">
  <svg class="w-full h-[30px] md:h-[80px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 24 150 28"
    preserveAspectRatio="none">
    <defs>
      <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s58 18 88 18 
        58-18 88-18 58 18 88 18v44h-352z" />
    </defs>
    <g class="parallax">
      <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(30, 29, 87, 0.25)" />
      <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(30, 29, 87, 0.49)" />
      <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(55, 198, 244, 0.49)" />
      <use xlink:href="#gentle-wave" x="48" y="7" fill="#1E1D57" />
    </g>
  </svg>
</div>


@push('scripts')

@endpush

@endsection