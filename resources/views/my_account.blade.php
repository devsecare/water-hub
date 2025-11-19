@extends('layouts.frontend')

@section('title', 'PPP Water Hub')

@section('content')


 <!-- HEADER SECTION -->
  <section class="bg-gradient-to-r from-[#070648] to-[#2C75BE] text-white">
    <div class="max-w-7xl mx-auto px-6 py-20 sm:py-24 lg:py-28">
      <p class="text-xl text-[#37C6F4] font-semibold mb-2">MY ACCOUNT</p>
      <h1 class="text-3xl sm:text-5xl font-bold leading-tight max-w-3xl">
        Hello <span class="text-blue-400">{{ $user->name }}</span>
      </h1>
      <p class="text-lg font-semibold mt-2 mb-2">
        (Not {{ $user->name }}? <a href="{{ route('logout') }}" class="text-blue-400 hover:underline" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>)
      </p>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </div>
  </section>

  <!-- MAIN SECTION -->
  <section class=" bg-[#F7F7F7]  ">
    <div class="max-w-7xl  mx-auto min-h-screen flex flex-col lg:flex-row">

      <!-- SIDEBAR -->
      <aside class="w-full lg:w-[30%] p-6">
        <h2 class="text-xl text-[#1E1D57] font-semibold mb-6">Filter</h2>

<div class="space-y-6">

  <label class="flex text-[16px] items-center space-x-2 text-[#1E1D57] font-semibold">
    <svg id="book-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
      <path id="Path_395" data-name="Path 395" d="M6,22a3,3,0,0,1-3.01-3.01V5a2.9,2.9,0,0,1,.88-2.13A2.883,2.883,0,0,1,6,1.99H17v16H6a1,1,0,1,0,0,2H19V4h2V22Zm3-6h6V4H9ZM7,16V4H6A.99.99,0,0,0,5,5V16.18c.17-.05.33-.09.49-.13A2.1,2.1,0,0,1,6,16H7ZM5,4V4Z" fill="#1e1d57"></path>
      <rect id="Rectangle_50" data-name="Rectangle 50" width="24" height="24" fill="none"></rect>
    </svg> My saved content
  </label>

  <form method="GET" action="{{ route('myaccount') }}" id="filterForm">
    @foreach($categories as $category)
      <label class="flex items-center space-x-2 cursor-pointer">
        <input type="checkbox" 
               name="categories[]" 
               value="{{ $category->id }}"
               class="w-5 h-5 rounded border border-gray-400 bg-white checked:bg-white checked:border-gray-400 checked:ring-0 focus:ring-0"
               {{ in_array($category->id, $selectedCategories) ? 'checked' : '' }}
               onchange="document.getElementById('filterForm').submit();">
        <span class="text-[#1E1D57] text-[16px] font-semibold">{{ $category->name }}</span>
      </label>
      @if($category->children->count() > 0)
        @foreach($category->children as $subCategory)
          <label class="flex items-center space-x-2 cursor-pointer ml-6">
            <input type="checkbox" 
                   name="categories[]" 
                   value="{{ $subCategory->id }}"
                   class="w-5 h-5 rounded border border-gray-400 bg-white checked:bg-white checked:border-gray-400 checked:ring-0 focus:ring-0"
                   {{ in_array($subCategory->id, $selectedCategories) ? 'checked' : '' }}
                   onchange="document.getElementById('filterForm').submit();">
            <span class="text-[#1E1D57] text-[16px] font-semibold">{{ $subCategory->name }}</span>
          </label>
        @endforeach
      @endif
    @endforeach

