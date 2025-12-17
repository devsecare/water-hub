@extends('layouts.frontend')

@section('title', 'About Water PPPs')

@section('content')

<!-- hero section  -->
<section class="bg-gradient-to-r from-[#070648] to-[#2CBE9D] text-white px-6 lg:px-16 relative">
    <div class="max-w-7xl mx-auto  py-12  sm:py-24 lg:py-28">
        <h1 class="text-xl text-[#37C6F4] font-semibold mb-2">WHAT ARE WATER AND WASTEWATER PPPs</h1>
        <p class="text-4xl font-appetite sm:text-5xl font-bold leading-none max-w-xl">
            Understanding Water Public-Private Partnerships
        </p>
    </div>
</section>

<!-- about text  -->
<section class="w-full bg-white py-10 md:py-20 flex items-center px-6 lg:px-16">
    <div class="max-w-7xl mx-auto  w-full">
        <div class="max-w-[790px] text-left">
            <!-- First Bold Paragraph -->
            <p class="text-[#1E1D57] font-semibold text-sm sm:text-base md:text-[18px] leading-snug mb-4">
                A Public-Private Partnership (PPP) in water and wastewater is a specific contractual framework between a
                public authority and a private operator to deliver water services. In a PPP each P is essential for a
                balanced and impactful process.

            </p>

            <!-- Second Regular Paragraph -->
            <!-- <p class="text-[#1E1D57] text-sm sm:text-base lg:mt-8 md:text-[18px] leading-snug">
                Through these agreements, the skills and assets of both sectors combine to deliver essential
                services. Each party shares in the risks and rewards, working towards a common goal: reliable, safe
                water and sanitation for communities.
            </p> -->
        </div>
    </div>
</section>
<!-- flex two section  -->
<section class="px-6 lg:px-16">
    <div class="max-w-7xl mx-auto ">
        <!-- Main Heading -->
        <!-- <h2 class="text-[40px] font-bold text-[#1E1D57] mb-6 ">
            Why PPPs matter for water
        </h2> -->

        <!-- 3 Column Layout -->
        <div class="flex  gap-10 flex-col lg:flex-row text-[#000000] ">
            <!-- Left Column -->
            <div class="text-[16px] lg:w-1/2 leading-relaxed space-y-3 ">
                <p>
                    <strong>P for Public.</strong> The public partner can be ministries, PPP units, local authorities, municipalities, or
                    state-owned enterprise. In a PPP, the public authority is the ultimate owner of the water services
                    assets, defines the project scope and objectives, and monitors the contract.
                </p>
                <p>
                   <strong>P for Private.</strong>  The private partner could be a private water operator or a consortium of operators
                    and engineers to deliver a project. Private operators now include increasingly local and regional
                    providers, bringing down costs through competition whilst understanding local contexts. The private
                    water operator brings its expertise, innovation capacity and experience in management and operation
                    to develop and provide sustainable, efficient and resilient water and wastewater services.
                </p>
                <p>
                     <strong>P for Partnership.</strong> Within a PPP, public and private parties agree a contract which assigns the role
                    and responsibilities of each party, allocation of risks, and the common objectives and performance
                    indicators to be achieved to deliver reliable, safe water and sanitation for communities.
                </p>
            </div>

            <!-- Middle Column -->
            <!-- <div class="text-[16px] lg:max-w-[392px] leading-relaxed">
                <p class="font-semibold mb-3">PPPs offer a mechanism to:</p>
                <ul class="list-disc pl-6 space-y-1 lg:max-w-[378px]">
                    <li>Fund critical infrastructure investment</li>
                    <li>Introduce new technology and innovation (desalination, water reuse, smart systems)</li>
                    <li>Improve operational efficiency and reduce water loss</li>
                    <li>Transfer specialist expertise to utilities</li>
                    <li>Achieve financial sustainability through better management</li>
                </ul>
            </div> -->

            <!-- Right Column -->
            <div class="text-[16px] lg:w-1/2 leading-relaxed space-y-6">
                <p>
                    Water PPPs offer a mechanism to:
                </p>
                <ul class="list-disc ml-5">
                    <li>Catalyse broader water and sanitation sector reform</li>
                    <li>Improve operational efficiency and reduce water loss</li>
                    <li> Introduce new technology, innovation and industrial excellence (desalination, water reuse,
                        smart systems)</li>
                    <li>Transfer specialist expertise from private operators to public utilities</li>
                    <li>Fund critical infrastructure investment</li>
                    <li>Achieve financial sustainability through better management</li>
                </ul>
                <div class="flex items-center space-x-3">
                    <img src="images/clean-water.jpg" alt="SDG 6" class=" object-contain">
                </div>
            </div>

        </div>
    </div>
</section>

