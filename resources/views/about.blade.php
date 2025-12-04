@extends('layouts.frontend')

@section('title', 'About Us - PPP Water Hub')

@section('content')
<!-- Section -->
<section class="relative w-full h-[350px] overflow-hidden page-hero-section-overlay ">
    <!-- Background Image -->
    <img src="{{ asset('images/aboutbg.jpg') }}" alt="background" class="absolute inset-0 w-full h-full object-cover" />

    <!-- Overlay Image (39% opacity) -->
    <!-- <img src="{{ asset('images/aboutoverlay.jpg') }}" alt="overlay" class="absolute inset-0 w-full h-full object-cover opacity-[0.39] mix-blend-overlay" /> -->

    <!-- Optional gradient for better contrast -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent"></div>

    <!-- Text Content -->
    <div class="relative z-10 flex items-center py-16 px-6 lg:px-16 h-full ">
        <svg xmlns="http://www.w3.org/2000/svg" width="440" height="20.722" viewBox="0 0 440 20.722"
            class="absolute top-0 w-[80%] max-w-fit left-0 right-auto h-auto z-10">
            <path id="Path_412" data-name="Path 412"
                d="M0,21.645c128.377,0,172.165,20.722,230.524,20.722S333.263,21.645,440,21.645H0Z"
                transform="translate(0 -21.645)" fill="#fff"></path>
        </svg>
        <div class="w-full max-w-7xl mx-auto  text-left">
            <h1 class="text-sky-300 font-medium uppercase tracking-wide mb-2 text-sm sm:text-base">
                About Us
            </h1>

            <p class="text-3xl sm:text-[48px] font-bold leading-snug font-appetite text-white max-w-[730px]">
                The trusted federation <br class="hidden sm:block" />
                advancing water PPPs globally
            </p>
        </div>
    </div>
</section>
<!-- About Section -->
<section class="w-full bg-white my-10 lg:my-20 md:h-[165px] px-6 lg:px-16 flex items-center">
    <div class="max-w-7xl mx-auto  w-full">
        <div class="max-w-[790px] text-left">
            <!-- First Bold Paragraph -->
            <p class="text-[#1E1D57] font-semibold  text-lg leading-snug mb-4">
                For 20 years, AquaFed has been the global voice of water partnership expertise – connecting 400+
                operators across 40 countries to deliver sustainable water solutions worldwide.
            </p>

            <!-- Second Regular Paragraph -->
            <p class="text-[#1E1D57]  lg:mt-8 text-lg leading-snug">
                We accelerate the creation and development of markets for public-private partnerships in water and
                wastewater services. By consolidating best practices, proven models, and expert knowledge from operators
                worldwide, we help governments, consultants, and investors build water systems that work –
                transparently, sustainably, and at scale.
            </p>
        </div>
    </div>
</section>

<!-- about section part two  -->
<section class="px-6 lg:px-16">
    <section class="max-w-7xl mx-auto md:max-h-[730px] my-10 lg:my-20  flex flex-col lg:flex-row gap-[30px]">
        <!-- Left Section -->
        <div class="lg:w-1/2">
            <h2 class="text-3xl md:text-4xl font-bold text-[#0C134F] leading-tight">
                Why we built the Water<br />
                and Wastewater PPP Hub
            </h2>

            <p class="mt-6 text-base text-gray-700">
                <a href="{{ route('resources') }}" class="text-sky-500 font-semibold underline">The Hub</a> exists to
                break down barriers to
                successful water partnerships.
                For too long, essential PPP guidance has been scattered, technical, and difficult to navigate.
                This platform consolidates the best resources from our global network into one accessible space –
                offering clear guidance, practical tools, and unbiased knowledge to anyone working to improve water and
                wastewater services.
            </p>

            <p class="mt-6 font-semibold text-gray-900">
                Our goal is simple:
                <span class="font-normal">
                    to grow the pipeline of PPP projects and strengthen the long-term resilience of water systems
                    worldwide.
                </span>
            </p>
        </div>

        <!-- Right Section -->
        <div class="lg:w-1/2">
            <h2 class="text-3xl md:text-4xl font-bold text-[#0C134F] leading-tight">
                Built for the people<br />
                shaping water's future
            </h2>

            <p class="mt-6 text-base text-gray-700">
                This Hub serves government officials, PPP units, development partners, consultants, and investors —
                anyone committed to delivering safe, reliable water and sanitation services. Whether you're exploring
                PPPs for the first time or managing complex contracts, you'll find resources tailored to your needs.
                We meet you where you are in the PPP journey, offering foundational knowledge and technical depth in
                equal measure.
            </p>
        </div>
    </section>
