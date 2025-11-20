@extends('layouts.frontend')

@section('title', 'Water PPP Resources - PPP Water Hub')

@push('styles')
<script src="https://unpkg.com/lucide@latest"></script>
@endpush

@section('content')
<!-- ✅ HERO -->
<section class="bg-gradient-to-r from-[#070648] to-[#2CBE9D] text-white px-6 lg:px-16">
    <div class="max-w-7xl mx-auto  py-20 sm:py-24 lg:py-28">
        <p class="text-lg text-[#37C6F4] font-semibold mb-2">WATER PPP RESOURCES</p>
        <h1 class="text-4xl font-appetite sm:text-4xl font-extrabold leading-none max-w-xl">
            Everything You Need To Identify, Prepare, Implement And Manage Your PPP Project
        </h1>
    </div>
</section>

<!-- ✅ INTRO -->
<section class="px-6 lg:px-16 py-12 sm:py-16 lg:py-20">
    <section class="max-w-7xl mx-auto ">
        <p class="text-[19px] sm:text-xl md:text-lg max-w-2xl">
            Browse by category to find the guidance you need – from foundational PPP concepts to contract management and
            monitoring. Bookmark resources to save and view them in your account, or download documents, audio, and
            video
            files to access offline anytime.
        </p>
    </section>
</section>

<!-- ✅ MAIN -->
<section class="bg-[#f2f2f2]  lg:px-16 py-12 sm:py-16 lg:py-20">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row min-h-screen">
        <!--  mobile Sidebar -->
        <div class="mob-search-filters relative md:hidden z-10">
            <div class="filter-main-tab py-8 pb-2">
                <button
                    class="search-filter-open-close bg-[#1E1D57] flex text-[#fff] gap-4 py-3 px-6 rounded-r-[25px] w-full max-w-[300px] justify-between items-center">
                    Search and Filter results
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="16.403" height="16.403"
                            viewBox="0 0 16.403 16.403">
                            <path id="discover_tune_24dp_5F6368_FILL0_wght400_GRAD0_opsz24_1_"
                                data-name="discover_tune_24dp_5F6368_FILL0_wght400_GRAD0_opsz24 (1)"
                                d="M129.113-834.532v-1.823h2.734V-840h1.823v3.645H136.4v1.823Zm2.734,10.936v-9.113h1.823v9.113Zm-9.113,0v-3.645H120v-1.823h7.29v1.823h-2.734v3.645Zm0-7.29V-840h1.823v9.113Z"
                                transform="translate(-120 840)" fill="#fff" />
                        </svg>
                    </span>
                </button>
            </div>
            <div  class="mobile-filter-list absolute top-full bg-white py-6 px-6 rounded-r-[24px] -left-100 transition-all duration-300 w-full max-w-[300px]">
                
                @include('helpers.resources-filter')


            </div>
        </div>
        <!-- side bar desktop  -->
        <aside class="w-full md:w-64 lg:w-[20rem] p-6 lg:p-0 hidden md:block">
        @include('helpers.resources-filter')
        </aside>

        <!-- ✅ MAIN CONTENT -->
        <main class="flex-1 p-6">
            <!-- Cards -->
            <div id="card-container" class="grid grid-cols-1 lg:w-[100%] sm:grid-cols-2 lg:grid-cols-3 gap-6"></div>
            <!-- Pagination -->
            <div class="flex justify-center mt-6 space-x-2">
                <button onclick="prevPage()"
                    class="text-[#ababab] hover:text-[#1E1D57] transition-colors duration-300 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
                        fill="currentColor">
                        <g transform="translate(-781 -2356)">
                            <rect width="40" height="40" transform="translate(781 2356)" fill="none" />
                            <path
                                d="M17.617,18.763l5.159,5.159-2.345,2.4L12.894,18.78l7.537-7.537,2.345,2.4L17.617,18.8Zm1.139,16.749a16.21,16.21,0,0,0,6.532-1.323A16.731,16.731,0,0,0,34.2,25.279a16.21,16.21,0,0,0,1.323-6.532A16.21,16.21,0,0,0,34.2,12.214,16.731,16.731,0,0,0,25.289,3.3,16.21,16.21,0,0,0,18.756,1.98,16.21,16.21,0,0,0,12.224,3.3a16.731,16.731,0,0,0-8.911,8.911A16.21,16.21,0,0,0,1.99,18.746a16.21,16.21,0,0,0,1.323,6.532,16.731,16.731,0,0,0,8.911,8.911A16.21,16.21,0,0,0,18.756,35.512Zm0-3.35a12.968,12.968,0,0,1-9.514-3.9,12.941,12.941,0,0,1-3.9-9.514,12.941,12.941,0,0,1,3.9-9.514,12.941,12.941,0,0,1,9.514-3.9,12.941,12.941,0,0,1,9.514,3.9,12.941,12.941,0,0,1,3.9,9.514,12.941,12.941,0,0,1-3.9,9.514A12.941,12.941,0,0,1,18.756,32.163Z"
                                transform="translate(781.744 2356.738)" />
                        </g>
                    </svg>
                </button>

                <button id="btn1" class="px-3 py-1 text-[20px] text-[#1E1D57] hover:text-[#37C6F4]   rounded"
                    onclick="changePage(1)">1</button>
                <button id="btn2" class="px-3 py-1 text-[20px] text-[#1E1D57] hover:text-[#37C6F4] rounded"
                    onclick="changePage(2)">2</button>
                <button id="btn3" class="px-3 py-1 text-[20px] text-[#1E1D57] hover:text-[#37C6F4] rounded"
                    onclick="changePage(3)">3</button>
                <button onclick="nextPage()" class="text-[#ababab] hover:text-[#1E1D57] transition-colors duration-300">
                    <svg class="-rotate-180" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                        viewBox="0 0 40 40" fill="currentColor">
                        <g transform="translate(-781 -2356)">
                            <rect width="40" height="40" transform="translate(781 2356)" fill="none" />
                            <path
                                d="M17.617,18.763l5.159,5.159-2.345,2.4L12.894,18.78l7.537-7.537,2.345,2.4L17.617,18.8Zm1.139,16.749a16.21,16.21,0,0,0,6.532-1.323A16.731,16.731,0,0,0,34.2,25.279a16.21,16.21,0,0,0,1.323-6.532A16.21,16.21,0,0,0,34.2,12.214,16.731,16.731,0,0,0,25.289,3.3,16.21,16.21,0,0,0,18.756,1.98,16.21,16.21,0,0,0,12.224,3.3a16.731,16.731,0,0,0-8.911,8.911A16.21,16.21,0,0,0,1.99,18.746a16.21,16.21,0,0,0,1.323,6.532,16.731,16.731,0,0,0,8.911,8.911A16.21,16.21,0,0,0,18.756,35.512Zm0-3.35a12.968,12.968,0,0,1-9.514-3.9,12.941,12.941,0,0,1-3.9-9.514,12.941,12.941,0,0,1,3.9-9.514,12.941,12.941,0,0,1,9.514-3.9,12.941,12.941,0,0,1,9.514,3.9,12.941,12.941,0,0,1,3.9,9.514,12.941,12.941,0,0,1-3.9,9.514A12.941,12.941,0,0,1,18.756,32.163Z"
                                transform="translate(781.744 2356.738)" />
                        </g>
                    </svg>
                </button>

            </div>
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
                        <button class="flex items-center gap-2"><i data-lucide="bookmark" class="w-4 h-4"></i>Add to
                            your library</button>
                        <button class="flex items-center gap-2"><i data-lucide="download" class="w-4 h-4"></i>Download
                            file</button>
                        <button class="flex items-center gap-2"><i data-lucide="share-2"
                                class="w-4 h-4"></i>Share</button>
                    </div>
                    <button class="flex items-center gap-2 font-semibold underline"><i data-lucide="more-horizontal"
                            class="w-4 h-4"></i>More options…</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- waves  -->
