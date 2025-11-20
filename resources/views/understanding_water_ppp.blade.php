@extends('layouts.frontend')

@section('title', 'About Water PPPs')

@section('content')

<!-- hero section  -->
<section class="bg-gradient-to-r from-[#070648] to-[#2CBE9D] text-white px-6 lg:px-16 relative">
    <svg xmlns="http://www.w3.org/2000/svg" width="440" height="20.722" viewBox="0 0 440 20.722"
        class="absolute top-0 w-[80%] max-w-fit left-0 right-auto h-auto z-10">
        <path id="Path_412" data-name="Path 412"
            d="M0,21.645c128.377,0,172.165,20.722,230.524,20.722S333.263,21.645,440,21.645H0Z"
            transform="translate(0 -21.645)" fill="#fff"></path>
    </svg>
    <div class="max-w-7xl mx-auto  py-12  sm:py-24 lg:py-28">
        <p class="text-xl text-[#37C6F4] font-semibold mb-2">WHAT ARE WATER AND WASTEWATER PPPs</p>
        <h1 class="text-4xl font-appetite sm:text-5xl font-extrabold leading-none max-w-xl">
            Understanding Water PPPs – The Facts
        </h1>
    </div>
</section>

<!-- about text  -->
<section class="w-full bg-white my-10 lg:my-20 flex items-center px-6 lg:px-16">
    <div class="max-w-7xl mx-auto  w-full">
        <div class="max-w-[790px] text-left">
            <!-- First Bold Paragraph -->
            <p class="text-[#1E1D57] font-semibold text-sm sm:text-base md:text-[18px] md:leading-[1.35rem] mb-4">
                A Public-Private Partnership (PPP) in water and wastewater is a contractual agreement between a
                public authority and a private operator to deliver water services. The public authority remains the
                “master” – setting objectives, goals, and conditions – whilst the private operator becomes the
                “servant”, carrying out operations and transferring technology and expertise to improve services.

            </p>

            <!-- Second Regular Paragraph -->
            <p class="text-[#1E1D57] text-sm sm:text-base lg:mt-8 md:text-[18px] md:leading-[1.35rem] ">
                Through these agreements, the skills and assets of both sectors combine to deliver essential
                services. Each party shares in the risks and rewards, working towards a common goal: reliable, safe
                water and sanitation for communities.
            </p>
        </div>
    </div>
</section>
<!-- flex three section  -->
<section class="px-6 lg:px-16">
    <div class="max-w-7xl mx-auto ">
        <!-- Main Heading -->
        <h1 class="text-4xl font-bold text-blue-900 mb-8">
            Why PPPs matter for water
        </h1>

        <!-- 3 Column Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <!-- Left Column -->
            <div class="text-[17px] leading-relaxed space-y-3">
                <p>
                    Almost 1 billion people still use unsafe drinking water sources, whilst 2.5 billion lack proper
                    sanitation
                    facilities. The water sector globally is chronically underfunded and inefficient. Meeting
                    <a href="#" class="text-blue-600 font-semibold hover:underline">Sustainable Development Goal 6</a>
                    – universal access to safe water and sanitation by 2030 – requires massive investment that
                    traditional funding
                    alone cannot deliver.
                </p>
            </div>

            <!-- Middle Column -->
            <div class="text-[17px] leading-relaxed">
                <p class="font-semibold mb-3">PPPs offer a mechanism to:</p>
                <ul class="list-disc pl-6 space-y-1">
                    <li>Fund critical infrastructure investment</li>
                    <li>Introduce new technology and innovation (desalination, water reuse, smart systems)</li>
                    <li>Improve operational efficiency and reduce water loss</li>
                    <li>Transfer specialist expertise to utilities</li>
                    <li>Achieve financial sustainability through better management</li>
                </ul>
            </div>

            <!-- Right Column -->
            <div class="text-[17px] leading-relaxed space-y-4">
                <p>
                    Private operators now include increasingly local and regional providers, bringing down costs through
                    competition whilst understanding local contexts.
                </p>
                <div class="flex items-center space-x-3">
                    <img src="images/clean-water.jpg" alt="SDG 6" class=" object-contain">
                </div>
            </div>

        </div>
    </div>
