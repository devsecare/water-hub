@extends('layouts.frontend')

@section('title', 'Water PPP Resources - PPP Water Hub')

@push('styles')
<script src="https://unpkg.com/lucide@latest"></script>
@endpush

@section('content')
<!-- ✅ HERO -->
<section class="bg-gradient-to-r from-[#070648] to-[#2CBE9D] text-white px-6 lg:px-16">
    <div class="max-w-7xl mx-auto  py-20 sm:py-24 lg:py-28">
        <p class="text-lg text-[#37C6F4] font-semibold mb-2">WATER PPP RESOURCES</p>
        <h1 class="text-4xl font-appetite sm:text-4xl font-extrabold leading-none max-w-xl">
            Everything You Need To Identify, Prepare, Implement And Manage Your PPP Project
        </h1>
    </div>
</section>

<!-- ✅ INTRO -->
<section class="px-6 lg:px-16 py-12 sm:py-16 lg:py-20">
    <section class="max-w-7xl mx-auto ">
        <p class="text-[19px] sm:text-xl md:text-lg max-w-2xl">
            Browse by category to find the guidance you need – from foundational PPP concepts to contract management and
            monitoring. Bookmark resources to save and view them in your account, or download documents, audio, and
            video
            files to access offline anytime.
        </p>
    </section>
</section>