</section>

<!-- a global community section  -->
<section class="bg-[#181A4B] text-white py-16 sm:py-20 px-6 lg:px-16 overflow-hidden hidden">
    <div class="max-w-7xl mx-auto  flex flex-col lg:flex-row items-start justify-between gap-[30px]">
        <!-- Left Text -->
        <div class="max-w-[604px] text-left flex-shrink-0">
            <h2 class="text-3xl md:text-4xl font-bold leading-tight mb-6">
                A global community, <br class="hidden sm:block" /> united by a shared mission
            </h2>

            <p class="text-base text-[#DADCF7] mb-5">
                The Water PPP Hub is powered by AquaFed's network of 400+ members operating across 40 countries —
                bringing together decades of on-the-ground experience, technical expertise, and lessons learned.
            </p>

            <p class="text-base text-[#DADCF7] mb-5">
                We've consolidated the most valuable resources, case studies, and guidance into this platform,
                ensuring the knowledge remains unbiased, evidence-based, and accessible to all.
            </p>

            <p class="text-base text-[#DADCF7] mb-5">
                This isn't about promoting any single operator or model. It's about advancing the sector as a whole –
                creating a collaborative community where public authorities, private operators, and development partners
                can exchange ideas, learn from success, and build water systems that guarantee everyone's human right
                to safe water and sanitation.
            </p>

            <p class="text-base text-[#DADCF7]">
                Through transparency and shared knowledge, we're working towards the
                <a href="#" class="text-sky-400 font-semibold underline">
                    UN's 2030 Agenda for Sustainable Development
                </a>,
                helping achieve SDG 6 and ensuring water partnerships deliver real, lasting impact.
            </p>
        </div>

        <!-- Right Images -->
        <div class="flex flex-col gap-4 lg:gap-6 flex-1 w-full lg:max-w-[605px]">
            <!-- Top Image -->
            <div class="rounded-2xl overflow-hidden h-[220px] sm:h-[260px] w-full">
                <img src="{{ asset('images/drink-water.jpg') }}" alt="Child drinking water"
                    class="w-full h-full object-cover" />
            </div>

            <!-- Bottom Images -->
            <div class="flex lg:justify-end flex-col sm:flex-row gap-4 lg:gap-6">
                <!-- Bottom Left -->
                <div class="rounded-[30px] sm:rounded-[24px] overflow-hidden">
                    <img src="{{ asset('images/global-water.jpg') }}" alt="Water drop"
                        class="h-full w-full object-cover">
                </div>

                <!-- Bottom Right -->
                <div class="rounded-[30px] sm:rounded-[24px] overflow-hidden">
                    <img src="{{ asset('images/global-water-purify.jpg') }}" alt="Water treatment plant"
                        class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Comprehensive water PPP section  -->
