@extends('layouts.frontend')

@section('title', 'PPP Water Hub')

@section('content')
<!-- main hero section start -->
<section class="relative bg-[#1E1D57] text-white overflow-hidden">
    <svg xmlns="http://www.w3.org/2000/svg" width="440" height="20.722" viewBox="0 0 440 20.722"
        class="absolute top-0 w-[80%] max-w-fit left-0 right-auto h-auto z-10">
        <path id="Path_412" data-name="Path 412"
            d="M0,21.645c128.377,0,172.165,20.722,230.524,20.722S333.263,21.645,440,21.645H0Z"
            transform="translate(0 -21.645)" fill="#fff" />
    </svg>
    <!-- Optional transparent overlay -->
    <div class="absolute inset-0 bg-overlay"></div>

    <!-- Hero content -->
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 md:px-8 py-12 sm:py-16 md:py-30 flex flex-col items-center text-center space-y-4 sm:space-y-6 md:space-y-8">
        <p class="text-xs sm:text-sm md:text-base tracking-wide uppercase text-[#37C6F4]">
            THE GLOBAL WATER PPP HUB
        </p>

        <h1
            class="max-w-[742px] font-appetite leading-tight text-2xl sm:text-4xl md:text-5xl lg:text-5xl font-bold leading-tight">
            Your gateway to water and wastewater PPP knowledge
        </h1>

        <p class="max-w-[816px] text-sm sm:text-base md:text-lg text-gray-300">
            Register and account today to get instant free access to curated resources, practical guidance,
            and insights to develop successful public-private partnerships in the water sector.
        </p>

        <div class="flex flex-wrap justify-center items-center gap-2 sm:gap-3 md:gap-4 mt-3 sm:mt-4 md:mt-6">
            @auth
             <a href="{{ route('casestudy') }}"
                class="inline-block bg-[#3DB8FF] text-[#1E1D57] font-semibold text-lg  py-[6px] px-[31px] rounded-full hover:bg-[#1E1D57] hover:text-[#37C6F4] transition-all duration-300 flex items-center justify-center">
               View Map
            </a>
            @else
            <a href="{{ route('register') }}"
                class="inline-block bg-[#3DB8FF] text-[#1E1D57] font-semibold text-lg  py-[6px] px-9 rounded-full hover:bg-[#1E1D57] hover:text-[#37C6F4] transition-all duration-300 flex items-center justify-center">
                Register
            </a>



            @endauth
            <a href="{{ route('about') }}"
                class="group text-[#37C6F4] text-[18px] font-medium flex items-center hover:underline relative transition sm:text-base hover:text-white">

                Learn more

                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    class="ml-2 transition-all duration-200 fill-[#37C6F4] group-hover:fill-white">
                    <rect width="24" height="24" fill="none"></rect>
                    <path d="M12.6,12,8,7.4,9.4,6l6,6-6,6L8,16.6,12.6,12Z"></path>
                </svg>

            </a>


        </div>
    </div>
</section>
<!-- main hero section end  -->

<!-- hero footer start  -->
<div class="bg-[#09094f] relative mx-auto px-4 py-[25px]">
    <div class="grid max-w-7xl mx-auto text-[18px] text-white grid-cols-1 md:grid-cols-3 gap-4 md:gap-8 text-center">
        <div class="md:max-w-[392px]">
            <p class="font-semibold">
                Download and bookmark essential PPP documents and case studies.
            </p>
        </div>
        <div class="md:max-w-[392px]">
            <p class="font-semibold">
                Access audio and video summaries of complex technical resources.
            </p>
        </div>
        <div class="md:max-w-[392px]">
            <p class="font-semibold">
                Share resources with colleagues and stakeholders securely.
            </p>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" width="1144" height="20.722" viewBox="0 0 1144 20.722"
        class="absolute -bottom-[16px] left-1/2 -translate-x-1/2 hidden md:block w-full">
        <path id="Path_411" data-name="Path 411"
            d="M0,21.645c333.781,0,447.629,20.722,599.363,20.722S866.483,21.645,1144,21.645H0Z"
            transform="translate(0 -21.645)" fill="#070648" />
    </svg>

    <svg xmlns="http://www.w3.org/2000/svg" width="310.156" height="32.563" viewBox="0 0 310.156 32.563"
        class="absolute -bottom-[16px] left-1/2 -translate-x-1/2 block md:hidden">
        <path id="Path_434" data-name="Path 434"
            d="M0,16.636c90.493,0,121.359,15.926,162.5,15.926s72.421-15.926,147.66-15.926V0H0Z"
            transform="translate(0 0.001)" fill="#0d0c4c"></path>
    </svg>
</div>
<!-- hero footer end  -->

