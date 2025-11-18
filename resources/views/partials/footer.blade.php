<footer class=" text-white">
    <div class="bg-[#1E1D57] py-12 px-6 md:px-20">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10">
            <div>
                <a href="{{ route('home') }}" class="text-xl font-semibold text-white mb-4">
                   <img src="/images/footerlogo.png" alt="">
                </a>
                <p class="text-sm mb-6 text-gray-300">
                    Join our newsletter to stay up to date on content updates and releases.
                </p>

                <form class="flex items-center bg-gray-800 rounded-3xl overflow-hidden max-w-sm">
                    <input type="email" placeholder="Enter your email address" class="w-full px-4 py-3 text-sm text-white bg-transparent focus:outline-none" />
                    <button class="bg-transparent hover:bg-[#2f6990] text-[#37C6F4] px-4 py-3">Subscribe</button>
                </form>
            </div>
            <div>
                <ul class="space-y-3">
                    <li><a href="{{ route('about') }}" class="hover:text-white">About water PPPs</a></li>
                    <li><a href="{{ route('resources') }}" class="hover:text-white">Water PPP Resources</a></li>
                    <li><a href="#" class="hover:text-white">Who we are</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white">Contact us</a></li>
                </ul>
            </div>
            <div>
                <ul class="space-y-3">
                    @auth
                        <li><a href="{{ route('map.index') }}" class="hover:text-white">Map View</a></li>
                    @else
                        <li><a href="{{ route('register') }}" class="hover:text-white">Register an account</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-white">Sign in to your account</a></li>
                    @endauth
                    <li class="flex items-center gap-2 pt-2">
                        <a href="https://in.linkedin.com/" target="_blank" rel="noopener noreferrer" class="hover:text-white flex items-center gap-2">
                            <img src="https://cdn-icons-png.flaticon.com/512/174/174857.png" alt="LinkedIn" class="h-5 w-5">
                            <span>Find us on LinkedIn</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

