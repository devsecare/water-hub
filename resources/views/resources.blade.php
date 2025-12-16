@extends('layouts.frontend')

@section('title', 'Water PPP Resources - PPP Water Hub')

@push('styles')
<script src="https://unpkg.com/lucide@latest"></script>
@endpush

@section('content')
@if(isset($requiresAuth) && $requiresAuth)
<!-- Registration/Login Overlay for Guest Users -->
<div class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center z-50" id="authModal">
    <div class="bg-white rounded-2xl shadow-xl p-8 w-full max-w-md mx-4 relative">
        <!-- Register Form -->
         <div class="close-form cursor-pointer absolute top-[-19px] right-[-15px] flex p-[5px] rounded-full border bg-white">
            <a href="/" class="flex"><span class="material-symbols-outlined">close</span></a>
         </div>
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

                <button type="submit" class="w-full bg-[#37C6F4] hover:bg-[#1E1D57] text-[#1E1D57] hover:text-[#37C6F4] rounded-[20px] py-2.5 mt-2 text-[16px] font-medium transition ">
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

        <!-- Login Form -->
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

                <button type="submit" class="w-full bg-[#37C6F4] hover:bg-[#1E1D57] text-[#1E1D57] hover:text-[#37C6F4] rounded-[20px] py-2.5 mt-2 text-[16px] font-medium transition">
                    Sign in
                </button>
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
        });
    }

    // Password toggle for login
    const toggleLoginPassword = document.getElementById("toggleLoginPassword");
    const loginPassword = document.getElementById("login_password");
    if (toggleLoginPassword && loginPassword) {
        toggleLoginPassword.addEventListener("click", () => {
            const type = loginPassword.getAttribute("type") === "password" ? "text" : "password";
            loginPassword.setAttribute("type", type);
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
@endif

@if(!isset($requiresAuth) || !$requiresAuth)
<!-- ✅ HERO -->
<section class="bg-gradient-to-r from-[#070648] to-[#2CBE9D] text-white px-6 lg:px-16">
    <div class="max-w-7xl mx-auto  py-20 sm:py-24 lg:py-28">
        <h1 class="text-lg text-[#37C6F4] font-semibold mb-2">WATER PPP RESOURCES</h1>
        <p class="text-3xl font-appetite sm:text-5xl font-bold leading-none max-w-[710px]">
            Everything You Need To Identify, Prepare, Implement And Manage Your PPP Project
        </p>
    </div>
</section>

 <!-- intro section start  -->
<section class="px-6 lg:px-16 lg:py-20 py-10 ">
    <div class="max-w-7xl mx-auto">
        <p class="text-[#1E1D57] text-lg font-bold max-w-[604px]"> Browse by category to find the guidance you need – from foundational PPP concepts to contract management and
            monitoring. Bookmark resources to save and view them in your account, or download documents, audio, and
            video
            files to access offline anytime.
        </p>
    </div>
</section>
 <!-- intro section end  -->


<!-- ✅ MAIN -->
<section class="bg-[#f2f2f2]  lg:px-16 py-12 sm:py-16 lg:py-20">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row min-h-screen">
        <!--  mobile Sidebar -->
        <div class="mob-search-filters relative md:hidden z-10">
            <div class="filter-main-tab py-8 pb-2">
                <button
                    class="search-filter-open-close bg-[#1E1D57] flex text-[#fff] gap-4 py-3 px-6 rounded-r-[25px] w-full max-w-[350px] justify-between items-center">
                    Search and Filter results
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="16.403" height="16.403"
                            viewBox="0 0 16.403 16.403">
                            <path id="discover_tune_24dp_5F6368_FILL0_wght400_GRAD0_opsz24_1_"
                                data-name="discover_tune_24dp_5F6368_FILL0_wght400_GRAD0_opsz24 (1)"
                                d="M129.113-834.532v-1.823h2.734V-840h1.823v3.645H136.4v1.823Zm2.734,10.936v-9.113h1.823v9.113Zm-9.113,0v-3.645H120v-1.823h7.29v1.823h-2.734v3.645Zm0-7.29V-840h1.823v9.113Z"
                                transform="translate(-120 840)" fill="#fff" />
                        </svg>
                    </span>
                </button>
            </div>
            <div
                class="mobile-filter-list absolute top-full bg-white py-6 px-6 rounded-r-[24px] -left-100 transition-all duration-300 w-full max-w-[350px]">

                @include('helpers.resources-filter')


            </div>
        </div>
        <!-- side bar desktop  -->
        <aside class="w-full md:w-64 lg:w-[20rem] p-6 lg:p-0 hidden md:block">
            @include('helpers.resources-filter')
        </aside>

        <!-- ✅ MAIN CONTENT -->
        <main class="flex-1 p-6">
            <!-- Cards -->
            <div id="card-container" class="grid grid-cols-1 lg:w-[100%] sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-6 [@media(min-width:768px)_and_(max-width:830px)]:grid-cols-1"></div>
            <!-- No Data Message -->
            <div id="no-data-message" class="hidden text-center py-12">
                <p class="text-[#868686] text-lg">No resources found for the selected category.</p>
            </div>
            <!-- Pagination -->
            <div class="flex justify-center mt-6 space-x-2 hidden" id="pagination-container">
                <button onclick="prevPage()"
                    class="text-[#ababab] hover:text-[#1E1D57] transition-colors duration-300 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
                        fill="currentColor">
                        <g transform="translate(-781 -2356)">
                            <rect width="40" height="40" transform="translate(781 2356)" fill="none" />
                            <path
                                d="M17.617,18.763l5.159,5.159-2.345,2.4L12.894,18.78l7.537-7.537,2.345,2.4L17.617,18.8Zm1.139,16.749a16.21,16.21,0,0,0,6.532-1.323A16.731,16.731,0,0,0,34.2,25.279a16.21,16.21,0,0,0,1.323-6.532A16.21,16.21,0,0,0,34.2,12.214,16.731,16.731,0,0,0,25.289,3.3,16.21,16.21,0,0,0,18.756,1.98,16.21,16.21,0,0,0,12.224,3.3a16.731,16.731,0,0,0-8.911,8.911A16.21,16.21,0,0,0,1.99,18.746a16.21,16.21,0,0,0,1.323,6.532,16.731,16.731,0,0,0,8.911,8.911A16.21,16.21,0,0,0,18.756,35.512Zm0-3.35a12.968,12.968,0,0,1-9.514-3.9,12.941,12.941,0,0,1-3.9-9.514,12.941,12.941,0,0,1,3.9-9.514,12.941,12.941,0,0,1,9.514-3.9,12.941,12.941,0,0,1,9.514,3.9,12.941,12.941,0,0,1,3.9,9.514,12.941,12.941,0,0,1-3.9,9.514A12.941,12.941,0,0,1,18.756,32.163Z"
                                transform="translate(781.744 2356.738)" />
                        </g>
                    </svg>
                </button>
                <button onclick="nextPage()" class="text-[#ababab] hover:text-[#1E1D57] transition-colors duration-300">
                    <svg class="-rotate-180" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                        viewBox="0 0 40 40" fill="currentColor">
                        <g transform="translate(-781 -2356)">
                            <rect width="40" height="40" transform="translate(781 2356)" fill="none" />
                            <path
                                d="M17.617,18.763l5.159,5.159-2.345,2.4L12.894,18.78l7.537-7.537,2.345,2.4L17.617,18.8Zm1.139,16.749a16.21,16.21,0,0,0,6.532-1.323A16.731,16.731,0,0,0,34.2,25.279a16.21,16.21,0,0,0,1.323-6.532A16.21,16.21,0,0,0,34.2,12.214,16.731,16.731,0,0,0,25.289,3.3,16.21,16.21,0,0,0,18.756,1.98,16.21,16.21,0,0,0,12.224,3.3a16.731,16.731,0,0,0-8.911,8.911A16.21,16.21,0,0,0,1.99,18.746a16.21,16.21,0,0,0,1.323,6.532,16.731,16.731,0,0,0,8.911,8.911A16.21,16.21,0,0,0,18.756,35.512Zm0-3.35a12.968,12.968,0,0,1-9.514-3.9,12.941,12.941,0,0,1-3.9-9.514,12.941,12.941,0,0,1,3.9-9.514,12.941,12.941,0,0,1,9.514-3.9,12.941,12.941,0,0,1,9.514,3.9,12.941,12.941,0,0,1,3.9,9.514,12.941,12.941,0,0,1-3.9,9.514A12.941,12.941,0,0,1,18.756,32.163Z"
                                transform="translate(781.744 2356.738)" />
                        </g>
                    </svg>
                </button>
            </div>
        </main>
    </div>
</section>

<!-- ✅ MODAL -->
<div id="productModal"
    class="hidden fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center z-50 transition-all duration-300">
    <div
        class="bg-white rounded-2xl shadow-xl max-w-[51rem] w-[90%] md:w-[70%] p-8 relative animate-fadeIn overflow-auto h-full max-h-fit">
        <button onclick="closeModal()" class="absolute md:top-5 md:right-5 top-8 right-2 text-gray-600 hover:text-black z-10 cursor-pointer">
            <i data-lucide="x" class="w-6 h-6"></i>
        </button>

        <div class="flex flex-col md:flex-row">
            <!-- Left gradient -->
            <div id="modalColorBox"
                class="p-8 text-white rounded-2xl w-full max-h-fit md:w-1/2 flex flex-col justify-between min-h-[360px]">
                <div>
                    <h3 id="modalTitle" class="text-2xl font-semibold leading-snug mb-3">title goes here</h3>
                    <p id="modalPublisher" class="text-sm opacity-90 mb-4">Publisher name here</p>
                </div>
                <div class="flex items-center gap-2 mt-auto">
                    <span id="modalIcon" class="material-symbols-outlined text-sm">folder</span>
                    <span id="modalType" class="text-sm">Guide</span>
                </div>
            </div>

            <!-- Right content -->
            <div class="flex-1 bg-white p-8 text-gray-700 text-sm leading-relaxed flex flex-col justify-between">
                <div>
                    <p class="font-semibold text-black mb-2 hidden">Short description:</p>
                    <div id="modalDescription" class="prose prose-sm max-w-none space-y-6  [&>ul]:list-disc [&>ul]:pl-6">
                        Summarise what they will get from the document and also mention the kinds of support files
                        available. Audio, video etc.
                    </div>
                </div>

            </div>
        </div>
        <!-- Buttons fixed at the bottom section -->
        <div class=" mt-8 pt-4 flex justify-between flex-wrap gap-4 text-gray-700 text-sm">
            <div class="flex flex-wrap gap-6">
                <button class="flex items-center gap-2 cursor-pointer hover:text-[#37C6F4] duration-250" id="modalBookmarkBtn" onclick="toggleBookmarkFromModal(this)"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" data-lucide="bookmark" class="lucide lucide-bookmark w-4 h-4">
                        <path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"></path>
                    </svg>Add to
                    your library</button>
                <button class="flex items-center gap-2 cursor-pointer hover:text-[#37C6F4] duration-250" onclick="downloadFileFromModal()"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" data-lucide="download" class="lucide lucide-download w-4 h-4">
                        <path d="M12 15V3"></path>
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <path d="m7 10 5 5 5-5"></path>
                    </svg>Download
                    file</button>
                <button class="flex items-center gap-2 cursor-pointer hover:text-[#37C6F4] duration-250" onclick="shareItemFromModal()"><span class="material-symbols-outlined">share</span>Share</button>
            </div>
            <button class="flex items-center gap-2 font-semibold underline cursor-pointer hover:text-[#37C6F4] duration-250" onclick="openItemPage()"><svg xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" data-lucide="more-horizontal"
                    class="lucide lucide-more-horizontal w-4 h-4">
                    <circle cx="12" cy="12" r="1"></circle>
                    <circle cx="19" cy="12" r="1"></circle>
                    <circle cx="5" cy="12" r="1"></circle>
                </svg>More options…</button>
        </div>
    </div>
</div>

<!-- waves  -->
<!-- <div class=" bottom-0 left-0 right-0 bg-[#f2f2f2]">
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
</div> -->


<div class="overlay-btm"></div>
@endif
@endsection

@if(!isset($requiresAuth) || !$requiresAuth)
@push('scripts')
<script>
    (function() {
    const itemsData = @json($items);
    const cardsPerPage = 12;
    let currentPage = 1;
    let filteredData = [...itemsData];
    let activeFilter = 'all';
    let activeCategoryId = null;

    function formatGradient(color) {
        // Start color is always #0E1C62, end color is dynamic based on category
        const startColor = '#070648';
        const endColor = color || '#2CBFA0'; // Use category color or default
        return `background: linear-gradient(to bottom, ${startColor}, ${endColor});`;
    }

    function renderCards() {
        const container = document.getElementById("card-container");
        const noDataMessage = document.getElementById("no-data-message");
        const paginationContainer = document.getElementById("pagination-container");

        container.innerHTML = "";

        // Show/hide no data message and pagination
        if (filteredData.length === 0) {
            noDataMessage.classList.remove("hidden");
            if (paginationContainer) {
                paginationContainer.classList.add("hidden");
            }
            return;
        } else {
            noDataMessage.classList.add("hidden");
            // Calculate total pages and only show pagination if more than 1 page
            const totalPages = Math.ceil(filteredData.length / cardsPerPage);
            if (paginationContainer) {
                if (totalPages > 1) {
                    paginationContainer.classList.remove("hidden");
                } else {
                    paginationContainer.classList.add("hidden");
                }
            }
        }

        const start = (currentPage - 1) * cardsPerPage;
        const end = start + cardsPerPage;
        const visibleCards = filteredData.slice(start, end);

        visibleCards.forEach((card) => {
            const gradientStyle = formatGradient(card.category_color);
            const titleEscaped = card.title.replace(/'/g, "\\'").replace(/"/g, '&quot;');
            // Escape for JavaScript string in HTML attribute
            const titleForShare = (card.title || '').replace(/\\/g, '\\\\').replace(/'/g, "\\'").replace(/"/g, '\\"');
            const slugEscaped = (card.slug || '').replace(/\\/g, '\\\\').replace(/'/g, "\\'").replace(/"/g, '\\"');
            const publisherEscaped = (card.publisher || '').replace(/'/g, "\\'").replace(/"/g, '&quot;');
            const descriptionEscaped = (card.short_description || card.description || '').replace(/'/g, "\\'").replace(/"/g, '&quot;');

            container.innerHTML += `
                <div class="bg-white shadow-md p-6 rounded-[25px] flex flex-col justify-between">
                    <div onclick="openItemPage('${slugEscaped}')" style="${gradientStyle}" class="shadow-[0_8px_12px_rgba(0,0,0,0.4)] shadow-2xl text-white p-6 rounded-[15px] min-h-[337px] flex flex-col justify-between flex-grow drop-shadow-[0 2px 4px rgba(0,0,0, 0.50)] cursor-pointer features-card">
                        <div>
                            <h3 class="font-semibold text-lg leading-snug">${card.title}</h3>
                            <p class="text-sm mt-2 opacity-90">${card.publisher || ''}</p>
                        </div>
                        <div class="flex items-center space-x-2 mt-12">
                            <span class="material-symbols-outlined text-sm">${card.category_icon || 'folder'}</span>
                            <span class="text-sm font-bold">${card.category_name}</span>
                        </div>
                    </div>
                    <div class="flex justify-between pt-4  text-black/80">
                        <span class="material-symbols-outlined text-[#ababab] cursor-pointer hover:text-[#37C6F4] duration-250" onclick="openModal(${card.id})">eye_tracking</span>
                        <span class="material-symbols-outlined text-[#ababab] cursor-pointer hover:text-[#37C6F4] duration-250" onclick="downloadFile(${card.id})">download</span>
                        <span class="material-symbols-outlined text-[#ababab] cursor-pointer hover:text-[#37C6F4] duration-250 ${card.is_bookmarked ? 'text-[#37C6F4]' : ''}" data-item-id="${card.id}" onclick="toggleBookmark(${card.id}, this)">bookmark</span>
                        <span class="material-symbols-outlined text-[#ababab] cursor-pointer hover:text-[#37C6F4] duration-250" onclick="shareCardItem('${slugEscaped}', '${titleForShare}')">share</span>
                    </div>
                </div>`;
        });

        // Update pagination
        updatePagination();

        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }

    function updatePagination() {
        const totalPages = Math.ceil(filteredData.length / cardsPerPage);
        const paginationContainer = document.getElementById('pagination-container');

        if (!paginationContainer) return;

        // Remove existing page buttons (keep prev/next)
        const existingButtons = paginationContainer.querySelectorAll("button[id^='btn']");
        existingButtons.forEach(btn => btn.remove());

        // Add page buttons
        const prevBtn = paginationContainer.querySelector('button[onclick="prevPage()"]');

        for (let i = 1; i <= totalPages; i++) {
            const btn = document.createElement('button');
            btn.id = `btn${i}`;
            btn.className = `px-3 py-1 text-[20px] text-[#1E1D57] hover:text-[#37C6F4] rounded`;
            if (i === currentPage) {
                btn.classList.add('text-[#37C6F4]');
            }
            btn.textContent = i;
            btn.onclick = () => changePage(i);
            prevBtn.insertAdjacentElement('afterend', btn);
        }
    }

    function changePage(page) {
        currentPage = page;
        renderCards();
        document.querySelectorAll("button[id^='btn']").forEach((btn) => {
            btn.classList.remove("bg-blue-600", "text-white");
        });
        const activeBtn = document.getElementById(`btn${page}`);
        if (activeBtn) {
            activeBtn.classList.add("bg-blue-600", "text-white");
        }
    }

    function prevPage() {
        if (currentPage > 1) {
            changePage(currentPage - 1);
        }
    }

    function nextPage() {
        const totalPages = Math.ceil(filteredData.length / cardsPerPage);
        if (currentPage < totalPages) {
            changePage(currentPage + 1);
        }
    }

    let currentModalItemId = null;

    function openModal(itemId) {
        const item = itemsData.find(i => i.id === itemId);
        if (!item) return;

        currentModalItemId = itemId;

        const modal = document.getElementById("productModal");
        modal.classList.remove("hidden");
        modal.classList.add("flex");
        document.getElementById("modalTitle").innerText = item.title;
        document.getElementById("modalPublisher").innerText = item.publisher || '';
        document.getElementById("modalType").innerText = item.category_name || item.type;
        const colorBox = document.getElementById("modalColorBox");
        const gradientStyle = formatGradient(item.category_color);
        colorBox.className = `p-8 text-white rounded-2xl w-full max-h-fit md:w-1/2 flex flex-col justify-between min-h-[360px] shadow-[0_8px_12px_rgba(0,0,0,0.4)] shadow-2xl`;
        colorBox.setAttribute('style', gradientStyle);
        document.getElementById("modalIcon").innerText = item.category_icon || item.icon || 'folder';
        const modalDescription = document.getElementById("modalDescription");
        if (modalDescription) {
            modalDescription.innerHTML = item.short_description || item.description || '';
        }

        // Update bookmark button state
        const modalBookmarkBtn = document.getElementById("modalBookmarkBtn");
        if (modalBookmarkBtn) {
            if (item.is_bookmarked) {
                modalBookmarkBtn.classList.add('text-[#37C6F4]');
            } else {
                modalBookmarkBtn.classList.remove('text-[#37C6F4]');
            }
        }

        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }

    function closeModal() {
        const modal = document.getElementById("productModal");
        modal.classList.add("hidden");
        modal.classList.remove("flex");
    }

    function filterItems() {
        filteredData = itemsData.filter(item => {
            // Filter for "All case studies" - must be case study AND have lat/long
            if (activeFilter === 'case_study') {
                const isCaseStudy = item.is_case_study === true || item.type_value === 'case_study';
                const hasLocation = item.latitude !== null && item.longitude !== null;
                return isCaseStudy && hasLocation;
            }
            if (activeFilter === 'all' && activeCategoryId === null) {
                return true;
            }
            if (activeCategoryId !== null && item.category_id !== activeCategoryId) {
                return false;
            }
            return true;
        });
        currentPage = 1;
        updateActiveFilter();
        renderCards();
    }

    function updateActiveFilter() {
        // Remove active class from all filter links
        document.querySelectorAll('.filter-link').forEach(link => {
            link.classList.remove('active');
            // Remove active styling
            link.classList.remove('text-[#37C6F4]');
            const icon = link.querySelector('.material-symbols-outlined');
            if (icon && !icon.classList.contains('arrow-right')) {
                icon.classList.remove('text-[#37C6F4]');
            }
            // Reset parent li styling
            const parentLi = link.closest('li');
            if (parentLi) {
                parentLi.classList.remove('border-[#37C6F4]');
            }
        });

        // Add active class to selected filter
        let activeLink = null;
        if (activeFilter === 'all' && activeCategoryId === null) {
            activeLink = document.querySelector('.filter-link[data-filter="all"]');
        } else if (activeFilter === 'case_study') {
            activeLink = document.querySelector('.filter-link[data-filter="case_study"]');
        } else if (activeCategoryId !== null) {
            activeLink = document.querySelector(`.filter-link[data-category-id="${activeCategoryId}"]`);
        }

        if (activeLink) {
            activeLink.classList.add('active', 'text-[#37C6F4]');
            const icon = activeLink.querySelector('.material-symbols-outlined');
            if (icon && !icon.classList.contains('arrow-right')) {
                icon.classList.add('text-[#37C6F4]');
            }
            // Update parent li border color
            const parentLi = activeLink.closest('li');
            if (parentLi) {
                parentLi.classList.add('border-[#37C6F4]');
            }
        }
    }

    // Filter event listeners
    document.addEventListener('DOMContentLoaded', function() {
        const filterLinks = document.querySelectorAll('.filter-link');
        filterLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const filter = this.getAttribute('data-filter');
                const categoryId = this.getAttribute('data-category-id');

                if (filter) {
                    activeFilter = filter;
                    activeCategoryId = null;
                } else if (categoryId) {
                    activeCategoryId = parseInt(categoryId);
                    activeFilter = 'all';
                }

                filterItems();
            });
        });

        // Search functionality - attach to both mobile and desktop search inputs
        const searchInputs = document.querySelectorAll('.resources-search-input');
        searchInputs.forEach(searchInput => {
            searchInput.addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase().trim();
                if (searchTerm === '') {
                    // Reset to current filter when search is cleared
                    filterItems();
                } else {
                    // Apply search on top of current filter
                    filteredData = itemsData.filter(item => {
                        // First check if item matches current filter
                        let matchesFilter = true;
                        if (activeFilter === 'case_study') {
                            const isCaseStudy = item.is_case_study === true || item.type_value === 'case_study';
                            const hasLocation = item.latitude !== null && item.longitude !== null;
                            matchesFilter = isCaseStudy && hasLocation;
                        } else if (activeFilter === 'all' && activeCategoryId === null) {
                            matchesFilter = true;
                        } else if (activeCategoryId !== null && item.category_id !== activeCategoryId) {
                            matchesFilter = false;
                        }

                        if (!matchesFilter) {
                            return false;
                        }

                        // Then check if item matches search term
                        const matchesSearch = item.title.toLowerCase().includes(searchTerm) ||
                            (item.publisher && item.publisher.toLowerCase().includes(searchTerm)) ||
                            (item.description && item.description.toLowerCase().includes(searchTerm)) ||
                            (item.short_description && item.short_description.toLowerCase().includes(searchTerm));

                        return matchesSearch;
                    });
                    currentPage = 1;
                    renderCards();
                }
            });
        });

        // Initialize active state on page load
        updateActiveFilter();
        renderCards();
    });

    function downloadFile(itemId) {
        const item = itemsData.find(i => i.id === itemId);
        if (!item) {
            alert('Item not found');
            return;
        }

        if (!item.featured_image_id) {
            alert('No file available for download');
            return;
        }

        // Simple direct navigation - same as working featured media download link
        // The server's Content-Disposition header will force the download
        window.location.href = `/media/${item.featured_image_id}/download`;
    }

    function downloadFileFromModal() {
        if (currentModalItemId) {
            downloadFile(currentModalItemId);
        }
    }

    function openItemPage(slug) {
        // If slug is provided, use it directly (called from card click)
        if (slug) {
            window.location.href = `/resources/${slug}`;
            return;
        }
        // Otherwise, use currentModalItemId (called from modal button)
        if (currentModalItemId) {
            const item = itemsData.find(i => i.id === currentModalItemId);
            if (item && item.slug) {
                window.location.href = `/resources/${item.slug}`;
            }
        }
    }

    function toggleBookmarkFromModal(element) {
        if (currentModalItemId) {
            toggleBookmark(currentModalItemId, element);
        }
    }

    // Share functionality
    let isSharing = false;

    function shareItem(url, title) {
        // Prevent concurrent share operations
        if (isSharing) {
            return;
        }

        // Check if URL is already absolute (starts with http:// or https://)
        let shareUrl = url;
        if (url.startsWith('http://') || url.startsWith('https://')) {
            // URL is already absolute, use as-is
            shareUrl = url;
        } else if (url.startsWith('/')) {
            // Relative URL starting with /, prepend origin
            shareUrl = window.location.origin + url;
        } else {
            // Relative URL without leading /, prepend origin and /
            shareUrl = window.location.origin + '/' + url;
        }

        if (navigator.share) {
            // Use Web Share API if available (mobile devices)
            isSharing = true;
            navigator.share({
                title: title,
                text: `Check out this resource: ${title}`,
                url: shareUrl,
            }).then(() => {
                isSharing = false;
            }).catch(err => {
                isSharing = false;
                // Only log non-user-cancelled errors
                if (err.name !== 'AbortError') {
                    console.log('Error sharing:', err);
                }
                // Fallback to clipboard
                copyToClipboard(shareUrl);
            });
        } else {
            // Fallback to clipboard for desktop
            copyToClipboard(shareUrl);
        }
    }

    function shareItemFromModal() {
        if (currentModalItemId) {
            const item = itemsData.find(i => i.id === currentModalItemId);
            if (item && item.slug) {
                const url = `${window.location.origin}/resources/${item.slug}`;
                shareItem(url, item.title);
            }
        }
    }

    function shareCardItem(slug, title) {
        const url = `${window.location.origin}/resources/${slug}`;
        shareItem(url, title);
    }

    function copyToClipboard(text) {
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(text).then(() => {
                if (typeof showToast === 'function') {
                    showToast('Link copied to clipboard!', 'success');
                } else {
                    alert('Link copied to clipboard!');
                }
            }).catch(err => {
                console.error('Failed to copy:', err);
                fallbackCopyToClipboard(text);
            });
        } else {
            fallbackCopyToClipboard(text);
        }
    }

    function fallbackCopyToClipboard(text) {
        const textArea = document.createElement('textarea');
        textArea.value = text;
        textArea.style.position = 'fixed';
        textArea.style.left = '-999999px';
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        try {
            document.execCommand('copy');
            if (typeof showToast === 'function') {
                showToast('Link copied to clipboard!', 'success');
            } else {
                alert('Link copied to clipboard!');
            }
        } catch (err) {
            console.error('Fallback copy failed:', err);
            if (typeof showToast === 'function') {
                showToast('Failed to copy link. Please copy manually.', 'error');
            } else {
                prompt('Copy this link:', text);
            }
        }
        document.body.removeChild(textArea);
    }

    // Expose functions and data to global scope for onclick handlers
    window.openModal = openModal;
    window.closeModal = closeModal;
    window.prevPage = prevPage;
    window.nextPage = nextPage;
    window.changePage = changePage;
    window.downloadFile = downloadFile;
    window.downloadFileFromModal = downloadFileFromModal;
    window.openItemPage = openItemPage;
    window.toggleBookmarkFromModal = toggleBookmarkFromModal;
    window.shareItem = shareItem;
    window.shareItemFromModal = shareItemFromModal;
    window.shareCardItem = shareCardItem;
    window.itemsData = itemsData; // Expose itemsData for bookmark function
    })();
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleBtn = document.querySelector(".search-filter-open-close");
        const filterList = document.querySelector(".mobile-filter-list");
        const filterOverlay = document.querySelector(".overlay-btm");
        const body = document.body;
        const mobFilters = document.querySelector(".mob-search-filters");
        const categoryLinks = document.querySelectorAll(".category-with-sub > a");
        const HIDDEN_CLASS = "-left-100";
        const VISIBLE_CLASS = "left-0";

        if (toggleBtn && filterList && filterOverlay && body) {
            // Function to check if screen is mobile (below 768px)
            const isMobileScreen = () => {
                return window.innerWidth < 768;
            };

            // Function to close the filter list
            const closeFilterList = () => {
                filterList.classList.add(HIDDEN_CLASS);
                filterList.classList.remove(VISIBLE_CLASS);
                filterOverlay.classList.remove("active");
                body.classList.remove("no-scroll");
            };

            // Function to check if filter list is open
            const isFilterListOpen = () => {
                return filterList.classList.contains(VISIBLE_CLASS);
            };

            toggleBtn.addEventListener("click", () => {
                // Only work on mobile screens (below 768px)
                if (!isMobileScreen()) return;

                const isHidden = filterList.classList.toggle(HIDDEN_CLASS);
                filterList.classList.toggle(VISIBLE_CLASS, !isHidden);
                filterOverlay.classList.toggle("active", !isHidden);
                body.classList.toggle("no-scroll", !isHidden);
                if (!isHidden && mobFilters) {
                    mobFilters.scrollIntoView({ behavior: "smooth", block: "start" });
                }
            });

            // Close filter list when clicking/touching outside (only on mobile)
            document.addEventListener("click", (event) => {
                if (!isMobileScreen() || !isFilterListOpen()) return;

                const clickedElement = event.target;
                const isClickInsideToggle = toggleBtn.contains(clickedElement);
                const isClickInsideFilterList = filterList.contains(clickedElement);

                if (!isClickInsideToggle && !isClickInsideFilterList) {
                    closeFilterList();
                }
            });

            // Also handle touch events for mobile
            document.addEventListener("touchend", (event) => {
                if (!isMobileScreen() || !isFilterListOpen()) return;

                const touchedElement = event.target;
                const isTouchInsideToggle = toggleBtn.contains(touchedElement);
                const isTouchInsideFilterList = filterList.contains(touchedElement);

                if (!isTouchInsideToggle && !isTouchInsideFilterList) {
                    closeFilterList();
                }
            });

            // Remove "active" class from overlay and close filter list if screen width is 768px or greater
            const checkScreenWidth = () => {
                if (window.innerWidth >= 768) {
                    closeFilterList();
                }
            };

            // Check on initial load
            checkScreenWidth();

            // Check on window resize
            window.addEventListener("resize", checkScreenWidth);
        }

        categoryLinks.forEach((link) => {
            link.addEventListener("click", (event) => {
                event.preventDefault();
                const parentItem = link.closest(".category-with-sub");
                if (!parentItem) return;
                const subCat = parentItem.querySelector(".sub-cat");
                const isActive = parentItem.classList.toggle("active");
                if (subCat) {
                    subCat.style.maxHeight = isActive ? `${subCat.scrollHeight}px` : "0";
                    subCat.style.opacity = isActive ? "1" : "0";
                }
            });
        });
    });

    // Bookmark functionality
    window.toggleBookmark = async function(itemId, element) {
        const isAuthenticated = @json(auth()->check());
        if (!isAuthenticated) {
            alert('Please login to bookmark items');
            return;
        }

        try {
            const response = await fetch('{{ route('bookmark.toggle') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ item_id: itemId })
            });

            const data = await response.json();

            if (response.ok) {
                // Update icon color
                if (data.status === 'added') {
                    element.classList.add('text-[#37C6F4]');
                    element.classList.remove('text-[#ababab]');
                    // Update the item's bookmark status in the data
                    const item = window.itemsData.find(i => i.id === itemId);
                    if (item) {
                        item.is_bookmarked = true;
                    }
                } else if (data.status === 'removed') {
                    element.classList.remove('text-[#37C6F4]');
                    element.classList.add('text-[#ababab]');
                    // Update the item's bookmark status in the data
                    const item = window.itemsData.find(i => i.id === itemId);
                    if (item) {
                        item.is_bookmarked = false;
                    }
                }
                console.log(data.message);
            } else {
                console.error('Bookmark toggle failed:', data);
                alert('Failed to toggle bookmark: ' + (data.message || 'Unknown error'));
            }
        } catch (error) {
            console.error('Error toggling bookmark:', error);
            alert('An error occurred while toggling bookmark.');
        }
    };
</script>
@endpush
@endif
