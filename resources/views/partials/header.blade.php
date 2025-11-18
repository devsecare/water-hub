<header class="w-full bg-[#fbfbfb] relative z-50">
    <div class="mx-auto flex items-center justify-between py-3 px-4 md:px-6 overflow-x-auto whitespace-nowrap relative z-10 bg-white">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex-shrink-0">
            <img src="{{ asset('images/header-logo.svg') }}" alt="Logo" class="h-8 md:h-10 w-[236px] sm:w-auto transition-all duration-300" />
        </a>

        <!-- Desktop Menu -->
        <nav class="hidden xl:flex items-center font-medium space-x-6 xl:space-x-8 flex-nowrap overflow-hidden">
            <a href="{{ route('about') }}" class="text-[#0b0b3b] hover:text-[#00b4ff] transition">About water PPPs</a>
            <a href="{{ route('resources') }}" class="text-[#0b0b3b] hover:text-[#00b4ff] transition">Water PPP Resources</a>
            <a href="{{ route('casestudy') }}" class="text-[#0b0b3b] hover:text-[#00b4ff] transition">Case studies</a>
            <a href="#" class="text-[#0b0b3b] hover:text-[#00b4ff] transition">Who we are</a>
            <a href="{{ route('contactus') }}" class="text-[#0b0b3b] hover:text-[#00b4ff] transition">Contact us</a>
            @auth
                <a href="{{ route('map.index') }}" class="text-[#0b0b3b] hover:text-[#00b4ff] transition">Map</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-[#0b0b3b] hover:text-[#00b4ff] transition">Logout</button>
                </form>
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
    <div id="mobile-menu" class="fixed top-100% right-0 w-full h-auto w-64 bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col p-6 space-y-4 text-sm font-medium xl:hidden z-10">
        <!-- <button id="close-btn" onclick="toggleMenu()" class="self-end mb-4 text-gray-600 hover:text-gray-800 hidden">✕</button> -->
        <a href="{{ route('about') }}" class="hover:text-blue-600">About water PPPs</a>
        <a href="{{ route('resources') }}" class="hover:text-blue-600">Water PPP Resources</a>
        <a href="#" class="hover:text-blue-600">Case studies</a>
        <a href="#" class="hover:text-blue-600">Who we are</a>
        <a href="{{ route('contact') }}" class="hover:text-blue-600">Contact us</a>
        @auth
            <a href="{{ route('map.index') }}" class="hover:text-blue-600">Map</a>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="hover:text-blue-600">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="hover:text-blue-600">Log in</a>
            
            <a href="{{ route('register') }}" 
                class="bg-[#37C6F4] text-[#1E1D57] font-semibold px-5 py-2 rounded-full shadow-sm hover:bg-[#1E1D57] hover:text-[#37C6F4] transition duration-300 whitespace-nowrap">Register
            </a>


        @endauth
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

