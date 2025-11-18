@extends('layouts.frontend')

@section('title', 'PPP Water Hub')

@section('content')

<section class="bg-[#F2F2F2]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        <!-- Back link -->


        <a href="#" class="inline-flex items-center gap-2 text-lg text-[#37C6F4] font-semibold mb-12">
            <svg id="chevron-right-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                class="transition-all duration-200 fill-[#37C6F4] rotate-180">
                <rect width="24" height="24" fill="none"></rect>
                <path d="M12.6,12,8,7.4,9.4,6l6,6-6,6L8,16.6,12.6,12Z"></path>
            </svg>
            <span>Back to all resources</span>
        </a>



        <!-- Main Layout -->
        <div class="flex flex-col lg:flex-row gap-12">

            <!-- LEFT SECTION -->
            <div class="w-full lg:w-[350px] flex flex-col">

                <!-- Blue Card -->
                <div
                    class="bg-gradient-to-b from-blue-900 to-emerald-500 text-white rounded-lg shadow-xl p-6 flex flex-col lg:w-[350px] justify-between h-full">
                    <div>
                        <h1 class="text-3xl font-bold leading-tight mb-6">
                            Title of guide or document can go here over multiple lines
                        </h1>
                        <p class="text-sm opacity-90 mt-10">Publisher name here</p>
                    </div>

                    <div class="flex items-center space-x-2 mt-20">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="30" viewBox="0 0 24 30">
                            <path id="Path_399" data-name="Path 399"
                                d="M10,18.5H22v-3H10ZM10,23H22V20H10Zm0,4.5h7.5v-3H10ZM7,32a2.89,2.89,0,0,1-2.115-.885A2.89,2.89,0,0,1,4,29V5a2.89,2.89,0,0,1,.885-2.115A2.89,2.89,0,0,1,7,2H19l9,9V29a3.022,3.022,0,0,1-3,3ZM17.5,12.5V5H7V29H25V12.5ZM7,5V5Z"
                                transform="translate(-4 -2)" fill="#fff" />
                        </svg>

                        <span class="text-[18px]  font-semibold">Identifying PPP opportunities</span>
                    </div>
                </div>

                <!-- Save / Download -->
                <div class="flex justify-between items-center mt-6 border-t pt-4 text-sm text-gray-700">

                    <button class="group flex items-center transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                            class="fill-[#1e1d57] hover:fill-[#37C6F4] transition">
                            <path
                                d="M5,29V5.889a2.785,2.785,0,0,1,.851-2.037A2.776,2.776,0,0,1,7.884,3H22.307a2.776,2.776,0,0,1,2.034.852,2.785,2.785,0,0,1,.851,2.037V29L15.1,24.667Zm2.884-4.406L15.1,21.489l7.211,3.106V5.889H7.884Z"
                                transform="translate(0.904)" />
                        </svg>


                        <span
                            class="sm:ml-2 text-[#000000] text-[16px] group-hover:text-[#37C6F4] transition-colors duration-200">
                            Add to your library
                        </span>
                    </button>


                    <a href="#" class="group flex items-center transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                            class="fill-[#1e1d57] hover:fill-[#37C6F4] transition">
                            <path
                                d="M16,22,8.5,14.5l2.1-2.175,3.9,3.9V4h3V16.225l3.9-3.9L23.5,14.5,16,22ZM7,28a2.89,2.89,0,0,1-2.115-.885A2.89,2.89,0,0,1,4,25V20.5H7V25H25V20.5h3V25a3.022,3.022,0,0,1-3,3Z" />
                        </svg>


                        <span
                            class="sm:ml-2 text-[16px] text-[#000000] group-hover:text-[#37C6F4] transition-colors duration-200">
                            Download file
                        </span>
                    </a>



                </div>
            </div>

            <!-- RIGHT SECTION -->
            <div class="lg:max-w-[65%]">

                <h2 class=" text-2xl md:text-3xl text-[#1E1D57] md:max-w-[90%] font-bold leading-tight mb-6">
                    Title of guide or document can go here over multiple lines
                </h2>

                <!-- RIGHT SIDE GRID (TEXT LEFT + RESOURCES RIGHT) -->
                <div class="flex flex-col-reverse md:flex-row gap-8">

                    <!-- LEFT TEXT SECTION – takes 2/3 -->
                    <div class="md:col-span-2 md:max-w-[347px] text-[#000000]">
                        <p class=" mb-6 leading-relaxed">
                            <span class="text-black font-bold">Short description: </span>Summarise what they will
                            get
                            from the docuemtn and also mention the kinds of support files available. Audio video
                            etc.
                        </p>

                        <div class="space-y-6 leading-relaxed">
                            <p>
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                tempor
                                invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et
                                accusam et justo duo dolores et ea rebum.
                            </p>
                            <p>
                                Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                                Lorem
                                ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                invidunt.
                            </p>

                        </div>

                        <!-- Share Icon -->

                        <button class="group flex items-center text-[#000000] mt-8">
                            <svg xmlns="http://www.w3.org/2000/svg" width="85.283" height="32" viewBox="0 0 85.283 32">
                                <!-- Text -->
                                <text id="Tagline" transform="translate(41.283 21.5)" font-size="16"
                                    font-family="PublicSans-Regular, Public Sans"
                                    class="fill-[#1e1d57] group-hover:fill-[#37C6F4]">
                                    <tspan x="0" y="0">Share</tspan>
                                </text>
                                <g>
                                    <!-- Icon Path -->
                                    <path id="Path_405"
                                        d="M22.341,30a3.868,3.868,0,0,1-2.887-1.231,4.133,4.133,0,0,1-1.193-2.98c0-.14.041-.462.108-.979L8.841,19.072a4.057,4.057,0,0,1-1.26.826,3.989,3.989,0,0,1-1.532.294A3.868,3.868,0,0,1,3.163,18.96,4.133,4.133,0,0,1,1.97,15.98,4.1,4.1,0,0,1,3.163,13,3.877,3.877,0,0,1,6.05,11.768a3.989,3.989,0,0,1,1.532.294,4.057,4.057,0,0,1,1.26.826l9.528-5.737a3.189,3.189,0,0,1-.081-.476c-.014-.154-.014-.322-.014-.5a4.124,4.124,0,0,1,1.193-2.98,4,4,0,0,1,5.774,0,4.1,4.1,0,0,1,1.193,2.98,4.1,4.1,0,0,1-1.193,2.98,3.847,3.847,0,0,1-2.887,1.231,3.989,3.989,0,0,1-1.532-.294,4.057,4.057,0,0,1-1.26-.826L10.034,15a3.189,3.189,0,0,1,.081.476c.014.154.014.322.014.5s0,.35-.014.5a3.189,3.189,0,0,1-.081.476L19.562,22.7a4.057,4.057,0,0,1,1.26-.826,3.989,3.989,0,0,1,1.532-.294,3.868,3.868,0,0,1,2.887,1.231,4.32,4.32,0,0,1,0,5.961A3.877,3.877,0,0,1,22.354,30Zm0-2.8A1.3,1.3,0,0,0,23.3,26.8a1.452,1.452,0,0,0,0-1.987,1.344,1.344,0,0,0-1.925,0,1.452,1.452,0,0,0,0,1.987A1.3,1.3,0,0,0,22.341,27.2ZM6.077,17.407A1.3,1.3,0,0,0,7.039,17a1.452,1.452,0,0,0,0-1.987,1.344,1.344,0,0,0-1.925,0,1.452,1.452,0,0,0,0,1.987A1.3,1.3,0,0,0,6.077,17.407ZM22.341,7.613a1.3,1.3,0,0,0,.962-.406,1.452,1.452,0,0,0,0-1.987,1.344,1.344,0,0,0-1.925,0,1.452,1.452,0,0,0,0,1.987A1.3,1.3,0,0,0,22.341,7.613Z"
                                        class="fill-[#1e1d57] group-hover:fill-[#37C6F4]" />
                                </g>
                            </svg>
                        </button>
                    </div>

                    <!-- RIGHT ADDITIONAL RESOURCES (1/3) -->
                    <div class="md:col-span-1">

                        <h3 class=" font-semibold text-[#0E1C4E] mb-4">
                            Additional resources
                        </h3>

                        <ul class="space-y-3  text-[#000000] text-[16px]">
                            <li class="flex items-center gap-2  cursor-pointer">
                                <svg id="summary-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path id="Path_406" data-name="Path 406"
                                        d="M5,4V4ZM7,14h3.5a5.806,5.806,0,0,1,1.3-2.01H7v2Zm0,4h3.18a5.781,5.781,0,0,1-.16-1,6.677,6.677,0,0,1,.01-1H7v2ZM5,22a1.926,1.926,0,0,1-1.41-.59A1.926,1.926,0,0,1,3,20V4a1.926,1.926,0,0,1,.59-1.41A1.926,1.926,0,0,1,5,2h8l6,6v2.5a5.581,5.581,0,0,0-.98-.31,8.828,8.828,0,0,0-1.03-.16V9h-5V4h-7V20h6.03a8.082,8.082,0,0,0,.9,1.11,5.876,5.876,0,0,0,1.1.89Zm11.5-3a2.517,2.517,0,0,0,1.78-4.29,2.517,2.517,0,0,0-3.56,3.56A2.415,2.415,0,0,0,16.5,19Zm5.1,4-2.7-2.7a4.237,4.237,0,0,1-1.14.53,4.463,4.463,0,0,1-1.26.18,4.371,4.371,0,0,1-3.19-1.31A4.316,4.316,0,0,1,12,16.51a4.371,4.371,0,0,1,1.31-3.19,4.316,4.316,0,0,1,3.19-1.31,4.371,4.371,0,0,1,3.19,1.31A4.316,4.316,0,0,1,21,16.51a4.463,4.463,0,0,1-.18,1.26,3.954,3.954,0,0,1-.53,1.14l2.7,2.7-1.4,1.4Z"
                                        fill="#1e1d57" />
                                    <rect id="Rectangle_61" data-name="Rectangle 61" width="24" height="24"
                                        fill="none" />
                                </svg>

                                View summary file
                            </li>

                            <li class="flex items-center gap-2 cursor-pointer">
                                <svg id="video-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path id="Path_408" data-name="Path 408"
                                        d="M11.5,14.5l7-4.5-7-4.5ZM8,18a2.015,2.015,0,0,1-2-2V4a1.926,1.926,0,0,1,.59-1.41A1.926,1.926,0,0,1,8,2H20a1.926,1.926,0,0,1,1.41.59A1.926,1.926,0,0,1,22,4V16a2.015,2.015,0,0,1-2,2Zm0-2H20V4H8ZM4,22a1.926,1.926,0,0,1-1.41-.59A1.926,1.926,0,0,1,2,20V6H4V20H18v2ZM8,4V4Z"
                                        fill="#1e1d57" />
                                    <rect id="Rectangle_63" data-name="Rectangle 63" width="24" height="24"
                                        fill="none" />
                                </svg>

                                Play video summary
                            </li>

                            <li class="flex items-center gap-2 cursor-pointer">
                                <svg id="podcast-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path id="Path_403" data-name="Path 403"
                                        d="M11,22V13.72a2.251,2.251,0,0,1-.73-.71A1.805,1.805,0,0,1,9.99,12a1.994,1.994,0,0,1,3.41-1.41A1.926,1.926,0,0,1,13.99,12a1.9,1.9,0,0,1-.28,1.03,2.038,2.038,0,0,1-.73.7v8.28h-2ZM5.1,19.25a10.436,10.436,0,0,1-2.26-3.24A9.639,9.639,0,0,1,2,12a9.508,9.508,0,0,1,.79-3.9A9.989,9.989,0,0,1,8.11,2.78a9.678,9.678,0,0,1,3.9-.79,9.678,9.678,0,0,1,3.9.79A9.989,9.989,0,0,1,21.23,8.1a9.678,9.678,0,0,1,.79,3.9,9.936,9.936,0,0,1-.84,4.03,10.054,10.054,0,0,1-2.26,3.23l-1.4-1.4a8.09,8.09,0,0,0,1.83-2.61,7.874,7.874,0,0,0,.68-3.24A7.742,7.742,0,0,0,17.7,6.33,7.726,7.726,0,0,0,12.02,4,7.726,7.726,0,0,0,6.34,6.33a7.726,7.726,0,0,0-2.33,5.68,7.794,7.794,0,0,0,.68,3.23,8.058,8.058,0,0,0,1.85,2.6L5.11,19.27Zm2.83-2.83a6.311,6.311,0,0,1-1.4-1.96A5.813,5.813,0,0,1,6,12,5.773,5.773,0,0,1,7.75,7.75,5.773,5.773,0,0,1,12,6a5.773,5.773,0,0,1,4.25,1.75A5.773,5.773,0,0,1,18,12a6.032,6.032,0,0,1-1.93,4.43L14.64,15a4.141,4.141,0,0,0,.99-1.35,3.976,3.976,0,0,0-.82-4.48,3.984,3.984,0,0,0-5.66,0,3.992,3.992,0,0,0-.82,4.49A4.322,4.322,0,0,0,9.32,15L7.89,16.43Z"
                                        fill="#1e1d57" />
                                    <rect id="Rectangle_58" data-name="Rectangle 58" width="24" height="24"
                                        fill="none" />
                                </svg>

                                Play audio summary
                            </li>
                        </ul>

                        <div class="mt-8 text-lg text-[#37C6F4] space-y-2">
                            <p><span class="font-semibold text-[#1E1D57]">File type:</span> PDF</p>
                            <p>
                                <span class="font-semibold text-[#1E1D57]">Author:</span>
                                Mary Matherson, World Bank
                            </p>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</section>
<!-- Related Content -->
<section class="py-12 bg-[#F7F7F7]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl md:text-5xl text-[#1E1D57] font-bold mb-8">Related content</h2>

        <div  class="grid grid-cols-1  sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-10 lg:gap-[128px]">
            <div class="bg-white shadow-md p-4 rounded-[25px] flex flex-col justify-between">
                <div
                    class="bg-gradient-to-br from-[#0E1C62] to-[#2CBFA0] text-white p-6 rounded-[15px] flex flex-col justify-between flex-grow shadow-[0_8px_15px_-4px_rgba(0,0,0,0.50)] ">
                    <div>
                        <h3 class="font-semibold text-lg leading-snug">Title of guide or document can go here over
                            multiple line here</h3>
                        <p class="text-sm mt-2 opacity-90">Publisher name here</p>
                    </div>
                    <div class="flex items-center space-x-2 mt-12">
                        <svg id="droplet-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24">
                            <path id="Path_401" data-name="Path 401"
                                d="M12.28,19a.815.815,0,0,0,.51-.24.694.694,0,0,0,.21-.51.738.738,0,0,0-.23-.56.758.758,0,0,0-.58-.19,3.965,3.965,0,0,1-2.18-.56,3.062,3.062,0,0,1-1.45-2.31.742.742,0,0,0-.26-.45A.724.724,0,0,0,7.81,14a.752.752,0,0,0-.58.26.67.67,0,0,0-.15.61,4.557,4.557,0,0,0,2,3.25,5.384,5.384,0,0,0,3.18.88ZM12,22a7.625,7.625,0,0,1-5.71-2.35A8.047,8.047,0,0,1,4,13.8,9.863,9.863,0,0,1,5.99,8.36,33.335,33.335,0,0,1,12,2a33.018,33.018,0,0,1,6.01,6.36A9.942,9.942,0,0,1,20,13.8a8.047,8.047,0,0,1-2.29,5.85A7.64,7.64,0,0,1,12,22Zm0-2a5.737,5.737,0,0,0,4.3-1.76A6.136,6.136,0,0,0,18,13.8a7.753,7.753,0,0,0-1.51-4.13A28.007,28.007,0,0,0,12,4.64,28.057,28.057,0,0,0,7.51,9.67,7.725,7.725,0,0,0,6,13.8a6.168,6.168,0,0,0,1.7,4.44A5.7,5.7,0,0,0,12,20Z"
                                fill="#fff" />
                            <rect id="Rectangle_56" data-name="Rectangle 56" width="24" height="24" fill="none" />
                        </svg>


                        <span class="text-lg">Management</span>
                    </div>
                </div>
                <div class="flex justify-between pt-6 pb-3  border-t border-white/30 text-black/80">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                        class="fill-[#ababab] hover:fill-[#37C6F4] transition-colors duration-200 cursor-pointer">
                        <path
                            d="M6,23H3a1.926,1.926,0,0,1-1.41-.59A1.926,1.926,0,0,1,1,21V18H3v3H6Zm12,0V21h3V18h2v3a2.015,2.015,0,0,1-2,2Zm-6-4.5a9,9,0,0,1-5.44-1.78A10.135,10.135,0,0,1,3,11.99,10.251,10.251,0,0,1,6.56,7.26,8.977,8.977,0,0,1,12,5.48a9,9,0,0,1,5.44,1.78A10.185,10.185,0,0,1,21,11.99a10.251,10.251,0,0,1-3.56,4.73A9.063,9.063,0,0,1,12,18.5Zm0-2a7.189,7.189,0,0,0,4.03-1.2,7.74,7.74,0,0,0,2.8-3.3,7.74,7.74,0,0,0-2.8-3.3,7.367,7.367,0,0,0-8.06,0A7.74,7.74,0,0,0,5.17,12a7.74,7.74,0,0,0,2.8,3.3A7.189,7.189,0,0,0,12,16.5Zm0-1a3.517,3.517,0,0,0,3.51-3.51A3.517,3.517,0,0,0,12,8.48a3.517,3.517,0,0,0-3.51,3.51A3.517,3.517,0,0,0,12,15.5Zm0-2a1.442,1.442,0,0,1-1.06-.44A1.5,1.5,0,1,1,12,13.5ZM1,6V3a1.926,1.926,0,0,1,.59-1.41A1.926,1.926,0,0,1,3,1H6V3H3V6ZM21,6V3H18V1h3a1.926,1.926,0,0,1,1.41.59A1.926,1.926,0,0,1,23,3V6Z" />
                        <rect width="24" height="24" fill="none" />
                    </svg>


                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                        class="fill-[#ababab] hover:fill-[#37C6F4] transition-colors duration-200 cursor-pointer">
                        <path
                            d="M12,16,7,11,8.4,9.55l2.6,2.6V4h2v8.15l2.6-2.6L17,11l-5,5ZM6,20a2.015,2.015,0,0,1-2-2V15H6v3H18V15h2v3a2.015,2.015,0,0,1-2,2Z" />
                        <rect width="24" height="24" fill="none" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                        class="fill-[#ababab] hover:fill-[#37C6F4] transition-colors duration-200 cursor-pointer">
                        <path
                            d="M5,21V5a1.926,1.926,0,0,1,.59-1.41A1.926,1.926,0,0,1,7,3H17a1.926,1.926,0,0,1,1.41.59A1.926,1.926,0,0,1,19,5V21l-7-3Zm2-3.05,5-2.15,5,2.15V5H7ZM7,5H7Z" />
                        <rect width="24" height="24" fill="none" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                        class="fill-[#ababab] hover:fill-[#37C6F4] transition-colors duration-200 cursor-pointer">
                        <path
                            d="M17,22a3,3,0,0,1-3.01-3.01c0-.1.03-.33.08-.7l-7.03-4.1a2.967,2.967,0,0,1-2.06.8,2.9,2.9,0,0,1-2.13-.88,3.018,3.018,0,0,1,0-4.26,2.906,2.906,0,0,1,2.13-.88,2.967,2.967,0,0,1,2.06.8l7.03-4.1a2.214,2.214,0,0,1-.06-.34C14,5.22,14,5.1,14,4.97a2.9,2.9,0,0,1,.88-2.13,3.018,3.018,0,0,1,4.26,0,2.883,2.883,0,0,1,.88,2.13,2.883,2.883,0,0,1-.88,2.13,2.883,2.883,0,0,1-2.13.88,2.967,2.967,0,0,1-2.06-.8l-7.03,4.1a2.214,2.214,0,0,1,.06.34c.01.11.01.23.01.36s0,.25-.01.36a2.214,2.214,0,0,1-.06.34l7.03,4.1a2.967,2.967,0,0,1,2.06-.8,3.012,3.012,0,0,1,2.13,5.14,2.906,2.906,0,0,1-2.13.88Zm0-2a.99.99,0,1,0-.71-.29A.973.973,0,0,0,17,20ZM5,13a.99.99,0,1,0-.71-.29A.973.973,0,0,0,5,13ZM17,6a1,1,0,0,0,.71-1.71,1,1,0,0,0-1.42,1.42A.973.973,0,0,0,17,6Z" />
                        <rect width="24" height="24" fill="none" />
                    </svg>

                </div>
            </div>
            <div class="bg-white shadow-md p-4 rounded-[25px] flex flex-col justify-between">
                <div
                    class="bg-gradient-to-br from-[#0E4473] to-[#25B3D8] text-white p-6 rounded-[15px] flex flex-col justify-between flex-grow shadow-[0_8px_15px_-4px_rgba(0,0,0,0.50)] ">
                    <div>
                        <h3 class="font-semibold text-lg leading-snug">Title of guide or document can go here over
                            multiple line here</h3>
                        <p class="text-sm mt-2 opacity-90">Publisher name here</p>
                    </div>
                    <div class="flex items-center space-x-2 mt-12">
                        <svg id="casestudy-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24">
                            <path id="Path_397" data-name="Path 397"
                                d="M12,22a2.262,2.262,0,0,1-1.18-.31,2.3,2.3,0,0,1-.83-.84,2.015,2.015,0,0,1-2-2V15.3a7.241,7.241,0,0,1-2.36-2.58,7.1,7.1,0,0,1-.89-3.48A6.987,6.987,0,0,1,6.85,4.1a6.987,6.987,0,0,1,5.14-2.11A6.987,6.987,0,0,1,17.13,4.1a6.987,6.987,0,0,1,2.11,5.14,7.033,7.033,0,0,1-.89,3.5,7.317,7.317,0,0,1-2.36,2.55v3.55a2.015,2.015,0,0,1-2,2,2.3,2.3,0,0,1-.83.84,2.237,2.237,0,0,1-1.18.31Zm-2-3.15h4v-.9H10Zm0-1.9h4V16H10ZM9.8,14h1.45V11.3L9.05,9.1,10.1,8.05,12,9.95l1.9-1.9L14.95,9.1l-2.2,2.2V14H14.2a5.478,5.478,0,0,0,2.2-1.91,4.945,4.945,0,0,0,.85-2.84,5.07,5.07,0,0,0-1.53-3.73,5.07,5.07,0,0,0-3.73-1.53A5.07,5.07,0,0,0,8.26,5.52,5.07,5.07,0,0,0,6.73,9.25a4.945,4.945,0,0,0,.85,2.84A5.478,5.478,0,0,0,9.78,14Z"
                                fill="#fff" />
                            <rect id="Rectangle_52" data-name="Rectangle 52" width="24" height="24" fill="none" />
                        </svg>

                        <span class="text-lg">Case study</span>
                    </div>
                </div>
                <div class="flex justify-between pt-6 pb-3  border-t border-white/30 text-black/80">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                        class="fill-[#ababab] hover:fill-[#37C6F4] transition-colors duration-200 cursor-pointer">
                        <path
                            d="M6,23H3a1.926,1.926,0,0,1-1.41-.59A1.926,1.926,0,0,1,1,21V18H3v3H6Zm12,0V21h3V18h2v3a2.015,2.015,0,0,1-2,2Zm-6-4.5a9,9,0,0,1-5.44-1.78A10.135,10.135,0,0,1,3,11.99,10.251,10.251,0,0,1,6.56,7.26,8.977,8.977,0,0,1,12,5.48a9,9,0,0,1,5.44,1.78A10.185,10.185,0,0,1,21,11.99a10.251,10.251,0,0,1-3.56,4.73A9.063,9.063,0,0,1,12,18.5Zm0-2a7.189,7.189,0,0,0,4.03-1.2,7.74,7.74,0,0,0,2.8-3.3,7.74,7.74,0,0,0-2.8-3.3,7.367,7.367,0,0,0-8.06,0A7.74,7.74,0,0,0,5.17,12a7.74,7.74,0,0,0,2.8,3.3A7.189,7.189,0,0,0,12,16.5Zm0-1a3.517,3.517,0,0,0,3.51-3.51A3.517,3.517,0,0,0,12,8.48a3.517,3.517,0,0,0-3.51,3.51A3.517,3.517,0,0,0,12,15.5Zm0-2a1.442,1.442,0,0,1-1.06-.44A1.5,1.5,0,1,1,12,13.5ZM1,6V3a1.926,1.926,0,0,1,.59-1.41A1.926,1.926,0,0,1,3,1H6V3H3V6ZM21,6V3H18V1h3a1.926,1.926,0,0,1,1.41.59A1.926,1.926,0,0,1,23,3V6Z" />
                        <rect width="24" height="24" fill="none" />
                    </svg>


                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                        class="fill-[#ababab] hover:fill-[#37C6F4] transition-colors duration-200 cursor-pointer">
                        <path
                            d="M12,16,7,11,8.4,9.55l2.6,2.6V4h2v8.15l2.6-2.6L17,11l-5,5ZM6,20a2.015,2.015,0,0,1-2-2V15H6v3H18V15h2v3a2.015,2.015,0,0,1-2,2Z" />
                        <rect width="24" height="24" fill="none" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                        class="fill-[#ababab] hover:fill-[#37C6F4] transition-colors duration-200 cursor-pointer">
                        <path
                            d="M5,21V5a1.926,1.926,0,0,1,.59-1.41A1.926,1.926,0,0,1,7,3H17a1.926,1.926,0,0,1,1.41.59A1.926,1.926,0,0,1,19,5V21l-7-3Zm2-3.05,5-2.15,5,2.15V5H7ZM7,5H7Z" />
                        <rect width="24" height="24" fill="none" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                        class="fill-[#ababab] hover:fill-[#37C6F4] transition-colors duration-200 cursor-pointer">
                        <path
                            d="M17,22a3,3,0,0,1-3.01-3.01c0-.1.03-.33.08-.7l-7.03-4.1a2.967,2.967,0,0,1-2.06.8,2.9,2.9,0,0,1-2.13-.88,3.018,3.018,0,0,1,0-4.26,2.906,2.906,0,0,1,2.13-.88,2.967,2.967,0,0,1,2.06.8l7.03-4.1a2.214,2.214,0,0,1-.06-.34C14,5.22,14,5.1,14,4.97a2.9,2.9,0,0,1,.88-2.13,3.018,3.018,0,0,1,4.26,0,2.883,2.883,0,0,1,.88,2.13,2.883,2.883,0,0,1-.88,2.13,2.883,2.883,0,0,1-2.13.88,2.967,2.967,0,0,1-2.06-.8l-7.03,4.1a2.214,2.214,0,0,1,.06.34c.01.11.01.23.01.36s0,.25-.01.36a2.214,2.214,0,0,1-.06.34l7.03,4.1a2.967,2.967,0,0,1,2.06-.8,3.012,3.012,0,0,1,2.13,5.14,2.906,2.906,0,0,1-2.13.88Zm0-2a.99.99,0,1,0-.71-.29A.973.973,0,0,0,17,20ZM5,13a.99.99,0,1,0-.71-.29A.973.973,0,0,0,5,13ZM17,6a1,1,0,0,0,.71-1.71,1,1,0,0,0-1.42,1.42A.973.973,0,0,0,17,6Z" />
                        <rect width="24" height="24" fill="none" />
                    </svg>
                </div>
            </div>
            <div class="bg-white shadow-md p-4 rounded-[25px] flex flex-col justify-between">
                <div
                    class="bg-gradient-to-br from-[#44107A] to-[#FF1361] text-white p-6 rounded-[15px] flex flex-col justify-between flex-grow shadow-[0_8px_15px_-4px_rgba(0,0,0,0.50)] ">
                    <div>
                        <h3 class="font-semibold text-lg leading-snug">Title of guide or document can go here over
                            multiple line here</h3>
                        <p class="text-sm mt-2 opacity-90">Publisher name here</p>
                    </div>
                    <div class="flex items-center space-x-2 mt-12">
                        <svg id="planning-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24">
                            <path id="Path_426" data-name="Path 426"
                                d="M5,11a1.926,1.926,0,0,1-1.41-.59A1.926,1.926,0,0,1,3,9V5a1.926,1.926,0,0,1,.59-1.41A1.926,1.926,0,0,1,5,3H19a1.926,1.926,0,0,1,1.41.59A1.926,1.926,0,0,1,21,5V9a2.015,2.015,0,0,1-2,2ZM5,9H19V5H5ZM5,21a1.926,1.926,0,0,1-1.41-.59A1.926,1.926,0,0,1,3,19V15a1.926,1.926,0,0,1,.59-1.41A1.926,1.926,0,0,1,5,13H19a2.015,2.015,0,0,1,2,2v4a2.015,2.015,0,0,1-2,2Zm0-2H19V15H5ZM5,5V5ZM5,15v0Z"
                                fill="#fff" />
                            <rect id="Rectangle_72" data-name="Rectangle 72" width="24" height="24" fill="none" />
                        </svg>

                        <span class="text-lg">Preparing your project</span>
                    </div>
                </div>
                <div class="flex justify-between pt-6 pb-3  border-t border-white/30 text-black/80">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                        class="fill-[#ababab] hover:fill-[#37C6F4] transition-colors duration-200 cursor-pointer">
                        <path
                            d="M6,23H3a1.926,1.926,0,0,1-1.41-.59A1.926,1.926,0,0,1,1,21V18H3v3H6Zm12,0V21h3V18h2v3a2.015,2.015,0,0,1-2,2Zm-6-4.5a9,9,0,0,1-5.44-1.78A10.135,10.135,0,0,1,3,11.99,10.251,10.251,0,0,1,6.56,7.26,8.977,8.977,0,0,1,12,5.48a9,9,0,0,1,5.44,1.78A10.185,10.185,0,0,1,21,11.99a10.251,10.251,0,0,1-3.56,4.73A9.063,9.063,0,0,1,12,18.5Zm0-2a7.189,7.189,0,0,0,4.03-1.2,7.74,7.74,0,0,0,2.8-3.3,7.74,7.74,0,0,0-2.8-3.3,7.367,7.367,0,0,0-8.06,0A7.74,7.74,0,0,0,5.17,12a7.74,7.74,0,0,0,2.8,3.3A7.189,7.189,0,0,0,12,16.5Zm0-1a3.517,3.517,0,0,0,3.51-3.51A3.517,3.517,0,0,0,12,8.48a3.517,3.517,0,0,0-3.51,3.51A3.517,3.517,0,0,0,12,15.5Zm0-2a1.442,1.442,0,0,1-1.06-.44A1.5,1.5,0,1,1,12,13.5ZM1,6V3a1.926,1.926,0,0,1,.59-1.41A1.926,1.926,0,0,1,3,1H6V3H3V6ZM21,6V3H18V1h3a1.926,1.926,0,0,1,1.41.59A1.926,1.926,0,0,1,23,3V6Z" />
                        <rect width="24" height="24" fill="none" />
                    </svg>


                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                        class="fill-[#ababab] hover:fill-[#37C6F4] transition-colors duration-200 cursor-pointer">
                        <path
                            d="M12,16,7,11,8.4,9.55l2.6,2.6V4h2v8.15l2.6-2.6L17,11l-5,5ZM6,20a2.015,2.015,0,0,1-2-2V15H6v3H18V15h2v3a2.015,2.015,0,0,1-2,2Z" />
                        <rect width="24" height="24" fill="none" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                        class="fill-[#ababab] hover:fill-[#37C6F4] transition-colors duration-200 cursor-pointer">
                        <path
                            d="M5,21V5a1.926,1.926,0,0,1,.59-1.41A1.926,1.926,0,0,1,7,3H17a1.926,1.926,0,0,1,1.41.59A1.926,1.926,0,0,1,19,5V21l-7-3Zm2-3.05,5-2.15,5,2.15V5H7ZM7,5H7Z" />
                        <rect width="24" height="24" fill="none" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                        class="fill-[#ababab] hover:fill-[#37C6F4] transition-colors duration-200 cursor-pointer">
                        <path
                            d="M17,22a3,3,0,0,1-3.01-3.01c0-.1.03-.33.08-.7l-7.03-4.1a2.967,2.967,0,0,1-2.06.8,2.9,2.9,0,0,1-2.13-.88,3.018,3.018,0,0,1,0-4.26,2.906,2.906,0,0,1,2.13-.88,2.967,2.967,0,0,1,2.06.8l7.03-4.1a2.214,2.214,0,0,1-.06-.34C14,5.22,14,5.1,14,4.97a2.9,2.9,0,0,1,.88-2.13,3.018,3.018,0,0,1,4.26,0,2.883,2.883,0,0,1,.88,2.13,2.883,2.883,0,0,1-.88,2.13,2.883,2.883,0,0,1-2.13.88,2.967,2.967,0,0,1-2.06-.8l-7.03,4.1a2.214,2.214,0,0,1,.06.34c.01.11.01.23.01.36s0,.25-.01.36a2.214,2.214,0,0,1-.06.34l7.03,4.1a2.967,2.967,0,0,1,2.06-.8,3.012,3.012,0,0,1,2.13,5.14,2.906,2.906,0,0,1-2.13.88Zm0-2a.99.99,0,1,0-.71-.29A.973.973,0,0,0,17,20ZM5,13a.99.99,0,1,0-.71-.29A.973.973,0,0,0,5,13ZM17,6a1,1,0,0,0,.71-1.71,1,1,0,0,0-1.42,1.42A.973.973,0,0,0,17,6Z" />
                        <rect width="24" height="24" fill="none" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- wave section  -->
<div class=" bottom-0 left-0 right-0">
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




@endsection