<section
    class="bg-[linear-gradient(106deg,#37C6F4_0%,#5CD3CE_100%)] bg-no-repeat bg-left-top opacity-100 text-black py-15 md:py-20 px-6 lg:px-16 relative md:pb-[130px]">

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 440 20.722"
        class="absolute top-0 left-1/2 -translate-x-1/2 block md:hidden w-full">
        <path id="Path_435" data-name="Path 435"
            d="M0,21.645c128.377,0,172.165,20.722,230.524,20.722S333.263,21.645,440,21.645H0Z"
            transform="translate(0 -21.645)" fill="#fff"></path>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" width="710" height="33.437" viewBox="0 0 710 33.437"
        class="absolute top-0 xl:left-[15%] hidden md:block ">
        <path id="Path_419" data-name="Path 419"
            d="M0,21.645c207.154,0,277.811,33.437,371.982,33.437S537.765,21.645,710,21.645H0Z"
            transform="translate(0 -21.645)" fill="#fff"></path>
    </svg>

    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-start md:items-end md:gap-8 ">
        <div class="max-w-[604px]">
            <h2 class="text-3xl text-[#1E1D57] md:text-[40px] font-bold  mb-4">
                Comprehensive water PPP knowledge in a format that works for you
            </h2>
            <p class="text-[#000000]">
                Every resource on the Hub is designed for clarity and speed. Whether you need comprehensive
                documentation or a quick overview, we provide water PPP guidance in multiple formats – so you can
                learn in the way that fits you.
            </p>
        </div>

        <a href="https://water-hub.ecareinfoway.com/resources" class="group inline-flex items-center text-[#37C6F4] mt-6 md:mt-0 font-medium  whitespace-nowrap bg-[#1E1D57] rounded-[55px] py-[10px] px-[27px] 
                hover:bg-[#37C6F4] hover:text-[#1E1D57] transition duration-300">
            The resource library
            <!-- SVG Icon placed after text -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 24"
                class="ml-2 transition-all duration-200 fill-[#37C6F4] group-hover:fill-[#1E1D57]">
                <rect width="24" height="24" fill="none"></rect>
                <path d="M12.6,12,8,7.4,9.4,6l6,6-6,6L8,16.6,12.6,12Z"></path>
            </svg>
        </a>
    </div>
    <div class=" absolute bottom-0 left-0 right-0">
        <svg class="w-full h-[30px] md:h-[80px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 24 150 28"
            preserveAspectRatio="none">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s58 18 88 18 58-18 88-18 58 18 88 18v44h-352z">
                </path>
            </defs>
            <g class="parallax">
                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(30, 29, 87, 0.25)"></use>
                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(30, 29, 87, 0.49)"></use>
                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(55, 198, 244, 0.49)"></use>
                <use xlink:href="#gentle-wave" x="48" y="7" fill="#1E1D57"></use>
            </g>
        </svg>
    </div>
</section>

<!-- Help us build a better resource section  -->
<!-- <section class="px-6 lg:px-16">
    <section class="max-w-7xl flex mx-auto  py-10 md:py-20">
        <div class="text-left">
    
            <h2 class="text-3xl md:text-4xl lg:max-w-[605px] font-bold text-[#1e1b4b] mb-6">
                Help us build a better resource
            </h2>

        
            <p class="text-[#000000] text-[16px] lg:max-w-[590px] mb-6">
                <span class="font-semibold">This Hub grows stronger with your input.</span>
                If you've developed useful PPP materials, identified gaps in our resources,
                or have feedback on how we can improve, we want to hear from you.
                Share your insights, suggest content, or let us know what's working – together,
                we'll create the most valuable water PPP platform in the world.
            </p>

            <a href="{{ route('contactus') }}" class="group inline-flex items-center text-[#37C6F4] text-xl font-semibold transition-colors">
                <span class="group-hover:text-[#1E1D57] transition-colors">Get in touch</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-[24px] w-[24px] text-bold ml-1 transition-colors  group-hover:text-[#1E1D57]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </section>
</section> -->
<!-- waves section  -->
<!-- <div class="bottom-0 left-0 right-0">
    <svg class="w-full h-[30px] md:h-[80px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 24 150 28"
        preserveAspectRatio="none">
        <defs>
            <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s58 18 88 18 58-18 88-18 58 18 88 18v44h-352z" />
        </defs>
        <g class="parallax">
            <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(30, 29, 87, 0.25)" />
            <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(30, 29, 87, 0.49)" />
            <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(55, 198, 244, 0.49)" />
            <use xlink:href="#gentle-wave" x="48" y="7" fill="#1E1D57" />
        </g>
    </svg>
</div> -->
@endsection