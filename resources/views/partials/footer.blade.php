<!-- <footer class=" text-white">
    <div class="bg-[#1E1D57] py-12 px-6 md:px-20">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10">
            <div>
                <a href="{{ route('home') }}" class="text-xl font-semibold text-white mb-4">
                   <img src="/images/footerlogo.png" alt="">
                </a>
                <p class="text-sm mb-6 text-gray-300">
                    Join our newsletter to stay up to date on content updates and releases.
                </p>

                <form class="flex items-center rounded-3xl overflow-hidden max-w-sm" style="background-color:#37c6f445;">
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
                        <li><a href="{{ route('myaccount') }}" class="flex gap-2 items-center text-[#37C6F4]"><span><svg id="account-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path id="Path_393" data-name="Path 393" d="M5.85,17.1A10.578,10.578,0,0,1,8.7,15.56,9.615,9.615,0,0,1,12,15a9.86,9.86,0,0,1,3.3.56,10.309,10.309,0,0,1,2.85,1.54,7.634,7.634,0,0,0,1.36-2.33A7.967,7.967,0,0,0,20,11.99a7.7,7.7,0,0,0-2.34-5.66A7.716,7.716,0,0,0,12,3.99,7.716,7.716,0,0,0,6.34,6.33,7.716,7.716,0,0,0,4,11.99a7.783,7.783,0,0,0,.49,2.78A7.969,7.969,0,0,0,5.85,17.1ZM12,13a3.418,3.418,0,0,1-2.49-1.01A3.348,3.348,0,0,1,8.5,9.5,3.4,3.4,0,0,1,9.51,7.01,3.348,3.348,0,0,1,12,6a3.4,3.4,0,0,1,2.49,1.01A3.348,3.348,0,0,1,15.5,9.5a3.4,3.4,0,0,1-1.01,2.49A3.348,3.348,0,0,1,12,13Zm0,9a9.678,9.678,0,0,1-3.9-.79,9.989,9.989,0,0,1-5.32-5.32,9.678,9.678,0,0,1-.79-3.9,9.678,9.678,0,0,1,.79-3.9A9.989,9.989,0,0,1,8.1,2.77,9.678,9.678,0,0,1,12,1.98a9.678,9.678,0,0,1,3.9.79,9.989,9.989,0,0,1,5.32,5.32,9.678,9.678,0,0,1,.79,3.9,9.678,9.678,0,0,1-.79,3.9,9.989,9.989,0,0,1-5.32,5.32A9.678,9.678,0,0,1,12,22Zm0-2a7.886,7.886,0,0,0,2.5-.39,7.7,7.7,0,0,0,2.15-1.11,7.7,7.7,0,0,0-2.15-1.11,8.208,8.208,0,0,0-5,0A7.7,7.7,0,0,0,7.35,18.5,7.7,7.7,0,0,0,9.5,19.61,7.886,7.886,0,0,0,12,20Zm0-9a1.47,1.47,0,0,0,1.51-1.51,1.447,1.447,0,0,0-.43-1.08A1.469,1.469,0,0,0,12,7.98a1.47,1.47,0,0,0-1.51,1.51A1.47,1.47,0,0,0,12,11Z" fill="currentColor"/>
                        <rect id="Rectangle_48" data-name="Rectangle 48" width="24" height="24" fill="none"/>
                        </svg></span>
                        My account
                    </a></li>
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
 -->



     <footer class=" text-white">
        <div class="bg-[#1E1D57] py-12 px-6 lg:px-16">
            <div class="max-w-7xl mx-auto flex flex-col md:flex-row gap-10 lg:gap-[8rem]">
                <div class="lg:max-w-[391px] md:max-w-[300px]">
                    <a href="{{ route('home') }}" class="text-xl font-semibold text-white mb-4">
                        <img src="/images/footerlogo.png" alt="">
                    </a>
                    <p class="text-[16px] mb-6 text-[#FFFFFF] max-w-[392px]">
                        Join our newsletter to stay up to date when content is updated or new content is released
                    </p>

                    <form class="flex items-center rounded-3xl overflow-hidden max-w-sm"
                        style="background-color:#37c6f445;">
                        <input type="email" placeholder="Enter your email address"
                            class="w-full px-4 py-3 text-sm text-white bg-transparent focus:outline-none">
                        <button class="bg-transparent hover:bg-[#2f6990] text-[#37C6F4] px-4 py-3">Subscribe</button>
                    </form>
                </div>
                <div class="flex flex-col sm:flex-row gap-10 md:mt-8">
                    <ul class="space-y-3">
                        <li><a href="https://water-hub.ecareinfoway.com/about" class="hover:text-white">About water
                                PPPs</a></li>
                        <li><a href="https://water-hub.ecareinfoway.com/resources" class="hover:text-white">Water PPP
                                Resources</a></li>
                        <li><a href="{{ route('casestudy') }}" class="hover:text-white">Case study</a></li>
                        <li><a href="#" class="hover:text-white">Who we are</a></li>
                        <li><a href="{{ route('contactus') }}" class="hover:text-white">Contact us</a>
                        </li>
                    </ul>
                    <ul class="space-y-3">
                        @auth
                        <li><a href="{{ route('myaccount') }}"
                                class="flex gap-2 items-center text-[#37C6F4]"><span><span
                                        class="material-symbols-outlined">
                                        account_circle
                                    </span></span>
                                My account
                            </a></li>
                        @else
                        <li>
                            <a href="{{ route('login') }}" class="hover:text-white"> Sign in</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="hover:text-white">Register an account</a>
                        </li>
                        @endauth
                        <li class="flex items-center gap-2 pt-2 sm:pt-[4rem]">
                            <a href="https://in.linkedin.com/" target="_blank" rel="noopener noreferrer"
                                class="hover:text-white flex items-center gap-2">
                                <img src="https://cdn-icons-png.flaticon.com/512/174/174857.png" alt="LinkedIn"
                                    class="h-5 w-5">
                                <span>Find us on LinkedIn</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <section class="w-full bg-[#07074F] text-white py-3 px-6 lg:px-16">
            <div
                class="max-w-7xl mx-auto max-[540px]:flex-col flex items-center max-[540px]:items-start max-[540px]:gap-4 gap-10 ">
                <p class="text-sm">© <span id="year">2025</span>. All right reserved.</p>
                <a href="" class="text-[#37C6F4] text-sm hover:text-white hover:underline hover:underline-offset-4">Privacy Policy</a>
                <a href="" class="text-[#37C6F4] text-sm hover:text-white hover:underline hover:underline-offset-4">Terms of Service</a>

            </div>
        </section>
    </footer>