<!-- A step-by-step guide to water secton start  -->
<section class="px-6 lg:px-16 py-12 lg:pt-22 pb-8">
    <div class="max-w-7xl mx-auto ">
        <h1 class="text-3xl md:text-4xl font-bold text-[#1E1D57] leading-tight">
            A step-by-step guide to water<br class="hidden md:block">
            PPP implementation
        </h1>

        <p class="mt-6 text-[#000000] text-[16px] max-w-[922px] leading-relaxed">
            Every successful water PPP follows a structured path from initial decision
            through to contract signing. This diagram maps the essential phases – showing
            you what happens when, who needs to be involved, and the key activities at
            each stage. Whether you’re exploring PPPs for the first time or planning your next
            project, use this as your roadmap.
        </p>
    </div>
</section>
<!-- A step-by-step guide to water secton start  -->

<!-- CARDS SLIDER SECTION START  -->
<section class="px-6 lg:px-16 ">
    <div class="max-w-7xl mx-auto flex gap-4">
        <button class="next group">
            <span class="material-symbols-outlined rotate-180 text-4xl transition-all group-hover:!text-[#1E1D57] slide-button">
                expand_circle_right
            </span>
        </button>

        <button class="prev group">
            <span class="material-symbols-outlined text-4xl transition-all group-hover:!text-[#1E1D57] slide-button">
                expand_circle_right
            </span>
        </button>
    </div>
