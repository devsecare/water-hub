@extends('layouts.frontend')

@section('title', 'About Water PPPs')

@section('content')

  <!-- ✅ HERO -->
  <section class="bg-gradient-to-r from-[#070648] to-[#2CBE9D] text-white">
    <div class="max-w-7xl mx-auto px-6 py-20 sm:py-24 lg:py-28">
      <p class="text-sm text-[#37C6F4] font-semibold mb-2">WATER PPP RESOURCES</p>
      <h1 class="text-4xl sm:text-4xl font-extrabold leading-none max-w-xl">
        Everything You Need To Identify, Prepare, Implement And Manage Your PPP Project
      </h1>
    </div>
  </section>

  <!-- ✅ INTRO -->

  <section class="max-w-7xl mx-auto px-6  py-12">
    <p class="text-[19px] text-[#1E1D57] text-bold sm:text-xl md:text-lg max-w-2xl">
      Browse by category to find the guidance you need – from foundational PPP concepts to contract management and
      monitoring. Bookmark resources to save and view them in your account, or download documents, audio, and video
      files to access offline anytime.
    </p>
  </section>

  <!-- ✅ MAIN -->
  <section class=" bg-[#f2f2f2]  ">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row min-h-screen">
      <!-- Sidebar -->
<aside class="w-full md:max-w-[22rem] p-4">

  <!-- All content -->
  <div class="mb-3">
    <button 
      class="w-full flex items-center gap-3 px-4 py-3 text-[#1E1D57] rounded-full border border-gray-300 bg-white hover:bg-gray-100 transition">
      <i data-lucide="grid" class="w-5 h-5"></i>
      <span class="font-medium ">All content</span>
    </button>
  </div>

  <!-- All Case Studies -->
  <div class="mb-6">
    <button 
      class="w-full flex items-center text-[#1E1D57] gap-3 px-4 py-3 rounded-full border border-gray-300 bg-white hover:bg-gray-100 transition">
      <i data-lucide="lightbulb" class="w-5 h-5"></i>
      <span class="font-medium ">All case studies</span>
    </button>
  </div>

  <!-- CATEGORY BUTTON -->
  <div class="space-y-4">

    <!-- INDENTIFYING PPP -->
    <div>
      <button onclick="toggleMenu('menu1')"
        class="w-full flex items-center text-[#1E1D57] justify-between px-4 py-3 rounded-full border border-[#1E1D57] hover:bg-gray-100 bg-white  transition relative">
        
        <!-- Left blue dot -->
        <span class="flex items-center gap-3 pl-2">
          <i data-lucide="search" class="w-5 h-5"></i>
          <span class="font-semibold ">Identifying PPP opportunities</span>
        </span>

        <i id="icon-menu1" data-lucide="chevron-down" class="w-6 h-6 transition-transform -rotate-90"></i>
      </button>

      <!-- SUBMENU -->
      <ul id="menu1" class="ml-6 mt-3 space-y-2 text-sm text-[#1E1D57] hidden">
        <li class="py-1">Sub category topic 1</li>
        <li class="py-1">Sub category with longer title 2</li>
        <li class="py-1">Sub category topic 3</li>
      </ul>

      <!-- Divider -->
      <div class="h-[1px] bg-gray-300 mt-4"></div>
    </div>

    <!-- PREPARING YOUR PROJECT -->
    <div>
      <button onclick="toggleMenu('menu2')"
        class="w-full flex items-center text-[#1E1D57] justify-between px-4 py-3 rounded-full border hover:bg-gray-100 border-[#1E1D57] bg-white  transition">
        <span class="flex items-center gap-3">
          <i data-lucide="briefcase" class="w-5 h-5"></i>
          <span class="font-semibold">Preparing your project</span>
        </span>
        <i id="icon-menu2" data-lucide="chevron-down" class="w-6 h-6 transition-transform -rotate-90"></i>
      </button>

      <ul id="menu2" class="ml-6 mt-3 space-y-2 text-sm  text-gray-600 hidden">
        <li>Sub topic 1</li>
        <li>Sub topic 2</li>
      </ul>

      <div class="h-[1px] bg-gray-300 mt-4"></div>
    </div>

    <!-- IMPLEMENTATION -->
    <div>
      <button onclick="toggleMenu('menu3')"
        class="w-full flex items-center justify-between text-[#1E1D57] px-4 py-3 rounded-full border border-[#1E1D57] bg-white hover:bg-gray-100 transition">
        <span class="flex items-center gap-3">
          <i data-lucide="layers" class="w-5 h-5"></i>
          <span class="font-semibold text-gray-800">Implementation</span>
        </span>
        <i id="icon-menu3" data-lucide="chevron-down" class="w-6 h-6 transition-transform -rotate-90"></i>
      </button>

      <ul id="menu3" class="ml-6 mt-3 space-y-2 text-sm text-gray-600 hidden">
        <li>Sub topic 1</li>
        <li>Sub topic 2</li>
      </ul>

      <div class="h-[1px] bg-gray-300 mt-4"></div>
    </div>

    <!-- MANAGEMENT -->
    <div>
      <button onclick="toggleMenu('menu4')"
        class="w-full flex items-center justify-between text-[#1E1D57] text-[#1E1D57] px-4 py-3 rounded-full border border-[#1E1D57] bg-white hover:bg-gray-100 transition">
        <span class="flex items-center gap-3">
          <i data-lucide="settings" class="w-5 h-5"></i>
          <span class="font-semibold">Management</span>
        </span>
        <i id="icon-menu4" data-lucide="chevron-down" class="w-6 h-6 transition-transform -rotate-90"></i>
      </button>

      <ul id="menu4" class="ml-6 mt-3 space-y-2 text-sm text-gray-600 hidden">
        <li>Sub topic 1</li>
        <li>Sub topic 2</li>
      </ul>

      <div class="h-[1px] bg-gray-300 mt-4"></div>
    </div>

  </div>

  <!-- SEARCH -->
  <div class="mt-6">
    <label class="text-sm font-semibold text-[#1E1D57]">Search</label>
    <div class="relative mt-1">
      <input 
        type="text"
        placeholder="Search…"
        class="w-full border border-[#1E1D57] rounded-full p-2 pr-9 focus:ring-2 focus:ring-blue-500" />
      <i data-lucide="search" class="absolute right-3 top-2.5 w-6 h-6 text-[#1E1D57]"></i>
    </div>
  </div>

