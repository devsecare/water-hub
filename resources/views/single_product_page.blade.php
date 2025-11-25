@extends('layouts.frontend')

@section('title', $item->title . ' - PPP Water Hub')

@section('content')

<section class="bg-[#F2F2F2] px-6 lg:px-16">
    <div class="max-w-7xl mx-auto  py-16">

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
            <div class="w-full lg:max-w-[350px] flex flex-col">

                <!-- Blue Card -->
                @php
                    $startColor = '#070648';
                    $endColor = $item->category ? $item->category->color : '#2CBFA0';
                @endphp
                <div
                    class="text-white rounded-lg shadow-xl p-6 flex flex-col lg:w-[350px] justify-between h-full"
                    style="background: linear-gradient(to bottom, {{ $startColor }}, {{ $endColor }});">
                    <div>
                        <h1 class="text-3xl font-bold leading-tight mb-6">
                            {{ $item->title }}
                        </h1>
                        @if($item->author || $item->publisher)
                        <p class="text-sm opacity-90 mt-10">{{ $item->author ?? $item->publisher }}</p>
                        @endif
                    </div>

                    <div class="flex items-center space-x-2 mt-20">
                        <i data-lucide="{{ $item->type_icon }}" class="w-6 h-8"></i>
                        <span class="text-[18px] font-semibold">{{ $item->type_label }}</span>
                    </div>
                </div>

                <!-- Save / Download -->
                <div class="flex justify-between items-center mt-6 border-t pt-4 text-sm text-gray-700">

                    <button onclick="toggleBookmark({{ $item->id }}, this)" class="group flex items-center transition-colors duration-200 {{ $isBookmarked ? 'text-[#37C6F4]' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                            class="fill-[#1e1d57] hover:fill-[#37C6F4] transition {{ $isBookmarked ? 'fill-[#37C6F4]' : '' }}">
                            <path
                                d="M5,29V5.889a2.785,2.785,0,0,1,.851-2.037A2.776,2.776,0,0,1,7.884,3H22.307a2.776,2.776,0,0,1,2.034.852,2.785,2.785,0,0,1,.851,2.037V29L15.1,24.667Zm2.884-4.406L15.1,21.489l7.211,3.106V5.889H7.884Z"
                                transform="translate(0.904)" />
                        </svg>


                        <span
                            class="sm:ml-2 text-[#000000] text-[16px] group-hover:text-[#37C6F4] transition-colors duration-200 {{ $isBookmarked ? 'text-[#37C6F4]' : '' }}">
                            Add to your library
                        </span>
                    </button>



                    @if($item->featuredImage)
                    <a href="{{ route('media.download', $item->featuredImage) }}" class="group flex items-center transition-colors duration-200">
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
                    <div class="md:col-span-2 lg:max-w-[60%]  md:max-w-1/2 text-[#000000]">
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
                    @if($item->files->count() > 0 || ($item->author || $item->publisher))
                    <div class="md:col-span-1">
                        @if($item->files->count() > 0)
                        <h3 class=" font-semibold text-[#37C6F4] text-2xl mb-4 max-[1100px]:text-lg max-[1200px]:text-xl">
                            Additional resources
                        </h3>

                        @php
                            // Categorize files by type
                            $documentFiles = $item->files->filter(function($file) {
                                $mime = $file->mime_type ?? '';
                                return str_starts_with($mime, 'application/pdf') ||
                                       str_starts_with($mime, 'application/msword') ||
                                       str_starts_with($mime, 'application/vnd.openxmlformats-officedocument') ||
                                       str_contains($mime, 'document') ||
                                       (!str_starts_with($mime, 'video/') && !str_starts_with($mime, 'audio/') && $mime !== '');
                            });

                            $videoFiles = $item->files->filter(function($file) {
                                return str_starts_with($file->mime_type ?? '', 'video/');
                            });

                            $audioFiles = $item->files->filter(function($file) {
                                return str_starts_with($file->mime_type ?? '', 'audio/');
                            });
                        @endphp

                        <ul class="space-y-3  text-[#000000] text-[16px]">
                            @if($documentFiles->count() > 0)
                            <li class="flex items-center gap-2 cursor-pointer">
                                <svg id="summary-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path id="Path_406" data-name="Path 406"
                                        d="M5,4V4ZM7,14h3.5a5.806,5.806,0,0,1,1.3-2.01H7v2Zm0,4h3.18a5.781,5.781,0,0,1-.16-1,6.677,6.677,0,0,1,.01-1H7v2ZM5,22a1.926,1.926,0,0,1-1.41-.59A1.926,1.926,0,0,1,3,20V4a1.926,1.926,0,0,1,.59-1.41A1.926,1.926,0,0,1,5,2h8l6,6v2.5a5.581,5.581,0,0,0-.98-.31,8.828,8.828,0,0,0-1.03-.16V9h-5V4h-7V20h6.03a8.082,8.082,0,0,0,.9,1.11,5.876,5.876,0,0,0,1.1.89Zm11.5-3a2.517,2.517,0,0,0,1.78-4.29,2.517,2.517,0,0,0-3.56,3.56A2.415,2.415,0,0,0,16.5,19Zm5.1,4-2.7-2.7a4.237,4.237,0,0,1-1.14.53,4.463,4.463,0,0,1-1.26.18,4.371,4.371,0,0,1-3.19-1.31A4.316,4.316,0,0,1,12,16.51a4.371,4.371,0,0,1,1.31-3.19,4.316,4.316,0,0,1,3.19-1.31,4.371,4.371,0,0,1,3.19,1.31A4.316,4.316,0,0,1,21,16.51a4.463,4.463,0,0,1-.18,1.26,3.954,3.954,0,0,1-.53,1.14l2.7,2.7-1.4,1.4Z"
                                        fill="#1e1d57" />
                                    <rect id="Rectangle_61" data-name="Rectangle 61" width="24" height="24"
                                        fill="none" />
                                </svg>
                                <a href="{{ route('files.download', $documentFiles->first()) }}" class="hover:text-[#37C6F4] transition-colors">
                                    View summary file
                                </a>
                            </li>
                            @endif

                            @if($videoFiles->count() > 0)
                            <li class="flex items-center gap-2 cursor-pointer">
                                <svg id="video-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path id="Path_408" data-name="Path 408"
                                        d="M11.5,14.5l7-4.5-7-4.5ZM8,18a2.015,2.015,0,0,1-2-2V4a1.926,1.926,0,0,1,.59-1.41A1.926,1.926,0,0,1,8,2H20a1.926,1.926,0,0,1,1.41.59A1.926,1.926,0,0,1,22,4V16a2.015,2.015,0,0,1-2,2Zm0-2H20V4H8ZM4,22a1.926,1.926,0,0,1-1.41-.59A1.926,1.926,0,0,1,2,20V6H4V20H18v2ZM8,4V4Z"
                                        fill="#1e1d57" />
                                    <rect id="Rectangle_63" data-name="Rectangle 63" width="24" height="24"
                                        fill="none" />
                                </svg>
                                <a href="{{ route('files.download', $videoFiles->first()) }}" class="hover:text-[#37C6F4] transition-colors">
                                    Play video summary
                                </a>
                            </li>
                            @endif

                            @if($audioFiles->count() > 0)
                            <li class="flex items-center gap-2 cursor-pointer">
                                <svg id="podcast-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path id="Path_403" data-name="Path 403"
                                        d="M11,22V13.72a2.251,2.251,0,0,1-.73-.71A1.805,1.805,0,0,1,9.99,12a1.994,1.994,0,0,1,3.41-1.41A1.926,1.926,0,0,1,13.99,12a1.9,1.9,0,0,1-.28,1.03,2.038,2.038,0,0,1-.73.7v8.28h-2ZM5.1,19.25a10.436,10.436,0,0,1-2.26-3.24A9.639,9.639,0,0,1,2,12a9.508,9.508,0,0,1,.79-3.9A9.989,9.989,0,0,1,8.11,2.78a9.678,9.678,0,0,1,3.9-.79,9.678,9.678,0,0,1,3.9.79A9.989,9.989,0,0,1,21.23,8.1a9.678,9.678,0,0,1,.79,3.9,9.936,9.936,0,0,1-.84,4.03,10.054,10.054,0,0,1-2.26,3.23l-1.4-1.4a8.09,8.09,0,0,0,1.83-2.61,7.874,7.874,0,0,0,.68-3.24A7.742,7.742,0,0,0,17.7,6.33,7.726,7.726,0,0,0,12.02,4,7.726,7.726,0,0,0,6.34,6.33a7.726,7.726,0,0,0-2.33,5.68,7.794,7.794,0,0,0,.68,3.23,8.058,8.058,0,0,0,1.85,2.6L5.11,19.27Zm2.83-2.83a6.311,6.311,0,0,1-1.4-1.96A5.813,5.813,0,0,1,6,12,5.773,5.773,0,0,1,7.75,7.75,5.773,5.773,0,0,1,12,6a5.773,5.773,0,0,1,4.25,1.75A5.773,5.773,0,0,1,18,12a6.032,6.032,0,0,1-1.93,4.43L14.64,15a4.141,4.141,0,0,0,.99-1.35,3.976,3.976,0,0,0-.82-4.48,3.984,3.984,0,0,0-5.66,0,3.992,3.992,0,0,0-.82,4.49A4.322,4.322,0,0,0,9.32,15L7.89,16.43Z"
                                        fill="#1e1d57" />
                                    <rect id="Rectangle_58" data-name="Rectangle 58" width="24" height="24"
                                        fill="none" />
                                </svg>
                                <a href="{{ route('files.download', $audioFiles->first()) }}" class="hover:text-[#37C6F4] transition-colors">
                                    Play audio summary
                                </a>
                            </li>
                            @endif
                        </ul>

                        <div class="mt-8 text-lg text-[#37C6F4] space-y-2">
                            @php
                                $firstFile = $item->files->first();
                                $fileExtension = null;

                                // Priority 1: Get extension from original_name
                                if ($firstFile->original_name) {
                                    $ext = pathinfo($firstFile->original_name, PATHINFO_EXTENSION);
                                    if (!empty($ext)) {
                                        $fileExtension = strtoupper($ext);
                                    }
                                }

                                // Priority 2: Get extension from file path
                                if (empty($fileExtension) && $firstFile->path) {
                                    $ext = pathinfo($firstFile->path, PATHINFO_EXTENSION);
                                    if (!empty($ext)) {
                                        $fileExtension = strtoupper($ext);
                                    }

                                    // Fallback: Check if path contains common extensions
                                    if (empty($fileExtension)) {
                                        $path = strtolower($firstFile->path);
                                        $commonExtensions = ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'mp4', 'mov', 'avi', 'mp3', 'wav', 'jpg', 'jpeg', 'png', 'gif'];
                                        foreach ($commonExtensions as $ext) {
                                            if (str_contains($path, '.' . $ext)) {
                                                $fileExtension = strtoupper($ext);
                                                break;
                                            }
                                        }
                                    }
                                }

                                // Priority 3: Use mime_type to determine file type (only if not generic octet-stream)
                                if (empty($fileExtension) && $firstFile->mime_type && $firstFile->mime_type !== 'application/octet-stream') {
                                    $mimeType = $firstFile->mime_type;
                                    $mimeToExtension = [
                                        'application/pdf' => 'PDF',
                                        'application/msword' => 'DOC',
                                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'DOCX',
                                        'application/vnd.ms-excel' => 'XLS',
                                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'XLSX',
                                        'video/mp4' => 'MP4',
                                        'video/quicktime' => 'MOV',
                                        'video/x-msvideo' => 'AVI',
                                        'audio/mpeg' => 'MP3',
                                        'audio/wav' => 'WAV',
                                        'audio/mp4' => 'M4A',
                                        'image/jpeg' => 'JPG',
                                        'image/png' => 'PNG',
                                        'image/gif' => 'GIF',
                                    ];

                                    if (isset($mimeToExtension[$mimeType])) {
                                        $fileExtension = $mimeToExtension[$mimeType];
                                    }
                                }
                            @endphp
                            <p><span class="font-semibold text-[#1E1D57]">File type:</span> {{ $fileExtension ?: 'N/A' }}</p>
                        </div>
                        @endif

                        @if($item->author || $item->publisher)
                        <div class="mt-8 text-lg text-[#37C6F4] space-y-2">
                            <p>
                                <span class="font-semibold text-[#1E1D57]">Author:</span>
                                {{ $item->author ?? $item->publisher }}
                            </p>
                        </div>
                        @endif
                    </div>
                    @endif
                </div>
            </div>



        </div>
    </div>