</section>
<section class="pl-6   py-4 max-w-[1590px] ml-auto">
    <div class="relative">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">

                <!-- ========= CARD TEMPLATE (Copy 10 times) ========= -->
                <div class="swiper-slide max-w-[286px]">
                    <div class="card max-w-[286px] w-full bg-white rounded-2xl shadow-md overflow-hidden border border-[#1E1D57]">
                        <div class="p-5 space-y-3 card-before h-[284px] flex flex-col justify-between">
                            <div class="space-y-1">
                                <p class="font-semibold text-[#161b52] text-lg">Section one</p>
                              
                            </div>
                            <div class="flex items-start space-x-2 text-[#37C6F4]">
                                <!-- Icon -->
                                <span class="material-symbols-outlined text-[#37C6F4] text-[20px] leading-none">
                                    chat
                                </span>

                                <!-- Two-line text -->
                                <div class="text-sm leading-tight">
                                    <div>Stakeholder</div>
                                    <div>consultation phase</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide max-w-[286px]">
                    <div
                        class="card max-w-[286px] w-full bg-white rounded-2xl shadow-md overflow-hidden border border-[#1E1D57]">

                     <div class="p-5 space-y-3 card-before h-[284px] flex flex-col justify-between">
                             <div class="space-y-1">
                                <p class="font-semibold  text-[#161b52]">Lorem ipsum dolor sit amet, consetetur sadipscing elitr orem ipsum dolor sit amet, consetetur sadipscing elitr</p>
                                
                            </div>
                            <div class="flex items-start space-x-2 text-[#37C6F4]">
                                <!-- Icon -->
                                <span class="material-symbols-outlined text-[#37C6F4] text-[20px] leading-none">
                                    chat
                                </span>

                                <!-- Two-line text -->
                                <div class="text-sm leading-tight">
                                    <div>Stakeholder</div>
                                    <div>consultation phase</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="swiper-slide max-w-[286px]">
                    <div
                        class="card max-w-[286px] w-full bg-white rounded-2xl shadow-md overflow-hidden border border-[#1E1D57]">

                        <div class="p-5 space-y-3 card-before h-[284px] flex flex-col justify-between">
                             <div class="space-y-1">
                                <p class="font-semibold text-[#161b52] text-lg">PPP preparation/feasibility</p>
                                <p class="font-semibold text-[#161b52] text-lg">Legal/Regulatory</p>
                                <p class="font-semibold text-[#161b52] text-lg">Technical</p>
                                <p class="font-semibold text-[#161b52] text-lg">Institutional</p>
                                <p class="font-semibold text-[#161b52] text-lg leading-tight">
                                    Commercial/financial/<br>economic
                                </p>
                                <p class="font-semibold text-[#161b52] text-lg">Procurement process</p>
                            </div>
                            <div class="flex items-start space-x-2 text-[#37C6F4]">
                                <!-- Icon -->
                                <span class="material-symbols-outlined text-[#37C6F4] text-[20px] leading-none">
                                    chat
                                </span>

                                <!-- Two-line text -->
                                <div class="text-sm leading-tight">
                                    <div>Stakeholder</div>
                                    <div>consultation phase</div>
                                </div>
                            </div>
                        </div>

                        <div class="slideBox slide bg-[#161b52] text-white px-5 pt-5 pb-3 space-y-3">
                            <p class="text-sm">• Section 2 content</p>
                            <ul class="text-sm space-y-2 list-disc list-inside marker:text-white">
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Lorem ipsum dolor sit amet</li>
                            </ul>
                        </div>

                        <button
                            class="toggleBtn w-full bg-[#161b52] text-white flex justify-between items-center px-5 py-4 text-lg font-medium">
                            <span class="btnText">More information</span>
                            <span class="toggleArrow material-symbols-outlined">expand_circle_right</span>
                        </button>

                    </div>
                </div>
                <div class="swiper-slide max-w-[286px]">
                    <div
                        class="card max-w-[286px] w-full bg-white rounded-2xl shadow-md overflow-hidden border border-[#1E1D57]">

                        <div class="p-5 space-y-3 card-before h-[284px] flex flex-col justify-between">
                             <div class="space-y-1">
                                <p class="font-semibold text-[#161b52] text-lg">PPP preparation/feasibility</p>
                                <p class="font-semibold text-[#161b52] text-lg">Legal/Regulatory</p>
                                <p class="font-semibold text-[#161b52] text-lg">Technical</p>
                                <p class="font-semibold text-[#161b52] text-lg">Institutional</p>
                                <p class="font-semibold text-[#161b52] text-lg leading-tight">
                                    Commercial/financial/<br>economic
                                </p>
                                <p class="font-semibold text-[#161b52] text-lg">Procurement process</p>
                            </div>
                            <div class="flex items-start space-x-2 text-[#37C6F4]">
                                <!-- Icon -->
                                <span class="material-symbols-outlined text-[#37C6F4] text-[20px] leading-none">
                                    chat
                                </span>

                                <!-- Two-line text -->
                                <div class="text-sm leading-tight">
                                    <div>Stakeholder</div>
                                    <div>consultation phase</div>
                                </div>
                            </div>
                        </div>

                        <div class="slideBox slide bg-[#161b52] text-white px-5 pt-5 pb-3 space-y-3">
                            <p class="text-sm">• Section 2 content</p>
                            <ul class="text-sm space-y-2 list-disc list-inside marker:text-white">
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Lorem ipsum dolor sit amet</li>
                            </ul>
                        </div>

                        <button
                            class="toggleBtn w-full bg-[#161b52] text-white flex justify-between items-center px-5 py-4 text-lg font-medium">
                            <span class="btnText">More information</span>
                            <span class="toggleArrow material-symbols-outlined">expand_circle_right</span>
                        </button>

                    </div>
                </div>
                <div class="swiper-slide max-w-[286px]">
                    <div
                        class="card max-w-[286px] w-full bg-white rounded-2xl shadow-md overflow-hidden border border-[#1E1D57]">

                        <div class="p-5 space-y-3 card-before h-[284px] flex flex-col justify-between">
                             <div class="space-y-1">
                                <p class="font-semibold text-[#161b52] text-lg">PPP preparation/feasibility</p>
                                <p class="font-semibold text-[#161b52] text-lg">Legal/Regulatory</p>
                                <p class="font-semibold text-[#161b52] text-lg">Technical</p>
                                <p class="font-semibold text-[#161b52] text-lg">Institutional</p>
                                <p class="font-semibold text-[#161b52] text-lg leading-tight">
                                    Commercial/financial/<br>economic
                                </p>
                                <p class="font-semibold text-[#161b52] text-lg">Procurement process</p>
                            </div>
                            <div class="flex items-start space-x-2 text-[#37C6F4]">
                                <!-- Icon -->
                                <span class="material-symbols-outlined text-[#37C6F4] text-[20px] leading-none">
                                    chat
                                </span>

                                <!-- Two-line text -->
                                <div class="text-sm leading-tight">
                                    <div>Stakeholder</div>
                                    <div>consultation phase</div>
                                </div>
                            </div>
                        </div>

                        <div class="slideBox slide bg-[#161b52] text-white px-5 pt-5 pb-3 space-y-3">
                            <p class="text-sm">• Section 2 content</p>
                            <ul class="text-sm space-y-2 list-disc list-inside marker:text-white">
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Lorem ipsum dolor sit amet</li>
                            </ul>
                        </div>

                        <button
                            class="toggleBtn w-full bg-[#161b52] text-white flex justify-between items-center px-5 py-4 text-lg font-medium">
                            <span class="btnText">More information</span>
                            <span class="toggleArrow material-symbols-outlined">expand_circle_right</span>
                        </button>

                    </div>
                </div>
                <div class="swiper-slide max-w-[286px]">
                    <div
                        class="card max-w-[286px] w-full bg-white rounded-2xl shadow-md overflow-hidden border border-[#1E1D57]">

                        <div class="p-5 space-y-3 card-before h-[284px] flex flex-col justify-between">
                             <div class="space-y-1">
                                <p class="font-semibold text-[#161b52] text-lg">PPP preparation/feasibility</p>
                                <p class="font-semibold text-[#161b52] text-lg">Legal/Regulatory</p>
                                <p class="font-semibold text-[#161b52] text-lg">Technical</p>
                                <p class="font-semibold text-[#161b52] text-lg">Institutional</p>
                                <p class="font-semibold text-[#161b52] text-lg leading-tight">
                                    Commercial/financial/<br>economic
                                </p>
                                <p class="font-semibold text-[#161b52] text-lg">Procurement process</p>
                            </div>
                            <div class="flex items-start space-x-2 text-[#37C6F4]">
                                <!-- Icon -->
                                <span class="material-symbols-outlined text-[#37C6F4] text-[20px] leading-none">
                                    chat
                                </span>

                                <!-- Two-line text -->
                                <div class="text-sm leading-tight">
                                    <div>Stakeholder</div>
                                    <div>consultation phase</div>
                                </div>
                            </div>
                        </div>

                        <div class="slideBox slide bg-[#161b52] text-white px-5 pt-5 pb-3 space-y-3">
                            <p class="text-sm">• Section 2 content</p>
                            <ul class="text-sm space-y-2 list-disc list-inside marker:text-white">
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Lorem ipsum dolor sit amet</li>
                            </ul>
                        </div>

                        <button
                            class="toggleBtn w-full bg-[#161b52] text-white flex justify-between items-center px-5 py-4 text-lg font-medium">
                            <span class="btnText">More information</span>
                            <span class="toggleArrow material-symbols-outlined">expand_circle_right</span>
                        </button>

                    </div>
                </div>
                <div class="swiper-slide max-w-[286px]">
                    <div
                        class="card max-w-[286px] w-full bg-white rounded-2xl shadow-md overflow-hidden border border-[#1E1D57]">

                        <div class="p-5 space-y-3 card-before h-[284px] flex flex-col justify-between">
                             <div class="space-y-1">
                                <p class="font-semibold text-[#161b52] text-lg">PPP preparation/feasibility</p>
                                <p class="font-semibold text-[#161b52] text-lg">Legal/Regulatory</p>
                                <p class="font-semibold text-[#161b52] text-lg">Technical</p>
                                <p class="font-semibold text-[#161b52] text-lg">Institutional</p>
                                <p class="font-semibold text-[#161b52] text-lg leading-tight">
                                    Commercial/financial/<br>economic
                                </p>
                                <p class="font-semibold text-[#161b52] text-lg">Procurement process</p>
                            </div>
                            <div class="flex items-start space-x-2 text-[#37C6F4]">
                                <!-- Icon -->
                                <span class="material-symbols-outlined text-[#37C6F4] text-[20px] leading-none">
                                    chat
                                </span>

                                <!-- Two-line text -->
                                <div class="text-sm leading-tight">
                                    <div>Stakeholder</div>
                                    <div>consultation phase</div>
                                </div>
                            </div>
                        </div>

                        <div class="slideBox slide bg-[#161b52] text-white px-5 pt-5 pb-3 space-y-3">
                            <p class="text-sm">• Section 2 content</p>
                            <ul class="text-sm space-y-2 list-disc list-inside marker:text-white">
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Lorem ipsum dolor sit amet</li>
                            </ul>
                        </div>

                        <button
                            class="toggleBtn w-full bg-[#161b52] text-white flex justify-between items-center px-5 py-4 text-lg font-medium">
                            <span class="btnText">More information</span>
                            <span class="toggleArrow material-symbols-outlined">expand_circle_right</span>
                        </button>

                    </div>
                </div>
                <div class="swiper-slide max-w-[286px]">
                    <div
                        class="card max-w-[286px] w-full bg-white rounded-2xl shadow-md overflow-hidden border border-[#1E1D57]">

                        <div class="p-5 space-y-3 card-before h-[284px] flex flex-col justify-between">
                             <div class="space-y-1">
                                <p class="font-semibold text-[#161b52] text-lg">PPP preparation/feasibility</p>
                                <p class="font-semibold text-[#161b52] text-lg">Legal/Regulatory</p>
                                <p class="font-semibold text-[#161b52] text-lg">Technical</p>
                                <p class="font-semibold text-[#161b52] text-lg">Institutional</p>
                                <p class="font-semibold text-[#161b52] text-lg leading-tight">
                                    Commercial/financial/<br>economic
                                </p>
                                <p class="font-semibold text-[#161b52] text-lg">Procurement process</p>
                            </div>
                            <div class="flex items-start space-x-2 text-[#37C6F4]">
                                <!-- Icon -->
                                <span class="material-symbols-outlined text-[#37C6F4] text-[20px] leading-none">
                                    chat
                                </span>

                                <!-- Two-line text -->
                                <div class="text-sm leading-tight">
                                    <div>Stakeholder</div>
                                    <div>consultation phase</div>
                                </div>
                            </div>
                        </div>

                        <div class="slideBox slide bg-[#161b52] text-white px-5 pt-5 pb-3 space-y-3">
                            <p class="text-sm">• Section 2 content</p>
                            <ul class="text-sm space-y-2 list-disc list-inside marker:text-white">
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Lorem ipsum dolor sit amet</li>
                            </ul>
                        </div>

                        <button
                            class="toggleBtn w-full bg-[#161b52] text-white flex justify-between items-center px-5 py-4 text-lg font-medium">
                            <span class="btnText">More information</span>
                            <span class="toggleArrow material-symbols-outlined">expand_circle_right</span>
                        </button>

                    </div>
                </div>
                <div class="swiper-slide max-w-[286px]">
                    <div
                        class="card max-w-[286px] w-full bg-white rounded-2xl shadow-md overflow-hidden border border-[#1E1D57]">

                        <div class="p-5 space-y-3 card-before h-[284px] flex flex-col justify-between">
                             <div class="space-y-1">
                                <p class="font-semibold text-[#161b52] text-lg">PPP preparation/feasibility</p>
                                <p class="font-semibold text-[#161b52] text-lg">Legal/Regulatory</p>
                                <p class="font-semibold text-[#161b52] text-lg">Technical</p>
                                <p class="font-semibold text-[#161b52] text-lg">Institutional</p>
                                <p class="font-semibold text-[#161b52] text-lg leading-tight">
                                    Commercial/financial/<br>economic
                                </p>
                                <p class="font-semibold text-[#161b52] text-lg">Procurement process</p>
                            </div>
                            <div class="flex items-start space-x-2 text-[#37C6F4]">
                                <!-- Icon -->
                                <span class="material-symbols-outlined text-[#37C6F4] text-[20px] leading-none">
                                    chat
                                </span>

                                <!-- Two-line text -->
                                <div class="text-sm leading-tight">
                                    <div>Stakeholder</div>
                                    <div>consultation phase</div>
                                </div>
                            </div>
                        </div>

                        <div class="slideBox slide bg-[#161b52] text-white px-5 pt-5 pb-3 space-y-3">
                            <p class="text-sm">• Section 2 content</p>
                            <ul class="text-sm space-y-2 list-disc list-inside marker:text-white">
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Lorem ipsum dolor sit amet</li>
                            </ul>
                        </div>

                        <button
                            class="toggleBtn w-full bg-[#161b52] text-white flex justify-between items-center px-5 py-4 text-lg font-medium">
                            <span class="btnText">More information</span>
                            <span class="toggleArrow material-symbols-outlined">expand_circle_right</span>
                        </button>

                    </div>
                </div>
                <div class="swiper-slide max-w-[286px]">
                    <div
                        class="card max-w-[286px] w-full bg-white rounded-2xl shadow-md overflow-hidden border border-[#1E1D57]">

                        <div class="p-5 space-y-3 card-before h-[284px] flex flex-col justify-between">
                             <div class="space-y-1">
                                <p class="font-semibold text-[#161b52] text-lg">PPP preparation/feasibility</p>
                                <p class="font-semibold text-[#161b52] text-lg">Legal/Regulatory</p>
                                <p class="font-semibold text-[#161b52] text-lg">Technical</p>
                                <p class="font-semibold text-[#161b52] text-lg">Institutional</p>
                                <p class="font-semibold text-[#161b52] text-lg leading-tight">
                                    Commercial/financial/<br>economic
                                </p>
                                <p class="font-semibold text-[#161b52] text-lg">Procurement process</p>
                            </div>
                            <div class="flex items-start space-x-2 text-[#37C6F4]">
                                <!-- Icon -->
                                <span class="material-symbols-outlined text-[#37C6F4] text-[20px] leading-none">
                                    chat
                                </span>

                                <!-- Two-line text -->
                                <div class="text-sm leading-tight">
                                    <div>Stakeholder</div>
                                    <div>consultation phase</div>
                                </div>
                            </div>
                        </div>

                        <div class="slideBox slide bg-[#161b52] text-white px-5 pt-5 pb-3 space-y-3">
                            <p class="text-sm">• Section 2 content</p>
                            <ul class="text-sm space-y-2 list-disc list-inside marker:text-white">
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Lorem ipsum dolor sit amet</li>
                            </ul>
                        </div>

                        <button
                            class="toggleBtn w-full bg-[#161b52] text-white flex justify-between items-center px-5 py-4 text-lg font-medium">
                            <span class="btnText">More information</span>
                            <span class="toggleArrow material-symbols-outlined">expand_circle_right</span>
                        </button>

                    </div>
                </div>
                <div class="swiper-slide max-w-[286px]">
                    <div
                        class="card max-w-[286px] w-full bg-white rounded-2xl shadow-md overflow-hidden border border-[#1E1D57]">

                        <div class="p-5 space-y-3 card-before h-[284px] flex flex-col justify-between">
                             <div class="space-y-1">
                                <p class="font-semibold text-[#161b52] text-lg">PPP preparation/feasibility</p>
                                <p class="font-semibold text-[#161b52] text-lg">Legal/Regulatory</p>
                                <p class="font-semibold text-[#161b52] text-lg">Technical</p>
                                <p class="font-semibold text-[#161b52] text-lg">Institutional</p>
                                <p class="font-semibold text-[#161b52] text-lg leading-tight">
                                    Commercial/financial/<br>economic
                                </p>
                                <p class="font-semibold text-[#161b52] text-lg">Procurement process</p>
                            </div>
                            <div class="flex items-start space-x-2 text-[#37C6F4]">
                                <!-- Icon -->
                                <span class="material-symbols-outlined text-[#37C6F4] text-[20px] leading-none">
                                    chat
                                </span>

                                <!-- Two-line text -->
                                <div class="text-sm leading-tight">
                                    <div>Stakeholder</div>
                                    <div>consultation phase</div>
                                </div>
                            </div>
                        </div>

                        <div class="slideBox slide bg-[#161b52] text-white px-5 pt-5 pb-3 space-y-3">
                            <p class="text-sm">• Section 2 content</p>
                            <ul class="text-sm space-y-2 list-disc list-inside marker:text-white">
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Lorem ipsum dolor sit amet</li>
                            </ul>
                        </div>

                        <button
                            class="toggleBtn w-full bg-[#161b52] text-white flex justify-between items-center px-5 py-4 text-lg font-medium">
                            <span class="btnText">More information</span>
                            <span class="toggleArrow material-symbols-outlined">expand_circle_right</span>
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- CARDS SLIDER SECTION end  -->

