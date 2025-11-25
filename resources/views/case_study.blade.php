@extends('layouts.frontend')

@section('title', 'PPP Water Hub')

@section('content')


<!-- hero section start  -->
<section class="bg-gradient-to-r from-[#070648] to-[#2CBE9D] text-white px-6 lg:px-16 relative">

    <div class="max-w-7xl mx-auto  py-20 sm:py-24 lg:py-28">
        <p class="text-[18px] text-[#37C6F4] font-semibold mb-6">WATER PPP CASE STUDIES</p>
        <h1 class=" font-appetite text-3xl sm:text-5xl font-extrabold leading-none max-w-[500px]">
            Learn from water PPP success stories
        </h1>
    </div>
</section>
<!-- hero section end  -->
 <!-- intro section start  -->
<section class="px-6 lg:px-16 lg:py-20 py-10 ">
    <div class="max-w-7xl mx-auto">
        <p class="text-[#1E1D57] text-lg font-bold max-w-[604px]">Explore proven water PPP projects from around the world. Use the map and filters to find case studies by
            location, country, or project phase – then discover what worked, what challenges arose, and how successful
            partnerships were structured and delivered.
        </p>
    </div>
</section>
 <!-- intro section end  -->

<!-- country button start -->
<section class=" px-6 lg:px-16">
    <div class="max-w-7xl mx-auto flex  flex-wrap items-center gap-4 lg:gap-8">

        <!-- COUNTRY DROPDOWN -->
        <div class="relative">
            <input type="checkbox" id="countryToggle" class="peer hidden">
            <label for="countryToggle"
                class="flex items-center justify-between bg-[#F3F3F3] text-[#1C1C3C] px-6 py-3 rounded-full w-[286px] text-sm cursor-pointer select-none">
                Country <svg id="chevron-right-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24">
                    <rect id="Rectangle_66" data-name="Rectangle 66" width="24" height="24" fill="none" />
                    <path id="Path_410" data-name="Path 410" d="M12.6,12,8,7.4,9.4,6l6,6-6,6L8,16.6,12.6,12Z"
                        fill="#ababab" />
                </svg>
            </label>

            <div class="absolute top-14  bg-white rounded-xl shadow-lg p-3 hidden peer-checked:block z-50">
                <input type="search" placeholder="Search"
                    class="w-full p-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:border-transparent focus:ring-0 bg-gray-50 mb-2">

                <ul class="max-h-48 overflow-y-auto text-sm scrollbar-hide">
                    <li class="p-2 hover:bg-gray-100 rounded cursor-pointer">India</li>
                    <li class="p-2 hover:bg-gray-100 rounded cursor-pointer">USA</li>
                    <li class="p-2 hover:bg-gray-100 rounded cursor-pointer">UK</li>
                    <li class="p-2 hover:bg-gray-100 rounded cursor-pointer">Canada</li>
                    <li class="p-2 hover:bg-gray-100 rounded cursor-pointer">Japan</li>
                </ul>
            </div>
        </div>

        <!-- PHASE DROPDOWN -->
        <div class="relative">
            <input type="checkbox" id="phaseToggle" class="peer hidden">
            <label for="phaseToggle"
                class="flex items-center justify-between bg-[#F3F3F3] text-[#1C1C3C] px-6 py-3 rounded-full w-[286px] text-sm cursor-pointer select-none">
                Phase of project <svg id="chevron-right-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24">
                    <rect id="Rectangle_66" data-name="Rectangle 66" width="24" height="24" fill="none" />
                    <path id="Path_410" data-name="Path 410" d="M12.6,12,8,7.4,9.4,6l6,6-6,6L8,16.6,12.6,12Z"
                        fill="#ababab" />
                </svg>

            </label>

            <div class="absolute top-14 w-[220px] bg-white rounded-xl shadow-lg p-3 hidden peer-checked:block z-50">
                <input type="search" placeholder="Search"
                    class="w-full p-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:border-transparent focus:ring-0 bg-gray-50 mb-2">

                <ul class="max-h-48 overflow-y-auto text-sm scrollbar-hide">
                    <li class="p-2 hover:bg-gray-100 rounded cursor-pointer">Planning</li>
                    <li class="p-2 hover:bg-gray-100 rounded cursor-pointer">Construction</li>
                    <li class="p-2 hover:bg-gray-100 rounded cursor-pointer">Completed</li>
                    <li class="p-2 hover:bg-gray-100 rounded cursor-pointer">Proposal</li>
                </ul>
            </div>
        </div>

        <!-- UPDATE BUTTON -->
        <!-- <button
            class="bg-[#2ECCFF] text-[18px] text-[#0D1B3D] px-10 py-3 rounded-full text-sm  w-[286px] font-medium hover:bg-[#1DC5F8] transition">
            Update results
        </button> -->
        <button class="bg-[#37C6F4] text-lg text-[#1E1D57] px-10 py-3 rounded-full text-sm w-[286px] font-medium 
           hover:bg-[#1E1D57] hover:text-[#37C6F4] transition">
            Update results
        </button>

    </div>
</section>
<!-- country button end  -->

<!-- MAP SECTION -->
<section class=" mb-16 mt-[40px]  px-6  lg:px-16">
    <div class=" max-w-7xl mx-auto ">
        <div class="w-full h-[390px] border border-gray-300 rounded-md overflow-hidden">
            <iframe id="mapFrame" src="https://www.google.com/maps?q=Cardiff,UK&output=embed" width="100%" height="100%"
                style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

<!-- Comprehensive water PPP knowledge in a format that works for you  -->
<section
    class="relative bg-[linear-gradient(106deg,#37C6F4_0%,#5CD3CE_100%)] bg-no-repeat bg-left-top opacity-100 text-black py-10 md:py-24 px-6 lg:px-16 ">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 440 20.722"
        class="absolute top-0 left-1/2 -translate-x-1/2 block md:hidden w-full">
        <path id="Path_435" data-name="Path 435"
            d="M0,21.645c128.377,0,172.165,20.722,230.524,20.722S333.263,21.645,440,21.645H0Z"
            transform="translate(0 -21.645)" fill="#fff"></path>
    </svg>

    <svg xmlns="http://www.w3.org/2000/svg" width="710" height="33.437" viewBox="0 0 710 33.437"
        class="absolute top-0 right-[15%] hidden md:block ">
        <path id="Path_419" data-name="Path 419"
            d="M0,21.645c207.154,0,277.811,33.437,371.982,33.437S537.765,21.645,710,21.645H0Z"
            transform="translate(0 -21.645)" fill="#fff"></path>
    </svg>


    <div class="max-w-7xl mx-auto mb-16 flex flex-col md:flex-row justify-between items-start md:items-end md:gap-8  ">
        <div class="max-w-[604px]">
            <h2 class="text-3xl text-[#1E1D57] md:text-[40px] font-semibold leading-tight mb-4">
                Comprehensive water PPP knowledge in a format that works for you
            </h2>
            <p class="text-[#000000]">
                Every resource on the Hub is designed for clarity and speed. Whether you need comprehensive
                documentation or a quick overview, we provide water PPP guidance in multiple formats – so you can
                learn in the way that fits you.
            </p>
        </div>


        <a href="https://water-hub.ecareinfoway.com/resources" class="group inline-flex items-center text-[#37C6F4] mt-6 md:mt-0 font-medium  whitespace-nowrap bg-[#1E1D57] rounded-[25px] py-[10px] px-[27px] 
                        hover:bg-[#37C6F4] hover:text-[#1E1D57] transition duration-300">
            The resource library
            <!-- SVG Icon placed after text -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                class="ml-2 transition-all duration-200 fill-[#37C6F4] group-hover:fill-[#1E1D57]">
                <rect width="24" height="24" fill="none"></rect>
                <path d="M12.6,12,8,7.4,9.4,6l6,6-6,6L8,16.6,12.6,12Z"></path>
            </svg>
        </a>
    </div>
    <!-- Waves (inside hero section for overlap effect) -->
    <div class=" bottom-0 absolute left-0 right-0">
        <svg class="w-full h-[80px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 24 150 28"
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
</section>

</section>


<script>
    // --- Click outside to close dropdowns ---
    document.addEventListener('click', function (e) {
        const countryToggle = document.getElementById('countryToggle');
        const phaseToggle = document.getElementById('phaseToggle');

        const countryDiv = countryToggle.closest('div.relative');
        const phaseDiv = phaseToggle.closest('div.relative');

        if (!countryDiv.contains(e.target)) countryToggle.checked = false;
        if (!phaseDiv.contains(e.target)) phaseToggle.checked = false;
    });

    // --- Auto show user location on load ---
    const mapFrame = document.getElementById('mapFrame');
    window.addEventListener("load", () => {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                position => {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;
                    mapFrame.src = `https://www.google.com/maps?q=${lat},${lon}&z=15&output=embed`;
                },
                error => {
                    console.warn("Location access denied or unavailable:", error.message);
                }
            );
        }
    });
</script>

@endsection