</section>
<!-- Related Content -->
@if($relatedItems->count() > 0)
<section class="py-12 bg-[#F7F7F7] px-6 lg:px-16">
    <div class="max-w-7xl mx-auto ">
        <h2 class="text-4xl md:text-5xl text-[#1E1D57] font-bold mb-8">Related content</h2>

        <div  class="grid grid-cols-1  sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-10 lg:gap-[100px]">
            @foreach($relatedItems as $relatedItem)
            @php
                $startColor = '#070648';
                $endColor = $relatedItem['category_color'] ?? '#2CBFA0';
            @endphp
            <div class="bg-white shadow-md p-4 rounded-[25px] flex flex-col justify-between">
                <div
                    class="text-white p-6 rounded-[15px] flex flex-col justify-between flex-grow shadow-[0_8px_15px_-4px_rgba(0,0,0,0.50)]"
                    style="background: linear-gradient(to bottom right, {{ $startColor }}, {{ $endColor }});">
                    <div>
                        <h3 class="font-semibold text-lg leading-snug">{{ $relatedItem['title'] }}</h3>
                                    <p class="text-sm mt-2 opacity-90">{{ $relatedItem['publisher'] ?? 'N/A' }}</p>
                    </div>
                    <div class="flex items-center space-x-2 mt-12">
                        <i data-lucide="{{ $relatedItem['icon'] }}" class="w-6 h-6"></i>
                        <span class="text-lg">{{ $relatedItem['type'] }}</span>
                    </div>
                </div>
                <div class="flex justify-between pt-6 pb-3  border-t border-white/30 text-black/80">
                    <a href="{{ route('resources.show', $relatedItem['slug']) }}" class="fill-[#ababab] hover:fill-[#37C6F4] transition-colors duration-200 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path
                                d="M6,23H3a1.926,1.926,0,0,1-1.41-.59A1.926,1.926,0,0,1,1,21V18H3v3H6Zm12,0V21h3V18h2v3a2.015,2.015,0,0,1-2,2Zm-6-4.5a9,9,0,0,1-5.44-1.78A10.135,10.135,0,0,1,3,11.99,10.251,10.251,0,0,1,6.56,7.26,8.977,8.977,0,0,1,12,5.48a9,9,0,0,1,5.44,1.78A10.185,10.185,0,0,1,21,11.99a10.251,10.251,0,0,1-3.56,4.73A9.063,9.063,0,0,1,12,18.5Zm0-2a7.189,7.189,0,0,0,4.03-1.2,7.74,7.74,0,0,0,2.8-3.3,7.74,7.74,0,0,0-2.8-3.3,7.367,7.367,0,0,0-8.06,0A7.74,7.74,0,0,0,5.17,12a7.74,7.74,0,0,0,2.8,3.3A7.189,7.189,0,0,0,12,16.5Zm0-1a3.517,3.517,0,0,0,3.51-3.51A3.517,3.517,0,0,0,12,8.48a3.517,3.517,0,0,0-3.51,3.51A3.517,3.517,0,0,0,12,15.5Zm0-2a1.442,1.442,0,0,1-1.06-.44A1.5,1.5,0,1,1,12,13.5ZM1,6V3a1.926,1.926,0,0,1,.59-1.41A1.926,1.926,0,0,1,3,1H6V3H3V6ZM21,6V3H18V1h3a1.926,1.926,0,0,1,1.41.59A1.926,1.926,0,0,1,23,3V6Z" />
                            <rect width="24" height="24" fill="none" />
                        </svg>
                    </a>
                    <a href="{{ route('resources.show', $relatedItem['slug']) }}" class="fill-[#ababab] hover:fill-[#37C6F4] transition-colors duration-200 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path
                                d="M12,16,7,11,8.4,9.55l2.6,2.6V4h2v8.15l2.6-2.6L17,11l-5,5ZM6,20a2.015,2.015,0,0,1-2-2V15H6v3H18V15h2v3a2.015,2.015,0,0,1-2,2Z" />
                            <rect width="24" height="24" fill="none" />
                        </svg>
                    </a>
                    <button onclick="toggleBookmark({{ $relatedItem['id'] }}, this)" class="fill-[#ababab] hover:fill-[#37C6F4] transition-colors duration-200 cursor-pointer {{ $relatedItem['is_bookmarked'] ? 'fill-[#37C6F4]' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path
                                d="M5,21V5a1.926,1.926,0,0,1,.59-1.41A1.926,1.926,0,0,1,7,3H17a1.926,1.926,0,0,1,1.41.59A1.926,1.926,0,0,1,19,5V21l-7-3Zm2-3.05,5-2.15,5,2.15V5H7ZM7,5H7Z" />
                            <rect width="24" height="24" fill="none" />
                        </svg>
                    </button>
                    <a href="{{ route('resources.show', $relatedItem['slug']) }}" class="fill-[#ababab] hover:fill-[#37C6F4] transition-colors duration-200 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path
                                d="M17,22a3,3,0,0,1-3.01-3.01c0-.1.03-.33.08-.7l-7.03-4.1a2.967,2.967,0,0,1-2.06.8,2.9,2.9,0,0,1-2.13-.88,3.018,3.018,0,0,1,0-4.26,2.906,2.906,0,0,1,2.13-.88,2.967,2.967,0,0,1,2.06.8l7.03-4.1a2.214,2.214,0,0,1-.06-.34C14,5.22,14,5.1,14,4.97a2.9,2.9,0,0,1,.88-2.13,3.018,3.018,0,0,1,4.26,0,2.883,2.883,0,0,1,.88,2.13,2.883,2.883,0,0,1-.88,2.13,2.883,2.883,0,0,1-2.13.88,2.967,2.967,0,0,1-2.06-.8l-7.03,4.1a2.214,2.214,0,0,1,.06.34c.01.11.01.23.01.36s0,.25-.01.36a2.214,2.214,0,0,1-.06.34l7.03,4.1a2.967,2.967,0,0,1,2.06-.8,3.012,3.012,0,0,1,2.13,5.14,2.906,2.906,0,0,1-2.13.88Zm0-2a.99.99,0,1,0-.71-.29A.973.973,0,0,0,17,20ZM5,13a.99.99,0,1,0-.71-.29A.973.973,0,0,0,5,13ZM17,6a1,1,0,0,0,.71-1.71,1,1,0,0,0-1.42,1.42A.973.973,0,0,0,17,6Z" />
                            <rect width="24" height="24" fill="none" />
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
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
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    // Initialize Lucide icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    // Bookmark functionality
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
                    const svg = element.querySelector('svg');
                    if (svg) {
                        svg.classList.add('fill-[#37C6F4]');
                        svg.classList.remove('fill-[#1e1d57]');
                    }
                } else if (data.status === 'removed') {
                    element.classList.remove('text-[#37C6F4]');
                    element.classList.add('text-[#ababab]');
                    const svg = element.querySelector('svg');
                    if (svg) {
                        svg.classList.remove('fill-[#37C6F4]');
                        svg.classList.add('fill-[#1e1d57]');
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
</script>
@endpush
@endsection