</section>

<!-- type of ppps section  -->
<section class="px-6 lg:px-16">
    <div class="max-w-7xl mx-auto py-20">
        <!-- Main Heading -->
        <h1 class="text-4xl font-bold text-blue-900 mb-6">
            Types of PPPs
        </h1>

        <!-- Intro Paragraph -->


        <!-- Two Column Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 text-[17px] leading-relaxed">

            <!-- Left Column -->
            <div class="space-y-5">
                <p class="text-[17px] leading-relaxed ">
                    Contracts vary significantly in scope and duration, typically ranging from 3 to 30+ years depending
                    on complexity:
                </p>
                <p>
                    <span class="font-semibold">Technical Assistance Contracts (3–5 years):</span>
                    Providing specific expertise – reducing water loss, improving billing, implementing new technology.
                </p>

                <p>
                    <span class="font-semibold">Management Contracts (3–5 years):</span>
                    Private operator manages day-to-day operations whilst the public authority retains assets and
                    investment responsibility.
                </p>
            </div>

            <!-- Right Column -->
            <div class="space-y-5">
                <p>
                    <span class="font-semibold">Lease/Affermage Contracts (8–15 years):</span>
                    Operator leases the infrastructure, manages operations and maintenance, and collects revenue whilst
                    the authority retains ownership.
                </p>

                <p>
                    <span class="font-semibold">Design-Build-Operate Contracts (15–25 years):</span>
                    Private partner designs, builds, and operates new facilities – common for wastewater treatment
                    plants or desalination facilities.
                </p>

                <p>
                    <span class="font-semibold">Concessions (20–30 years):</span>
                    Comprehensive contracts where the operator takes on significant investment obligations whilst
                    operating the service.
                </p>
            </div>

        </div>
    </div>
</section>
<!-- who controls who section  -->
<section class="bg-[#1E1D4E] text-white py-20 px-6 lg:px-16 relative">
    <div class="max-w-7xl mx-auto ">

        <!-- Heading -->
        <h1 class="text-4xl font-bold mb-6">Who controls what?</h1>

        <!-- Description -->
        <p class="text-lg mb-12 max-w-2xl">
            A critical fact often misunderstood: the public authority always controls the contract and pricing
            policy. Water remains a public service under public control. The private operator works within the
            framework set by the authority.
        </p>

        <!-- Bottom two-column section -->
        <div class="flex flex-col md:flex-row  lg:max-w-[70%] gap-10">

            <!-- Left column -->
            <div class="w-full lg:w-1/2">
                <h2 class="text-2xl font-semibold mb-4">The authority decides:</h2>
                <ul class="list-disc list-outside pl-6 space-y-2">
                    <li>Service standards and quality requirements</li>
                    <li>Tariff structures and pricing policies</li>
                    <li>Investment priorities</li>
                    <li>Contract performance metrics</li>
                    <li>Social protection measures</li>
                </ul>
            </div>

            <!-- Right column -->
            <div class="w-full lg:w-1/2">
                <h2 class="text-2xl font-semibold mb-4">The operator delivers:</h2>
                <ul class="list-disc list-outside pl-6 space-y-2">
                    <li>Day-to-day management and operations</li>
                    <li>Technical expertise and innovation</li>
                    <li>Efficiency improvements</li>
                    <li>Investment execution (depending on contract type)</li>
                    <li>Performance reporting</li>
                </ul>
            </div>

        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" width="710" height="33.437" viewBox="0 0 710 33.437"
        class="absolute -bottom-[33px] -left-[10px] lg:left-[10%] hidden md:block">
        <path id="Path_433" data-name="Path 433"
            d="M0,21.645c207.154,0,277.811,33.437,371.982,33.437S537.765,21.645,710,21.645H0Z"
            transform="translate(0 -21.645)" fill="#1e1d57"></path>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" width="310.156" height="32.563" viewBox="0 0 310.156 32.563"
        class="absolute -bottom-[15px] left-1/2 -translate-x-1/2 block md:hidden">
        <path id="Path_434" data-name="Path 434"
            d="M0,16.636c90.493,0,121.359,15.926,162.5,15.926s72.421-15.926,147.66-15.926V0H0Z"
            transform="translate(0 0.001)" fill="#1E1D4E"></path>
    </svg>