<!-- from complex document start  -->
<section class="bg-[linear-gradient(111deg,#37C6F4_0%,#5CD3CE_100%)] opacity-100 mt-4  text-black px-6 lg:px-16 py-[80px]">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 440 20.722"
        class="absolute top-0 left-1/2 -translate-x-1/2 block md:hidden w-full">
        <path id="Path_435" data-name="Path 435"
            d="M0,21.645c128.377,0,172.165,20.722,230.524,20.722S333.263,21.645,440,21.645H0Z"
            transform="translate(0 -21.645)" fill="#fff"></path>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" width="440" height="20.722" viewBox="0 0 440 20.722"
        class="absolute top-0 right-[25%] hidden md:block">
        <path id="Path_435" data-name="Path 435"
            d="M0,21.645c128.377,0,172.165,20.722,230.524,20.722S333.263,21.645,440,21.645H0Z"
            transform="translate(0 -21.645)" fill="#fff"></path>
    </svg>
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-start md:gap-8">
        <div class="max-w-[604px]">
            <h2 class="text-3xl text-[#1E1D57] md:text-[40px] font-semibold leading-tight mb-4">
                From complex documents to clear guidance – all in one place
            </h2>
            <p class="text-[#000000]">
                Access comprehensive PPP documentation alongside bite-sized summaries, expert tips, audio overviews, and
                video discussions. Every resource is designed to save you time and build your understanding, step by
                step.
            </p>
        </div>

        <a href="{{ route('resources') }}" class="group inline-flex items-center text-[#37C6F4] mt-6 md:mt-0 font-medium  whitespace-nowrap bg-[#1E1D57] rounded-[25px] py-[10px] px-[27px] 
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
    <div class="max-w-7xl mx-auto pt-6">

        <!-- Slider -->
        <div id="cardSlider" class="flex sm:grid sm:grid-cols-2 lg:grid-cols-4 gap-10
                overflow-x-auto sm:overflow-visible
                snap-x snap-mandatory sm:snap-none
                pb-4 overflow-y-scroll 
            [scrollbar-width:none] 
            [-ms-overflow-style:none] 
            [&amp;::-webkit-scrollbar]:hidden">

            <!-- CARD 1 -->
            <div class="text-left shrink-0 w-[286px] snap-start sm:w-auto">
                <img src="{{ asset('images/Document-library.svg') }}" alt="">
                <h3 class="text-white mt-[12px]">Document library</h3>
                <p class="text-black mt-5 text-[16px] leading-normal">
                    Access full PPP guidance documents, contracts, and case studies from water projects worldwide
                </p>
            </div>

            <!-- CARD 2 -->
            <div class="text-left shrink-0 w-[286px] snap-start sm:w-auto">
                <img src="{{ asset('images/summary-guides.svg') }}" alt="">
                <h3 class="text-white mt-[12px]">Summary guides</h3>
                <p class="text-black mt-5 text-[16px] leading-normal">
                    Get concise overviews highlighting key points and actionable insights from lengthy technical
                    documents
                </p>
            </div>

            <!-- CARD 3 -->
            <div class="text-left shrink-0 w-[286px] snap-start sm:w-auto">
                <img src="https://water-hub.ecareinfoway.com/images/Audio-briefings.svg" alt="">
                <h3 class="text-white mt-3">Audio briefings</h3>
                <p class="text-black mt-5 text-[16px] leading-normal">
                    Listen to expert summaries and discussions whilst commuting or between meetings
                </p>
            </div>

            <!-- CARD 4 -->
            <div class="text-left shrink-0 w-[286px] snap-start sm:w-auto">
                <img src="https://water-hub.ecareinfoway.com/images/video-explainers.svg" alt="">
                <h3 class="text-white mt-3">Video explainers</h3>
                <p class="text-black mt-5 text-[16px] leading-normal">
                    Watch visual breakdowns of complex PPP concepts and real-world project examples
                </p>
            </div>

        </div>

        <!-- Progress Bar (ONLY MOBILE) -->
        <div class="block sm:hidden w-full bg-[#8ae0e6] h-[8px] rounded-full mt-3 relative overflow-hidden">
            <div id="progressFill" class="h-full bg-[#153c8a] rounded-full transition-all duration-200"
                style="width: 0%;">
            </div>
        </div>
    </div>
    </div>