<!-- ✅ MAIN -->
<section class="bg-[#f2f2f2]  lg:px-16 py-12 sm:py-16 lg:py-20">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row min-h-screen">
        <!--  mobile Sidebar -->
        <div class="mob-search-filters relative md:hidden z-10">
            <div class="filter-main-tab py-8 pb-2">
                <button
                    class="search-filter-open-close bg-[#1E1D57] flex text-[#fff] gap-4 py-3 px-6 rounded-r-[25px] w-full max-w-[300px] justify-between items-center">
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
            <div  class="mobile-filter-list absolute top-full bg-white py-6 px-6 rounded-r-[24px] -left-100 transition-all duration-300 w-full max-w-[300px]">
                <div class="filter-top pb-6">
                    <ul class="flex flex-col gap-3">
                        <li>
                            <a href="javascript:void(0)" class="flex gap-2"><span><svg id="book-icon"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path id="Path_395" data-name="Path 395"
                                            d="M6,22a3,3,0,0,1-3.01-3.01V5a2.9,2.9,0,0,1,.88-2.13A2.883,2.883,0,0,1,6,1.99H17v16H6a1,1,0,1,0,0,2H19V4h2V22Zm3-6h6V4H9ZM7,16V4H6A.99.99,0,0,0,5,5V16.18c.17-.05.33-.09.49-.13A2.1,2.1,0,0,1,6,16H7ZM5,4V4Z"
                                            fill="currentColor" />
                                        <rect id="Rectangle_50" data-name="Rectangle 50" width="24" height="24"
                                            fill="none" />
                                    </svg>
                                </span>All content
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="flex gap-2"><span><svg id="casestudy-icon"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path id="Path_397" data-name="Path 397"
                                            d="M12,22a2.262,2.262,0,0,1-1.18-.31,2.3,2.3,0,0,1-.83-.84,2.015,2.015,0,0,1-2-2V15.3a7.241,7.241,0,0,1-2.36-2.58,7.1,7.1,0,0,1-.89-3.48A6.987,6.987,0,0,1,6.85,4.1a6.987,6.987,0,0,1,5.14-2.11A6.987,6.987,0,0,1,17.13,4.1a6.987,6.987,0,0,1,2.11,5.14,7.033,7.033,0,0,1-.89,3.5,7.317,7.317,0,0,1-2.36,2.55v3.55a2.015,2.015,0,0,1-2,2,2.3,2.3,0,0,1-.83.84,2.237,2.237,0,0,1-1.18.31Zm-2-3.15h4v-.9H10Zm0-1.9h4V16H10ZM9.8,14h1.45V11.3L9.05,9.1,10.1,8.05,12,9.95l1.9-1.9L14.95,9.1l-2.2,2.2V14H14.2a5.478,5.478,0,0,0,2.2-1.91,4.945,4.945,0,0,0,.85-2.84,5.07,5.07,0,0,0-1.53-3.73,5.07,5.07,0,0,0-3.73-1.53A5.07,5.07,0,0,0,8.26,5.52,5.07,5.07,0,0,0,6.73,9.25a4.945,4.945,0,0,0,.85,2.84A5.478,5.478,0,0,0,9.78,14Z"
                                            fill="currentColor" />
                                        <rect id="Rectangle_52" data-name="Rectangle 52" width="24" height="24"
                                            fill="none" />
                                    </svg>
                                </span>All case studies
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="filter-middle py-6 border-t border-b border-[#D1D1D1]">
                    <ul class="space-y-4">
                        <li class="border border-[#1E1D57] rounded-full px-3 py-2">
                            <a href="javascript:void(0)" class="flex gap-2"><span><svg id="target-icon"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path id="Path_407" data-name="Path 407"
                                            d="M12,22a9.678,9.678,0,0,1-3.9-.79,9.989,9.989,0,0,1-5.32-5.32,9.678,9.678,0,0,1-.79-3.9,9.678,9.678,0,0,1,.79-3.9A9.989,9.989,0,0,1,8.1,2.77,9.678,9.678,0,0,1,12,1.98a9.678,9.678,0,0,1,3.9.79,9.989,9.989,0,0,1,5.32,5.32,9.678,9.678,0,0,1,.79,3.9,9.678,9.678,0,0,1-.79,3.9,9.989,9.989,0,0,1-5.32,5.32A9.678,9.678,0,0,1,12,22Zm0-2a7.742,7.742,0,0,0,5.68-2.33,7.726,7.726,0,0,0,2.33-5.68,7.726,7.726,0,0,0-2.33-5.68A7.726,7.726,0,0,0,12,3.98,7.726,7.726,0,0,0,6.32,6.31a7.726,7.726,0,0,0-2.33,5.68,7.726,7.726,0,0,0,2.33,5.68A7.726,7.726,0,0,0,12,20Zm0-2a5.773,5.773,0,0,1-4.25-1.75A5.773,5.773,0,0,1,6,12,5.773,5.773,0,0,1,7.75,7.75,5.773,5.773,0,0,1,12,6a5.773,5.773,0,0,1,4.25,1.75A5.773,5.773,0,0,1,18,12a5.975,5.975,0,0,1-6,6Zm0-2a4.029,4.029,0,0,0,4.01-4.01A4.029,4.029,0,0,0,12,7.98a4.029,4.029,0,0,0-4.01,4.01A4.029,4.029,0,0,0,12,16Zm0-2a1.994,1.994,0,0,1-1.41-3.41,1.994,1.994,0,1,1,2.82,2.82A1.926,1.926,0,0,1,12,14Z"
                                            fill="#1E1D57" />
                                        <rect id="Rectangle_62" data-name="Rectangle 62" width="24" height="24"
                                            fill="none" />
                                    </svg>

                                </span>Identifying PPP opportunities
                            </a>
                        </li>
                        <li class="border border-[#1E1D57] rounded-full px-3 py-2">
                            <a href="javascript:void(0)" class="flex gap-2"><span><svg id="planning-icon"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path id="Path_426" data-name="Path 426"
                                            d="M5,11a1.926,1.926,0,0,1-1.41-.59A1.926,1.926,0,0,1,3,9V5a1.926,1.926,0,0,1,.59-1.41A1.926,1.926,0,0,1,5,3H19a1.926,1.926,0,0,1,1.41.59A1.926,1.926,0,0,1,21,5V9a2.015,2.015,0,0,1-2,2ZM5,9H19V5H5ZM5,21a1.926,1.926,0,0,1-1.41-.59A1.926,1.926,0,0,1,3,19V15a1.926,1.926,0,0,1,.59-1.41A1.926,1.926,0,0,1,5,13H19a2.015,2.015,0,0,1,2,2v4a2.015,2.015,0,0,1-2,2Zm0-2H19V15H5ZM5,5V5ZM5,15v0Z"
                                            fill="#1E1D57" />
                                        <rect id="Rectangle_72" data-name="Rectangle 72" width="24" height="24"
                                            fill="none" />
                                    </svg>

                                </span>Preparing your project
                            </a>
                        </li>
                        <li class="border border-[#1E1D57] rounded-full px-3 py-2">
                            <a href="javascript:void(0)" class="flex gap-2"><span><svg id="implementation-icon"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path id="Path_425" data-name="Path 425"
                                            d="M21.6,23l-3.08-3.05a3.707,3.707,0,0,1-.96.41,4.166,4.166,0,0,1-1.06.14,4.029,4.029,0,0,1-4.01-4.01,4.029,4.029,0,0,1,4.01-4.01,4.029,4.029,0,0,1,4.01,4.01,3.879,3.879,0,0,1-.15,1.09,3.763,3.763,0,0,1-.43.96l3.08,3.05-1.4,1.4ZM5.5,20.5a3.853,3.853,0,0,1-2.83-1.18,3.984,3.984,0,0,1,0-5.66A3.875,3.875,0,0,1,5.5,12.48a3.853,3.853,0,0,1,2.83,1.18,3.984,3.984,0,0,1,0,5.66A3.853,3.853,0,0,1,5.5,20.5Zm0-2a2,2,0,1,0-1.41-3.41A2,2,0,0,0,5.5,18.5Zm11,0a2.015,2.015,0,1,0-1.41-.59A1.926,1.926,0,0,0,16.5,18.5Zm-11-9A3.853,3.853,0,0,1,2.67,8.32,3.875,3.875,0,0,1,1.49,5.49,3.853,3.853,0,0,1,2.67,2.66,3.875,3.875,0,0,1,5.5,1.48,3.853,3.853,0,0,1,8.33,2.66,3.853,3.853,0,0,1,9.51,5.49,3.853,3.853,0,0,1,8.33,8.32,3.853,3.853,0,0,1,5.5,9.5Zm11,0a3.853,3.853,0,0,1-2.83-1.18,3.853,3.853,0,0,1-1.18-2.83,3.853,3.853,0,0,1,1.18-2.83,3.984,3.984,0,0,1,5.66,0,3.853,3.853,0,0,1,1.18,2.83,3.853,3.853,0,0,1-1.18,2.83A3.853,3.853,0,0,1,16.5,9.5Zm-11-2a2.015,2.015,0,0,0,2-2,2.015,2.015,0,0,0-2-2,2.015,2.015,0,0,0-2,2,2.015,2.015,0,0,0,2,2Zm11,0a2.015,2.015,0,0,0,2-2,2,2,0,1,0-3.41,1.41A1.926,1.926,0,0,0,16.5,7.5Z"
                                            fill="#1E1D57" />
                                        <rect id="Rectangle_71" data-name="Rectangle 71" width="24" height="24"
                                            fill="none" />
                                    </svg>
                                </span>Implementation
                            </a>
                        </li>
                        <li class="border border-[#1E1D57] rounded-full px-3 py-2">
                            <a href="javascript:void(0)" class="flex gap-2"><span><svg id="droplet-icon"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path id="Path_401" data-name="Path 401"
                                            d="M12.28,19a.815.815,0,0,0,.51-.24.694.694,0,0,0,.21-.51.738.738,0,0,0-.23-.56.758.758,0,0,0-.58-.19,3.965,3.965,0,0,1-2.18-.56,3.062,3.062,0,0,1-1.45-2.31.742.742,0,0,0-.26-.45A.724.724,0,0,0,7.81,14a.752.752,0,0,0-.58.26.67.67,0,0,0-.15.61,4.557,4.557,0,0,0,2,3.25,5.384,5.384,0,0,0,3.18.88ZM12,22a7.625,7.625,0,0,1-5.71-2.35A8.047,8.047,0,0,1,4,13.8,9.863,9.863,0,0,1,5.99,8.36,33.335,33.335,0,0,1,12,2a33.018,33.018,0,0,1,6.01,6.36A9.942,9.942,0,0,1,20,13.8a8.047,8.047,0,0,1-2.29,5.85A7.64,7.64,0,0,1,12,22Zm0-2a5.737,5.737,0,0,0,4.3-1.76A6.136,6.136,0,0,0,18,13.8a7.753,7.753,0,0,0-1.51-4.13A28.007,28.007,0,0,0,12,4.64,28.057,28.057,0,0,0,7.51,9.67,7.725,7.725,0,0,0,6,13.8a6.168,6.168,0,0,0,1.7,4.44A5.7,5.7,0,0,0,12,20Z"
                                            fill="#1E1D57" />
                                        <rect id="Rectangle_56" data-name="Rectangle 56" width="24" height="24"
                                            fill="none" />
                                    </svg>

                                </span>Management
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="w-full mt-6">
                <label class="block text-lg font-semibold text-[#000000] mb-3">Search</label>
                <div class="relative">
                    <input type="text" placeholder="Search…" class="w-full bg-white shadow-sm rounded-full py-3 pl-4 pr-10 text-gray-700 
                   placeholder-gray-400 focus:ring-0 focus:outline-none">

                    <!-- Search Icon -->
                    <span class="absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18.095 18.095">
                            <path
                                d="M16.681,18.1h0l-5.145-5.145a7.2,7.2,0,1,1,1.414-1.414L18.1,16.681l-1.413,1.413ZM7.2,2a5.2,5.2,0,1,0,5.2,5.2A5.206,5.206,0,0,0,7.2,2Z"
                                fill="#1E1D57"></path>
                        </svg>
                    </span>
                </div>
            </div>

            </div>
        </div>
        <!-- side bar desktop  -->
        <aside class="w-full md:w-64 lg:w-[20rem] p-6 lg:p-0 hidden md:block">
            <ul class="space-y-3 text-gray-700 font-medium space-y-6">
                <li class="flex items-center gap-3 cursor-pointer hover:text-blue-600">
                    <svg id="book-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path id="Path_395" data-name="Path 395"
                            d="M6,22a3,3,0,0,1-3.01-3.01V5a2.9,2.9,0,0,1,.88-2.13A2.883,2.883,0,0,1,6,1.99H17v16H6a1,1,0,1,0,0,2H19V4h2V22Zm3-6h6V4H9ZM7,16V4H6A.99.99,0,0,0,5,5V16.18c.17-.05.33-.09.49-.13A2.1,2.1,0,0,1,6,16H7ZM5,4V4Z"
                            fill="#1E1D57" />
                        <rect id="Rectangle_50" data-name="Rectangle 50" width="24" height="24" fill="none" />
                    </svg>
                    <span>All content</span>
                </li>
                <li class="flex items-center gap-3 cursor-pointer border-b border-[#D1D1D1] pb-6  hover:text-blue-600">
                    <svg id="casestudy-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path id="Path_397" data-name="Path 397"
                            d="M12,22a2.262,2.262,0,0,1-1.18-.31,2.3,2.3,0,0,1-.83-.84,2.015,2.015,0,0,1-2-2V15.3a7.241,7.241,0,0,1-2.36-2.58,7.1,7.1,0,0,1-.89-3.48A6.987,6.987,0,0,1,6.85,4.1a6.987,6.987,0,0,1,5.14-2.11A6.987,6.987,0,0,1,17.13,4.1a6.987,6.987,0,0,1,2.11,5.14,7.033,7.033,0,0,1-.89,3.5,7.317,7.317,0,0,1-2.36,2.55v3.55a2.015,2.015,0,0,1-2,2,2.3,2.3,0,0,1-.83.84,2.237,2.237,0,0,1-1.18.31Zm-2-3.15h4v-.9H10Zm0-1.9h4V16H10ZM9.8,14h1.45V11.3L9.05,9.1,10.1,8.05,12,9.95l1.9-1.9L14.95,9.1l-2.2,2.2V14H14.2a5.478,5.478,0,0,0,2.2-1.91,4.945,4.945,0,0,0,.85-2.84,5.07,5.07,0,0,0-1.53-3.73,5.07,5.07,0,0,0-3.73-1.53A5.07,5.07,0,0,0,8.26,5.52,5.07,5.07,0,0,0,6.73,9.25a4.945,4.945,0,0,0,.85,2.84A5.478,5.478,0,0,0,9.78,14Z"
                            fill="#1E1D57" />
                        <rect id="Rectangle_52" data-name="Rectangle 52" width="24" height="24" fill="none" />
                    </svg> <span>All case study</span>
                </li>

                <li class="border rounded-3xl border-[#1E1D57]">
                    <button class="flex items-center justify-between w-full text-left text-gray-700 font-semibold p-2">
                        <span class="flex items-center gap-3"><svg id="target-icon" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24">
                                <path id="Path_407" data-name="Path 407"
                                    d="M12,22a9.678,9.678,0,0,1-3.9-.79,9.989,9.989,0,0,1-5.32-5.32,9.678,9.678,0,0,1-.79-3.9,9.678,9.678,0,0,1,.79-3.9A9.989,9.989,0,0,1,8.1,2.77,9.678,9.678,0,0,1,12,1.98a9.678,9.678,0,0,1,3.9.79,9.989,9.989,0,0,1,5.32,5.32,9.678,9.678,0,0,1,.79,3.9,9.678,9.678,0,0,1-.79,3.9,9.989,9.989,0,0,1-5.32,5.32A9.678,9.678,0,0,1,12,22Zm0-2a7.742,7.742,0,0,0,5.68-2.33,7.726,7.726,0,0,0,2.33-5.68,7.726,7.726,0,0,0-2.33-5.68A7.726,7.726,0,0,0,12,3.98,7.726,7.726,0,0,0,6.32,6.31a7.726,7.726,0,0,0-2.33,5.68,7.726,7.726,0,0,0,2.33,5.68A7.726,7.726,0,0,0,12,20Zm0-2a5.773,5.773,0,0,1-4.25-1.75A5.773,5.773,0,0,1,6,12,5.773,5.773,0,0,1,7.75,7.75,5.773,5.773,0,0,1,12,6a5.773,5.773,0,0,1,4.25,1.75A5.773,5.773,0,0,1,18,12a5.975,5.975,0,0,1-6,6Zm0-2a4.029,4.029,0,0,0,4.01-4.01A4.029,4.029,0,0,0,12,7.98a4.029,4.029,0,0,0-4.01,4.01A4.029,4.029,0,0,0,12,16Zm0-2a1.994,1.994,0,0,1-1.41-3.41,1.994,1.994,0,1,1,2.82,2.82A1.926,1.926,0,0,1,12,14Z"
                                    fill="#1E1D57" />
                                <rect id="Rectangle_62" data-name="Rectangle 62" width="24" height="24" fill="none" />
                            </svg>
                            Identifying
                            PPP opportunities</span>
                        <i id="icon-menu1" data-lucide="chevron-down" class="w-4 h-4 transition-transform"></i>
                    </button>
                    <ul id="menu1" class="ml-8 mt-2 space-y-1 text-sm text-gray-600 hidden">
                        <li>Sub category topic 1</li>
                        <li>Sub category topic with a longer title 2</li>
                        <li>Sub category topic 3</li>
                        <li>Sub category topic 4</li>
                    </ul>
                </li>

                <li class="border rounded-3xl border-[#1E1D57]">
                    <button class="flex items-center justify-between w-full text-left text-gray-700 font-semibold p-2">
                        <span class="flex items-center gap-3"><svg id="planning-icon" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24">
                                <path id="Path_426" data-name="Path 426"
                                    d="M5,11a1.926,1.926,0,0,1-1.41-.59A1.926,1.926,0,0,1,3,9V5a1.926,1.926,0,0,1,.59-1.41A1.926,1.926,0,0,1,5,3H19a1.926,1.926,0,0,1,1.41.59A1.926,1.926,0,0,1,21,5V9a2.015,2.015,0,0,1-2,2ZM5,9H19V5H5ZM5,21a1.926,1.926,0,0,1-1.41-.59A1.926,1.926,0,0,1,3,19V15a1.926,1.926,0,0,1,.59-1.41A1.926,1.926,0,0,1,5,13H19a2.015,2.015,0,0,1,2,2v4a2.015,2.015,0,0,1-2,2Zm0-2H19V15H5ZM5,5V5ZM5,15v0Z"
                                    fill="#1E1D57" />
                                <rect id="Rectangle_72" data-name="Rectangle 72" width="24" height="24" fill="none" />
                            </svg>
                            Preparing
                            your project</span>
                        <i id="icon-menu2" data-lucide="chevron-down" class="w-4 h-4 transition-transform"></i>
                    </button>
                    <ul id="menu2" class="ml-8 mt-2 space-y-1 text-sm text-gray-600 hidden">
                        <li>Sub topic 1</li>
                        <li>Sub topic 2</li>
                    </ul>
                </li>
                <li class="border rounded-3xl border-[#1E1D57]">
                    <button class="flex items-center justify-between w-full text-left text-gray-700 font-semibold p-2">
                        <span class="flex items-center gap-3"><svg id="implementation-icon"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path id="Path_425" data-name="Path 425"
                                    d="M21.6,23l-3.08-3.05a3.707,3.707,0,0,1-.96.41,4.166,4.166,0,0,1-1.06.14,4.029,4.029,0,0,1-4.01-4.01,4.029,4.029,0,0,1,4.01-4.01,4.029,4.029,0,0,1,4.01,4.01,3.879,3.879,0,0,1-.15,1.09,3.763,3.763,0,0,1-.43.96l3.08,3.05-1.4,1.4ZM5.5,20.5a3.853,3.853,0,0,1-2.83-1.18,3.984,3.984,0,0,1,0-5.66A3.875,3.875,0,0,1,5.5,12.48a3.853,3.853,0,0,1,2.83,1.18,3.984,3.984,0,0,1,0,5.66A3.853,3.853,0,0,1,5.5,20.5Zm0-2a2,2,0,1,0-1.41-3.41A2,2,0,0,0,5.5,18.5Zm11,0a2.015,2.015,0,1,0-1.41-.59A1.926,1.926,0,0,0,16.5,18.5Zm-11-9A3.853,3.853,0,0,1,2.67,8.32,3.875,3.875,0,0,1,1.49,5.49,3.853,3.853,0,0,1,2.67,2.66,3.875,3.875,0,0,1,5.5,1.48,3.853,3.853,0,0,1,8.33,2.66,3.853,3.853,0,0,1,9.51,5.49,3.853,3.853,0,0,1,8.33,8.32,3.853,3.853,0,0,1,5.5,9.5Zm11,0a3.853,3.853,0,0,1-2.83-1.18,3.853,3.853,0,0,1-1.18-2.83,3.853,3.853,0,0,1,1.18-2.83,3.984,3.984,0,0,1,5.66,0,3.853,3.853,0,0,1,1.18,2.83,3.853,3.853,0,0,1-1.18,2.83A3.853,3.853,0,0,1,16.5,9.5Zm-11-2a2.015,2.015,0,0,0,2-2,2.015,2.015,0,0,0-2-2,2.015,2.015,0,0,0-2,2,2.015,2.015,0,0,0,2,2Zm11,0a2.015,2.015,0,0,0,2-2,2,2,0,1,0-3.41,1.41A1.926,1.926,0,0,0,16.5,7.5Z"
                                    fill="#1E1D57" />
                                <rect id="Rectangle_71" data-name="Rectangle 71" width="24" height="24" fill="none" />
                            </svg>
                            Implementation</span>
                        <i id="icon-menu3" data-lucide="chevron-down" class="w-4 h-4 transition-transform"></i>
                    </button>
                    <ul id="menu3" class="ml-8 mt-2 space-y-1 text-sm text-gray-600 hidden">
                        <li>Sub topic 1</li>
                        <li>Sub topic 2</li>
                    </ul>
                </li>
                <li class="border rounded-3xl border-[#1E1D57]">
                    <button class="flex items-center justify-between w-full text-left text-gray-700 font-semibold p-2">
                        <span class="flex items-center gap-3"><svg id="droplet-icon" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24">
                                <path id="Path_401" data-name="Path 401"
                                    d="M12.28,19a.815.815,0,0,0,.51-.24.694.694,0,0,0,.21-.51.738.738,0,0,0-.23-.56.758.758,0,0,0-.58-.19,3.965,3.965,0,0,1-2.18-.56,3.062,3.062,0,0,1-1.45-2.31.742.742,0,0,0-.26-.45A.724.724,0,0,0,7.81,14a.752.752,0,0,0-.58.26.67.67,0,0,0-.15.61,4.557,4.557,0,0,0,2,3.25,5.384,5.384,0,0,0,3.18.88ZM12,22a7.625,7.625,0,0,1-5.71-2.35A8.047,8.047,0,0,1,4,13.8,9.863,9.863,0,0,1,5.99,8.36,33.335,33.335,0,0,1,12,2a33.018,33.018,0,0,1,6.01,6.36A9.942,9.942,0,0,1,20,13.8a8.047,8.047,0,0,1-2.29,5.85A7.64,7.64,0,0,1,12,22Zm0-2a5.737,5.737,0,0,0,4.3-1.76A6.136,6.136,0,0,0,18,13.8a7.753,7.753,0,0,0-1.51-4.13A28.007,28.007,0,0,0,12,4.64,28.057,28.057,0,0,0,7.51,9.67,7.725,7.725,0,0,0,6,13.8a6.168,6.168,0,0,0,1.7,4.44A5.7,5.7,0,0,0,12,20Z"
                                    fill="#1E1D57" />
                                <rect id="Rectangle_56" data-name="Rectangle 56" width="24" height="24" fill="none" />
                            </svg>
                            Management</span>
                        <i id="icon-menu4" data-lucide="chevron-down" class="w-4 h-4 transition-transform"></i>
                    </button>
                    <ul id="menu4" class="ml-8 mt-2 space-y-1 text-sm text-gray-600 hidden">
                        <li>Sub topic 1</li>
                        <li>Sub topic 2</li>
                    </ul>
                </li>
            </ul>

            <div class="w-full mt-6">
                <label class="block text-lg font-semibold text-[#000000] mb-3">Search</label>
                <div class="relative">
                    <input type="text" placeholder="Search…" class="w-full bg-white shadow-sm rounded-full py-3 pl-4 pr-10 text-gray-700 
                   placeholder-gray-400 focus:ring-0 focus:outline-none">

                    <!-- Search Icon -->
                    <span class="absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18.095 18.095">
                            <path
                                d="M16.681,18.1h0l-5.145-5.145a7.2,7.2,0,1,1,1.414-1.414L18.1,16.681l-1.413,1.413ZM7.2,2a5.2,5.2,0,1,0,5.2,5.2A5.206,5.206,0,0,0,7.2,2Z"
                                fill="#1E1D57"></path>
                        </svg>
                    </span>
                </div>
            </div>
        </aside>

        <!-- ✅ MAIN CONTENT -->
        <main class="flex-1 p-6">
            <!-- Cards -->
            <div id="card-container" class="grid grid-cols-1 lg:w-[100%] sm:grid-cols-2 lg:grid-cols-3 gap-6"></div>
            <!-- Pagination -->
            <div class="flex justify-center mt-6 space-x-2">
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

                <button id="btn1" class="px-3 py-1 text-[20px] text-[#1E1D57] hover:text-[#37C6F4]   rounded"
                    onclick="changePage(1)">1</button>
                <button id="btn2" class="px-3 py-1 text-[20px] text-[#1E1D57] hover:text-[#37C6F4] rounded"
                    onclick="changePage(2)">2</button>
                <button id="btn3" class="px-3 py-1 text-[20px] text-[#1E1D57] hover:text-[#37C6F4] rounded"
                    onclick="changePage(3)">3</button>
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
        class="bg-white rounded-2xl shadow-xl max-w-4xl w-[90%] md:w-[70%] p-0 relative animate-fadeIn overflow-hidden">
        <button onclick="closeModal()" class="absolute top-5 right-5 text-gray-600 hover:text-black z-10">
            <i data-lucide="x" class="w-6 h-6"></i>
        </button>

        <div class="flex flex-col md:flex-row">
            <!-- Left gradient -->
            <div id="modalColorBox" class="p-8 text-white w-full md:w-1/2 flex flex-col justify-between min-h-[360px]">
                <div>
                    <h3 id="modalTitle" class="text-2xl font-semibold leading-snug mb-3">Title goes here</h3>
                    <p id="modalPublisher" class="text-sm opacity-90 mb-4">Publisher name here</p>
                </div>
                <div class="flex items-center gap-2 mt-auto">
                    <i id="modalIcon" class="w-4 h-4"></i>
                    <span id="modalType" class="text-sm">Guide</span>
                </div>
            </div>

            <!-- Right content -->
            <div class="flex-1 bg-white p-8 text-gray-700 text-sm leading-relaxed flex flex-col justify-between">
                <div>
                    <p class="font-semibold text-black mb-2">Short description:</p>
                    <p id="modalDescription">
                        Summarise what they will get from the document and also mention the kinds of support files
                        available. Audio, video etc.
                    </p>
                </div>

                <!-- Buttons fixed at the bottom right section -->
                <div class="border-t mt-8 pt-4 flex justify-between flex-wrap gap-4 text-gray-700 text-sm">
                    <div class="flex flex-wrap gap-6">
                        <button class="flex items-center gap-2"><i data-lucide="bookmark" class="w-4 h-4"></i>Add to
                            your library</button>
                        <button class="flex items-center gap-2"><i data-lucide="download" class="w-4 h-4"></i>Download
                            file</button>
                        <button class="flex items-center gap-2"><i data-lucide="share-2"
                                class="w-4 h-4"></i>Share</button>
                    </div>
                    <button class="flex items-center gap-2 font-semibold underline"><i data-lucide="more-horizontal"
                            class="w-4 h-4"></i>More options…</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- waves  -->