</section>

<!-- The Economics of Water PPPs section  -->
<section class="px-6 lg:px-16 py-12">
    <div class="max-w-7xl mx-auto  py-12">
        <div class="flex flex-col lg:flex-row gap-6 md:gap-10">
            <!-- Right Content -->
            <div class="lg:w-1/2 flex flex-col justify-center">
                <h1 class="text-lg sm:text-4xl sm:text-4xl font-extrabold text-[#1E1D57] mb-6">
                    The Economics of Water PPPs
                </h1>
                <p class="text-[#000000] mb-4">Sustainable water services require cost recovery. Most costs – labour,
                    energy, chemicals, financing for infrastructure – are external factors, not controlled by operators.
                    When authorities engage private operators, they often make important economic decisions
                    simultaneously:</p>

                <ul class="list-disc list-outside pl-4 text-[#000000] space-y-1 mb-4">
                    <li>Moving from tax-funded services to direct user charges (making costs visible)</li>
                    <li>Implementing needed investment programmes to restore or upgrade infrastructure</li>
                    <li>Establishing tariff structures that ensure long-term sustainability</li>
                </ul>

                <p class="text-[#000000]">This means PPPs sometimes “appear” more expensive, but they’re often simply
                    reflecting decisions about investment and cost recovery that the authority has already made and
                    would occur regardless of who operates the service.
                </p>
            </div>
            <!-- Left Image -->
            <div class="lg:w-1/2">
                <img src="images/The-Economics-of-Water-PPPs-min.png" alt="Water Infrastructure"
                    class="md:w-full md:h-full object-contain rounded-2xl">
            </div>
        </div>
    </div>
</section>

<!-- financial water infrastructure  -->

<section class="bg-[#f2f2f2] px-6 lg:px-16">
    <div class="max-w-7xl mx-auto  py-12">
        <div class="flex flex-col lg:flex-row gap-6 md:gap-10">

            <!-- Left Image -->
            <div class="lg:w-1/2">
                <img src="images/Financing-Water-Infrastructure.png" alt="Water Infrastructure"
                    class="md:w-full md:h-full object-contain rounded-2xl">
            </div>

            <!-- Right Content -->
            <div class="lg:w-1/2 flex flex-col justify-center">
                 <h1 class="text-lg sm:text-4xl sm:text-4xl font-extrabold text-[#1E1D57] mb-6">
                    Financing Water Infrastructure
                </h1>
                <p class="text-[#000000] mb-4">
                    Private operators access various financing sources to fund needed investments:
                </p>

                <ul class="list-disc list-outside pl-4 text-[#000000] space-y-1 mb-4">
                    <li>Bank loans or financial institution borrowing</li>
                    <li>Capital investment from financial investors or the operator itself</li>
                    <li>Repayable subsidies from government or revolving funds</li>
                    <li>Blended finance combining multiple sources</li>
                    <li>Non-repayable grants from donors (for specific social programmes)</li>
                </ul>

                <p class="text-[#000000]">
                    All financing mechanisms except grants require repayment over the contract term through the
                    agreed revenue model.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- real world success  -->