</div>
        <div class="w-full mt-6">
          <label class="block text-lg font-semibold text-[#000000] mb-3">Search</label>
          <div class="relative">
            <input type="text" 
                   name="search"
                   value="{{ $search }}"
                   placeholder="Search…" 
                   class="w-full bg-white shadow-sm rounded-full py-3 pl-4 pr-10 text-gray-700 
                          placeholder-gray-400 focus:ring-0 focus:outline-none"
                   onkeypress="if(event.key === 'Enter') { event.preventDefault(); document.getElementById('filterForm').submit(); }">

            <!-- Search Icon -->
            <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18.095 18.095">
                <path
                  d="M16.681,18.1h0l-5.145-5.145a7.2,7.2,0,1,1,1.414-1.414L18.1,16.681l-1.413,1.413ZM7.2,2a5.2,5.2,0,1,0,5.2,5.2A5.206,5.206,0,0,0,7.2,2Z"
                  fill="#37c6f4" />
              </svg>
            </button>
          </div>
        </div>
      </form>


        <div class="flex flex-col gap-4 max-w-xs py-8  rounded-md">
          <!-- Account details link -->
          <a href="#" class="flex items-center gap-3  py-2 rounded-md  ">
            <!-- Gear SVG -->
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none">
              <path
                d="M9.25,22l-.4-3.2a3.144,3.144,0,0,1-.61-.3c-.19-.12-.38-.24-.56-.38L4.7,19.37,1.95,14.62l2.58-1.95a2.041,2.041,0,0,1-.03-.34v-.68a1.343,1.343,0,0,1,.03-.34L1.95,9.36,4.7,4.61,7.68,5.86c.18-.13.38-.26.58-.38a4.2,4.2,0,0,1,.6-.3l.4-3.2h5.5l.4,3.2a3.144,3.144,0,0,1,.61.3c.19.12.38.24.56.38l2.98-1.25,2.75,4.75-2.58,1.95a2.041,2.041,0,0,1,.03.34v.68a1.4,1.4,0,0,1-.05.34l2.58,1.95-2.75,4.75-2.95-1.25c-.18.13-.38.26-.58.38a4.2,4.2,0,0,1-.6.3l-.4,3.2H9.26ZM11,20h1.98l.35-2.65a5.387,5.387,0,0,0,1.44-.59,5.782,5.782,0,0,0,1.21-.94l2.48,1.03.98-1.7-2.15-1.63a4.214,4.214,0,0,0,.18-.74,5.158,5.158,0,0,0,.05-.79,6.838,6.838,0,0,0-.05-.79,3.079,3.079,0,0,0-.18-.74l2.15-1.63-.98-1.7L15.98,8.18a5.808,5.808,0,0,0-1.21-.96,5.735,5.735,0,0,0-1.44-.59L13,3.98H11.02l-.35,2.65a5.387,5.387,0,0,0-1.44.59,5.782,5.782,0,0,0-1.21.94L5.54,7.13l-.98,1.7,2.15,1.6a4.548,4.548,0,0,0-.23,1.55,6.527,6.527,0,0,0,.05.78,3.409,3.409,0,0,0,.18.75L4.56,15.14l.98,1.7,2.48-1.05a5.808,5.808,0,0,0,1.21.96,5.735,5.735,0,0,0,1.44.59L11,19.99Zm1.05-4.5a3.517,3.517,0,0,0,3.51-3.51,3.517,3.517,0,0,0-3.51-3.51,3.483,3.483,0,0,0-3.5,3.51,3.428,3.428,0,0,0,1.01,2.48,3.327,3.327,0,0,0,2.49,1.03Z"
                fill="#1e1d57"></path>
              <rect width="24" height="24" fill="none"></rect>
            </svg>
            <span class="text-[16px] text-[#000000] font-normal">Account details</span>
          </a>

          <!-- Sign out link -->
          <a href="{{ route('logout') }}" 
             class="flex items-center gap-3 py-2 rounded-md"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <!-- Sign out SVG -->
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none">
              <rect width="24" height="24" fill="none"></rect>
              <path
                d="M5,21a1.926,1.926,0,0,1-1.41-.59A1.926,1.926,0,0,1,3,19V5a1.926,1.926,0,0,1,.59-1.41A1.926,1.926,0,0,1,5,3h7V5H5V19h7v2Zm11-4-1.38-1.45L17.17,13H8.99V11h8.18L14.62,8.45,16,7l5,5Z"
                fill="#1e1d57"></path>
            </svg>
            <span class="text-[16px] text-[#000000] font-normal">Sign out</span>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </aside>

      <!-- MAIN CONTENT -->
      <main class="flex-1 p-6">
        @if($savedItems->count() > 0)
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($savedItems as $item)
              @php
                $displayCategory = $item->category->parent ?? $item->category;
                $categoryColor = $displayCategory->color ?? '#0E1C62';
                if (!str_starts_with($categoryColor, '#')) {
                    $categoryColor = '#' . $categoryColor;
                }
                $hex = ltrim($categoryColor, '#');
                if (strlen($hex) == 3) {
                    $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
                }
                $r = hexdec(substr($hex, 0, 2));
                $g = hexdec(substr($hex, 2, 2));
                $b = hexdec(substr($hex, 4, 2));
                $r2 = min(255, $r + (255 - $r) * 0.3);
                $g2 = min(255, $g + (255 - $g) * 0.3);
                $b2 = min(255, $b + (255 - $b) * 0.3);
                $gradientEnd = sprintf('#%02x%02x%02x', $r2, $g2, $b2);
                $firstFileId = $item->files->first() ? $item->files->first()->id : null;
              @endphp
              <div class="bg-white shadow-md p-4 rounded-[25px] flex flex-col justify-between">
                <div class="text-white p-6 rounded-[15px] flex flex-col justify-between flex-grow shadow-[0_8px_15px_-4px_rgba(0,0,0,0.50)]" 
                     style="background: linear-gradient(to bottom right, {{ $categoryColor }}, {{ $gradientEnd }});">
                  <div>
                    <h3 class="font-semibold text-lg leading-snug">{{ $item->title }}</h3>
                    <p class="text-sm mt-2 mb-8 opacity-90">{{ $item->publisher ?? 'No publisher' }}</p>
                  </div>
                  <div class="flex items-center gap-2 mt-12">
                    <span class="material-symbols-outlined text-xl">{{ $displayCategory->icon ?? 'folder' }}</span>
                    <span class="text-lg">{{ $displayCategory->name }}</span>
                  </div>
                </div>
                <div class="flex justify-between pt-6 pb-3 border-t border-white/30 text-black/80">
                  <a href="{{ route('resources.show', $item->slug) }}" class="cursor-pointer">
                    <i data-lucide="eye" class="w-5 h-5 text-[#ababab] hover:text-[#37C6F4] transition-colors duration-200"></i>
                  </a>
                  <i data-lucide="bookmark" class="w-5 h-5 text-[#ababab] hover:text-[#37C6F4] transition-colors duration-200 cursor-pointer"></i>
                  @if($item->files->count() > 0)
                    <a href="{{ route('files.download', $item->files->first()->id) }}" class="cursor-pointer">
                      <i data-lucide="download" class="w-5 h-5 text-[#ababab] hover:text-[#37C6F4] transition-colors duration-200"></i>
                    </a>
                  @else
                    <i data-lucide="download" class="w-5 h-5 text-[#ababab] opacity-50 cursor-not-allowed"></i>
                  @endif
                  <i data-lucide="share-2" class="w-5 h-5 text-[#ababab] hover:text-[#37C6F4] transition-colors duration-200 cursor-pointer"></i>
                </div>
              </div>
            @endforeach
          </div>
        @else
          <div class="text-center py-12">
            <p class="text-gray-600 text-lg">No saved content yet.</p>
            <a href="{{ route('resources') }}" class="text-blue-600 hover:underline mt-2 inline-block">Browse resources</a>
          </div>
        @endif
        </div>
      </main>

    </div>
  </section>

<!-- waves  -->

    <div class=" bottom-0 left-0 right-0 bg-[#F7F7F7]">
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