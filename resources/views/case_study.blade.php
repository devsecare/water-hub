@extends('layouts.frontend')

@section('title', 'PPP Water Hub')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.5.3/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.5.3/dist/MarkerCluster.Default.css" />
<style>
    .map-overlay-case-study {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 999;
        display: none;
    }
    .map-overlay-case-study.show {
        display: block;
    }
    .map-item-card-case-study {
        position: absolute;
        z-index: 1000;
        max-width: 254px;
        display: none;
        pointer-events: none;
    }
    .map-item-card-case-study.show {
        display: block;
    }
    .map-item-card-case-study .bg-white {
        pointer-events: auto;
    }
    /* Ensure dropdowns appear above map */
    #caseStudyMap {
        position: relative;
        z-index: 1;
    }
    /* Leaflet map pane z-index override */
    #caseStudyMap .leaflet-pane {
        z-index: 1;
    }
    /* Custom cluster marker styling */
    .marker-cluster-custom {
        background: transparent !important;
    }
    .marker-cluster-custom div {
        background-color: #6B9BD1 !important;
        color: white !important;
        border-radius: 50% !important;
        width: 30px !important;
        height: 30px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-weight: bold !important;
        font-size: 12px !important;
        border: 2px solid white !important;
        box-shadow: 0 2px 4px rgba(0,0,0,0.3) !important;
    }
</style>
@endpush

@section('content')


<!-- hero section start  -->
<section class="bg-gradient-to-r from-[#070648] to-[#2CBE9D] text-white px-6 lg:px-16 relative">

    <div class="max-w-7xl mx-auto  py-20 sm:py-24 lg:py-28">
        <h1 class="text-[18px] text-[#37C6F4] font-semibold mb-6">WATER PPP CASE STUDIES</h1>
        <p class=" font-appetite text-3xl sm:text-5xl font-bold leading-none max-w-[500px]">
            Learn from water PPP success stories
        </p>
    </div>
</section>
<!-- hero section end  -->
<!-- intro section start  -->
<section class="px-6 lg:px-16 lg:py-20 py-10 ">
    <div class="max-w-7xl mx-auto">
        <p class="text-[#1E1D57] text-lg font-bold max-w-[604px]">Explore proven water PPP projects from around the
            world. Use the map and filters to find case studies by
            location, country, or project phase – then discover what worked, what challenges arose, and how successful
            partnerships were structured and delivered.
        </p>
    </div>
</section>
<!-- intro section end  -->

