<div class="filter-top pb-6">
    <ul class="flex flex-col gap-3 text-[#1E1D57] font-bold">
        <li>
            <a href="javascript:void(0)" data-filter="all" class="filter-link flex gap-2"><span class="material-symbols-outlined">book_4</span>All content
            </a>
        </li>
        <li>
            <a href="javascript:void(0)" data-filter="case_study" class="filter-link flex gap-2"><span class="material-symbols-outlined">emoji_objects</span>All case studies
            </a>
        </li>
    </ul>
</div>
<div class="filter-middle py-6 border-t border-b border-[#D1D1D1]">
    <ul class="space-y-4 text-[#1E1D57] font-semibold">
        @foreach($categories as $category)
            @if($category->children->count() > 0)
                <li class="category-with-sub border border-[#1E1D57] rounded-[25px] px-3 py-2 bg-white">
                    <a href="javascript:void(0)" data-category-id="{{ $category->id }}" class="filter-link flex gap-2">
                        @if($category->icon)
                            <span class="material-symbols-outlined">{{ $category->icon }}</span>
                        @else
                            <span class="material-symbols-outlined">folder</span>
                        @endif
                        {{ $category->name }}
                        <span class="material-symbols-outlined arrow-right absolute top-2 right-1">keyboard_arrow_right</span>
                    </a>
                    <ul class="sub-cat space-y-1">
                        @foreach($category->children as $child)
                            <li><a href="javascript:void(0)" data-category-id="{{ $child->id }}" class="filter-link text-[#868686]">{{ $child->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
            @else
                <li class="border border-[#1E1D57] rounded-[25px] px-3 py-2 bg-white">
                    <a href="javascript:void(0)" data-category-id="{{ $category->id }}" class="filter-link flex gap-2">
                        @if($category->icon)
                            <span class="material-symbols-outlined">{{ $category->icon }}</span>
                        @else
                            <span class="material-symbols-outlined">folder</span>
                        @endif
                        {{ $category->name }}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</div>
<div class="filter-btm">
    <div class="w-full mt-6">
        <label class="block text-lg font-semibold text-[#000000] mb-3">Search</label>
        <div class="relative">
            <input type="text" class="resources-search-input w-full bg-white shadow-sm rounded-full py-3 pl-4 pr-10 text-gray-700 
        placeholder-gray-400 focus:ring-0 focus:outline-none" placeholder="Search…">

            <!-- Search Icon -->
            <span class="absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18.095 18.095">
                    <path
                        d="M16.681,18.1h0l-5.145-5.145a7.2,7.2,0,1,1,1.414-1.414L18.1,16.681l-1.413,1.413ZM7.2,2a5.2,5.2,0,1,0,5.2,5.2A5.206,5.206,0,0,0,7.2,2Z"
                        fill="currentColor"></path>
                </svg>
            </span>
        </div>
    </div>
</div>