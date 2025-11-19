@extends('layouts.frontend')

@section('title', 'Water PPP Resources - PPP Water Hub')

@push('styles')
<script src="https://unpkg.com/lucide@latest"></script>
<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
    .animate-fadeIn {
        animation: fadeIn 0.3s ease-out;
    }
    .material-symbols-outlined {
        font-variation-settings:
        'FILL' 0,
        'wght' 400,
        'GRAD' 0,
        'opsz' 24;
    }
</style>
@endpush

@section('content')
<!-- ✅ HERO -->
<section class="bg-gradient-to-r from-[#070648] to-[#2CBE9D] text-white">
    <div class="max-w-7xl mx-auto px-6 py-20 sm:py-24 lg:py-28">
        <p class="text-lg text-[#37C6F4] font-semibold mb-2">WATER PPP RESOURCES</p>
        <h1 class="text-4xl font-appetite sm:text-4xl font-extrabold leading-none max-w-xl">
            Everything You Need To Identify, Prepare, Implement And Manage Your PPP Project
        </h1>
    </div>
</section>

<!-- ✅ INTRO -->
<section class="max-w-7xl mx-auto px-6 py-16 sm:py-20">
    <p class="text-[19px] sm:text-xl md:text-lg max-w-2xl">
        Browse by category to find the guidance you need – from foundational PPP concepts to contract management and
        monitoring. Bookmark resources to save and view them in your account, or download documents, audio, and video
        files to access offline anytime.
    </p>
</section>