<!-- country button start -->
<section class=" px-6 lg:px-16 relative z-10">
    <form method="GET" action="{{ route('casestudy') }}" id="filterForm" class="max-w-7xl mx-auto flex  flex-wrap items-center gap-4 lg:gap-8">

        <!-- COUNTRY DROPDOWN -->
        <div class="relative">
            <input type="checkbox" id="countryToggle" class="peer hidden">
            <label for="countryToggle"
                class="flex items-center justify-between bg-[#F3F3F3] text-[#1C1C3C] px-6 py-3 rounded-full w-[286px] text-sm cursor-pointer select-none">
                <span id="countryLabel">{{ $selectedCountry ?: 'Country' }}</span>
                @if($selectedCountry)
                    <span class="text-red-500 cursor-pointer mr-2" onclick="event.stopPropagation(); clearCountryFilter();">×</span>
                @endif
                <svg id="chevron-right-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24">
                    <rect id="Rectangle_66" data-name="Rectangle 66" width="24" height="24" fill="none" />
                    <path id="Path_410" data-name="Path 410" d="M12.6,12,8,7.4,9.4,6l6,6-6,6L8,16.6,12.6,12Z"
                        fill="#ababab" />
                </svg>
            </label>

            <div class="absolute top-14  bg-white rounded-xl shadow-lg p-3 hidden peer-checked:block z-[1001]">
                <input type="search" id="countrySearch" placeholder="Search"
                    class="w-full p-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:border-transparent focus:ring-0 bg-gray-50 mb-2"
                    onkeyup="filterCountryList(this.value)">

                <ul id="countryList" class="max-h-48 overflow-y-auto text-sm scrollbar-hide">
                    @foreach($countries as $country)
                        <li class="p-2 hover:bg-gray-100 rounded cursor-pointer {{ $selectedCountry === $country ? 'bg-blue-50' : '' }}"
                            onclick="selectCountry('{{ $country }}')">{{ $country }}</li>
                    @endforeach
                    @if(empty($countries))
                        <li class="p-2 text-gray-500">No countries available</li>
                    @endif
                </ul>
            </div>
            <input type="hidden" name="country" id="countryInput" value="{{ $selectedCountry }}">
        </div>

        <!-- PHASE DROPDOWN -->
        <div class="relative">
            <input type="checkbox" id="phaseToggle" class="peer hidden">
            <label for="phaseToggle"
                class="flex items-center justify-between bg-[#F3F3F3] text-[#1C1C3C] px-6 py-3 rounded-full w-[286px] text-sm cursor-pointer select-none">
                <span id="phaseLabel">{{ $selectedPhase ? ($phases[$selectedPhase] ?? 'Phase of project') : 'Phase of project' }}</span>
                @if($selectedPhase)
                    <span class="text-red-500 cursor-pointer mr-2" onclick="event.stopPropagation(); clearPhaseFilter();">×</span>
                @endif
                <svg id="chevron-right-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24">
                    <rect id="Rectangle_66" data-name="Rectangle 66" width="24" height="24" fill="none" />
                    <path id="Path_410" data-name="Path 410" d="M12.6,12,8,7.4,9.4,6l6,6-6,6L8,16.6,12.6,12Z"
                        fill="#ababab" />
                </svg>
            </label>

            <div class="absolute top-14 w-[220px] bg-white rounded-xl shadow-lg p-3 hidden peer-checked:block z-[1001]">
                <input type="search" id="phaseSearch" placeholder="Search"
                    class="w-full p-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:border-transparent focus:ring-0 bg-gray-50 mb-2"
                    onkeyup="filterPhaseList(this.value)">

                <ul id="phaseList" class="max-h-48 overflow-y-auto text-sm scrollbar-hide">
                    @foreach($phases as $key => $phase)
                        <li class="p-2 hover:bg-gray-100 rounded cursor-pointer {{ $selectedPhase === $key ? 'bg-blue-50' : '' }}"
                            onclick="selectPhase('{{ $key }}')">{{ $phase }}</li>
                    @endforeach
                </ul>
            </div>
            <input type="hidden" name="phase" id="phaseInput" value="{{ $selectedPhase }}">
        </div>

        <!-- UPDATE BUTTON -->
        <button type="submit" onclick="saveScrollPosition()" class="bg-[#37C6F4] text-lg text-[#1E1D57] px-10 py-3 rounded-full text-sm w-[286px] font-medium
           hover:bg-[#1E1D57] hover:text-[#37C6F4] transition">
            Update results
        </button>

        <!-- SEARCH INPUT (hidden, can be added later if needed) -->
        <input type="hidden" name="search" id="searchInput" value="{{ $searchKeyword }}">

    </form>
</section>
<!-- country button end  -->

<!-- MAP SECTION -->
<section class=" mb-16 mt-[40px]  px-6  lg:px-16">
    <div class=" max-w-7xl mx-auto relative">
        <div id="caseStudyMap" class="w-full h-[500px] border border-gray-300 rounded-md overflow-hidden relative">
            <!-- map popup card start -->
            <div class="map-overlay-case-study" id="mapOverlayCaseStudy" onclick="closeMapCardCaseStudy()"></div>
            <div class="map-item-card-case-study" id="mapItemCardCaseStudy">
                <button onclick="closeMapCardCaseStudy()" class="absolute -top-2 -right-2 text-gray-600 hover:text-gray-800 z-10 bg-white rounded-full p-1 shadow-lg">
                    <span class="material-symbols-outlined text-lg">close</span>
                </button>
                <div id="mapCardContentCaseStudy"></div>
            </div>
            <!-- map popup card end -->
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
            <h2 class="text-3xl text-[#1E1D57] md:text-[40px] font-bold leading-snug mb-4">
                Comprehensive water PPP knowledge in a format that works for you
            </h2>
            <p class="text-[#000000]">
                Every resource on the Hub is designed for clarity and speed. Whether you need comprehensive
                documentation or a quick overview, we provide water PPP guidance in multiple formats – so you can
                learn in the way that fits you.
            </p>
        </div>


        <a href="{{ route('resources') }}" class="group inline-flex items-center text-[#37C6F4] mt-6 md:mt-0 font-medium  whitespace-nowrap bg-[#1E1D57] rounded-[25px] py-[10px] px-[27px]
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
    <!-- <div class=" bottom-0 absolute left-0 right-0">
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
    </div> -->
</section>

</section>


@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet.markercluster@1.5.3/dist/leaflet.markercluster.js"></script>
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

    // Filter country list
    function filterCountryList(searchTerm) {
        const list = document.getElementById('countryList');
        const items = list.getElementsByTagName('li');
        const term = searchTerm.toLowerCase();

        for (let i = 0; i < items.length; i++) {
            const text = items[i].textContent.toLowerCase();
            items[i].style.display = text.includes(term) ? 'block' : 'none';
        }
    }

    // Filter phase list
    function filterPhaseList(searchTerm) {
        const list = document.getElementById('phaseList');
        const items = list.getElementsByTagName('li');
        const term = searchTerm.toLowerCase();

        for (let i = 0; i < items.length; i++) {
            const text = items[i].textContent.toLowerCase();
            items[i].style.display = text.includes(term) ? 'block' : 'none';
        }
    }

    // Select country
    function selectCountry(country) {
        document.getElementById('countryInput').value = country;
        document.getElementById('countryLabel').textContent = country;
        document.getElementById('countryToggle').checked = false;
        // Don't auto-submit, wait for Update results button
    }

    // Select phase
    function selectPhase(phase) {
        const phaseLabels = {
            'planning': 'Planning',
            'construction': 'Construction',
            'completed': 'Completed',
            'proposal': 'Proposal'
        };
        document.getElementById('phaseInput').value = phase;
        document.getElementById('phaseLabel').textContent = phaseLabels[phase] || 'Phase of project';
        document.getElementById('phaseToggle').checked = false;
        // Don't auto-submit, wait for Update results button
    }

    // Clear country filter
    function clearCountryFilter() {
        document.getElementById('countryInput').value = '';
        document.getElementById('countryLabel').textContent = 'Country';
        // Don't auto-submit, wait for Update results button
    }

    // Clear phase filter
    function clearPhaseFilter() {
        document.getElementById('phaseInput').value = '';
        document.getElementById('phaseLabel').textContent = 'Phase of project';
        // Don't auto-submit, wait for Update results button
    }

    // Save scroll position before form submission
    function saveScrollPosition() {
        const scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
        sessionStorage.setItem('caseStudyScrollPosition', scrollPosition);
    }

    // Restore scroll position after page load
    window.addEventListener('load', function() {
        const savedPosition = sessionStorage.getItem('caseStudyScrollPosition');
        if (savedPosition) {
            window.scrollTo(0, parseInt(savedPosition));
            sessionStorage.removeItem('caseStudyScrollPosition');
        }
    });

    // Initialize Leaflet map - zoomed out more
    const caseStudyMap = L.map('caseStudyMap').setView([51.505, -0.09], 1);

    // Add tile layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(caseStudyMap);

    // Load items from backend
    const caseStudyItems = @json($items);

    // Format gradient style (same as resources page)
    function formatGradient(color) {
        // Start color is always #070648, end color is dynamic based on category
        const startColor = '#070648';
        const endColor = color || '#2CBFA0'; // Use category color or default
        return `background: linear-gradient(to bottom, ${startColor}, ${endColor});`;
    }

    // Show item card on map
    function showMapCardCaseStudy(item, lat, lng) {
        const gradientStyle = formatGradient(item.category_color);
        const titleEscaped = (item.title || '').replace(/'/g, "\\'").replace(/"/g, '&quot;');
        const authorEscaped = (item.author || '').replace(/'/g, "\\'").replace(/"/g, '&quot;');
        const slugEscaped = (item.slug || '').replace(/'/g, "\\'").replace(/"/g, '\\"');
        const titleForShare = (item.title || '').replace(/\\/g, '\\\\').replace(/'/g, "\\'").replace(/"/g, '\\"');

        const cardContent = `
            <div class="bg-white shadow-md p-4 rounded-[25px] flex flex-col justify-between">
                <div style="${gradientStyle}" class="text-white p-6 rounded-[15px] flex flex-col justify-between flex-grow drop-shadow-[0 2px 4px rgba(0,0,0, 0.50)]">
                    <div>
                        <h3 class="font-semibold text-lg leading-snug">${item.title}</h3>
                        <p class="text-sm mt-2 opacity-90">${item.author || ''}</p>
                    </div>
                    <div class="flex items-center space-x-2 mt-12">
                        <span class="material-symbols-outlined text-sm">${item.category_icon || 'folder'}</span>
                        <span class="text-sm">${item.category_name}</span>
                    </div>
                </div>
                <div class="flex justify-between pt-6 pb-3 border-t border-white/30 text-black/80">
                    <span class="material-symbols-outlined text-[#ababab] cursor-pointer hover:text-[#37C6F4] duration-250" onclick="openItemPageFromCaseStudy('${slugEscaped}')">eye_tracking</span>
                    <span class="material-symbols-outlined text-[#ababab] cursor-pointer hover:text-[#37C6F4] duration-250" onclick="downloadFile(${item.id})">download</span>
                    <span class="material-symbols-outlined cursor-pointer hover:text-[#37C6F4] duration-250 ${item.is_bookmarked ? 'text-[#37C6F4]' : 'text-[#ababab]'}" data-item-id="${item.id}" onclick="toggleBookmark(${item.id}, this)">bookmark</span>
                    <span class="material-symbols-outlined text-[#ababab] cursor-pointer hover:text-[#37C6F4] duration-250" onclick="shareCardItem('${slugEscaped}', '${titleForShare}')">share</span>
                </div>
            </div>
        `;

        document.getElementById('mapCardContentCaseStudy').innerHTML = cardContent;

        // Position card above the marker
        const mapContainer = document.getElementById('caseStudyMap');
        const point = caseStudyMap.latLngToContainerPoint([lat, lng]);

        const cardElement = document.getElementById('mapItemCardCaseStudy');
        const cardWidth = 254;
        const padding = 10;
        const spacingAboveMarker = 20;
        const spacingBelowMarker = 30;

        // Temporarily show card to get actual height
        cardElement.style.visibility = 'hidden';
        cardElement.classList.add('show');
        const cardHeight = cardElement.offsetHeight || 220; // Get actual height or fallback
        cardElement.style.visibility = '';

        // Center horizontally
        let leftPos = point.x - (cardWidth / 2);

        // Keep card within map bounds horizontally
        if (leftPos < padding) {
            leftPos = padding;
        } else if (leftPos + cardWidth > mapContainer.offsetWidth - padding) {
            leftPos = mapContainer.offsetWidth - cardWidth - padding;
        }

        const maxTop = padding;
        const maxBottom = mapContainer.offsetHeight - cardHeight - padding;

        // Try to position above marker first
        let topPosAbove = point.y - cardHeight - spacingAboveMarker;
        let topPosBelow = point.y + spacingBelowMarker;

        // Determine best position
        let topPos;
        if (topPosAbove >= maxTop && topPosAbove + cardHeight <= mapContainer.offsetHeight - padding) {
            // Fits above perfectly
            topPos = topPosAbove;
        } else if (topPosBelow + cardHeight <= mapContainer.offsetHeight - padding && topPosBelow >= maxTop) {
            // Fits below perfectly
            topPos = topPosBelow;
        } else {
            // Neither fits perfectly, choose the one that fits better
            const spaceAbove = point.y - maxTop;
            const spaceBelow = (mapContainer.offsetHeight - padding) - point.y;

            if (spaceAbove >= spaceBelow && spaceAbove >= cardHeight) {
                // More space above, position above but adjust to fit
                topPos = Math.max(maxTop, Math.min(topPosAbove, maxBottom));
            } else if (spaceBelow >= cardHeight) {
                // More space below, position below but adjust to fit
                topPos = Math.max(maxTop, Math.min(topPosBelow, maxBottom));
            } else {
                // Not enough space either way, center it vertically in available space
                topPos = Math.max(maxTop, Math.min((mapContainer.offsetHeight - cardHeight) / 2, maxBottom));
            }
        }

        // Final safety check - ensure card is fully within bounds
        topPos = Math.max(padding, Math.min(topPos, mapContainer.offsetHeight - cardHeight - padding));

        cardElement.style.left = leftPos + 'px';
        cardElement.style.top = topPos + 'px';

        document.getElementById('mapOverlayCaseStudy').classList.add('show');
    }

    // Close map card
    function closeMapCardCaseStudy() {
        document.getElementById('mapOverlayCaseStudy').classList.remove('show');
        document.getElementById('mapItemCardCaseStudy').classList.remove('show');
    }

    // Open modal from case study (same as resources page)
    // Open item page from case study (navigate to single item page)
    function openItemPageFromCaseStudy(slug) {
        window.location.href = `/resources/${slug}`;
    }

    // Download file function (same as resources page)
    function downloadFile(itemId) {
        const item = caseStudyItems.find(i => i.id === itemId);
        if (!item) {
            alert('Item not found');
            return;
        }

        if (!item.featured_image_id) {
            alert('No file available for download');
            return;
        }

        // Simple direct navigation - same as working featured media download link
        // The server's Content-Disposition header will force the download
        window.location.href = `/media/${item.featured_image_id}/download`;
    }

    // Share card item function (same as resources page)
    function shareCardItem(slug, title) {
        const url = `${window.location.origin}/resources/${slug}`;
        shareItem(url, title);
    }

    // Share item function (same as resources page)
    let isSharing = false;

    function shareItem(url, title) {
        // Prevent concurrent share operations
        if (isSharing) {
            return;
        }

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
            isSharing = true;
            navigator.share({
                title: title,
                text: `Check out this resource: ${title}`,
                url: shareUrl,
            }).then(() => {
                isSharing = false;
            }).catch(err => {
                isSharing = false;
                // Only log non-user-cancelled errors
                if (err.name !== 'AbortError') {
                    console.log('Error sharing:', err);
                }
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

    // Toggle bookmark function (same as resources page)
    window.toggleBookmark = async function(itemId, element) {
        const isAuthenticated = @json(auth()->check());
        if (!isAuthenticated) {
            alert('Please login to bookmark items');
            return;
        }

        try {
            const response = await fetch('{{ route('bookmark.toggle') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ item_id: itemId })
            });

            const data = await response.json();

            if (response.ok) {
                // Update icon color
                if (data.status === 'added') {
                    element.classList.add('text-[#37C6F4]');
                    element.classList.remove('text-[#ababab]');
                    // Update the item's bookmark status in the data
                    const item = caseStudyItems.find(i => i.id === itemId);
                    if (item) {
                        item.is_bookmarked = true;
                    }
                } else if (data.status === 'removed') {
                    element.classList.remove('text-[#37C6F4]');
                    element.classList.add('text-[#ababab]');
                    // Update the item's bookmark status in the data
                    const item = caseStudyItems.find(i => i.id === itemId);
                    if (item) {
                        item.is_bookmarked = false;
                    }
                }
                console.log(data.message);
            } else {
                console.error('Bookmark toggle failed:', data);
                alert('Failed to toggle bookmark: ' + (data.message || 'Unknown error'));
            }
        } catch (error) {
            console.error('Error toggling bookmark:', error);
            alert('An error occurred while toggling bookmark.');
        }
    };

    // Expose functions to global scope
    window.downloadFile = downloadFile;
    window.shareCardItem = shareCardItem;
    window.shareItem = shareItem;
    window.openItemPageFromCaseStudy = openItemPageFromCaseStudy;
    window.caseStudyItems = caseStudyItems; // Expose itemsData for bookmark function

    // Add markers to map
    const markers = [];
    const bounds = [];

    // Create custom blue teardrop marker icon
    const blueMarkerIcon = L.icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-blue.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    // Create marker cluster group
    const markerClusterGroup = L.markerClusterGroup({
        maxClusterRadius: 50, // Cluster markers within 50 pixels
        iconCreateFunction: function(cluster) {
            const count = cluster.getChildCount();
            return L.divIcon({
                html: '<div style="background-color: #6B9BD1; color: white; border-radius: 50%; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 12px; border: 2px solid white; box-shadow: 0 2px 4px rgba(0,0,0,0.3);">' + count + '</div>',
                className: 'marker-cluster-custom',
                iconSize: L.point(30, 30)
            });
        }
    });

    caseStudyItems.forEach(item => {
        if (item.latitude && item.longitude) {
            // Create teardrop-shaped blue marker matching the image style
            const marker = L.marker([item.latitude, item.longitude], {
                icon: blueMarkerIcon
            });

            // Store item data in marker for click handler
            marker.itemData = item;

            // Show card on marker click
            marker.on('click', function(e) {
                const latlng = e.latlng;
                showMapCardCaseStudy(item, latlng.lat, latlng.lng);
            });

            // Add marker to cluster group
            markerClusterGroup.addLayer(marker);
            markers.push(marker);
            bounds.push([item.latitude, item.longitude]);
        }
    });

    // Add cluster group to map
    caseStudyMap.addLayer(markerClusterGroup);

    // Handle cluster click to show all items in cluster
    markerClusterGroup.on('clusterclick', function(a) {
        const markers = a.layer.getAllChildMarkers();
        if (markers.length === 1) {
            // If only one marker in cluster, show its card
            const item = markers[0].itemData;
            const latlng = markers[0].getLatLng();
            showMapCardCaseStudy(item, latlng.lat, latlng.lng);
        } else {
            // If multiple markers, zoom in to show them separately
            caseStudyMap.fitBounds(a.layer.getBounds(), { padding: [50, 50] });
        }
    });

    // Fit map to bounds if we have markers, but with more padding for less zoom
    if (bounds.length > 0) {
        caseStudyMap.fitBounds(bounds, { padding: [100, 100], maxZoom: 4 });
    } else {
        // Default to a wider view if no markers
        caseStudyMap.setView([51.4816, -3.1791], 2);
    }
</script>
@endpush

@endsection
