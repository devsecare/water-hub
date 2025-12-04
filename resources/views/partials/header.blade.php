<header class="w-full bg-[#fbfbfb] relative z-50">
    <svg xmlns="http://www.w3.org/2000/svg" width="440" height="20.722" viewBox="0 0 440 20.722" class="absolute top-[100%] w-[80%] max-w-fit left-0 right-auto h-auto z-10">
        <path id="Path_412" data-name="Path 412" d="M0,21.645c128.377,0,172.165,20.722,230.524,20.722S333.263,21.645,440,21.645H0Z" transform="translate(0 -21.645)" fill="#fff"></path>
    </svg>
    <div class="mx-auto gap-2 flex items-center justify-between py-10 px-4 md:px-6 overflow-x-auto whitespace-nowrap relative z-10 bg-white">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="max-w-[400px] w-full">
            <img src="{{ asset('images/header-logo.svg') }}" alt="Logo" class="h-8 md:h-10 w-[236px] sm:w-auto transition-all duration-300" />
        </a>

        <!-- Desktop Menu -->
        <nav class="hidden xl:flex items-center font-medium space-x-6 xl:space-x-8 flex-nowrap ">
            <a href="{{ route('understandingWater') }}" class="text-[#0b0b3b] hover:text-[#00b4ff] transition">About water PPPs</a>
            <a href="{{ route('about') }}" class="text-[#0b0b3b] hover:text-[#00b4ff] transition">Who we are</a>
            <a href="{{ route('resources') }}" class="text-[#0b0b3b] hover:text-[#00b4ff] transition">Water PPP Resources</a>
            <a href="{{ route('casestudy') }}" class="text-[#0b0b3b] hover:text-[#00b4ff] transition">Case studies</a>           
            <a href="{{ route('contactus') }}" class="text-[#0b0b3b] hover:text-[#00b4ff] transition">Contact us</a>
            @auth
                <a href="{{ route('myaccount') }}" class="flex gap-2 items-center text-[#37C6F4]"><span><svg id="account-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path id="Path_393" data-name="Path 393" d="M5.85,17.1A10.578,10.578,0,0,1,8.7,15.56,9.615,9.615,0,0,1,12,15a9.86,9.86,0,0,1,3.3.56,10.309,10.309,0,0,1,2.85,1.54,7.634,7.634,0,0,0,1.36-2.33A7.967,7.967,0,0,0,20,11.99a7.7,7.7,0,0,0-2.34-5.66A7.716,7.716,0,0,0,12,3.99,7.716,7.716,0,0,0,6.34,6.33,7.716,7.716,0,0,0,4,11.99a7.783,7.783,0,0,0,.49,2.78A7.969,7.969,0,0,0,5.85,17.1ZM12,13a3.418,3.418,0,0,1-2.49-1.01A3.348,3.348,0,0,1,8.5,9.5,3.4,3.4,0,0,1,9.51,7.01,3.348,3.348,0,0,1,12,6a3.4,3.4,0,0,1,2.49,1.01A3.348,3.348,0,0,1,15.5,9.5a3.4,3.4,0,0,1-1.01,2.49A3.348,3.348,0,0,1,12,13Zm0,9a9.678,9.678,0,0,1-3.9-.79,9.989,9.989,0,0,1-5.32-5.32,9.678,9.678,0,0,1-.79-3.9,9.678,9.678,0,0,1,.79-3.9A9.989,9.989,0,0,1,8.1,2.77,9.678,9.678,0,0,1,12,1.98a9.678,9.678,0,0,1,3.9.79,9.989,9.989,0,0,1,5.32,5.32,9.678,9.678,0,0,1,.79,3.9,9.678,9.678,0,0,1-.79,3.9,9.989,9.989,0,0,1-5.32,5.32A9.678,9.678,0,0,1,12,22Zm0-2a7.886,7.886,0,0,0,2.5-.39,7.7,7.7,0,0,0,2.15-1.11,7.7,7.7,0,0,0-2.15-1.11,8.208,8.208,0,0,0-5,0A7.7,7.7,0,0,0,7.35,18.5,7.7,7.7,0,0,0,9.5,19.61,7.886,7.886,0,0,0,12,20Zm0-9a1.47,1.47,0,0,0,1.51-1.51,1.447,1.447,0,0,0-.43-1.08A1.469,1.469,0,0,0,12,7.98a1.47,1.47,0,0,0-1.51,1.51A1.47,1.47,0,0,0,12,11Z" fill="currentColor"/>
                        <rect id="Rectangle_48" data-name="Rectangle 48" width="24" height="24" fill="none"/>
                        </svg></span>
                        My account
                    </a>
            @else
                <a href="{{ route('login') }}" class="text-[#0b0b3b] hover:text-[#00b4ff] transition">Log in</a>
                <a href="{{ route('register') }}" 
                     class="bg-[#37C6F4] text-[#1E1D57]  px-5 py-2 rounded-full shadow-sm hover:bg-[#1E1D57] hover:text-[#37C6F4] transition duration-300 whitespace-nowrap">
                    Register
                </a>

            @endauth
        </nav>

        <!-- Mobile Menu Button -->
        <button id="menu-btn" onclick="toggleMenu()" class="xl:hidden text-gray-700 focus:outline-none flex-shrink-0 z-50">
            <!-- <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg> -->
            <div class="mob-hamburger">
                <span class="ham-line line1"></span>
                <span class="ham-line line2"></span>
                <span class="ham-line line3"></span>
            </div>
        </button>
    </div>

    <!-- Mobile Menu (Slide Animation) -->
    <div id="mobile-menu" class="fixed top-100% right-0 w-full h-full w-64 bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col p-6 space-y-4 text-sm font-medium xl:hidden z-10">
        <!-- <button id="close-btn" onclick="toggleMenu()" class="self-end mb-4 text-gray-600 hover:text-gray-800 hidden">✕</button> -->
        <div class="mob-menu flex flex-col">
            <div class="acc-login-reg flex justify-between items-center">
                @auth
                    <a href="{{ route('myaccount') }}" class="flex gap-2 items-center text-[#37C6F4]"><span><svg id="account-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path id="Path_393" data-name="Path 393" d="M5.85,17.1A10.578,10.578,0,0,1,8.7,15.56,9.615,9.615,0,0,1,12,15a9.86,9.86,0,0,1,3.3.56,10.309,10.309,0,0,1,2.85,1.54,7.634,7.634,0,0,0,1.36-2.33A7.967,7.967,0,0,0,20,11.99a7.7,7.7,0,0,0-2.34-5.66A7.716,7.716,0,0,0,12,3.99,7.716,7.716,0,0,0,6.34,6.33,7.716,7.716,0,0,0,4,11.99a7.783,7.783,0,0,0,.49,2.78A7.969,7.969,0,0,0,5.85,17.1ZM12,13a3.418,3.418,0,0,1-2.49-1.01A3.348,3.348,0,0,1,8.5,9.5,3.4,3.4,0,0,1,9.51,7.01,3.348,3.348,0,0,1,12,6a3.4,3.4,0,0,1,2.49,1.01A3.348,3.348,0,0,1,15.5,9.5a3.4,3.4,0,0,1-1.01,2.49A3.348,3.348,0,0,1,12,13Zm0,9a9.678,9.678,0,0,1-3.9-.79,9.989,9.989,0,0,1-5.32-5.32,9.678,9.678,0,0,1-.79-3.9,9.678,9.678,0,0,1,.79-3.9A9.989,9.989,0,0,1,8.1,2.77,9.678,9.678,0,0,1,12,1.98a9.678,9.678,0,0,1,3.9.79,9.989,9.989,0,0,1,5.32,5.32,9.678,9.678,0,0,1,.79,3.9,9.678,9.678,0,0,1-.79,3.9,9.989,9.989,0,0,1-5.32,5.32A9.678,9.678,0,0,1,12,22Zm0-2a7.886,7.886,0,0,0,2.5-.39,7.7,7.7,0,0,0,2.15-1.11,7.7,7.7,0,0,0-2.15-1.11,8.208,8.208,0,0,0-5,0A7.7,7.7,0,0,0,7.35,18.5,7.7,7.7,0,0,0,9.5,19.61,7.886,7.886,0,0,0,12,20Zm0-9a1.47,1.47,0,0,0,1.51-1.51,1.447,1.447,0,0,0-.43-1.08A1.469,1.469,0,0,0,12,7.98a1.47,1.47,0,0,0-1.51,1.51A1.47,1.47,0,0,0,12,11Z" fill="currentColor"/>
                        <rect id="Rectangle_48" data-name="Rectangle 48" width="24" height="24" fill="none"/>
                        </svg></span>
                        My account
                    </a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}" class="bg-[#37C6F4] text-[#1E1D57] text-[18px] px-5 sm:px-7 md:px-8 py-2 sm:py-2 rounded-full shadow transition duration-300 hover:bg-[#1E1D57] hover:text-[#37C6F4]">Register</a>
                @endauth

            </div>
            <a href="{{ route('understandingWater') }}" class="hover:text-blue-600">About water PPPs</a>
             <a href="{{ route('about') }}" class="hover:text-blue-600">Who we are</a>
            <a href="{{ route('resources') }}" class="hover:text-blue-600">Water PPP Resources</a>
            <a href="#" class="hover:text-blue-600">Case studies</a>     
            <a href="{{ route('contactus') }}" class="hover:text-blue-600">Contact us</a>
            
                <!-- <a href="{{ route('map.index') }}" class="hover:text-blue-600">Map</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="hover:text-blue-600">Logout</button>
                </form>
            
                <a href="{{ route('login') }}" class="hover:text-blue-600">Log in</a>
                
                <a href="{{ route('register') }}" 
                    class="bg-[#37C6F4] text-[#1E1D57] font-semibold px-5 py-2 rounded-full shadow-sm hover:bg-[#1E1D57] hover:text-[#37C6F4] transition duration-300 whitespace-nowrap">Register
                </a> -->
            
        </div>
        <div class="mob-menu-btm">

        </div>
    </div>

    <!-- Overlay Background for Mobile Menu -->
    <div id="menu-overlay" class="fixed inset-0 bg-black bg-opacity-30 hidden lg:hidden transition-opacity duration-300" onclick="toggleMenu()"></div>
</header>

<script>
    function toggleMenu() {
        const menu = document.getElementById('mobile-menu');
        const overlay = document.getElementById('menu-overlay');
        const openBtn = document.getElementById('menu-btn');
        const closeBtn = document.getElementById('close-btn');
        const isOpen = !menu.classList.contains('translate-x-full');
        const body = document.querySelector('body');
        const hamburger = document.querySelector('.mob-hamburger');

        if (isOpen) {
            menu.classList.add('translate-x-full');
            overlay.classList.add('hidden');
            body.classList.remove('no-scroll');
            hamburger.classList.remove('active');
            // openBtn.classList.remove('hidden');
            // closeBtn.classList.add('hidden');
        } else {
            menu.classList.remove('translate-x-full');
            overlay.classList.remove('hidden');
            body.classList.add('no-scroll');
            hamburger.classList.add('active');
            // openBtn.classList.add('hidden');
            // closeBtn.classList.remove('hidden');
        }
    }
</script>

