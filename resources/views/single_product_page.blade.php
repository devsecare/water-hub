@extends('layouts.frontend')

@section('title', $item->title . ' - PPP Water Hub')

@push('styles')
<script src="https://unpkg.com/lucide@latest"></script>
<style>
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

<section class="bg-[#F2F2F2]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        <!-- Back link -->


        <a href="{{ route('resources') }}" class="inline-flex items-center gap-2 text-lg text-[#37C6F4] font-semibold mb-12">
            <svg id="chevron-right-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                class="transition-all duration-200 fill-[#37C6F4] rotate-180">
                <rect width="24" height="24" fill="none"></rect>
                <path d="M12.6,12,8,7.4,9.4,6l6,6-6,6L8,16.6,12.6,12Z"></path>
            </svg>
            <span>Back to all resources</span>
        </a>



        <!-- Main Layout -->
        <div class="flex flex-col lg:flex-row gap-12">

            <!-- LEFT SECTION -->
            <div class="w-full lg:w-[350px] flex flex-col">

                <!-- Blue Card -->
                <div
                    class="text-white rounded-lg shadow-xl p-6 flex flex-col lg:w-[350px] justify-between h-full"
                    style="background: linear-gradient(to bottom, {{ $categoryColor }}, {{ $gradientEnd }});">
                    <div>
                        <h1 class="text-3xl font-bold leading-tight mb-6">
                            {{ $item->title }}
                        </h1>
                        <p class="text-sm opacity-90 mt-10">{{ $item->publisher ?? 'No publisher' }}</p>
                    </div>

                    <div class="flex items-center space-x-2 mt-20">
                        <span class="material-symbols-outlined text-2xl">{{ $displayCategory->icon ?? 'folder' }}</span>
                        <span class="text-[18px] font-semibold">{{ $displayCategory->name }}</span>
                    </div>
                </div>

                <!-- Save / Download -->
                <div class="flex justify-between items-center mt-6 border-t pt-4 text-sm text-gray-700">

                    <button id="singlePageBookmarkBtn" 
                            class="group flex items-center transition-colors duration-200"
                            onclick="toggleBookmark({{ $item->id }}, document.getElementById('singlePageBookmarkIcon'), false)">
                        <svg id="singlePageBookmarkIcon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                            class="fill-[#1e1d57] hover:fill-[#37C6F4] transition {{ $isBookmarked ? 'fill-[#37C6F4]' : '' }}">
                            <path
                                d="M5,29V5.889a2.785,2.785,0,0,1,.851-2.037A2.776,2.776,0,0,1,7.884,3H22.307a2.776,2.776,0,0,1,2.034.852,2.785,2.785,0,0,1,.851,2.037V29L15.1,24.667Zm2.884-4.406L15.1,21.489l7.211,3.106V5.889H7.884Z"
                                transform="translate(0.904)" />
                        </svg>
                        <span id="singlePageBookmarkText"
                            class="sm:ml-2 text-[#000000] text-[16px] group-hover:text-[#37C6F4] transition-colors duration-200">
                            {{ $isBookmarked ? 'Remove from library' : 'Add to your library' }}
                        </span>
                    </button>


                    @if($item->files->count() > 0)
                        <a href="{{ route('files.download', $item->files->first()->id) }}" class="group flex items-center transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                                class="fill-[#1e1d57] hover:fill-[#37C6F4] transition">
                                <path
                                    d="M16,22,8.5,14.5l2.1-2.175,3.9,3.9V4h3V16.225l3.9-3.9L23.5,14.5,16,22ZM7,28a2.89,2.89,0,0,1-2.115-.885A2.89,2.89,0,0,1,4,25V20.5H7V25H25V20.5h3V25a3.022,3.022,0,0,1-3,3Z" />
                            </svg>
                            <span
                                class="sm:ml-2 text-[16px] text-[#000000] group-hover:text-[#37C6F4] transition-colors duration-200">
                                Download file
                            </span>
                        </a>
                    @else
                        <span class="group flex items-center transition-colors duration-200 opacity-50 cursor-not-allowed">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                                class="fill-[#1e1d57]">
                                <path
                                    d="M16,22,8.5,14.5l2.1-2.175,3.9,3.9V4h3V16.225l3.9-3.9L23.5,14.5,16,22ZM7,28a2.89,2.89,0,0,1-2.115-.885A2.89,2.89,0,0,1,4,25V20.5H7V25H25V20.5h3V25a3.022,3.022,0,0,1-3,3Z" />
                            </svg>
                            <span class="sm:ml-2 text-[16px] text-[#000000]">
                                Download file
                            </span>
                        </span>
                    @endif



                </div>
            </div>

            <!-- RIGHT SECTION -->
            <div class="lg:max-w-[65%]">

                <h2 class=" text-2xl md:text-3xl text-[#1E1D57] md:max-w-[90%] font-bold leading-tight mb-6">
                    {{ $item->title }}
                </h2>

                <!-- RIGHT SIDE GRID (TEXT LEFT + RESOURCES RIGHT) -->
                <div class="flex flex-col-reverse md:flex-row gap-8">

                    <!-- LEFT TEXT SECTION – takes 2/3 -->
                    <div class="md:col-span-2 md:max-w-[347px] text-[#000000]">
                        @if($item->short_description)
                            <p class=" mb-6 leading-relaxed">
                                <span class="text-black font-bold">Short description: </span>{{ $item->short_description }}
                            </p>
                        @endif

                        @if($item->description)
                            <div class="space-y-6 leading-relaxed">
                                {!! nl2br(e($item->description)) !!}
                            </div>
                        @endif

                        <!-- Share Icon -->

                        <button class="group flex items-center text-[#000000] mt-8">
                            <svg xmlns="http://www.w3.org/2000/svg" width="85.283" height="32" viewBox="0 0 85.283 32">
                                <!-- Text -->
                                <text id="Tagline" transform="translate(41.283 21.5)" font-size="16"
                                    font-family="PublicSans-Regular, Public Sans"
                                    class="fill-[#1e1d57] group-hover:fill-[#37C6F4]">
                                    <tspan x="0" y="0">Share</tspan>
                                </text>
                                <g>
                                    <!-- Icon Path -->
                                    <path id="Path_405"
                                        d="M22.341,30a3.868,3.868,0,0,1-2.887-1.231,4.133,4.133,0,0,1-1.193-2.98c0-.14.041-.462.108-.979L8.841,19.072a4.057,4.057,0,0,1-1.26.826,3.989,3.989,0,0,1-1.532.294A3.868,3.868,0,0,1,3.163,18.96,4.133,4.133,0,0,1,1.97,15.98,4.1,4.1,0,0,1,3.163,13,3.877,3.877,0,0,1,6.05,11.768a3.989,3.989,0,0,1,1.532.294,4.057,4.057,0,0,1,1.26.826l9.528-5.737a3.189,3.189,0,0,1-.081-.476c-.014-.154-.014-.322-.014-.5a4.124,4.124,0,0,1,1.193-2.98,4,4,0,0,1,5.774,0,4.1,4.1,0,0,1,1.193,2.98,4.1,4.1,0,0,1-1.193,2.98,3.847,3.847,0,0,1-2.887,1.231,3.989,3.989,0,0,1-1.532-.294,4.057,4.057,0,0,1-1.26-.826L10.034,15a3.189,3.189,0,0,1,.081.476c.014.154.014.322.014.5s0,.35-.014.5a3.189,3.189,0,0,1-.081.476L19.562,22.7a4.057,4.057,0,0,1,1.26-.826,3.989,3.989,0,0,1,1.532-.294,3.868,3.868,0,0,1,2.887,1.231,4.32,4.32,0,0,1,0,5.961A3.877,3.877,0,0,1,22.354,30Zm0-2.8A1.3,1.3,0,0,0,23.3,26.8a1.452,1.452,0,0,0,0-1.987,1.344,1.344,0,0,0-1.925,0,1.452,1.452,0,0,0,0,1.987A1.3,1.3,0,0,0,22.341,27.2ZM6.077,17.407A1.3,1.3,0,0,0,7.039,17a1.452,1.452,0,0,0,0-1.987,1.344,1.344,0,0,0-1.925,0,1.452,1.452,0,0,0,0,1.987A1.3,1.3,0,0,0,6.077,17.407ZM22.341,7.613a1.3,1.3,0,0,0,.962-.406,1.452,1.452,0,0,0,0-1.987,1.344,1.344,0,0,0-1.925,0,1.452,1.452,0,0,0,0,1.987A1.3,1.3,0,0,0,22.341,7.613Z"
                                        class="fill-[#1e1d57] group-hover:fill-[#37C6F4]" />
                                </g>
                            </svg>
                        </button>
                    </div>

                    <!-- RIGHT ADDITIONAL RESOURCES (1/3) -->
                    <div class="md:col-span-1">

                        <h3 class=" font-semibold text-[#0E1C4E] mb-4">
                            Additional resources
                        </h3>

                        @if($item->files->count() > 0)
                            <ul class="space-y-3 text-[#000000] text-[16px]">
                                @foreach($item->files as $file)
                                    @php
                                        $mimeType = $file->mime_type ?? '';
                                        $isPdf = str_contains($mimeType, 'pdf');
                                        $isVideo = str_contains($mimeType, 'video');
                                        $isAudio = str_contains($mimeType, 'audio');
                                    @endphp
                                    <li class="flex items-center gap-2 cursor-pointer hover:text-[#37C6F4]">
                                        @if($isPdf)
                                            <svg id="summary-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path id="Path_406" data-name="Path 406" d="M5,4V4ZM7,14h3.5a5.806,5.806,0,0,1,1.3-2.01H7v2Zm0,4h3.18a5.781,5.781,0,0,1-.16-1,6.677,6.677,0,0,1,.01-1H7v2ZM5,22a1.926,1.926,0,0,1-1.41-.59A1.926,1.926,0,0,1,3,20V4a1.926,1.926,0,0,1,.59-1.41A1.926,1.926,0,0,1,5,2h8l6,6v2.5a5.581,5.581,0,0,0-.98-.31,8.828,8.828,0,0,0-1.03-.16V9h-5V4h-7V20h6.03a8.082,8.082,0,0,0,.9,1.11,5.876,5.876,0,0,0,1.1.89Zm11.5-3a2.517,2.517,0,0,0,1.78-4.29,2.517,2.517,0,0,0-3.56,3.56A2.415,2.415,0,0,0,16.5,19Zm5.1,4-2.7-2.7a4.237,4.237,0,0,1-1.14.53,4.463,4.463,0,0,1-1.26.18,4.371,4.371,0,0,1-3.19-1.31A4.316,4.316,0,0,1,12,16.51a4.371,4.371,0,0,1,1.31-3.19,4.316,4.316,0,0,1,3.19-1.31,4.371,4.371,0,0,1,3.19,1.31A4.316,4.316,0,0,1,21,16.51a4.463,4.463,0,0,1-.18,1.26,3.954,3.954,0,0,1-.53,1.14l2.7,2.7-1.4,1.4Z" fill="#1e1d57" />
                                                <rect id="Rectangle_61" data-name="Rectangle 61" width="24" height="24" fill="none" />
                                            </svg>
                                            <a href="{{ route('files.download', $file->id) }}">View summary file</a>
                                        @elseif($isVideo)
                                            <svg id="video-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path id="Path_408" data-name="Path 408" d="M11.5,14.5l7-4.5-7-4.5ZM8,18a2.015,2.015,0,0,1-2-2V4a1.926,1.926,0,0,1,.59-1.41A1.926,1.926,0,0,1,8,2H20a1.926,1.926,0,0,1,1.41.59A1.926,1.926,0,0,1,22,4V16a2.015,2.015,0,0,1-2,2Zm0-2H20V4H8ZM4,22a1.926,1.926,0,0,1-1.41-.59A1.926,1.926,0,0,1,2,20V6H4V20H18v2ZM8,4V4Z" fill="#1e1d57" />
                                                <rect id="Rectangle_63" data-name="Rectangle 63" width="24" height="24" fill="none" />
                                            </svg>
                                            <a href="{{ route('files.download', $file->id) }}">Play video summary</a>
                                        @elseif($isAudio)
                                            <svg id="podcast-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path id="Path_403" data-name="Path 403" d="M11,22V13.72a2.251,2.251,0,0,1-.73-.71A1.805,1.805,0,0,1,9.99,12a1.994,1.994,0,0,1,3.41-1.41A1.926,1.926,0,0,1,13.99,12a1.9,1.9,0,0,1-.28,1.03,2.038,2.038,0,0,1-.73.7v8.28h-2ZM5.1,19.25a10.436,10.436,0,0,1-2.26-3.24A9.639,9.639,0,0,1,2,12a9.508,9.508,0,0,1,.79-3.9A9.989,9.989,0,0,1,8.11,2.78a9.678,9.678,0,0,1,3.9-.79,9.678,9.678,0,0,1,3.9.79A9.989,9.989,0,0,1,21.23,8.1a9.678,9.678,0,0,1,.79,3.9,9.936,9.936,0,0,1-.84,4.03,10.054,10.054,0,0,1-2.26,3.23l-1.4-1.4a8.09,8.09,0,0,0,1.83-2.61,7.874,7.874,0,0,0,.68-3.24A7.742,7.742,0,0,0,17.7,6.33,7.726,7.726,0,0,0,12.02,4,7.726,7.726,0,0,0,6.34,6.33a7.726,7.726,0,0,0-2.33,5.68,7.794,7.794,0,0,0,.68,3.23,8.058,8.058,0,0,0,1.85,2.6L5.11,19.27Zm2.83-2.83a6.311,6.311,0,0,1-1.4-1.96A5.813,5.813,0,0,1,6,12,5.773,5.773,0,0,1,7.75,7.75,5.773,5.773,0,0,1,12,6a5.773,5.773,0,0,1,4.25,1.75A5.773,5.773,0,0,1,18,12a6.032,6.032,0,0,1-1.93,4.43L14.64,15a4.141,4.141,0,0,0,.99-1.35,3.976,3.976,0,0,0-.82-4.48,3.984,3.984,0,0,0-5.66,0,3.992,3.992,0,0,0-.82,4.49A4.322,4.322,0,0,0,9.32,15L7.89,16.43Z" fill="#1e1d57" />
                                                <rect id="Rectangle_58" data-name="Rectangle 58" width="24" height="24" fill="none" />
                                            </svg>
                                            <a href="{{ route('files.download', $file->id) }}">Play audio summary</a>
                                        @else
                                            <svg id="summary-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path id="Path_406" data-name="Path 406" d="M5,4V4ZM7,14h3.5a5.806,5.806,0,0,1,1.3-2.01H7v2Zm0,4h3.18a5.781,5.781,0,0,1-.16-1,6.677,6.677,0,0,1,.01-1H7v2ZM5,22a1.926,1.926,0,0,1-1.41-.59A1.926,1.926,0,0,1,3,20V4a1.926,1.926,0,0,1,.59-1.41A1.926,1.926,0,0,1,5,2h8l6,6v2.5a5.581,5.581,0,0,0-.98-.31,8.828,8.828,0,0,0-1.03-.16V9h-5V4h-7V20h6.03a8.082,8.082,0,0,0,.9,1.11,5.876,5.876,0,0,0,1.1.89Zm11.5-3a2.517,2.517,0,0,0,1.78-4.29,2.517,2.517,0,0,0-3.56,3.56A2.415,2.415,0,0,0,16.5,19Zm5.1,4-2.7-2.7a4.237,4.237,0,0,1-1.14.53,4.463,4.463,0,0,1-1.26.18,4.371,4.371,0,0,1-3.19-1.31A4.316,4.316,0,0,1,12,16.51a4.371,4.371,0,0,1,1.31-3.19,4.316,4.316,0,0,1,3.19-1.31,4.371,4.371,0,0,1,3.19,1.31A4.316,4.316,0,0,1,21,16.51a4.463,4.463,0,0,1-.18,1.26,3.954,3.954,0,0,1-.53,1.14l2.7,2.7-1.4,1.4Z" fill="#1e1d57" />
                                                <rect id="Rectangle_61" data-name="Rectangle 61" width="24" height="24" fill="none" />
                                            </svg>
                                            <a href="{{ route('files.download', $file->id) }}">{{ $file->original_name ?? $file->name }}</a>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500 text-sm">No additional resources available.</p>
                        @endif

                        @if($item->files->count() > 0)
                            @php
                                $firstFile = $item->files->first();
                                $fileExtension = strtoupper(pathinfo($firstFile->original_name ?? $firstFile->name, PATHINFO_EXTENSION));
                            @endphp
                            <div class="mt-8 text-lg text-[#37C6F4] space-y-2">
                                <p><span class="font-semibold text-[#1E1D57]">File type:</span> {{ $fileExtension }}</p>
                                @if($item->publisher)
                                    <p>
                                        <span class="font-semibold text-[#1E1D57]">Publisher:</span>
                                        {{ $item->publisher }}
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>



        </div>
    </div>
</section>
<!-- Related Content -->
<section class="py-12 bg-[#F7F7F7]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl md:text-5xl text-[#1E1D57] font-bold mb-8">Related content</h2>

        @if($relatedItems->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-10 lg:gap-[128px]">
                @foreach($relatedItems as $relatedItem)
                    @php
                        $relatedCategory = $relatedItem->category->parent ?? $relatedItem->category;
                        $relatedCategoryColor = $relatedCategory->color ?? '#0E1C62';
                        if (!str_starts_with($relatedCategoryColor, '#')) {
                            $relatedCategoryColor = '#' . $relatedCategoryColor;
                        }
                        $hex = ltrim($relatedCategoryColor, '#');
                        if (strlen($hex) == 3) {
                            $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
                        }
                        $r = hexdec(substr($hex, 0, 2));
                        $g = hexdec(substr($hex, 2, 2));
                        $b = hexdec(substr($hex, 4, 2));
                        $r2 = min(255, $r + (255 - $r) * 0.3);
                        $g2 = min(255, $g + (255 - $g) * 0.3);
                        $b2 = min(255, $b + (255 - $b) * 0.3);
                        $relatedGradientEnd = sprintf('#%02x%02x%02x', $r2, $g2, $b2);
                        $relatedFirstFileId = $relatedItem->files->first() ? $relatedItem->files->first()->id : null;
                    @endphp
                    <div class="bg-white shadow-md p-4 rounded-[25px] flex flex-col justify-between">
                        <div class="text-white p-6 rounded-[15px] flex flex-col justify-between flex-grow shadow-[0_8px_15px_-4px_rgba(0,0,0,0.50)]" 
                             style="background: linear-gradient(to bottom right, {{ $relatedCategoryColor }}, {{ $relatedGradientEnd }});">
                            <div>
                                <h3 class="font-semibold text-lg leading-snug">
                                    <a href="{{ route('resources.show', $relatedItem->slug) }}" class="hover:underline">{{ $relatedItem->title }}</a>
                                </h3>
                                <p class="text-sm mt-2 opacity-90">{{ $relatedItem->publisher ?? 'No publisher' }}</p>
                            </div>
                            <div class="flex items-center gap-2 mt-12">
                                <span class="material-symbols-outlined text-xl">{{ $relatedCategory->icon ?? 'folder' }}</span>
                                <span class="text-lg">{{ $relatedCategory->name }}</span>
                            </div>
                        </div>
                        <div class="flex justify-between pt-6 pb-3 border-t border-white/30 text-black/80">
                            <a href="{{ route('resources.show', $relatedItem->slug) }}" class="cursor-pointer">
                                <i data-lucide="eye" class="w-5 h-5 text-[#ababab] hover:text-[#37C6F4] transition-colors duration-200"></i>
                            </a>
                            @php
                                $relatedIsBookmarked = in_array($relatedItem->id, $bookmarkedItemIds ?? []);
                            @endphp
                            <i data-lucide="bookmark" 
                               class="w-5 h-5 transition-colors duration-200 cursor-pointer {{ $relatedIsBookmarked ? 'fill-[#37C6F4] text-[#37C6F4]' : 'text-[#ababab] hover:text-[#37C6F4]' }}"
                               onclick="toggleBookmark({{ $relatedItem->id }}, this, false)"
                               data-item-id="{{ $relatedItem->id }}"></i>
                            @if($relatedItem->files->count() > 0)
                                <a href="{{ route('files.download', $relatedItem->files->first()->id) }}" class="cursor-pointer">
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
            <p class="text-gray-600 text-lg">No related content available.</p>
        @endif
        </div>
    </div>
</section>
<!-- wave section  -->
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




@push('scripts')
<script>
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
                // Modal update (not used on single page, but keeping for consistency)
                if (data.bookmarked) {
                    iconElement.classList.add("fill-[#37C6F4]", "text-[#37C6F4]");
                } else {
                    iconElement.classList.remove("fill-[#37C6F4]", "text-[#37C6F4]");
                }
            } else {
                // Single page or card icon update
                if (iconElement.id === 'singlePageBookmarkIcon') {
                    // Update single page bookmark button
                    const text = document.getElementById('singlePageBookmarkText');
                    if (data.bookmarked) {
                        iconElement.classList.add("fill-[#37C6F4]");
                        if (text) text.textContent = 'Remove from library';
                    } else {
                        iconElement.classList.remove("fill-[#37C6F4]");
                        if (text) text.textContent = 'Add to your library';
                    }
                } else {
                    // Update card icon (related items or resources page)
                    if (data.bookmarked) {
                        iconElement.classList.add("fill-[#37C6F4]", "text-[#37C6F4]");
                        iconElement.classList.remove("text-[#ababab]");
                    } else {
                        iconElement.classList.remove("fill-[#37C6F4]", "text-[#37C6F4]");
                        iconElement.classList.add("text-[#ababab]");
                    }
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

    document.addEventListener("DOMContentLoaded", () => {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    });
</script>
@endpush
@endsection