<!-- ✅ MAIN -->
<section class="bg-[#f2f2f2]">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row min-h-screen">
        <!-- Sidebar -->
        <aside class="w-full md:w-64 lg:w-[20rem] p-5">
            <form method="GET" action="{{ route('resources') }}" id="filterForm">
                <ul class="space-y-3 text-gray-700 font-medium">
                    <li>
                        <a href="{{ route('resources') }}" class="flex items-center gap-3 hover:text-blue-600 {{ !request('category') && !request('type') ? 'text-blue-600' : '' }}">
                            <span class="material-symbols-outlined text-lg">grid_view</span> <span>All content</span>
                        </a>
                    </li>

                    @foreach($categories as $category)
                    <li>
                        @if($category->children->count() > 0)
                            <button type="button" 
                                    class="flex items-center justify-between w-full text-left text-gray-700 font-semibold mt-3 category-toggle"
                                    onclick="toggleCategory({{ $category->id }})">
                                <span class="flex items-center gap-3">
                                    <span class="material-symbols-outlined text-lg">{{ $category->icon ?? 'folder' }}</span>
                                    {{ $category->name }}
                                </span>
                                <i id="icon-category-{{ $category->id }}" data-lucide="chevron-down" class="w-4 h-4 transition-transform"></i>
                            </button>
                            <ul id="subcategory-{{ $category->id }}" class="ml-8 mt-2 space-y-1 text-sm text-gray-600 hidden">
                                <li>
                                    <a href="{{ route('resources', ['category' => $category->id]) }}" 
                                       class="flex items-center gap-2 hover:text-blue-600 {{ request('category') == $category->id ? 'text-blue-600 font-semibold' : '' }}">
                                        <span class="material-symbols-outlined text-sm">{{ $category->icon ?? 'circle' }}</span>
                                        <span>All {{ $category->name }}</span>
                                    </a>
                                </li>
                                @foreach($category->children as $subCategory)
                                <li>
                                    <a href="{{ route('resources', ['category' => $subCategory->id]) }}" 
                                       class="flex items-center gap-2 hover:text-blue-600 {{ request('category') == $subCategory->id ? 'text-blue-600 font-semibold' : '' }}">
                                        <span class="material-symbols-outlined text-sm">{{ $subCategory->icon ?? 'circle' }}</span>
                                        <span>{{ $subCategory->name }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        @else
                            <a href="{{ route('resources', ['category' => $category->id]) }}" 
                               class="flex items-center gap-3 hover:text-blue-600 {{ request('category') == $category->id ? 'text-blue-600 font-semibold' : '' }}">
                                <span class="material-symbols-outlined text-lg">{{ $category->icon ?? 'folder' }}</span> 
                                <span>{{ $category->name }}</span>
                            </a>
                        @endif
                    </li>
                    @endforeach
                </ul>

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
                        <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18.095 18.095">
                                <path d="M16.681,18.1h0l-5.145-5.145a7.2,7.2,0,1,1,1.414-1.414L18.1,16.681l-1.413,1.413ZM7.2,2a5.2,5.2,0,1,0,5.2,5.2A5.206,5.206,0,0,0,7.2,2Z" fill="#1E1D57"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                @if(request('category') || request('search') || request('type'))
                <div class="mt-4">
                    <a href="{{ route('resources') }}" class="text-sm text-blue-600 hover:underline">Clear filters</a>
                </div>
                @endif
            </form>
        </aside>

        <!-- ✅ MAIN CONTENT -->
        <main class="flex-1 p-6">
            @if($items->count() > 0)
                <!-- Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($items as $item)
                        @php
                            // Check if item is bookmarked
                            $isBookmarked = in_array($item->id, $bookmarkedItemIds ?? []);
                            
                            // Get display category (parent if exists, otherwise the category itself)
                            $displayCategory = $item->category->parent ?? $item->category;
                            $categoryColor = $displayCategory->color ?? '#0E1C62';
                            // Ensure color has # prefix
                            if (!str_starts_with($categoryColor, '#')) {
                                $categoryColor = '#' . $categoryColor;
                            }
                            // Create a complementary color for the gradient end
                            // Convert hex to RGB, lighten it, then convert back
                            $hex = ltrim($categoryColor, '#');
                            // Handle 3-character hex codes
                            if (strlen($hex) == 3) {
                                $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
                            }
                            $r = hexdec(substr($hex, 0, 2));
                            $g = hexdec(substr($hex, 2, 2));
                            $b = hexdec(substr($hex, 4, 2));
                            // Lighten the color by 30% for gradient end
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
                                    <p class="text-sm mt-2 opacity-90">{{ $item->publisher ?? 'No publisher' }}</p>
                                </div>
                                <div class="flex items-center space-x-2 mt-12">
                                    <i data-lucide="{{ $item->type_icon }}" class="w-4 h-4"></i>
                                    <span class="text-sm">{{ $item->type_label }}</span>
                                </div>
                            </div>
                            <div class="flex justify-between pt-6 pb-3 border-t border-white/30 text-black/80">
                                <i data-lucide="maximize-2" 
                                   class="w-4 h-4 cursor-pointer" 
                                   onclick="openModal({{ $firstFileId ?? 'null' }}, '{{ addslashes($item->title) }}', '{{ addslashes($item->publisher ?? 'No publisher') }}', '{{ $item->type_label }}', '{{ $item->type_icon }}', '{{ addslashes($item->short_description ?? $item->description ?? 'No description available.') }}', '{{ $categoryColor }}', '{{ $gradientEnd }}', {{ $item->files->count() }}, '{{ $item->slug }}', {{ $item->id }}, {{ $isBookmarked ? 'true' : 'false' }})"></i>
                                @if($item->files->count() > 0)
                                    <a href="{{ route('files.download', $item->files->first()->id) }}" 
                                       class="cursor-pointer"
                                       onclick="event.stopPropagation();">
                                        <i data-lucide="download" class="w-4 h-4"></i>
                                    </a>
                                @else
                                    <i data-lucide="download" class="w-4 h-4 opacity-50"></i>
                                @endif
                                <i data-lucide="bookmark" 
                                   class="w-4 h-4 cursor-pointer {{ $isBookmarked ? 'fill-[#37C6F4] text-[#37C6F4]' : 'hover:text-[#37C6F4]' }}"
                                   onclick="toggleBookmark({{ $item->id }}, this)"
                                   data-item-id="{{ $item->id }}"></i>
                                <i data-lucide="share-2" class="w-4 h-4 cursor-pointer"></i>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($items->hasPages())
                <div class="flex justify-center mt-6 space-x-2">
                    @if($items->onFirstPage())
                        <span class="text-[#ababab] cursor-not-allowed">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="currentColor">
                                <g transform="translate(-781 -2356)">
                                    <rect width="40" height="40" transform="translate(781 2356)" fill="none" />
                                    <path d="M17.617,18.763l5.159,5.159-2.345,2.4L12.894,18.78l7.537-7.537,2.345,2.4L17.617,18.8Zm1.139,16.749a16.21,16.21,0,0,0,6.532-1.323A16.731,16.731,0,0,0,34.2,25.279a16.21,16.21,0,0,0,1.323-6.532A16.21,16.21,0,0,0,34.2,12.214,16.731,16.731,0,0,0,25.289,3.3,16.21,16.21,0,0,0,18.756,1.98,16.21,16.21,0,0,0,12.224,3.3a16.731,16.731,0,0,0-8.911,8.911A16.21,16.21,0,0,0,1.99,18.746a16.21,16.21,0,0,0,1.323,6.532,16.731,16.731,0,0,0,8.911,8.911A16.21,16.21,0,0,0,18.756,35.512Zm0-3.35a12.968,12.968,0,0,1-9.514-3.9,12.941,12.941,0,0,1-3.9-9.514,12.941,12.941,0,0,1,3.9-9.514,12.941,12.941,0,0,1,9.514-3.9,12.941,12.941,0,0,1,9.514,3.9,12.941,12.941,0,0,1,3.9,9.514,12.941,12.941,0,0,1-3.9,9.514A12.941,12.941,0,0,1,18.756,32.163Z" transform="translate(781.744 2356.738)" />
                                </g>
                            </svg>
                        </span>
                    @else
                        <a href="{{ $items->previousPageUrl() }}" class="text-[#ababab] hover:text-[#1E1D57] transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="currentColor">
                                <g transform="translate(-781 -2356)">
                                    <rect width="40" height="40" transform="translate(781 2356)" fill="none" />
                                    <path d="M17.617,18.763l5.159,5.159-2.345,2.4L12.894,18.78l7.537-7.537,2.345,2.4L17.617,18.8Zm1.139,16.749a16.21,16.21,0,0,0,6.532-1.323A16.731,16.731,0,0,0,34.2,25.279a16.21,16.21,0,0,0,1.323-6.532A16.21,16.21,0,0,0,34.2,12.214,16.731,16.731,0,0,0,25.289,3.3,16.21,16.21,0,0,0,18.756,1.98,16.21,16.21,0,0,0,12.224,3.3a16.731,16.731,0,0,0-8.911,8.911A16.21,16.21,0,0,0,1.99,18.746a16.21,16.21,0,0,0,1.323,6.532,16.731,16.731,0,0,0,8.911,8.911A16.21,16.21,0,0,0,18.756,35.512Zm0-3.35a12.968,12.968,0,0,1-9.514-3.9,12.941,12.941,0,0,1-3.9-9.514,12.941,12.941,0,0,1,3.9-9.514,12.941,12.941,0,0,1,9.514-3.9,12.941,12.941,0,0,1,9.514,3.9,12.941,12.941,0,0,1,3.9,9.514,12.941,12.941,0,0,1-3.9,9.514A12.941,12.941,0,0,1,18.756,32.163Z" transform="translate(781.744 2356.738)" />
                                </g>
                            </svg>
                        </a>
                    @endif

                    @foreach($items->getUrlRange(1, $items->lastPage()) as $page)
                        @if($page == $items->currentPage())
                            <span class="px-3 py-1 text-[20px] text-white bg-[#1E1D57] rounded">{{ $page }}</span>
                        @else
                            <a href="{{ $items->url($page) }}" class="px-3 py-1 text-[20px] text-[#1E1D57] hover:text-[#37C6F4] rounded">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if($items->hasMorePages())
                        <a href="{{ $items->nextPageUrl() }}" class="text-[#ababab] hover:text-[#1E1D57] transition-colors duration-300">
                            <svg class="-rotate-180" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="currentColor">
                                <g transform="translate(-781 -2356)">
                                    <rect width="40" height="40" transform="translate(781 2356)" fill="none" />
                                    <path d="M17.617,18.763l5.159,5.159-2.345,2.4L12.894,18.78l7.537-7.537,2.345,2.4L17.617,18.8Zm1.139,16.749a16.21,16.21,0,0,0,6.532-1.323A16.731,16.731,0,0,0,34.2,25.279a16.21,16.21,0,0,0,1.323-6.532A16.21,16.21,0,0,0,34.2,12.214,16.731,16.731,0,0,0,25.289,3.3,16.21,16.21,0,0,0,18.756,1.98,16.21,16.21,0,0,0,12.224,3.3a16.731,16.731,0,0,0-8.911,8.911A16.21,16.21,0,0,0,1.99,18.746a16.21,16.21,0,0,0,1.323,6.532,16.731,16.731,0,0,0,8.911,8.911A16.21,16.21,0,0,0,18.756,35.512Zm0-3.35a12.968,12.968,0,0,1-9.514-3.9,12.941,12.941,0,0,1-3.9-9.514,12.941,12.941,0,0,1,3.9-9.514,12.941,12.941,0,0,1,9.514-3.9,12.941,12.941,0,0,1,9.514,3.9,12.941,12.941,0,0,1,3.9,9.514,12.941,12.941,0,0,1-3.9,9.514A12.941,12.941,0,0,1,18.756,32.163Z" transform="translate(781.744 2356.738)" />
                                </g>
                            </svg>
                        </a>
                    @else
                        <span class="text-[#ababab] cursor-not-allowed">
                            <svg class="-rotate-180" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="currentColor">
                                <g transform="translate(-781 -2356)">
                                    <rect width="40" height="40" transform="translate(781 2356)" fill="none" />
                                    <path d="M17.617,18.763l5.159,5.159-2.345,2.4L12.894,18.78l7.537-7.537,2.345,2.4L17.617,18.8Zm1.139,16.749a16.21,16.21,0,0,0,6.532-1.323A16.731,16.731,0,0,0,34.2,25.279a16.21,16.21,0,0,0,1.323-6.532A16.21,16.21,0,0,0,34.2,12.214,16.731,16.731,0,0,0,25.289,3.3,16.21,16.21,0,0,0,18.756,1.98,16.21,16.21,0,0,0,12.224,3.3a16.731,16.731,0,0,0-8.911,8.911A16.21,16.21,0,0,0,1.99,18.746a16.21,16.21,0,0,0,1.323,6.532,16.731,16.731,0,0,0,8.911,8.911A16.21,16.21,0,0,0,18.756,35.512Zm0-3.35a12.968,12.968,0,0,1-9.514-3.9,12.941,12.941,0,0,1-3.9-9.514,12.941,12.941,0,0,1,3.9-9.514,12.941,12.941,0,0,1,9.514-3.9,12.941,12.941,0,0,1,9.514,3.9,12.941,12.941,0,0,1,3.9,9.514,12.941,12.941,0,0,1-3.9,9.514A12.941,12.941,0,0,1,18.756,32.163Z" transform="translate(781.744 2356.738)" />
                                </g>
                            </svg>
                        </span>
                    @endif
                </div>
                @endif
            @else
                <div class="text-center py-12">
                    <p class="text-gray-600 text-lg">No resources found.</p>
                    @if(request('search') || request('category'))
                        <a href="{{ route('resources') }}" class="text-blue-600 hover:underline mt-2 inline-block">Clear filters</a>
                    @endif
                </div>
            @endif
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
                        <button id="modalBookmarkBtn" 
                                class="flex items-center gap-2"
                                onclick="toggleBookmarkModal()">
                            <i id="modalBookmarkIcon" data-lucide="bookmark" class="w-4 h-4"></i>
                            <span id="modalBookmarkText">Add to your library</span>
                        </button>
                        <a id="modalDownloadLink" href="#" class="flex items-center gap-2"><i data-lucide="download" class="w-4 h-4"></i>Download
                            file</a>
                        <button class="flex items-center gap-2"><i data-lucide="share-2"
                                class="w-4 h-4"></i>Share</button>
                    </div>
                    <a id="modalMoreOptionsLink" href="#" class="flex items-center gap-2 font-semibold underline"><i data-lucide="more-horizontal"
                            class="w-4 h-4"></i>More options…</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- waves  -->
<div class="bottom-0 left-0 right-0 bg-[#f2f2f2]">
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

@push('scripts')
<script>
    let currentModalItemId = null;
    let currentModalBookmarked = false;

    function openModal(itemId, title, publisher, type, icon, description, categoryColor, gradientEnd, hasFiles, itemSlug, itemDbId, isBookmarked) {
        const modal = document.getElementById("productModal");
        modal.classList.remove("hidden");
        modal.classList.add("flex");
        document.getElementById("modalTitle").innerText = title;
        document.getElementById("modalPublisher").innerText = publisher;
        document.getElementById("modalType").innerText = type;
        document.getElementById("modalDescription").innerText = description;
        const colorBox = document.getElementById("modalColorBox");
        colorBox.className = "p-8 text-white w-full md:w-1/2 flex flex-col justify-between min-h-[360px]";
        colorBox.style.background = `linear-gradient(to bottom right, ${categoryColor}, ${gradientEnd})`;
        document.getElementById("modalIcon").setAttribute("data-lucide", icon);
        
        // Store current item info for bookmark
        currentModalItemId = itemDbId;
        currentModalBookmarked = isBookmarked;
        updateModalBookmarkButton(isBookmarked);
        
        // Update download link if files exist
        const downloadLink = document.getElementById("modalDownloadLink");
        if (hasFiles > 0 && itemId) {
            downloadLink.href = `/files/${itemId}/download`;
            downloadLink.style.pointerEvents = 'auto';
            downloadLink.style.opacity = '1';
        } else {
            downloadLink.href = '#';
            downloadLink.style.pointerEvents = 'none';
            downloadLink.style.opacity = '0.5';
        }
        
        // Update "More options" link to navigate to single product page
        const moreOptionsLink = document.getElementById("modalMoreOptionsLink");
        if (itemSlug) {
            moreOptionsLink.href = `/resources/${itemSlug}`;
        } else {
            moreOptionsLink.href = '#';
        }
        
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }

    function updateModalBookmarkButton(isBookmarked) {
        const icon = document.getElementById("modalBookmarkIcon");
        const text = document.getElementById("modalBookmarkText");
        
        if (isBookmarked) {
            icon.classList.add("fill-[#37C6F4]", "text-[#37C6F4]");
            text.textContent = "Remove from library";
        } else {
            icon.classList.remove("fill-[#37C6F4]", "text-[#37C6F4]");
            text.textContent = "Add to your library";
        }
        
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }

    function toggleBookmarkModal() {
        if (!currentModalItemId) return;
        toggleBookmark(currentModalItemId, document.getElementById("modalBookmarkIcon"), true);
    }

    function toggleBookmark(itemId, iconElement, isModal = false) {
        fetch(`/items/${itemId}/bookmark`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
            },
            credentials: 'same-origin'
        })
        .then(response => {
            if (response.status === 401 || response.status === 403) {
                window.location.href = '/login';
                return;
            }
            return response.json();
        })
        .then(data => {
            if (!data) return;
            
            if (data.error) {
                alert(data.error);
                if (data.error.includes('logged in')) {
                    window.location.href = '/login';
                }
                return;
            }
            
            // Update icon appearance
            if (isModal) {
                currentModalBookmarked = data.bookmarked;
                updateModalBookmarkButton(data.bookmarked);
            } else {
                // Update card icon
                if (data.bookmarked) {
                    iconElement.classList.add("fill-[#37C6F4]", "text-[#37C6F4]");
                } else {
                    iconElement.classList.remove("fill-[#37C6F4]", "text-[#37C6F4]");
                }
                
                if (typeof lucide !== 'undefined') {
                    lucide.createIcons();
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while bookmarking the item.');
        });
    }

    function closeModal() {
        const modal = document.getElementById("productModal");
        modal.classList.add("hidden");
        modal.classList.remove("flex");
    }

    function toggleCategory(categoryId) {
        const menu = document.getElementById(`subcategory-${categoryId}`);
        const icon = document.getElementById(`icon-category-${categoryId}`);
        if (menu.classList.contains("hidden")) {
            menu.classList.remove("hidden");
            icon.classList.add("rotate-180");
        } else {
            menu.classList.add("hidden");
            icon.classList.remove("rotate-180");
        }
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }

    document.addEventListener("DOMContentLoaded", () => {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
        
        // Auto-expand categories that have selected sub-categories
        @if(request('category'))
            @php
                $selectedCategory = \App\Models\Category::find(request('category'));
                if ($selectedCategory && $selectedCategory->parent_id) {
                    echo "toggleCategory({$selectedCategory->parent_id});";
                }
            @endphp
        @endif
    });
</script>
@endpush