</section>
<!-- from complex document end  -->

<!-- your partner section start  -->
<section class="bg-[#1E1D57] py-18 lg:py-20 px-6 lg:px-16">

    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-start md:items-end gap-8">
        <div class="flex-1 text-white md:max-w-[604px]">
            <img src="/images/aquafedlogo.png" alt="aquafed logo" class="mb-2">
            <h2 class="text-3xl md:text-[40px] font-bold mb-6 leading-snug">
                Your partner in water and wastewater PPP development
            </h2>
            <p class="text-base leading-relaxed">
                We understand that navigating water PPPs can feel overwhelming. Documents are technical, information is
                fragmented, and time is limited. That's why <span class="underline text-[#37C6F4]">AquaFed</span>
                created this Hub – to give you clarity, confidence, and practical tools backed by decades of global
                water partnership expertise. We're here to help you succeed.
            </p>
        </div>

        <div class="flex-shrink-0">
            <a href="{{ route('about') }}"
                class="group inline-flex items-center text-[#37C6F4] text-lg font-semibold  hover:underline hover:underline-offset-4 hover:text-white">

                Learn more about AquaFed

                <!-- SVG Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    class="ml-2 transition-all duration-200 fill-[#37C6F4] group-hover:fill-white ">
                    <rect width="24" height="24" fill="none"></rect>
                    <path d="M12.6,12,8,7.4,9.4,6l6,6-6,6L8,16.6,12.6,12Z"></path>
                </svg>
            </a>
        </div>
    </div>
