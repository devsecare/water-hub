@extends('layouts.frontend')

@section('title', 'PPP Water Hub')

@section('content')


<section class="bg-gradient-to-r from-[#070648] to-[#2CBE9D] text-white px-6 lg:px-16 relative">

  <div class="max-w-7xl mx-auto  py-20 sm:py-24 lg:py-28">
    <h1 class="text-[18px] text-[#37C6F4] font-semibold mb-6">CONTACT US</h1>
    <p class=" font-appetite text-3xl sm:text-5xl font-bold leading-none max-w-[710px]">
      Get in touch with the Water and Wastewater PPP Hub
    </p>
  </div>
</section>
<section class="px-6 lg:px-16 pb-[70px] md:pb-[150px]">
  <div class="max-w-7xl mx-auto  py-16">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-16">

      <!-- LEFT TEXT COLUMN -->
      <div class="space-y-6 lg:max-w-[490px]">
        <p class="text-[#000000] text-[16px] font-semibold">
          Whether you have questions about PPP resources, want to contribute content,
          or need guidance on using the Hub, we’re here to help. We welcome enquiries
          from government officials, practitioners, investors, and anyone working to
          improve water and wastewater services worldwide.
        </p>

        <h2 class="text-[22px] font-bold text-[#1E1D57]">What you can contact us about</h2>

        <div class="space-y-4 text-gray-800">
          <p>
            <span class="font-bold">General enquiries:</span> Questions about the Hub, registration, or accessing
            resources.
          </p>
          <p>
            <span class="font-bold">Content contributions:</span> Share PPP materials, case studies, or insights from
            your projects.
          </p>
          <p>
            <span class="font-bold">Feedback and suggestions:</span> Tell us what’s working, what’s missing, or how we
            can improve.
          </p>
          <p>
            <span class="font-bold">Partnership opportunities:</span> Explore ways to collaborate with AquaFed and our
            global network.
          </p>
        </div>
      </div>

      <!-- RIGHT FORM COLUMN -->
      <form onsubmit="validateForm(event)" class="space-y-6">

        <!-- Name -->
        <div>
          <label class="block text-gray-700 mb-1">Name</label>
          <input type="text" id="name" class="w-full bg-gray-100 rounded-full px-4 py-3 focus:outline-none" />
          <span id="name-error" class="text-red-500 text-sm"></span>
        </div>

        <!-- Organisation -->
        <div>
          <label class="block text-gray-700 mb-1">Organisation</label>
          <input type="text" id="organisation" class="w-full bg-gray-100 rounded-full px-4 py-3 focus:outline-none" />
          <span id="organisation-error" class="text-red-500 text-sm"></span>
        </div>

        <!-- Email -->
        <div>
          <label class="block text-gray-700 mb-1">Email</label>
          <input type="email" id="email" class="w-full bg-gray-100 rounded-full px-4 py-3 focus:outline-none" />
          <span id="email-error" class="text-red-500 text-sm"></span>
        </div>

        <!-- Message -->
        <div>
          <label class="block text-gray-700 mb-1">Message</label>
          <textarea id="message" rows="6"
            class="w-full bg-gray-100 rounded-xl px-4 py-3 focus:outline-none resize-none"></textarea>
          <span id="message-error" class="text-red-500 text-sm"></span>
        </div>

        <!-- captcha code  -->
        <div>
          <label class="block text-gray-700 mb-1">Captcha</label>

          <div class="flex items-center justify-between  gap-3">

            <input type="text" id="submit" placeholder="Enter Captcha"
              class="w-full mt-2 bg-gray-100 rounded-full px-4 py-3 focus:outline-none">

            <!-- Captcha Output -->
            <div id="image" class="px-4 py-6 bg-gray-200 rounded-lg font-bold w-1/3"></div>

            <!-- Refresh Button -->
            <button type="button" onclick="generate()" class="text-blue-600 text-sm">
              Refresh
            </button>
          </div>
          <!-- User Input -->

          <span id="captcha-error" class="text-red-500 text-sm"></span>
        </div>

        <!-- Button -->
        <button type="submit"
          class="w-full text-xl bg-[#27C1F9] text-[#121858] font-semibold py-3 rounded-full hover:opacity-90 transition hover:bg-[#1E1D57] hover:text-[#37C6F4]">
          Send
        </button>

      </form>

    </div>
  </div>
</section>

<!-- <div class=" bottom-0 left-0 right-0">
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
</div> -->



@endsection