<div class=" bottom-0 left-0 right-0 bg-[#f2f2f2]">
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


<div class="overlay-btm"></div>
@endsection

@push('scripts')
<!-- <script>
    const gradients = [
        "bg-gradient-to-br from-[#0E1C62] to-[#2CBFA0]",
        "bg-gradient-to-br from-[#0E4473] to-[#25B3D8]",
        "bg-gradient-to-br from-[#44107A] to-[#FF1361]",
        "bg-gradient-to-br from-[#2A0845] to-[#6441A5]",
        "bg-gradient-to-br from-[#16222A] to-[#3A6073]",
        "bg-gradient-to-br from-[#1E3C72] to-[#2A5298]",
        "bg-gradient-to-br from-[#134E5E] to-[#71B280]",
        "bg-gradient-to-br from-[#373B44] to-[#4286f4]",
        "bg-gradient-to-br from-[#20002c] to-[#cbb4d4]"
    ];

    const cardsData = Array.from({ length: 36 }, (_, i) => ({
        title: `Title of guide or document can go here over multiple line here`,
        publisher: "Publisher name here",
        type: ["Guide", "Video", "Podcast", "Case Study"][i % 4],
        gradient: gradients[i % gradients.length],
        icon: ["book", "video", "mic", "lightbulb"][i % 4]
    }));

    const cardsPerPage = 12;
    let currentPage = 1;

    function renderCards() {
        const container = document.getElementById("card-container");
        container.innerHTML = "";
        const start = (currentPage - 1) * cardsPerPage;
        const end = start + cardsPerPage;
        const visibleCards = cardsData.slice(start, end);

        visibleCards.forEach((card) => {
            container.innerHTML += `
                <div class="bg-white shadow-md p-4 rounded-[25px] flex flex-col justify-between">
                    <div class="${card.gradient} text-white p-6 rounded-[15px] flex flex-col justify-between flex-grow shadow-[0_8px_15px_-4px_rgba(0,0,0,0.50)]">
                        <div>
                            <h3 class="font-semibold text-lg leading-snug">${card.title}</h3>
                            <p class="text-sm mt-2 opacity-90">${card.publisher}</p>
                        </div>
                        <div class="flex items-center space-x-2 mt-12">
                            <i data-lucide="${card.icon}" class="w-4 h-4"></i>
                            <span class="text-sm">${card.type}</span>
                        </div>
                    </div>
                    <div class="flex justify-between pt-6 pb-3 border-t border-white/30 text-black/80">
                        <i data-lucide="maximize-2" class="w-4 h-4 cursor-pointer" onclick="openModal('${card.title}', '${card.publisher}', '${card.type}', '${card.gradient}', '${card.icon}')"></i>
                        <i data-lucide="download" class="w-4 h-4 cursor-pointer"></i>
                        <i data-lucide="bookmark" class="w-4 h-4 cursor-pointer"></i>
                        <i data-lucide="share-2" class="w-4 h-4 cursor-pointer"></i>
                        
                    </div>
                </div>`;
        });

        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }

    function changePage(page) {
        currentPage = page;
        renderCards();
        document.querySelectorAll("button[id^='btn']").forEach((btn) => {
            btn.classList.remove("bg-blue-600", "text-white");
            btn.classList.add("bg-gray-200");
        });
        const activeBtn = document.getElementById(`btn${page}`);
        if (activeBtn) {
            activeBtn.classList.add("bg-blue-600", "text-white");
            activeBtn.classList.remove("bg-gray-200");
        }
    }

    function openModal(title, publisher, type, gradient, icon) {
        const modal = document.getElementById("productModal");
        modal.classList.remove("hidden");
        modal.classList.add("flex");
        document.getElementById("modalTitle").innerText = title;
        document.getElementById("modalPublisher").innerText = publisher;
        document.getElementById("modalType").innerText = type;
        const colorBox = document.getElementById("modalColorBox");
        colorBox.className = `${gradient} p-8 text-white w-full md:w-1/2 flex flex-col justify-between min-h-[360px]`;
        document.getElementById("modalIcon").setAttribute("data-lucide", icon);
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }

    function closeModal() {
        const modal = document.getElementById("productModal");
        modal.classList.add("hidden");
        modal.classList.remove("flex");
    }

    function toggleMenu(id) {
        const menu = document.getElementById(id);
        const icon = document.getElementById(`icon-${id}`);
        if (menu.classList.contains("hidden")) {
            menu.classList.remove("hidden");
            icon.classList.add("rotate-180");
        } else {
            menu.classList.add("hidden");
            icon.classList.remove("rotate-180");
        }
    }

    document.addEventListener("DOMContentLoaded", () => {
        renderCards();
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    });
</script> -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleBtn = document.querySelector(".search-filter-open-close");
        const filterList = document.querySelector(".mobile-filter-list");
        const filterOverlay = document.querySelector(".overlay-btm");
        const body = document.body;
        const mobFilters = document.querySelector(".mob-search-filters");
        const HIDDEN_CLASS = "-left-100";
        const VISIBLE_CLASS = "left-0";

        if (toggleBtn && filterList && filterOverlay && body) {
            toggleBtn.addEventListener("click", () => {
                const isHidden = filterList.classList.toggle(HIDDEN_CLASS);
                filterList.classList.toggle(VISIBLE_CLASS, !isHidden);
                filterOverlay.classList.toggle("active", !isHidden);
                body.classList.toggle("no-scroll", !isHidden);
                if (!isHidden && mobFilters) {
                    mobFilters.scrollIntoView({ behavior: "smooth", block: "start" });
                }
            });
        }
    });

</script>
@endpush