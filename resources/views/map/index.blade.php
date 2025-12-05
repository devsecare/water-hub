@extends('layouts.app')

@section('title', 'Map View')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<style>
    #map { height: 600px; }
    .map-filters {
        background: white;
        padding: 1rem;
        border-radius: 0.5rem;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        margin-bottom: 1rem;
    }
    .map-item-card {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000;
        max-width: 254px;
        display: none;
    }
    .map-item-card.show {
        display: block;
    }
    .map-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 999;
        display: none;
    }
    .map-overlay.show {
        display: block;
    }
</style>
@endpush

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Map View</h1>
        <p class="mt-2 text-gray-600">Browse items on the map</p>
    </div>

    <div class="map-filters">
        <form method="GET" action="{{ route('map.index') }}" class="flex flex-wrap gap-4 items-end">
            <div class="flex-1 min-w-[200px]">
                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select name="category_id" id="category_id"
                    class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $selectedCategory == $category->id ? 'selected' : '' }}
                            data-color="{{ $category->color }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex-1 min-w-[200px]">
                <label for="keyword" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <input type="text" name="keyword" id="keyword"
                    value="{{ $keyword ?? '' }}"
                    placeholder="Search by title, description, or address..."
                    class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Filter
                </button>
            </div>
            <div>
                <a href="{{ route('map.index') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Clear
                </a>
            </div>
        </form>
    </div>

    <div id="map" class="relative"></div>

    <!-- Map Item Card Modal -->
    <div class="map-overlay" id="mapOverlay" onclick="closeMapCard()"></div>
    <div class="map-item-card" id="mapItemCard">
        <div class="bg-white shadow-md p-4 rounded-[25px] max-w-[254px] flex flex-col justify-between relative">
            <button onclick="closeMapCard()" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 z-10 bg-white rounded-full p-1 shadow-sm">
                <span class="material-symbols-outlined text-lg">close</span>
            </button>
            <div id="mapCardContent"></div>
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" id="items-list">
        @foreach($items as $item)
            <div class="bg-white rounded-lg shadow p-4">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $item->title }}</h3>
                        <p class="text-sm text-gray-600 mt-1">{{ $item->category->name }}</p>
                        @if($item->address)
                            <p class="text-sm text-gray-500 mt-1">{{ $item->address }}</p>
                        @endif
                        @if($item->description)
                            <p class="text-sm text-gray-600 mt-2">{{ \Illuminate\Support\Str::limit($item->description, 100) }}</p>
                        @endif
                    </div>
                    <span class="inline-block w-4 h-4 rounded-full ml-2"
                        style="background-color: {{ $item->category->color }}"></span>
                </div>
            </div>
        @endforeach
    </div>