</section>
<!-- your partner section end  -->

<!-- Featuring content start  -->


<section class="lg:py-8  pt-16 px-6 lg:px-16">
    <div class="max-w-7xl mx-auto  items-start ">
        <h3 class="text-[#1E1D57] text-[22px] md:text-2xl font-bold">
            Featuring content from
        </h3>
    </div>
</section>

<!-- Featuring content end   -->

<!-- slider infinite start -->
<section class="w-full overflow-hidden   mb-4 sm:mb-6 lg:mb-16">

    <ul class="flex animate-slide mt-6 w-[200%]">
        <!-- Original Set -->
        <li class="flex-1 sm:flex-auto flex justify-center items-center px-2 sm:px-4">
            <img src="https://upload.wikimedia.org/wikipedia/commons/1/1b/EBay_logo.svg" class="h-12 object-contain"
                alt="eBay">
        </li>
        <li class="flex-1 sm:flex-auto flex justify-center items-center px-2 sm:px-4">
            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b1/CNN.svg" class="h-12 object-contain"
                alt="CNN">
        </li>
        <li class="flex-1 sm:flex-auto flex justify-center items-center px-2 sm:px-4">
            <img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg"
                class="h-12 object-contain" alt="Google">
        </li>
        <li class="flex-1 sm:flex-auto flex justify-center items-center px-2 sm:px-4">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/64/Cisco_logo.svg" class="h-12 object-contain"
                alt="Cisco">
        </li>
        <li class="flex-1 sm:flex-auto flex justify-center items-center px-2 sm:px-4">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/69/Airbnb_Logo_Bélo.svg"
                class="h-12 object-contain" alt="Airbnb">
        </li>
        <li class="flex-1 sm:flex-auto flex justify-center items-center px-2 sm:px-4">
            <img src="https://upload.wikimedia.org/wikipedia/commons/c/cc/Uber_logo_2018.png"
                class="h-12 object-contain" alt="Uber">
        </li>

        <!-- Duplicate Set for seamless loop -->
        <li class="flex-1 sm:flex-auto flex justify-center items-center px-2 sm:px-4">
            <img src="https://upload.wikimedia.org/wikipedia/commons/1/1b/EBay_logo.svg" class="h-12 object-contain"
                alt="eBay">
        </li>
        <li class="flex-1 sm:flex-auto flex justify-center items-center px-2 sm:px-4">
            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b1/CNN.svg" class="h-12 object-contain"
                alt="CNN">
        </li>
        <li class="flex-1 sm:flex-auto flex justify-center items-center px-2 sm:px-4">
            <img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg"
                class="h-12 object-contain" alt="Google">
        </li>
        <li class="flex-1 sm:flex-auto flex justify-center items-center px-2 sm:px-4">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/64/Cisco_logo.svg" class="h-12 object-contain"
                alt="Cisco">
        </li>
        <li class="flex-1 sm:flex-auto flex justify-center items-center px-2 sm:px-4">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/69/Airbnb_Logo_Bélo.svg"
                class="h-12 object-contain" alt="Airbnb">
        </li>
        <li class="flex-1 sm:flex-auto flex justify-center items-center px-2 sm:px-4">
            <img src="https://upload.wikimedia.org/wikipedia/commons/c/cc/Uber_logo_2018.png"
                class="h-12 object-contain" alt="Uber">
        </li>
    </ul>