<section class="relative overflow-hidden relative">
    <svg xmlns="http://www.w3.org/2000/svg" width="710" height="37.994" viewBox="0 0 710 37.994"
        class="absolute top-0 z-111 right-[10%] hidden md:block  ">
        <path id="Path_432" data-name="Path 432"
            d="M0,21.645c207.154,0,277.811,37.995,371.982,37.995S537.765,21.645,710,21.645H0Z"
            transform="translate(0 -21.645)" fill="#f2f2f2"></path>
    </svg>

    <svg xmlns="http://www.w3.org/2000/svg" width="710" height="37.994" viewBox="0 0 710 37.994"
        class="-translate-x-1/2 left-1/2 absolute top-[-10px] z-111 md:hidden max-w-[400px] items-center justify-center">
        <path id="Path_432" data-name="Path 432"
            d="M0,21.645c207.154,0,277.811,37.995,371.982,37.995S537.765,21.645,710,21.645H0Z"
            transform="translate(0 -21.645)" fill="#f2f2f2"></path>
    </svg>
    <!-- Wave Shape at Top -->
    <!-- <div class="absolute top-0 left-0 w-full">
        <svg viewBox="0 0 1440 320" class="w-full h-24 md:h-32" preserveAspectRatio="none">
            <path fill="#ffffff"
                d="M0,64L60,80C120,96,240,128,360,154.7C480,181,600,203,720,197.3C840,192,960,160,1080,149.3C1200,139,1320,149,1380,154.7L1440,160L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
            </path>
        </svg>
    </div> -->

    <!-- Background Gradient -->
    <div
        class="bg-[linear-gradient(103deg,#37C6F4_0%,#5CD3CE_100%)] opacity-100 text-center py-20 px-6 md:px-16 text-white relative z-10">
        <h2 class="text-2xl sm:text-4xl md:text-5xl font-bold text-[#1E1D57] mb-6">Real-World Success</h2>
        <p class="text-[#1E1D57] max-w-5xl mx-auto leading-relaxed text-lg md:text-[22px]">
            There’s evidence from around the world demonstrates PPPs’ impact.
            In Manila, Philippines, access jumped from 26% to 99% since 1997,
            with diarrhoea incidences falling 75%. Poor families who paid $3
            per cubic metre for bottled water now pay 18 cents through subsidised tariffs.
        </p>


        <div class="mt-6">
            <a href="#" class="group inline-flex items-center bg-[#1E1D57] text-[#37C6F4] 
               text-sm md:text-base font-medium py-3 px-6 rounded-full 
               shadow-md transition-all duration-300 hover:text-white">

                View more case studies

                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    class="ml-2 transition-all duration-200 fill-[#37C6F4] group-hover:fill-white">
                    <rect width="24" height="24" fill="none"></rect>
                    <path d="M12.6,12,8,7.4,9.4,6l6,6-6,6L8,16.6,12.6,12Z"></path>
                </svg>
            </a>
        </div>


    </div>
</section>
<!-- PPPs and sustainability  -->
<section class="lg:py-12 px-6 lg:px-16">
    <div class="max-w-7xl mx-auto  lg:pt-12 pt-8">
        <h1 class="text-lg sm:text-4xl sm:text-4xl font-extrabold text-[#1E1D57] ">
            PPPs and sustainability
        </h1>
    </div>
    <div class="max-w-7xl  py-8 mx-auto grid lg:grid-cols-2 gap-10 ">

        <!-- bottom Section -->
        <div>

            <p class="text-[#000000] mb-4">
                Water operators link the natural and human water cycles – taking water from nature, treating it
                safely for use, collecting wastewater, treating it to remove pollution, and returning it to nature.
                This cycle must be sustainable.
            </p>
            <h1 class="text-[20px] mb-6 font-extrabold text-[#1E1D57]">
                Private operators support community sustainability by:
            </h1>
            <ul class="list-disc pl-4 space-y-2 text-[#000000] mb-6">
                <li>Protecting water resources through better management </li>
                <li>Reducing energy consumption and carbon footprint</li>
                <li>mplementing climate resilience measures </li>
                <li>Ensuring 24/7 service continuity </li>
                <li>Training local workforces </li>
                <li>Advancing towards universal access targets </li>
            </ul>


        </div>

        <!-- Right Section (Suggested Graphic Placeholder) -->
        <div class="bg-blue-50 rounded-2xl p-6 flex flex-col justify-center">
            <h2 class="font-semibold text-gray-800 mb-2">SUGGESTED GRAPHIC:</h2>
            <p class="text-gray-700">
                Simple breakdown showing what makes up the cost of water services – positioned here.
                Can this be done?
            </p>
        </div>
    </div>
