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
      (Not {{ $user->first_name ?? $user->name }}? <a href="{{ route('logout') }}" class="text-blue-400 hover:underline"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>)
    </p>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>
</section>

<!-- MAIN SECTION -->
<section class=" bg-[#F7F7F7] lg:px-16 lg:py-16 py-8 pb-10 md:pb-16">
  <div class="max-w-7xl  mx-auto min-h-screen flex flex-col md:flex-row">

    <!-- SIDEBAR -->
    <aside class="min-[520px]:w-[60%]  md:w-[35%] lg:w-[30%] p-6 lg:px-0 lg:pr-6">
      <h2 class="text-xl text-[#1E1D57] font-semibold mb-6">Filter</h2>

      <div class="space-y-6">

        <button type="button" class="group flex text-[16px] gap-3 items-center space-x-2 text-[#1E1D57] font-semibold cursor-pointer hover:text-[#37C6F4] transition-colors my-saved-content-btn">
          <span class="material-symbols-outlined text-[#1E1D57] group-hover:text-[#37C6F4]">
            book_4
          </span> My saved content
        </button>

        @if($categories->count() > 0)
        @foreach($categories as $category)
        <label class="flex items-center space-x-2 cursor-pointer category-filter-item"
          data-category-id="{{ $category['id'] }}">
          <input type="checkbox" value="{{ $category['id'] }}" class="category-checkbox w-6 h-6 appearance-none rounded-md border-2 border-[#1E1D57]
         checked:bg-white checked:border-[#1E1D57]
         checked:before:content-['✔'] checked:before:text-[#1E1D57]
         checked:before:flex checked:before:items-center checked:before:justify-center
         checked:before:text-[14px]
         cursor-pointer">
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
            <span class="material-symbols-outlined text-[#37C6F4]">
              search
            </span>
          </span>
        </div>
      </div>


      <div class="flex flex-col gap-4 max-w-xs py-8  rounded-md">
        <!-- Account details link -->
        <a href="javascript:void(0)" class="group flex items-center gap-3  py-2 rounded-md account-details-opn">
          <!-- Gear SVG -->
          <span class="material-symbols-outlined text-[#1e1d57] group-hover:text-[#37C6F4]">
            settings
          </span>
          <span class="text-[16px] text-[#000000] font-normal group-hover:text-[#37C6F4]">Account details</span>
        </a>

        <!-- Sign out link -->
        <a href="{{ route('logout') }}" class="group flex items-center gap-3  py-2 rounded-md  "
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <!-- Sign out SVG -->
          <span class="material-symbols-outlined text-[#1e1d57] group-hover:text-[#37C6F4]">
            logout
          </span>
          <span class="text-[16px] text-[#000000] font-normal group-hover:text-[#37C6F4]">Sign out</span>
        </a>
      </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="other-accnt-dtails flex-1 p-6 lg:px-0">
      <div
        class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 [@media(min-width:768px)_and_(max-width:950px)]:grid-cols-1"
        id="bookmarked-items-container">
        @if($bookmarkedItems->count() > 0)
        @foreach($bookmarkedItems as $item)
        <div class="bg-white shadow-md p-4 rounded-[25px] flex flex-col justify-between item-card"
          data-category-id="{{ $item['category_id'] }}"
          data-parent-category-id="{{ $item['parent_category_id'] ?? '' }}"
          data-title="{{ strtolower($item['title']) }}"
          data-publisher="{{ strtolower($item['publisher'] ?? '') }}"
          data-description="{{ strtolower($item['short_description'] ?? $item['description'] ?? '') }}">
          <div onclick="openItemPage('{{ $item['slug'] }}')" style="background: linear-gradient(to bottom, #070648, {{ $item['category_color'] ?? '#2CBFA0' }});"
            class="text-white p-6 rounded-[15px] flex flex-col justify-between flex-grow shadow-[0_8px_15px_-4px_rgba(0,0,0,0.50)] features-card">
            <div>
              <h3 class="font-semibold text-lg leading-snug">{{ $item['title'] }}</h3>
              <p class="text-sm mt-2 mb-8 opacity-90">{{ $item['publisher'] ?? '' }}</p>
            </div>
            <div class="flex items-center space-x-2 mt-12">
              <span class="material-symbols-outlined text-sm">{{ $item['category_icon'] ?? 'folder' }}</span>
              <span class="text-sm">{{ $item['category_name'] ?? $item['type'] ?? 'Guide' }}</span>
            </div>
          </div>
          <div class="flex justify-between pt-6 pb-3 border-white/30 text-black/80">
            <span class="material-symbols-outlined text-[#ababab] cursor-pointer hover:text-[#37C6F4] duration-250" onclick="openItemModal({{ $item['id'] }})">eye_tracking</span>
            <span class="material-symbols-outlined  cursor-pointer hover:text-[#37C6F4] duration-250 text-[#37C6F4]" data-item-id="${card.id}" onclick="toggleBookmark({{ $item['id'] }}, this)">bookmark</span>
            <span class="material-symbols-outlined text-[#ababab] cursor-pointer hover:text-[#37C6F4] duration-250">download</span>
            <span class="material-symbols-outlined text-[#ababab] cursor-pointer hover:text-[#37C6F4] duration-250" onclick="shareItem('{{ route('resources.show', $item['slug']) }}', '{{ $item['title'] }}')">share</span>
          </div>
        </div>
        @endforeach
        @else
        <div class="col-span-full text-center py-12">
          <p class="text-[#868686] text-lg">No bookmarked items yet.</p>
          <a href="{{ route('resources') }}" class="text-[#37C6F4] hover:underline mt-4 inline-block">Browse
            resources</a>
        </div>
        @endif
      </div>
    </main>

    <div class="account-details-main bg-white rounded-2xl shadow-xl p-8 w-full mx-4 relative hidden h-[fit-content]">
        <div id="registerForm" class="max-w-md mx-auto">
          <h2 class="text-3xl md:text-4xl font-bold text-[#1E1D57] leading-tight text-center">Account Details</h2>
          <hr class="my-8 text-[#ababab]">

          @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg text-sm mb-4">
              {{ session('success') }}
            </div>
          @endif

          @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg text-sm mb-4">
              <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

            <form id="accountDetailsForm" method="POST" action="{{ route('account.update') }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="account_first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                    <input id="account_first_name" name="first_name" type="text" required value="{{ old('first_name', $user->first_name ?? $user->name) }}" class="w-full border border-gray-300 rounded-[20px] px-3 py-2 text-gray-900 text-[15px] bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#37C6F4] @error('first_name') border-red-500 @enderror">
                    @error('first_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="account_organisation" class="block text-sm font-medium text-gray-700 mb-1">Organisation</label>
                    <input id="account_organisation" name="organisation" type="text" value="{{ old('organisation', $user->organisation) }}" class="w-full border border-gray-300 rounded-[20px] px-3 py-2 text-gray-900 text-[15px] bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#37C6F4] @error('organisation') border-red-500 @enderror">
                    @error('organisation')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="account_email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input id="account_email" name="email" type="email" required value="{{ old('email', $user->email) }}" readonly class="w-full border border-gray-300 rounded-[20px] px-3 py-2 text-gray-900 text-[15px] bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#37C6F4] @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <hr class="my-8 text-[#ababab]">

                <div>
                    <label for="old_password" class="block text-sm font-medium text-gray-700 mb-1">Old Password</label>
                    <div class="relative">
                        <input id="old_password" name="old_password" type="password" class="w-full border border-gray-300 rounded-[20px] px-3 py-2 pr-10 text-gray-900 text-[15px] bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#37C6F4] @error('old_password') border-red-500 @enderror" placeholder="Enter current password">
                        <button type="button" id="toggleOldPassword" class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                    </div>
                    @error('old_password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="new_password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                    <div class="relative">
                        <input id="new_password" name="new_password" type="password" class="w-full border border-gray-300 rounded-[20px] px-3 py-2 pr-10 text-gray-900 text-[15px] bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#37C6F4] @error('new_password') border-red-500 @enderror" placeholder="Enter new password">
                        <button type="button" id="toggleNewPassword" class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                    </div>
                    @error('new_password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                    <div class="relative">
                        <input id="new_password_confirmation" name="new_password_confirmation" type="password" class="w-full border border-gray-300 rounded-[20px] px-3 py-2 pr-10 text-gray-900 text-[15px] bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#37C6F4] @error('new_password_confirmation') border-red-500 @enderror" placeholder="Confirm new password">
                        <button type="button" id="toggleNewPasswordConfirmation" class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                    </div>
                    @error('new_password_confirmation')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="cursor-pointer w-full bg-[#37C6F4] hover:bg-[#1E1D57] text-[#1E1D57] hover:text-[#37C6F4] rounded-[20px] py-2.5 mt-2 text-[16px] font-medium transition">
                    Update
                </button>
            </form>


        </div>
    </div>

  </div>
</section>

<!-- waves  -->

<!-- <div class=" bottom-0 left-0 right-0 bg-[#F7F7F7]">
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


@push('scripts')
<script>
  (function () {
    // Categories data with child IDs for filtering
    const categoriesData = @json($categories);

    // Initialize Lucide icons function
    function initializeIcons() {
      if (typeof lucide !== 'undefined') {
        lucide.createIcons();
      }
    }

    // Initialize icons when DOM is ready
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', function () {
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
        const parentCategoryId = card.getAttribute('data-parent-category-id') ? parseInt(card.getAttribute('data-parent-category-id')) : null;
        const title = card.getAttribute('data-title') || '';
        const publisher = card.getAttribute('data-publisher') || '';
        const description = card.getAttribute('data-description') || '';

        // Check category filter - include items if:
        // 1. No categories selected, OR
        // 2. Item's category matches selected category, OR
        // 3. Item's parent category matches selected category, OR
        // 4. Item's category is a child of selected parent category
        let matchesCategory = selectedCategories.length === 0;

        if (!matchesCategory && selectedCategories.length > 0) {
          for (const selectedCategoryId of selectedCategories) {
            // Direct match
            if (categoryId === selectedCategoryId) {
              matchesCategory = true;
              break;
            }

            // Parent category match
            if (parentCategoryId === selectedCategoryId) {
              matchesCategory = true;
              break;
            }

            // Check if item's category is a child of selected parent
            const selectedCategory = categoriesData.find(cat => cat.id === selectedCategoryId);
            if (selectedCategory && selectedCategory.child_ids && selectedCategory.child_ids.includes(categoryId)) {
              matchesCategory = true;
              break;
            }
          }
        }

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
      const container = document.getElementById('bookmarked-items-container');
      const filteredMessage = document.getElementById('filtered-no-data');

      if (visibleCount === 0 && itemCards.length > 0) {
        // Items exist but are filtered out - show "No bookmarked items yet" message
        if (!filteredMessage) {
          const messageDiv = document.createElement('div');
          messageDiv.id = 'filtered-no-data';
          messageDiv.className = 'col-span-full text-center py-12';
          messageDiv.innerHTML = `
            <p class="text-[#868686] text-lg">No bookmarked items yet.</p>
            <a href="{{ route('resources') }}" class="text-[#37C6F4] hover:underline mt-4 inline-block">Browse resources</a>
          `;
          container.appendChild(messageDiv);
        }
      } else {
        // Remove filtered message if items are visible
        if (filteredMessage) {
          filteredMessage.remove();
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

    // Share functionality
    function shareItem(url, title) {
      // Check if URL is already absolute (starts with http:// or https://)
      let shareUrl = url;
      if (url.startsWith('http://') || url.startsWith('https://')) {
        // URL is already absolute, use as-is
        shareUrl = url;
      } else if (url.startsWith('/')) {
        // Relative URL starting with /, prepend origin
        shareUrl = window.location.origin + url;
      } else {
        // Relative URL without leading /, prepend origin and /
        shareUrl = window.location.origin + '/' + url;
      }

      if (navigator.share) {
        // Use Web Share API if available (mobile devices)
        navigator.share({
          title: title,
          text: `Check out this resource: ${title}`,
          url: shareUrl,
        }).catch(err => {
          console.log('Error sharing:', err);
          // Fallback to clipboard
          copyToClipboard(shareUrl);
        });
      } else {
        // Fallback to clipboard for desktop
        copyToClipboard(shareUrl);
      }
    }

    function copyToClipboard(text) {
      if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(text).then(() => {
          if (typeof showToast === 'function') {
            showToast('Link copied to clipboard!', 'success');
          } else {
            alert('Link copied to clipboard!');
          }
        }).catch(err => {
          console.error('Failed to copy:', err);
          fallbackCopyToClipboard(text);
        });
      } else {
        fallbackCopyToClipboard(text);
      }
    }

    function fallbackCopyToClipboard(text) {
      const textArea = document.createElement('textarea');
      textArea.value = text;
      textArea.style.position = 'fixed';
      textArea.style.left = '-999999px';
      document.body.appendChild(textArea);
      textArea.focus();
      textArea.select();
      try {
        document.execCommand('copy');
        if (typeof showToast === 'function') {
          showToast('Link copied to clipboard!', 'success');
        } else {
          alert('Link copied to clipboard!');
        }
      } catch (err) {
        console.error('Fallback copy failed:', err);
        if (typeof showToast === 'function') {
          showToast('Failed to copy link. Please copy manually.', 'error');
        } else {
          prompt('Copy this link:', text);
        }
      }
      document.body.removeChild(textArea);
    }

    // Expose filterItems and initializeIcons to global scope
    window.filterItems = filterItems;
    window.initializeIcons = initializeIcons;
    window.shareItem = shareItem;

    // Placeholder for openItemModal - implement as needed
    function openItemModal(itemId) {
      console.log('Opening modal for item:', itemId);
      // Implement modal logic here, e.g., fetch item details and display
    }
    window.openItemModal = openItemModal; // Expose to global scope

    function openItemPage(slug) {
        // If slug is provided, use it directly (called from card click)
        if (slug) {
            window.location.href = `/resources/${slug}`;
            return;
        }
        // Otherwise, use currentModalItemId (called from modal button)
        if (currentModalItemId) {
            const item = itemsData.find(i => i.id === currentModalItemId);
            if (item && item.slug) {
                window.location.href = `/resources/${item.slug}`;
            }
        }
    }
    window.openItemPage = openItemPage; // Expose to global scope

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

    // Account details panel toggle
    const accountDetailsTrigger = document.querySelector('.account-details-opn');
    const accountDetailsPanel = document.querySelector('.account-details-main');
    const otherAccountDetails = document.querySelector('.other-accnt-dtails');
    const mySavedContentBtn = document.querySelector('.my-saved-content-btn');

    // Function to show account details panel
    function showAccountDetailsPanel() {
      if (accountDetailsPanel) {
        accountDetailsPanel.classList.remove('hidden');
        if (otherAccountDetails) {
          otherAccountDetails.classList.add('hidden');
        }
        // Scroll to account details form
        accountDetailsPanel.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      }
    }

    // Check if we should show account details panel on page load
    // Show if: URL parameter is set, or there are validation errors, or there's a success message
    const urlParams = new URLSearchParams(window.location.search);
    const hasErrors = document.querySelector('.bg-red-50') !== null;
    const hasSuccess = document.querySelector('.bg-green-50') !== null;

    if (urlParams.get('show_account_details') === '1' || hasErrors || hasSuccess) {
      // Show account details panel after a short delay to ensure DOM is ready
      setTimeout(showAccountDetailsPanel, 100);
    }

    if (accountDetailsTrigger && accountDetailsPanel) {
      accountDetailsTrigger.addEventListener('click', () => {
        showAccountDetailsPanel();
      });
    }

    // My saved content button - switch back to main content
    if (mySavedContentBtn && accountDetailsPanel && otherAccountDetails) {
      mySavedContentBtn.addEventListener('click', () => {
        accountDetailsPanel.classList.add('hidden');
        otherAccountDetails.classList.remove('hidden');
      });
    }

    // Password toggle functionality for account details form
    function setupPasswordToggle(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);
      if (toggle && input) {
        toggle.addEventListener('click', () => {
          const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
          input.setAttribute('type', type);
          toggle.innerHTML = type === 'password'
            ? '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>'
            : '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>';
        });
      }
    }

    // Setup password toggles for account details form
    setupPasswordToggle('toggleOldPassword', 'old_password');
    setupPasswordToggle('toggleNewPassword', 'new_password');
    setupPasswordToggle('toggleNewPasswordConfirmation', 'new_password_confirmation');
  })();
</script>
@endpush

@endsection