</div>

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    // Initialize map
    const map = L.map('map').setView([51.505, -0.09], 2);

    // Add tile layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Load items from API
    const items = @json($items->map(function($item) use ($bookmarkedItemIds) {
        $startColor = $item->category->color ?? '#3B82F6';
        $endColor = $item->category->color ?? '#2CBFA0';
        // Lighten the color for gradient end
        $rgb = sscanf($startColor, "#%02x%02x%02x");
        if ($rgb) {
            $endColor = sprintf("#%02x%02x%02x", min(255, $rgb[0] + 30), min(255, $rgb[1] + 30), min(255, $rgb[2] + 30));
        }
        return [
            'id' => $item->id,
            'title' => $item->title,
            'slug' => $item->slug,
            'author' => $item->author ?? $item->publisher ?? '',
            'description' => $item->description,
            'short_description' => $item->short_description,
            'address' => $item->address,
            'latitude' => (float) $item->latitude,
            'longitude' => (float) $item->longitude,
            'category' => [
                'id' => $item->category->id,
                'name' => $item->category->name,
                'color' => $item->category->color,
                'icon' => $item->category->icon ?? 'folder',
            ],
            'category_color' => $item->category->color,
            'category_icon' => $item->category->icon ?? 'folder',
            'category_name' => $item->category->name,
            'start_color' => $startColor,
            'end_color' => $endColor,
            'featured_image_id' => $item->featured_image_id,
            'is_bookmarked' => in_array($item->id, $bookmarkedItemIds),
        ];
    }));

    const markers = [];
    const bounds = [];
    let currentMapItem = null;

    // Format gradient style
    function formatGradient(startColor, endColor) {
        return `background: linear-gradient(to bottom, ${startColor}, ${endColor});`;
    }

    // Show item card on map
    function showMapCard(item) {
        currentMapItem = item;
        const gradientStyle = formatGradient(item.start_color, item.end_color);
        const titleEscaped = (item.title || '').replace(/'/g, "\\'").replace(/"/g, '&quot;');
        const authorEscaped = (item.author || '').replace(/'/g, "\\'").replace(/"/g, '&quot;');
        const slugEscaped = (item.slug || '').replace(/'/g, "\\'").replace(/"/g, '\\"');
        const titleForShare = (item.title || '').replace(/\\/g, '\\\\').replace(/'/g, "\\'").replace(/"/g, '\\"');

        const cardContent = `
            <div style="${gradientStyle}" class="text-white p-6 rounded-[15px] flex flex-col justify-between flex-grow drop-shadow-[0 2px 4px rgba(0,0,0, 0.50)]">
                <div>
                    <h3 class="font-semibold text-lg leading-snug">${item.title}</h3>
                    <p class="text-sm mt-2 opacity-90">${item.author || ''}</p>
                </div>
                <div class="flex items-center space-x-2 mt-12">
                    <span class="material-symbols-outlined text-sm">${item.category_icon}</span>
                    <span class="text-sm">${item.category_name}</span>
                </div>
            </div>
            <div class="flex justify-between pt-6 pb-3 border-t border-white/30 text-black/80">
                <span class="material-symbols-outlined text-[#ababab] cursor-pointer hover:text-[#37C6F4] duration-250" onclick="openItemPageFromMap('${slugEscaped}')">eye_tracking</span>
                <span class="material-symbols-outlined text-[#ababab] cursor-pointer hover:text-[#37C6F4] duration-250" onclick="downloadFileFromMap(${item.id})">download</span>
                <span class="material-symbols-outlined cursor-pointer hover:text-[#37C6F4] duration-250 ${item.is_bookmarked ? 'text-[#37C6F4]' : 'text-[#ababab]'}" data-item-id="${item.id}" onclick="toggleBookmarkFromMap(${item.id}, this)">bookmark</span>
                <span class="material-symbols-outlined text-[#ababab] cursor-pointer hover:text-[#37C6F4] duration-250" onclick="shareItemFromMap('${slugEscaped}', '${titleForShare}')">share</span>
            </div>
        `;

        document.getElementById('mapCardContent').innerHTML = cardContent;
        document.getElementById('mapOverlay').classList.add('show');
        document.getElementById('mapItemCard').classList.add('show');
    }

    // Close map card
    function closeMapCard() {
        document.getElementById('mapOverlay').classList.remove('show');
        document.getElementById('mapItemCard').classList.remove('show');
        currentMapItem = null;
    }

    // Open item page from map
    function openItemPageFromMap(slug) {
        window.location.href = `/resources/${slug}`;
    }

    // Download file from map
    function downloadFileFromMap(itemId) {
        const item = items.find(i => i.id === itemId);
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

    // Toggle bookmark from map
    function toggleBookmarkFromMap(itemId, element) {
        fetch('/bookmark/toggle', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
            },
            body: JSON.stringify({ item_id: itemId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const item = items.find(i => i.id === itemId);
                if (item) {
                    item.is_bookmarked = data.is_bookmarked;
                }
                if (data.is_bookmarked) {
                    element.classList.add('text-[#37C6F4]');
                    element.classList.remove('text-[#ababab]');
                } else {
                    element.classList.remove('text-[#37C6F4]');
                    element.classList.add('text-[#ababab]');
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    // Share item from map
    function shareItemFromMap(slug, title) {
        const url = `${window.location.origin}/resources/${slug}`;
        if (navigator.share) {
            navigator.share({
                title: title,
                text: `Check out this resource: ${title}`,
                url: url,
            }).catch(err => {
                if (err.name !== 'AbortError') {
                    console.log('Error sharing:', err);
                }
            });
        } else {
            navigator.clipboard.writeText(url).then(() => {
                alert('Link copied to clipboard!');
            }).catch(err => {
                console.error('Failed to copy:', err);
                prompt('Copy this link:', url);
            });
        }
    }

    items.forEach(item => {
        if (item.latitude && item.longitude) {
            const marker = L.circleMarker([item.latitude, item.longitude], {
                radius: 10,
                fillColor: item.category.color,
                color: '#fff',
                weight: 2,
                opacity: 1,
                fillOpacity: 0.8
            }).addTo(map);

            // Show card on marker click
            marker.on('click', function() {
                showMapCard(item);
            });

            markers.push(marker);
            bounds.push([item.latitude, item.longitude]);
        }
    });

    // Fit map to bounds if we have markers
    if (bounds.length > 0) {
        map.fitBounds(bounds, { padding: [50, 50] });
    }
</script>
@endpush
@endsection