</section>
<!-- slider infinite end -->

<!-- wave Section -->
<section class="relative bg-cover bg-center px-6 lg:px-16  bg-no-repeat text-white overflow-hidden py-20 lg:pb-24"
    style="background-image: url('{{ asset('images/bitmapbg.jpg') }}');">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 440 20.722"
        class="absolute top-0 left-1/2 -translate-x-1/2 block md:hidden w-full z-50">
        <path id="Path_435" data-name="Path 435"
            d="M0,21.645c128.377,0,172.165,20.722,230.524,20.722S333.263,21.645,440,21.645H0Z"
            transform="translate(0 -21.645)" fill="#fff"></path>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" width="440" height="20.722" viewBox="0 0 440 20.722"
        class="absolute left-[10%] top-0  hidden md:block z-50">
        <path id="Path_435" data-name="Path 435"
            d="M0,21.645c128.377,0,172.165,20.722,230.524,20.722S333.263,21.645,440,21.645H0Z"
            transform="translate(0 -21.645)" fill="#fff"></path>
    </svg>
    <!-- Overlay gradient -->
    <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/60 to-transparent"></div>

    <!-- Content -->
    <div class="relative max-w-7xl mx-auto flex flex-col justify-center mb-12">
        <div class="max-w-2xl">
            <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
                Gain a better understanding<br>
                of water and wastewater<br>
                PPPs today.
            </h1>

            <p class="text-lg md:text-xl font-medium text-gray-200 mb-8">
                Join government officials, consultants, and investors worldwide who trust the Hub for practical PPP
                guidance.
            </p>

            @auth
            <a href="{{ route('map.index') }}"
                class="inline-block bg-[#3DB8FF] text-[#1E1D57] font-semibold text-lg  py-[6px] px-[31px] rounded-full hover:bg-[#1E1D57] hover:text-[#37C6F4] transition-all duration-300 flex items-center justify-center">
                View Map
            </a>
            @else

          <a href="{{ route('register') }}"
                class="inline-block bg-[#3DB8FF] text-[#1E1D57] font-semibold text-lg  py-[6px] px-9 rounded-full hover:bg-[#1E1D57] hover:text-[#37C6F4] transition-all duration-300 flex items-center justify-center">
                Register
            </a>


            @endauth
        </div>
    </div>

    <!-- Waves (inside hero section for overlap effect) -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg class="w-full h-10 md:h-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 24 150 28"
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
    </div>
</section>


@endsection