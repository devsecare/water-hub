<x-filament-panels::page>
    @push('styles')
    <style>
        /* Hide the default table completely */
        .fi-ta-content,
        .fi-ta-content > *,
        .fi-ta-table-wrapper,
        .fi-ta-table,
        table[wire\\:id],
        .fi-section:has(.fi-ta-table) {
            display: none !important;
        }
    </style>
    @endpush

    <div class="space-y-4">
        <!-- Search Bar -->
        <div class="rounded-xl bg-white dark:bg-gray-900 p-4 shadow-sm ring-1 ring-gray-950/5 dark:ring-white/10">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input
                    type="text"
                    wire:model.live.debounce.300ms="search"
                    placeholder="Search media by name or filename..."
                    class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                >
            </div>
        </div>

        <!-- Grid View -->
        @if($this->records->count() > 0)
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 2xl:grid-cols-8 gap-4">
                @foreach($this->records as $record)
                    <div
                        class="group relative bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-xl hover:border-primary-300 dark:hover:border-primary-700 transition-all duration-200 cursor-pointer"
                    >
                        <!-- Image/File Preview -->
                        <div class="aspect-square bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 flex items-center justify-center overflow-hidden relative">
                            @if($record->isImage() && $record->path)
                                <img
                                    src="{{ asset('storage/' . $record->path) }}"
                                    alt="{{ $record->alt_text ?? $record->name }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                    loading="lazy"
                                >
                            @elseif($record->isPdf())
                                <div class="flex flex-col items-center justify-center p-6 text-red-500">
                                    <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/>
                                    </svg>
                                    <span class="text-sm font-medium mt-3">PDF</span>
                                </div>
                            @elseif($record->isVideo())
                                <div class="flex flex-col items-center justify-center p-6 text-blue-500">
                                    <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                    <span class="text-sm font-medium mt-3">Video</span>
                                </div>
                            @else
                                <div class="flex flex-col items-center justify-center p-6 text-gray-400 dark:text-gray-500">
                                    <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/>
                                    </svg>
                                    <span class="text-sm font-medium mt-3">File</span>
                                </div>
                            @endif

                            <!-- Hover Overlay -->
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition-all duration-200 flex items-center justify-center opacity-0 group-hover:opacity-100">
                                <div class="flex gap-2">
                                    <a
                                        href="{{ route('filament.admin.resources.media-libraries.edit', $record) }}"
                                        class="px-4 py-2 bg-white text-gray-900 rounded-md text-sm font-medium hover:bg-gray-100 transition-colors shadow-lg"
                                        onclick="event.stopPropagation()"
                                    >
                                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Edit
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- File Info -->
                        <div class="p-3 bg-white dark:bg-gray-800 border-t border-gray-100 dark:border-gray-700">
                            <div class="text-sm font-semibold text-gray-900 dark:text-gray-100 truncate mb-1" title="{{ $record->name }}">
                                {{ $record->name }}
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-gray-500 dark:text-gray-400">
                                    {{ number_format($record->size / 1024, 1) }} KB
                                </span>
                                <span class="text-xs px-2 py-0.5 rounded-full font-medium
                                    @if($record->file_type === 'image') bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400
                                    @elseif($record->file_type === 'video') bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400
                                    @elseif($record->file_type === 'pdf') bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400
                                    @else bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300
                                    @endif">
                                    {{ ucfirst($record->file_type) }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($this->records->hasPages())
                <div class="mt-6 flex justify-center">
                    <div class="fi-pagination">
                        {{ $this->records->links() }}
                    </div>
                </div>
            @endif
        @else
            <!-- Empty State -->
            <div class="rounded-xl bg-white dark:bg-gray-900 p-12 shadow-sm ring-1 ring-gray-950/5 dark:ring-white/10 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <h3 class="mt-4 text-sm font-semibold text-gray-900 dark:text-white">No media found</h3>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    @if($this->search)
                        Try adjusting your search terms.
                    @else
                        Get started by uploading your first media file.
                    @endif
                </p>
            </div>
        @endif
    </div>

    @push('scripts')
    <script>
        // Hide any default table content
        document.addEventListener('DOMContentLoaded', function() {
            // Hide table wrapper
            const tableContent = document.querySelector('.fi-ta-content');
            if (tableContent) {
                tableContent.style.display = 'none';
            }
            // Hide any table elements
            const tables = document.querySelectorAll('.fi-ta-table-wrapper, .fi-ta-table, table[wire\\:id]');
            tables.forEach(function(table) {
                table.style.display = 'none';
            });
        });
    </script>
    @endpush
</x-filament-panels::page>

