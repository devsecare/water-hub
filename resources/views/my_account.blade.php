@extends('layouts.frontend')

@section('title', 'PPP Water Hub')

@section('content')

<script src="https://unpkg.com/lucide@latest"></script>

<!-- HEADER SECTION -->
<section class="bg-gradient-to-r from-[#070648] to-[#2C75BE] text-white px-6 lg:px-16">
  <div class="max-w-7xl mx-auto py-20 sm:py-24 lg:py-28">
    <p class="text-xl text-[#37C6F4] font-semibold mb-2">MY ACCOUNT</p>
    <h1 class="text-3xl font-appetite sm:text-5xl font-bold leading-tight max-w-3xl">
      Hello <span class="text-blue-400">{{ $user->first_name ?? $user->name }}</span>
    </h1>
    <p class="text-lg font-appetite font-semibold mt-2 mb-2">
      (Not {{ $user->first_name ?? $user->name }}? <a href="{{ route('logout') }}" class="text-blue-400 hover:underline" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>)
    </p>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
  </div>
</section>

<!-- MAIN SECTION -->
<section class=" bg-[#F7F7F7] lg:px-16 lg:py-16 py-8">
  <div class="max-w-7xl  mx-auto min-h-screen flex flex-col md:flex-row">

    <!-- SIDEBAR -->
    <aside class="w-1/2 md:w-[35%] lg:w-[30%] p-6 lg:px-0 lg:pr-6">
      <h2 class="text-xl text-[#1E1D57] font-semibold mb-6">Filter</h2>

      <div class="space-y-6">

        <label class="flex text-[16px] items-center space-x-2 text-[#1E1D57] font-semibold">
          <svg id="book-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path id="Path_395" data-name="Path 395"
              d="M6,22a3,3,0,0,1-3.01-3.01V5a2.9,2.9,0,0,1,.88-2.13A2.883,2.883,0,0,1,6,1.99H17v16H6a1,1,0,1,0,0,2H19V4h2V22Zm3-6h6V4H9ZM7,16V4H6A.99.99,0,0,0,5,5V16.18c.17-.05.33-.09.49-.13A2.1,2.1,0,0,1,6,16H7ZM5,4V4Z"
              fill="#1e1d57"></path>
            <rect id="Rectangle_50" data-name="Rectangle 50" width="24" height="24" fill="none"></rect>
          </svg> My saved content
        </label>

        @if($categories->count() > 0)
          @foreach($categories as $category)
            <label class="flex items-center space-x-2 cursor-pointer category-filter-item" data-category-id="{{ $category['id'] }}">
              <input type="checkbox" value="{{ $category['id'] }}"
                class="category-checkbox w-5 h-5 rounded border border-gray-400 bg-white checked:bg-white checked:border-gray-400 checked:ring-0 focus:ring-0">
              <span class="text-[#1E1D57] text-[16px] font-semibold">{{ $category['name'] }}</span>
            </label>
          @endforeach
        @else
          <p class="text-[#868686] text-sm">No categories available</p>
        @endif

      </div>
      <div class="w-full mt-6">
        <label class="block text-lg font-semibold text-[#000000] mb-3">Search</label>
        <div class="relative">
          <input type="text" id="my-account-search" placeholder="Search…" class="w-full bg-white shadow-sm rounded-full py-3 pl-4 pr-10 text-gray-700 
                   placeholder-gray-400 focus:ring-0 focus:outline-none">

          <!-- Search Icon -->
          <span class="absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18.095 18.095">
              <path
                d="M16.681,18.1h0l-5.145-5.145a7.2,7.2,0,1,1,1.414-1.414L18.1,16.681l-1.413,1.413ZM7.2,2a5.2,5.2,0,1,0,5.2,5.2A5.206,5.206,0,0,0,7.2,2Z"
                fill="#37c6f4" />
            </svg>
          </span>
        </div>
      </div>


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
        <a href="{{ route('logout') }}" class="flex items-center gap-3  py-2 rounded-md  " onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <!-- Sign out SVG -->
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none">
            <rect width="24" height="24" fill="none"></rect>
            <path
              d="M5,21a1.926,1.926,0,0,1-1.41-.59A1.926,1.926,0,0,1,3,19V5a1.926,1.926,0,0,1,.59-1.41A1.926,1.926,0,0,1,5,3h7V5H5V19h7v2Zm11-4-1.38-1.45L17.17,13H8.99V11h8.18L14.62,8.45,16,7l5,5Z"
              fill="#1e1d57"></path>
          </svg>
          <span class="text-[16px] text-[#000000] font-normal">Sign out</span>
        </a>
      </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-6 lg:px-0">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="bookmarked-items-container">
        @if($bookmarkedItems->count() > 0)
          @foreach($bookmarkedItems as $item)
            <div class="bg-white shadow-md p-4 rounded-[25px] flex flex-col justify-between item-card" data-category-id="{{ $item['category_id'] }}" data-title="{{ strtolower($item['title']) }}" data-publisher="{{ strtolower($item['publisher'] ?? '') }}" data-description="{{ strtolower($item['short_description'] ?? $item['description'] ?? '') }}">
              <div style="background: linear-gradient(to bottom, #070648, {{ $item['category_color'] ?? '#2CBFA0' }});" class="text-white p-6 rounded-[15px] flex flex-col justify-between flex-grow shadow-[0_8px_15px_-4px_rgba(0,0,0,0.50)]">
                <div>
                  <h3 class="font-semibold text-lg leading-snug">{{ $item['title'] }}</h3>
                  <p class="text-sm mt-2 mb-8 opacity-90">{{ $item['publisher'] ?? '' }}</p>
                </div>
                <div class="flex items-center space-x-2 mt-12">
                  <i data-lucide="{{ $item['icon'] }}" class="w-4 h-4"></i>
                  <span class="text-sm">{{ $item['type'] ?? 'Guide' }}</span>
                </div>
              </div>
              <div class="flex justify-between pt-6 pb-3 border-t border-white/30 text-black/80">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" class="fill-[#ababab] hover:fill-[#37C6F4] transition-colors duration-200 cursor-pointer" onclick="openItemModal({{ $item['id'] }})">
                  <path d="M6,23H3a1.926,1.926,0,0,1-1.41-.59A1.926,1.926,0,0,1,1,21V18H3v3H6Zm12,0V21h3V18h2v3a2.015,2.015,0,0,1-2,2Zm-6-4.5a9,9,0,0,1-5.44-1.78A10.135,10.135,0,0,1,3,11.99,10.251,10.251,0,0,1,6.56,7.26,8.977,8.977,0,0,1,12,5.48a9,9,0,0,1,5.44,1.78A10.185,10.185,0,0,1,21,11.99a10.251,10.251,0,0,1-3.56,4.73A9.063,9.063,0,0,1,12,18.5Zm0-2a7.189,7.189,0,0,0,4.03-1.2,7.74,7.74,0,0,0,2.8-3.3,7.74,7.74,0,0,0-2.8-3.3,7.367,7.367,0,0,0-8.06,0A7.74,7.74,0,0,0,5.17,12a7.74,7.74,0,0,0,2.8,3.3A7.189,7.189,0,0,0,12,16.5Zm0-1a3.517,3.517,0,0,0,3.51-3.51A3.517,3.517,0,0,0,12,8.48a3.517,3.517,0,0,0-3.51,3.51A3.517,3.517,0,0,0,12,15.5Zm0-2a1.442,1.442,0,0,1-1.06-.44A1.5,1.5,0,1,1,12,13.5ZM1,6V3a1.926,1.926,0,0,1,.59-1.41A1.926,1.926,0,0,1,3,1H6V3H3V6ZM21,6V3H18V1h3a1.926,1.926,0,0,1,1.41.59A1.926,1.926,0,0,1,23,3V6Z"></path>
                  <rect width="24" height="24" fill="none"></rect>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" class="fill-[#37C6F4] transition-colors duration-200 cursor-pointer" onclick="toggleBookmark({{ $item['id'] }}, this)">
                  <path d="M5,21V5a1.926,1.926,0,0,1,.59-1.41A1.926,1.926,0,0,1,7,3H17a1.926,1.926,0,0,1,1.41.59A1.926,1.926,0,0,1,19,5V21l-7-3Zm2-3.05,5-2.15,5,2.15V5H7ZM7,5H7Z"></path>
                  <rect width="24" height="24" fill="none"></rect>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" class="fill-[#ababab] hover:fill-[#37C6F4] transition-colors duration-200 cursor-pointer">
                  <path d="M12,16,7,11,8.4,9.55l2.6,2.6V4h2v8.15l2.6-2.6L17,11l-5,5ZM6,20a2.015,2.015,0,0,1-2-2V15H6v3H18V15h2v3a2.015,2.015,0,0,1-2,2Z"></path>
                  <rect width="24" height="24" fill="none"></rect>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" class="fill-[#ababab] hover:fill-[#37C6F4] transition-colors duration-200 cursor-pointer">
                  <path d="M17,22a3,3,0,0,1-3.01-3.01c0-.1.03-.33.08-.7l-7.03-4.1a2.967,2.967,0,0,1-2.06.8,2.9,2.9,0,0,1-2.13-.88,3.018,3.018,0,0,1,0-4.26,2.906,2.906,0,0,1,2.13-.88,2.967,2.967,0,0,1,2.06.8l7.03-4.1a2.214,2.214,0,0,1-.06-.34C14,5.22,14,5.1,14,4.97a2.9,2.9,0,0,1,.88-2.13,3.018,3.018,0,0,1,4.26,0,2.883,2.883,0,0,1,.88,2.13,2.883,2.883,0,0,1-.88,2.13,2.883,2.883,0,0,1-2.13.88,2.967,2.967,0,0,1-2.06-.8l-7.03,4.1a2.214,2.214,0,0,1,.06.34c.01.11.01.23.01.36s0,.25-.01.36a2.214,2.214,0,0,1-.06.34l7.03,4.1a2.967,2.967,0,0,1,2.06-.8,3.012,3.012,0,0,1,2.13,5.14,2.906,2.906,0,0,1-2.13.88Zm0-2a.99.99,0,1,0-.71-.29A.973.973,0,0,0,17,20ZM5,13a.99.99,0,1,0-.71-.29A.973.973,0,0,0,5,13ZM17,6a1,1,0,0,0,.71-1.71,1,1,0,0,0-1.42,1.42A.973.973,0,0,0,17,6Z"></path>
                  <rect width="24" height="24" fill="none"></rect>
                </svg>
              </div>
            </div>
          @endforeach
        @else
          <div class="col-span-full text-center py-12">
            <p class="text-[#868686] text-lg">No bookmarked items yet.</p>
            <a href="{{ route('resources') }}" class="text-[#37C6F4] hover:underline mt-4 inline-block">Browse resources</a>
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


@push('scripts')
<script>
    (function() {
    // Initialize Lucide icons function
    function initializeIcons() {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }

    // Initialize icons when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(initializeIcons, 100); // Small delay to ensure Lucide is loaded
        });
    } else {
        setTimeout(initializeIcons, 100); // Small delay to ensure Lucide is loaded
    }

    // Filtering functionality
    const categoryCheckboxes = document.querySelectorAll('.category-checkbox');
    const searchInput = document.getElementById('my-account-search');

    function filterItems() {
        // Re-query item cards to get current state (in case cards were removed)
        const itemCards = document.querySelectorAll('.item-card');
        const noDataMessage = document.querySelector('#bookmarked-items-container .col-span-full');

        // Get selected category IDs
        const selectedCategories = Array.from(categoryCheckboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => parseInt(checkbox.value));

        // Get search term
        const searchTerm = searchInput ? searchInput.value.toLowerCase().trim() : '';

        let visibleCount = 0;

        itemCards.forEach(card => {
            const categoryId = parseInt(card.getAttribute('data-category-id'));
            const title = card.getAttribute('data-title') || '';
            const publisher = card.getAttribute('data-publisher') || '';
            const description = card.getAttribute('data-description') || '';

            // Check category filter
            const matchesCategory = selectedCategories.length === 0 || selectedCategories.includes(categoryId);

            // Check search filter
            const matchesSearch = searchTerm === '' || 
                title.includes(searchTerm) || 
                publisher.includes(searchTerm) || 
                description.includes(searchTerm);

            if (matchesCategory && matchesSearch) {
                card.style.display = '';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        // Show/hide no data message
        if (noDataMessage) {
            if (visibleCount === 0 && itemCards.length > 0) {
                // Items exist but are filtered out
                if (!document.getElementById('filtered-no-data')) {
                    const container = document.getElementById('bookmarked-items-container');
                    const messageDiv = document.createElement('div');
                    messageDiv.id = 'filtered-no-data';
                    messageDiv.className = 'col-span-full text-center py-12';
                    messageDiv.innerHTML = `
                        <p class="text-[#868686] text-lg">No items match your filters.</p>
                    `;
                    container.appendChild(messageDiv);
                }
            } else {
                const filteredMessage = document.getElementById('filtered-no-data');
                if (filteredMessage) {
                    filteredMessage.remove();
                }
            }
        }
        
        // Re-initialize icons after filtering
        initializeIcons();
    }

    // Add event listeners
    categoryCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', filterItems);
    });

    if (searchInput) {
        searchInput.addEventListener('input', filterItems);
    }

    // Expose filterItems and initializeIcons to global scope
    window.filterItems = filterItems;
    window.initializeIcons = initializeIcons;

    // Placeholder for openItemModal - implement as needed
    function openItemModal(itemId) {
        console.log('Opening modal for item:', itemId);
        // Implement modal logic here, e.g., fetch item details and display
    }
    window.openItemModal = openItemModal; // Expose to global scope

    // Bookmark toggle function for my account page
    async function toggleBookmark(itemId, iconElement) {
        try {
            const response = await fetch('{{ route('bookmark.toggle') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ item_id: itemId })
            });

            const data = await response.json();

            if (response.ok) {
                console.log(data.message);
                if (data.status === 'removed') {
                    // If bookmark is removed from my_account page, remove the card
                    const cardElement = iconElement.closest('.bg-white.shadow-md.p-4.rounded-\\[25px\\]');
                    if (cardElement) {
                        cardElement.remove();
                        // Re-filter items after removal
                        filterItems();
                    }
                    // Check if no items are left and display message
                    const container = document.getElementById('bookmarked-items-container');
                    if (container) {
                        // Check if container has any direct child divs (excluding the "no items" message)
                        const childDivs = Array.from(container.children).filter(child => 
                            child.tagName === 'DIV' && !child.classList.contains('col-span-full')
                        );
                        if (childDivs.length === 0) {
                            container.innerHTML = `
                                <div class="col-span-full text-center py-12">
                                    <p class="text-[#868686] text-lg">No bookmarked items yet.</p>
                                    <a href="{{ route('resources') }}" class="text-[#37C6F4] hover:underline mt-4 inline-block">Browse resources</a>
                                </div>
                            `;
                        }
                    }
                }
                // No 'added' state expected on my_account page, as items are already bookmarked
            } else {
                console.error('Error:', data.message);
                alert('Failed to toggle bookmark: ' + data.message);
            }
        } catch (error) {
            console.error('Network error:', error);
            alert('An error occurred while toggling bookmark.');
        }
    }
    window.toggleBookmark = toggleBookmark; // Expose to global scope
    })();
</script>
@endpush

@endsection