</aside>


      <!-- ✅ MAIN CONTENT -->
      <main class="flex-1 p-6">


        <!-- Cards -->
        <div id="card-container" class="grid grid-cols-1  sm:grid-cols-2 lg:grid-cols-3 gap-6"></div>
<!-- w-5/6 -->
        <!-- Pagination -->
        <div class="flex justify-center mt-6 space-x-2">
            
          <button id="btn1" class="px-3 py-1 bg-blue-600 text-white rounded" onclick="changePage(1)">1</button>
          <button id="btn2" class="px-3 py-1 bg-gray-200 rounded" onclick="changePage(2)">2</button>
          <button id="btn3" class="px-3 py-1 bg-gray-200 rounded" onclick="changePage(3)">3</button>
        </div>
      </main>
    </div>
  </section>

  <!-- ✅ MODAL -->
  <div id="productModal"
    class="hidden fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center z-50 transition-all duration-300">
    <div
      class="bg-white rounded-2xl shadow-xl max-w-4xl w-[90%] md:w-[70%] p-0 relative animate-fadeIn overflow-hidden">
      <button onclick="closeproductModal()" class="absolute top-5 right-5 text-gray-600 hover:text-black z-10">
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
              Summarise what they will get from the document and also mention the kinds of support files available.
              Audio, video etc.
            </p>

            <p class="mt-4">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua.
            </p>
            <p class="mt-2">
              At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
              sanctus est lorem ipsum dolor sit amet.
            </p>
          </div>

          <!-- Buttons fixed at the bottom right section -->
          <div class="border-t mt-8 pt-4 flex justify-between flex-wrap gap-4 text-gray-700 text-sm">
            <div class="flex flex-wrap gap-6">
              <button class="flex items-center gap-2"><i data-lucide="bookmark" class="w-4 h-4"></i>Add to your
                library</button>
              <button class="flex items-center gap-2"><i data-lucide="download" class="w-4 h-4"></i>Download
                file</button>
              <button class="flex items-center gap-2"><i data-lucide="share-2" class="w-4 h-4"></i>Share</button>
            </div>
            <button class="flex items-center gap-2 font-semibold underline"><i data-lucide="more-horizontal"
                class="w-4 h-4"></i>More options…</button>
          </div>
        </div>
      </div>
    </div>
  </div>
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