<!-- type of ppps section  -->
<section class="px-6 lg:px-16 lg:py-20 py-10">
    <div class="max-w-7xl mx-auto">
        <!-- Main Heading -->
        <h2 class="text-[40px] font-bold text-[#1E1D57] mb-6">
            Types of PPPs
        </h2>
        <!-- Two Column Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-10 gap-4 text-[17px] leading-relaxed text-[#000000] ">

            <!-- Left Column -->
            <div class="lg:space-y-6 space-y-2">
                <p class="text-[17px] leading-relaxed ">
                    Contracts vary significantly in scope and duration, typically ranging from 3 to 30+ years depending
                    on complexity:
                </p>
                <p>
                    <span class="font-bold text-[#000000]">Technical Assistance Contracts (3–5 years):</span>
                    Providing specific expertise – reducing water loss, improving billing, implementing new technology.
                </p>

                <p>
                    <span class="font-bold text-[#000000]">Management Contracts (3–5 years):</span>
                    Private operator manages day-to-day operations whilst the public authority retains assets and
                    investment responsibility.
                </p>
            </div>

            <!-- Right Column -->
            <div class="lg:space-y-6 space-y-2">
                <p>
                    <span class="font-bold text-[#000000]">Lease/Affermage Contracts (8–15 years):</span>
                    Operator leases the infrastructure, manages operations and maintenance, and collects revenue whilst
                    the authority retains ownership.
                </p>

                <p>
                    <span class="font-bold text-[#000000]">Design-Build-Operate Contracts (15–25 years):</span>
                    Private partner designs, builds, and operates new facilities – common for wastewater treatment
                    plants or desalination facilities.
                </p>

                <p>
                    <span class="font-bold text-[#000000]">Concessions (20–30 years):</span>
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
        <h2 class="text-[40px] font-bold mb-6">Who controls what?</h2>

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

<!-- PPPs and sustainability  -->
<section class="lg:my-20 my-10 px-6 lg:px-16">
   {{-- <div class="max-w-7xl flex gap-10 mx-auto pb-6">
     <h2 class="text-xl sm:text-[40px] w-1/2 hidden lg:block font-bold text-[#1E1D57] ">

        </h2>
        <h2 class="text-xl lg:w-1/2 w-full sm:text-[40px] font-bold text-[#1E1D57] ">
            PPPs and sustainability
        </h2>
    </div> --}}
 <div class="max-w-7xl mx-auto flex flex-col-reverse lg:flex-row gap-6 md:gap-10  ">

        <div class="lg:w-1/2">
                <img src="images/sustainability.jpg" alt="Water Infrastructure" class="w-full md:h-full max-h-[380px] object-cover rounded-2xl">
        </div>
        <div class="lg:w-1/2">
            <h2 class="text-3xl sm:text-4xl font-bold text-[#1E1D57] mb-6">
                PPPs and sustainability
            </h2>
            <p class="text-[#000000] mb-6">
                Water operators link the natural and human water cycles – taking water from nature, treating it
                safely for use, collecting wastewater, treating it to remove pollution, and returning it to nature.
                This cycle must be sustainable.
            </p>
            <h3 class="text-[22px] mb-4 font-bold text-[#1E1D57]">
                Private operators support community sustainability by:
            </h3>
            <ul class="list-disc pl-4 space-y-2 text-[#000000] mb-6">
                <li>Protecting water resources through better management </li>
                <li>Reducing energy consumption and carbon footprint</li>
                <li>Implementing climate resilience measures </li>
                <li>Ensuring 24/7 service continuity </li>
                <li>Training local workforces </li>
                <li>Advancing towards universal access targets </li>
            </ul>
        </div>
    </div>
</section>

<!-- The Economics of Water PPPs section  -->
<section class="px-6 lg:px-16 lg:my-20 my-10">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col lg:flex-row gap-6 md:gap-10">
            <!-- Right Content -->
            <div class="lg:w-1/2 flex flex-col justify-center">
                <h2 class="text-3xl sm:text-4xl font-bold text-[#1E1D57] mb-6">
                    The Economics of Water PPPs
                </h2>
                <p class="text-[#000000] mb-4 leading-relaxed">Sustainable water services require cost recovery. Most
                    costs – labour,
                    energy, chemicals, financing for infrastructure – are external factors, not controlled by operators.
                    When authorities engage private operators, they often make important economic decisions
                    simultaneously:</p>

                <ul class="list-disc list-outside pl-4 text-[#000000] space-y-1 mb-4">
                    <li>Moving from tax-funded services to direct user charges (making costs visible)</li>
                    <li>Implementing needed investment programmes to restore or upgrade infrastructure</li>
                    <li>Establishing tariff structures that ensure long-term sustainability</li>
                </ul>

                <p class="text-[#000000] leading-relaxed">This means PPPs sometimes “appear” more expensive, but they’re
                    often simply
                    reflecting decisions about investment and cost recovery that the authority has already made and
                    would occur regardless of who operates the service.
                </p>
            </div>
            <!-- Left Image -->
            <div class="lg:w-1/2">
                <img src="images/The-Economics-of-Water-PPPs-min.png" alt="Water Infrastructure"
                    class="w-full md:h-full max-h-[380px] object-cover rounded-2xl">
            </div>
        </div>
    </div>
</section>

<!-- financial water infrastructure  -->
<section class="bg-[#f2f2f2] px-6 lg:px-16">
    <div class="max-w-7xl mx-auto  py-12 lg:pb-20 pb-15">
        <div class="flex flex-col-reverse lg:flex-row gap-6 md:gap-10">

            <!-- Left Image -->
            <div class="lg:w-1/2">
                <img src="images/Financing-Water-Infrastructure.png" alt="Water Infrastructure"
                    class="w-full md:h-full max-h-[380px] object-cover rounded-2xl">
            </div>

            <!-- Right Content -->
            <div class="lg:w-1/2 flex flex-col justify-center">
                <h2 class="text-lg sm:text-4xl sm:text-4xl font-bold text-[#1E1D57] mb-6">
                    Financing Water Infrastructure
                </h2>
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

                <p class="text-[#000000] leading-relaxed">
                    All financing mechanisms except grants require repayment over the contract term through the
                    agreed revenue model.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- faq section  -->


@endsection