</section>
<!-- faq section  -->

<section class="w-full bg-regal-blue py-16 pb-36 text-white">
    <div class="max-w-4xl mx-auto px-6 lg:px-16">

        <h2 class="text-3xl md:text-4xl font-bold text-center mb-10 max-[440px]:text-xl">
            Frequently asked questions
        </h2>

        <div class="space-y-4">

            <!-- FAQ 1 -->
            <div class="bg-[#131B5A] rounded-[25px] p-4 max-[400px]:p-2">
                <button class="w-full flex justify-between items-center faq-btn group">
                    <span class="font-medium text-lg max-[400px]:text-sm transition-colors group-hover:text-[#37C6F4]">
                        Don’t PPPs mean privatising water?
                    </span>

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        class="transition-transform rotate-0 duration-300">
                        <rect width="24" height="24" fill="none"></rect>
                        <path class="fill-[#ababab] transition-colors duration-300 group-hover:fill-[#37C6F4]"
                            d="M12.68,12,9.6,15.08,11,16.51l4.5-4.5L11,7.51,9.6,8.94l3.08,3.08ZM12,22a9.678,9.678,0,0,1-3.9-.79,9.989,9.989,0,0,1-5.32-5.32,9.678,9.678,0,0,1-.79-3.9,9.678,9.678,0,0,1,.79-3.9A9.989,9.989,0,0,1,8.1,2.77,9.678,9.678,0,0,1,12,1.98a9.678,9.678,0,0,1,3.9.79,9.989,9.989,0,0,1,5.32,5.32,9.678,9.678,0,0,1,.79,3.9,9.678,9.678,0,0,1-.79,3.9,9.989,9.989,0,0,1-5.32,5.32A9.678,9.678,0,0,1,12,22Zm0-2a7.742,7.742,0,0,0,5.68-2.33,7.726,7.726,0,0,0,2.33-5.68,7.726,7.726,0,0,0-2.33-5.68A7.726,7.726,0,0,0,12,3.98,7.726,7.726,0,0,0,6.32,6.31a7.726,7.726,0,0,0-2.33,5.68,7.726,7.726,0,0,0,2.33,5.68A7.726,7.726,0,0,0,12,20Z">
                        </path>
                    </svg>
                </button>

                <div class="accordion-content max-h-0 overflow-hidden transition-all duration-300">
                    <p class="pt-3 text-[#FFFFFF] max-w-[719px]">
                        No. In a PPP, the public authority retains ownership and control. Water remains a
                        public service under public oversight. The private operator is contracted to deliver
                        services under conditions set by the authority.
                    </p>
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="bg-[#131B5A] rounded-[25px] p-4 max-[400px]:p-2">
                <button class="w-full flex justify-between items-center faq-btn group">
                    <span class="font-medium text-lg max-[400px]:text-sm transition-colors group-hover:text-[#37C6F4]">
                        Will my water bills increase with a PPP?
                    </span>

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        class="transition-transform rotate-0 duration-300">
                        <rect width="24" height="24" fill="none"></rect>
                        <path class="fill-[#ababab] transition-colors duration-300 group-hover:fill-[#37C6F4]"
                            d="M12.68,12,9.6,15.08,11,16.51l4.5-4.5L11,7.51,9.6,8.94l3.08,3.08ZM12,22a9.678,9.678,0,0,1-3.9-.79,9.989,9.989,0,0,1-5.32-5.32,9.678,9.678,0,0,1-.79-3.9,9.678,9.678,0,0,1,.79-3.9A9.989,9.989,0,0,1,8.1,2.77,9.678,9.678,0,0,1,12,1.98a9.678,9.678,0,0,1,3.9.79,9.989,9.989,0,0,1,5.32,5.32,9.678,9.678,0,0,1,.79,3.9,9.678,9.678,0,0,1-.79,3.9,9.989,9.989,0,0,1-5.32,5.32A9.678,9.678,0,0,1,12,22Zm0-2a7.742,7.742,0,0,0,5.68-2.33,7.726,7.726,0,0,0,2.33-5.68,7.726,7.726,0,0,0-2.33-5.68A7.726,7.726,0,0,0,12,3.98,7.726,7.726,0,0,0,6.32,6.31a7.726,7.726,0,0,0-2.33,5.68,7.726,7.726,0,0,0,2.33,5.68A7.726,7.726,0,0,0,12,20Z">
                        </path>
                    </svg>
                </button>

                <div class="accordion-content max-h-0 overflow-hidden transition-all duration-300">
                    <p class="pt-3 text-[#FFFFFF] max-w-[719px]">
                        Tariff levels are controlled by the public authority, not the operator. Any increases
                        reflect decisions about investment needs and cost recovery that the authority has made.
                        Many PPPs actually improve affordability through efficiency gains whilst expanding access
                        to those previously unserved.
                    </p>
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="bg-[#131B5A] rounded-[25px] p-4 max-[400px]:p-2">
                <button class="w-full flex justify-between items-center faq-btn group">
                    <span class="font-medium text-lg max-[400px]:text-sm transition-colors group-hover:text-[#37C6F4]">
                        Are PPPs only about profit for companies?
                    </span>

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        class="transition-transform rotate-0 duration-300">
                        <path class="fill-[#ababab] transition-colors duration-300 group-hover:fill-[#37C6F4]"
                            d="M12.68,12,9.6,15.08,11,16.51l4.5-4.5L11,7.51,9.6,8.94l3.08,3.08ZM12,22a9.678,9.678,0,0,1-3.9-.79,9.989,9.989,0,0,1-5.32-5.32,9.678,9.678,0,0,1-.79-3.9,9.678,9.678,0,0,1,.79-3.9A9.989,9.989,0,0,1,8.1,2.77,9.678,9.678,0,0,1,12,1.98a9.678,9.678,0,0,1,3.9.79,9.989,9.989,0,0,1,5.32,5.32,9.678,9.678,0,0,1,.79,3.9,9.678,9.678,0,0,1-.79,3.9,9.989,9.989,0,0,1-5.32,5.32A9.678,9.678,0,0,1,12,22Zm0-2a7.742,7.742,0,0,0,5.68-2.33,7.726,7.726,0,0,0,2.33-5.68,7.726,7.726,0,0,0-2.33-5.68A7.726,7.726,0,0,0,12,3.98,7.726,7.726,0,0,0,6.32,6.31a7.726,7.726,0,0,0-2.33,5.68,7.726,7.726,0,0,0,2.33,5.68A7.726,7.726,0,0,0,12,20Z">
                        </path>
                    </svg>
                </button>

                <div class="accordion-content max-h-0 overflow-hidden transition-all duration-300">
                    <p class="pt-3">
                        PPPs are about results. Operators are paid for delivering agreed performance standards –
                        improved service, reduced water loss, expanded access, better water quality. Contracts
                        include penalties for underperformance. The primary goal is improved public services.
                    </p>
                </div>
            </div>

            <!-- FAQ 4 FULL (included double paragraphs) -->
            <div class="bg-[#131B5A] rounded-[25px] p-4 max-[400px]:p-2">
                <button class="w-full flex justify-between items-center faq-btn group">
                    <span class="font-medium text-lg max-[400px]:text-sm transition-colors group-hover:text-[#37C6F4]">
                        What happens if the private company fails?
                    </span>

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        class="transition-transform rotate-0 duration-300">
                        <path class="fill-[#ababab] transition-colors duration-300 group-hover:fill-[#37C6F4]"
                            d="M12.68,12,9.6,15.08,11,16.51l4.5-4.5L11,7.51,9.6,8.94l3.08,3.08ZM12,22a9.678,9.678,0,0,1-3.9-.79,9.989,9.989,0,0,1-5.32-5.32,9.678,9.678,0,0,1-.79-3.9,9.678,9.678,0,0,1,.79-3.9A9.989,9.989,0,0,1,8.1,2.77,9.678,9.678,0,0,1,12,1.98a9.678,9.678,0,0,1,3.9.79,9.989,9.989,0,0,1,5.32,5.32,9.678,9.678,0,0,1,.79,3.9,9.678,9.678,0,0,1-.79,3.9,9.989,9.989,0,0,1-5.32,5.32A9.678,9.678,0,0,1,12,22Zm0-2a7.742,7.742,0,0,0,5.68-2.33,7.726,7.726,0,0,0,2.33-5.68,7.726,7.726,0,0,0-2.33-5.68A7.726,7.726,0,0,0,12,3.98,7.726,7.726,0,0,0,6.32,6.31a7.726,7.726,0,0,0-2.33,5.68,7.726,7.726,0,0,0,2.33,5.68A7.726,7.726,0,0,0,12,20Z">
                        </path>
                    </svg>
                </button>

                <div class="accordion-content max-h-0 overflow-hidden transition-all duration-300">
                    <p class="pt-3">
                        Contracts include detailed termination provisions. Assets remain public property. The
                        authority can replace an underperforming operator or resume direct management.
                        Well-designed contracts protect the public interest. Do PPPs mean job losses?
                    </p>

                    <p class="pt-3">
                        Evidence shows PPPs typically maintain or increase employment. As services expand and
                        improve,
                        workforce needs grow. Many contracts include provisions for transferring existing public
                        employees with protected conditions.
                    </p>
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="bg-[#131B5A] rounded-[25px] p-4 max-[400px]:p-2">
                <button class="w-full flex justify-between items-center faq-btn group">
                    <span class="font-medium text-lg max-[400px]:text-sm transition-colors group-hover:text-[#37C6F4]">
                        Are PPPs suitable for poor communities?
                    </span>

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        class="transition-transform rotate-0 duration-300">
                        <path class="fill-[#ababab] transition-colors duration-300 group-hover:fill-[#37C6F4]"
                            d="M12.68,12,9.6,15.08,11,16.51l4.5-4.5L11,7.51,9.6,8.94l3.08,3.08ZM12,22a9.678,9.678,0,0,1-3.9-.79,9.989,9.989,0,0,1-5.32-5.32,9.678,9.678,0,0,1-.79-3.9,9.678,9.678,0,0,1,.79-3.9A9.989,9.989,0,0,1,8.1,2.77,9.678,9.678,0,0,1,12,1.98a9.678,9.678,0,0,1,3.9.79,9.989,9.989,0,0,1,5.32,5.32,9.678,9.678,0,0,1,.79,3.9,9.678,9.678,0,0,1-.79,3.9,9.989,9.989,0,0,1-5.32,5.32A9.678,9.678,0,0,1,12,22Zm0-2a7.742,7.742,0,0,0,5.68-2.33,7.726,7.726,0,0,0,2.33-5.68,7.726,7.726,0,0,0-2.33-5.68A7.726,7.726,0,0,0,12,3.98,7.726,7.726,0,0,0,6.32,6.31a7.726,7.726,0,0,0-2.33,5.68,7.726,7.726,0,0,0,2.33,5.68A7.726,7.726,0,0,0,12,20Z">
                        </path>
                    </svg>
                </button>

                <div class="accordion-content max-h-0 overflow-hidden transition-all duration-300">
                    <p class="pt-3">
                        Yes – particularly where traditional approaches have failed to deliver. Many successful
                        PPPs specifically target underserved populations through subsidised connection fees,
                        lifeline tariffs for basic consumption, and flexible payment schemes. Examples from Benin,
                        Uganda, and Manila demonstrate pro-poor outcomes.
                    </p>
                </div>
            </div>

            <!-- FAQ 6 -->
            <div class="bg-[#131B5A] rounded-[25px] p-4 max-[400px]:p-2">
                <button class="w-full flex justify-between items-center faq-btn group">
                    <span class="font-medium text-lg max-[400px]:text-sm transition-colors group-hover:text-[#37C6F4]">
                        Who monitors PPP performance?
                    </span>

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        class="transition-transform rotate-0 duration-300">
                        <path class="fill-[#ababab] transition-colors duration-300 group-hover:fill-[#37C6F4]"
                            d="M12.68,12,9.6,15.08,11,16.51l4.5-4.5L11,7.51,9.6,8.94l3.08,3.08ZM12,22a9.678,9.678,0,0,1-3.9-.79,9.989,9.989,0,0,1-5.32-5.32,9.678,9.678,0,0,1-.79-3.9,9.678,9.678,0,0,1,.79-3.9,9.678,9.678,0,0,1,.79-3.9A9.989,9.989,0,0,1,8.1,2.77,9.678,9.678,0,0,1,12,1.98a9.678,9.678,0,0,1,3.9.79,9.989,9.989,0,0,1,5.32,5.32,9.678,9.678,0,0,1,.79,3.9,9.678,9.678,0,0,1-.79,3.9,9.989,9.989,0,0,1-5.32,5.32A9.678,9.678,0,0,1,12,22Zm0-2a7.742,7.742,0,0,0,5.68-2.33,7.726,7.726,0,0,0,2.33-5.68,7.726,7.726,0,0,0-2.33-5.68A7.726,7.726,0,0,0,12,3.98,7.726,7.726,0,0,0,6.32,6.31a7.726,7.726,0,0,0-2.33,5.68,7.726,7.726,0,0,0,2.33,5.68A7.726,7.726,0,0,0,12,20Z">
                        </path>
                    </svg>
                </button>

                <div class="accordion-content max-h-0 overflow-hidden transition-all duration-300">
                    <p class="pt-3">
                        The public authority monitors contract performance continuously. Independent regulators
                        often provide oversight. Performance data is typically published. Communities have
                        channels to raise concerns. Transparency is built into contract design.
                    </p>
                </div>
            </div>

            <!-- FAQ 7 -->
            <div class="bg-[#131B5A] rounded-[25px] p-4 max-[400px]:p-2">
                <button class="w-full flex justify-between items-center faq-btn group">
                    <span class="font-medium text-lg max-[400px]:text-sm transition-colors group-hover:text-[#37C6F4]">
                        What about water as a human right?
                    </span>

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        class="transition-transform rotate-0 duration-300">
                        <path class="fill-[#ababab] transition-colors duration-300 group-hover:fill-[#37C6F4]"
                            d="M12.68,12,9.6,15.08,11,16.51l4.5-4.5L11,7.51,9.6,8.94l3.08,3.08ZM12,22a9.678,9.678,0,0,1-3.9-.79,9.989,9.989,0,0,1-5.32-5.32,9.678,9.678,0,0,1-.79-3.9,9.678,9.678,0,0,1,.79-3.9,9.678,9.678,0,0,1,.79-3.9A9.989,9.989,0,0,1,8.1,2.77,9.678,9.678,0,0,1,12,1.98a9.678,9.678,0,0,1,3.9.79,9.989,9.989,0,0,1,5.32,5.32,9.678,9.678,0,0,1,.79,3.9,9.678,9.678,0,0,1-.79,3.9,9.989,9.989,0,0,1-5.32,5.32A9.678,9.678,0,0,1,12,22Zm0-2a7.742,7.742,0,0,0,5.68-2.33,7.726,7.726,0,0,0,2.33-5.68,7.726,7.726,0,0,0-2.33-5.68A7.726,7.726,0,0,0,12,3.98,7.726,7.726,0,0,0,6.32,6.31a7.726,7.726,0,0,0-2.33,5.68,7.726,7.726,0,0,0,2.33,5.68A7.726,7.726,0,0,0,12,20Z">
                        </path>
                    </svg>
                </button>

                <div class="accordion-content max-h-0 overflow-hidden transition-all duration-300">
                    <p class="pt-3">
                        PPPs can advance the human right to water by expanding access, improving quality, and
                        ensuring service sustainability. The UN recognises that different operational models –
                        public or private – can deliver this right when properly governed. What matters is outcomes:
                        safe, accessible, affordable water for all.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>



<!-- waves section  -->
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