<div class=" bottom-0 left-0 right-0 bg-[#f2f2f2]">
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


<div class="overlay-btm"></div>
@endsection

@push('scripts')
<!-- <script>
    const gradients = [
        "bg-gradient-to-br from-[#0E1C62] to-[#2CBFA0]",
        "bg-gradient-to-br from-[#0E4473] to-[#25B3D8]",
        "bg-gradient-to-br from-[#44107A] to-[#FF1361]",
        "bg-gradient-to-br from-[#2A0845] to-[#6441A5]",
        "bg-gradient-to-br from-[#16222A] to-[#3A6073]",
        "bg-gradient-to-br from-[#1E3C72] to-[#2A5298]",
        "bg-gradient-to-br from-[#134E5E] to-[#71B280]",
        "bg-gradient-to-br from-[#373B44] to-[#4286f4]",
        "bg-gradient-to-br from-[#20002c] to-[#cbb4d4]"
    ];

    const cardsData = Array.from({ length: 36 }, (_, i) => ({
        title: `Title of guide or document can go here over multiple line here`,
        publisher: "Publisher name here",
        type: ["Guide", "Video", "Podcast", "Case Study"][i % 4],
        gradient: gradients[i % gradients.length],
        icon: ["book", "video", "mic", "lightbulb"][i % 4]
    }));

    const cardsPerPage = 12;
    let currentPage = 1;

    function renderCards() {
        const container = document.getElementById("card-container");
        container.innerHTML = "";
        const start = (currentPage - 1) * cardsPerPage;
        const end = start + cardsPerPage;
        const visibleCards = cardsData.slice(start, end);

        visibleCards.forEach((card) => {
            container.innerHTML += `
                <div class="bg-white shadow-md p-4 rounded-[25px] flex flex-col justify-between">
                    <div class="${card.gradient} text-white p-6 rounded-[15px] flex flex-col justify-between flex-grow shadow-[0_8px_15px_-4px_rgba(0,0,0,0.50)]">
                        <div>
                            <h3 class="font-semibold text-lg leading-snug">${card.title}</h3>
                            <p class="text-sm mt-2 opacity-90">${card.publisher}</p>
                        </div>
                        <div class="flex items-center space-x-2 mt-12">
                            <i data-lucide="${card.icon}" class="w-4 h-4"></i>
                            <span class="text-sm">${card.type}</span>
                        </div>
                    </div>
                    <div class="flex justify-between pt-6 pb-3 border-t border-white/30 text-black/80">
                        <i data-lucide="maximize-2" class="w-4 h-4 cursor-pointer" onclick="openModal('${card.title}', '${card.publisher}', '${card.type}', '${card.gradient}', '${card.icon}')"></i>
                        <i data-lucide="download" class="w-4 h-4 cursor-pointer"></i>
                        <i data-lucide="bookmark" class="w-4 h-4 cursor-pointer"></i>
                        <i data-lucide="share-2" class="w-4 h-4 cursor-pointer"></i>
                        
                    </div>
                </div>`;
        });

        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }

    function changePage(page) {
        currentPage = page;
        renderCards();
        document.querySelectorAll("button[id^='btn']").forEach((btn) => {
            btn.classList.remove("bg-blue-600", "text-white");
            btn.classList.add("bg-gray-200");
        });
        const activeBtn = document.getElementById(`btn${page}`);
        if (activeBtn) {
            activeBtn.classList.add("bg-blue-600", "text-white");
            activeBtn.classList.remove("bg-gray-200");
        }
    }

    function openModal(title, publisher, type, gradient, icon) {
        const modal = document.getElementById("productModal");
        modal.classList.remove("hidden");
        modal.classList.add("flex");
        document.getElementById("modalTitle").innerText = title;
        document.getElementById("modalPublisher").innerText = publisher;
        document.getElementById("modalType").innerText = type;
        const colorBox = document.getElementById("modalColorBox");
        colorBox.className = `${gradient} p-8 text-white w-full md:w-1/2 flex flex-col justify-between min-h-[360px]`;
        document.getElementById("modalIcon").setAttribute("data-lucide", icon);
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }

    function closeModal() {
        const modal = document.getElementById("productModal");
        modal.classList.add("hidden");
        modal.classList.remove("flex");
    }

    function toggleMenu(id) {
        const menu = document.getElementById(id);
        const icon = document.getElementById(`icon-${id}`);
        if (menu.classList.contains("hidden")) {
            menu.classList.remove("hidden");
            icon.classList.add("rotate-180");
        } else {
            menu.classList.add("hidden");
            icon.classList.remove("rotate-180");
        }
    }

    document.addEventListener("DOMContentLoaded", () => {
        renderCards();
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    });
</script> -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleBtn = document.querySelector(".search-filter-open-close");
        const filterList = document.querySelector(".mobile-filter-list");
        const filterOverlay = document.querySelector(".overlay-btm");
        const body = document.body;
        const mobFilters = document.querySelector(".mob-search-filters");
    const categoryLinks = document.querySelectorAll(".category-with-sub > a");
        const HIDDEN_CLASS = "-left-100";
        const VISIBLE_CLASS = "left-0";

        if (toggleBtn && filterList && filterOverlay && body) {
            toggleBtn.addEventListener("click", () => {
                const isHidden = filterList.classList.toggle(HIDDEN_CLASS);
                filterList.classList.toggle(VISIBLE_CLASS, !isHidden);
                filterOverlay.classList.toggle("active", !isHidden);
                body.classList.toggle("no-scroll", !isHidden);
                if (!isHidden && mobFilters) {
                    mobFilters.scrollIntoView({ behavior: "smooth", block: "start" });
                }
            });
        }

    categoryLinks.forEach((link) => {
        link.addEventListener("click", (event) => {
            event.preventDefault();
            const parentItem = link.closest(".category-with-sub");
            if (!parentItem) return;
            const subCat = parentItem.querySelector(".sub-cat");
            const isActive = parentItem.classList.toggle("active");
            if (subCat) {
                subCat.style.maxHeight = isActive ? `${subCat.scrollHeight}px` : "0";
                subCat.style.opacity = isActive ? "1" : "0";
            }
        });
    });
    });

</script>
@endpush