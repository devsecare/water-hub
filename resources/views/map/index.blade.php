@extends('layouts.app')

@section('title', 'Map View')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
    #map { height: 600px; }
    .map-filters {
        background: white;
        padding: 1rem;
        border-radius: 0.5rem;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        margin-bottom: 1rem;
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

    <div id="map"></div>

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
                @if($item->files->count() > 0)
                    <div class="mt-4">
                        <p class="text-sm font-medium text-gray-700 mb-2">Files ({{ $item->files->count() }})</p>
                        <div class="space-y-1">
                            @foreach($item->files as $file)
                                <a href="{{ route('files.download', $file) }}" 
                                    class="block text-sm text-indigo-600 hover:text-indigo-800">
                                    📄 {{ $file->original_name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
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
    const items = @json($items->map(function($item) {
        return [
            'id' => $item->id,
            'title' => $item->title,
            'description' => $item->description,
            'address' => $item->address,
            'latitude' => (float) $item->latitude,
            'longitude' => (float) $item->longitude,
            'category' => [
                'name' => $item->category->name,
                'color' => $item->category->color,
            ],
            'files_count' => $item->files->count(),
        ];
    }));

    const markers = [];
    const bounds = [];

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

            const popupContent = `
                <div class="p-2">
                    <h3 class="font-bold text-lg">${item.title}</h3>
                    <p class="text-sm text-gray-600">${item.category.name}</p>
                    ${item.address ? `<p class="text-sm text-gray-500 mt-1">${item.address}</p>` : ''}
                    ${item.description ? `<p class="text-sm text-gray-600 mt-2">${item.description.substring(0, 100)}...</p>` : ''}
                    ${item.files_count > 0 ? `<p class="text-sm text-indigo-600 mt-2">${item.files_count} file(s) available</p>` : ''}
                </div>
            `;
            marker.bindPopup(popupContent);
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

