<footer class=" text-white relative">
    <!-- waves  -->
    <div class=" -top-[30px] md:-top-[80px] absolute left-0 right-0">
    <svg class="w-full h-[30px] md:h-[80px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 24 150 28" preserveAspectRatio="none">
        <defs>
            <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s58 18 88 18
        58-18 88-18 58 18 88 18v44h-352z"></path>
        </defs>
        <g class="parallax">
            <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(30, 29, 87, 0.25)"></use>
            <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(30, 29, 87, 0.49)"></use>
            <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(55, 198, 244, 0.49)"></use>
            <use xlink:href="#gentle-wave" x="48" y="7" fill="#1E1D57"></use>
        </g>
    </svg>
</div>
    <div class="bg-[#1E1D57] py-12 px-6 lg:px-16">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row gap-10 lg:gap-[8rem]">
            <div class="lg:max-w-[391px] md:max-w-[350px]">
                <a href="{{ route('home') }}" class="text-xl font-semibold text-white mb-4">
                    <img src="/images/footerlogo.png" alt="">
                </a>
                <p class="text-[16px] my-4 text-[#FFFFFF] max-w-[392px]">
                    Join our newsletter to stay up to date when content is updated or new content is released
                </p>

                <form id="newsletter-form" class="flex justify-between items-center rounded-3xl overflow-hidden max-w-sm px-2 sm:px-4"
                    style="background-color:#37c6f445;">
                    @csrf
                    <input type="email" name="email" id="newsletter-email" placeholder="Enter your email address" required
                        class="w-full lg:px-4 px-2 py-3 text-sm text-white bg-transparent focus:outline-none flex-1 placeholder-white/70">
                    <button type="submit" class="bg-transparent hover:bg-[#2f6990] text-[#37C6F4] px-2 lg:px-4 py-3">Stay Updated</button>
                </form>
                <div id="newsletter-message" class="mt-2 text-sm hidden"></div>
            </div>
            <div class="flex flex-col sm:flex-row gap-10 md:mt-16">
                <ul class="space-y-3">
                    <li><a href="{{ route('understandingWater') }}" class="hover:text-[#00b4ff]">About water
                            PPPs</a></li>
                    <li><a href="{{ route('resources') }}" class="hover:text-[#00b4ff]">Water PPP
                            Resources</a></li>
                    <li><a href="{{ route('casestudy') }}" class="hover:text-[#00b4ff]">Case study</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-[#00b4ff]">Who we are</a></li>
                    <li><a href="{{ route('contactus') }}" class="hover:text-[#00b4ff]">Contact us</a>
                    </li>
                </ul>
                <ul class="space-y-3">
                    @auth
                    <li><a href="{{ route('myaccount') }}" class="flex gap-2 items-center text-[#37C6F4]"><span><span
                                    class="material-symbols-outlined">
                                    account_circle
                                </span></span>
                            My account
                        </a></li>
                    @else
                    <li>
                        <a href="{{ route('login') }}" class="hover:text-[#00b4ff]"> Sign in</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="hover:text-[#00b4ff]">Register an account</a>
                    </li>
                    @endauth
                    <li class="flex items-center gap-2 pt-2 sm:pt-[4rem]">
                        <!-- <a href="https://in.linkedin.com/" target="_blank" rel="noopener noreferrer"
                            class="hover:text-white flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="16" height="16" viewBox="0 0 16 16">
                                <defs>
                                    <clipPath id="clip-path">
                                        <rect width="16" height="16" fill="none" />
                                    </clipPath>
                                </defs>
                                <g id="Social_Icons_16px_LinkedIn" data-name="Social Icons – 16px / LinkedIn"
                                    clip-path="url(#clip-path)">
                                    <path id="Icon"
                                        d="M14.816,16H1.18A1.169,1.169,0,0,1,0,14.845V1.154A1.168,1.168,0,0,1,1.18,0H14.816A1.171,1.171,0,0,1,16,1.154V14.845A1.171,1.171,0,0,1,14.816,16ZM6.235,6v7.636H8.6V9.857c0-.97.169-1.961,1.422-1.961,1.234,0,1.234,1.17,1.234,2.024v3.714h2.372V9.446c0-1.889-.345-3.638-2.847-3.638A2.51,2.51,0,0,0,8.542,7.042H8.509V6ZM2.37,6v7.636H4.745V6ZM3.56,2.2A1.377,1.377,0,1,0,4.935,3.578,1.379,1.379,0,0,0,3.56,2.2Z"
                                        transform="translate(0 0)" fill="#fff" />
                                </g>
                            </svg>
                            <span>Find us on LinkedIn</span>
                        </a> -->

                        <a href="https://www.linkedin.com/company/aquafed/" target="_blank" rel="noopener noreferrer"
                            class="group hover:text-[#00b4ff] flex items-center gap-2">

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                class="group-hover:fill-[#00b4ff]" viewBox="0 0 16 16">
                                <path
                                    d="M14.816,16H1.18A1.169,1.169,0,0,1,0,14.845V1.154A1.168,1.168,0,0,1,1.18,0H14.816A1.171,1.171,0,0,1,16,1.154V14.845A1.171,1.171,0,0,1,14.816,16ZM6.235,6v7.636H8.6V9.857c0-.97.169-1.961,1.422-1.961,1.234,0,1.234,1.17,1.234,2.024v3.714h2.372V9.446c0-1.889-.345-3.638-2.847-3.638A2.51,2.51,0,0,0,8.542,7.042H8.509V6ZM2.37,6v7.636H4.745V6ZM3.56,2.2A1.377,1.377,0,1,0,4.935,3.578,1.379,1.379,0,0,0,3.56,2.2Z"
                                    fill="currentColor" />
                            </svg>

                            <span class="group-hover:text-[#00b4ff]">Find us on LinkedIn</span>
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
            <a href="{{ route('privacypolicy') }}"
                class="text-[#37C6F4] text-sm hover:text-white hover:underline underline underline-offset-4">Privacy
                Policy</a>
            <a href="{{ route('termsofservice') }}"
                class="text-[#37C6F4] text-sm hover:text-white hover:underline underline underline-offset-4">Terms of
                Service</a>

        </div>
    </section>
</footer>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const newsletterForm = document.getElementById('newsletter-form');
    const newsletterMessage = document.getElementById('newsletter-message');
    const newsletterEmail = document.getElementById('newsletter-email');
    const submitButton = newsletterForm.querySelector('button[type="submit"]');

    if (newsletterForm) {
        newsletterForm.addEventListener('submit', async function(e) {
            e.preventDefault();

            const email = newsletterEmail.value.trim();
            const originalButtonText = submitButton.textContent;

            // Disable button and show loading state
            submitButton.disabled = true;
            submitButton.textContent = 'Subscribing...';
            newsletterMessage.classList.add('hidden');

            try {
                const formData = new FormData(newsletterForm);
                const response = await fetch('{{ route("newsletter.subscribe") }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    }
                });

                const data = await response.json();

                if (data.success) {
                    newsletterMessage.textContent = data.message;
                    newsletterMessage.className = 'mt-2 text-sm text-green-400';
                    newsletterMessage.classList.remove('hidden');
                    newsletterEmail.value = '';
                } else {
                    newsletterMessage.textContent = data.message || 'An error occurred. Please try again.';
                    newsletterMessage.className = 'mt-2 text-sm text-red-400';
                    newsletterMessage.classList.remove('hidden');
                }
            } catch (error) {
                console.error('Newsletter subscription error:', error);
                newsletterMessage.textContent = 'An error occurred. Please try again later.';
                newsletterMessage.className = 'mt-2 text-sm text-red-400';
                newsletterMessage.classList.remove('hidden');
            } finally {
                submitButton.disabled = false;
                submitButton.textContent = originalButtonText;
            }
        });
    }
});
</script>
@endpush
