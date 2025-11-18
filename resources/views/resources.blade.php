@extends('layouts.frontend')

@section('title', 'Water PPP Resources - PPP Water Hub')

@push('styles')
<script src="https://unpkg.com/lucide@latest"></script>
@endpush

@section('content')
<!-- ✅ HERO -->
<section class="bg-gradient-to-r from-[#070648] to-[#2CBE9D] text-white">
    <div class="max-w-7xl mx-auto px-6 py-20 sm:py-24 lg:py-28">
        <p class="text-sm text-[#37C6F4] font-semibold mb-2">WATER PPP RESOURCES</p>
        <h1 class="text-4xl sm:text-4xl font-extrabold leading-none max-w-xl">
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
        <aside class="w-full md:w-64 p-5">
            <ul class="space-y-3 text-gray-700 font-medium">
                <li class="flex items-center gap-3 cursor-pointer hover:text-blue-600">
                    <i data-lucide="grid" class="w-5 h-5"></i> <span>All content</span>
                </li>

                <li>
                    <button
                        class="flex items-center justify-between w-full text-left text-gray-700 font-semibold mt-3">
                        <span class="flex items-center gap-3"><i data-lucide='search' class='w-5 h-5'></i> Identifying
                            PPP opportunities</span>
                        <i id="icon-menu1" data-lucide="chevron-down" class="w-4 h-4 transition-transform"></i>
                    </button>
                    <ul id="menu1" class="ml-8 mt-2 space-y-1 text-sm text-gray-600 hidden">
                        <li>Sub category topic 1</li>
                        <li>Sub category topic with a longer title 2</li>
                        <li>Sub category topic 3</li>
                        <li>Sub category topic 4</li>
                    </ul>
                </li>

                <li>
                    <button
                        class="flex items-center justify-between w-full text-left text-gray-700 font-semibold mt-3">
                        <span class="flex items-center gap-3"><i data-lucide='briefcase' class='w-5 h-5'></i> Preparing
                            your project</span>
                        <i id="icon-menu2" data-lucide="chevron-down" class="w-4 h-4 transition-transform"></i>
                    </button>
                    <ul id="menu2" class="ml-8 mt-2 space-y-1 text-sm text-gray-600 hidden">
                        <li>Sub topic 1</li>
                        <li>Sub topic 2</li>
                    </ul>
                </li>
                <li>
                    <button 
                        class="flex items-center justify-between w-full text-left text-gray-700 font-semibold mt-3">
                        <span class="flex items-center gap-3"><i data-lucide="layers" class="w-5 h-5"></i>
                            Implementation</span>
                        <i id="icon-menu3" data-lucide="chevron-down" class="w-4 h-4 transition-transform"></i>
                    </button>
                    <ul id="menu3" class="ml-8 mt-2 space-y-1 text-sm text-gray-600 hidden">
                        <li>Sub topic 1</li>
                        <li>Sub topic 2</li>
                    </ul>
                </li>
                <li>
                    <button 
                        class="flex items-center justify-between w-full text-left text-gray-700 font-semibold mt-3">
                        <span class="flex items-center gap-3"><i data-lucide="settings" class="w-5 h-5"></i>
                            Management</span>
                        <i id="icon-menu4" data-lucide="chevron-down" class="w-4 h-4 transition-transform"></i>
                    </button>
                    <ul id="menu4" class="ml-8 mt-2 space-y-1 text-sm text-gray-600 hidden">
                        <li>Sub topic 1</li>
                        <li>Sub topic 2</li>
                    </ul>
                </li>
                <li>
                    <button 
                        class="flex items-center justify-between w-full text-left text-gray-700 font-semibold mt-3">
                        <span class="flex items-center gap-3"><i data-lucide="book-open" class="w-5 h-5"></i>Case
                            studies</span>
                        <i id="icon-menu5" data-lucide="chevron-down" class="w-4 h-4 transition-transform"></i>
                    </button>
                    <ul id="menu5" class="ml-8 mt-2 space-y-1 text-sm text-gray-600 hidden">
                        <li>Sub topic 1</li>
                        <li>Sub topic 2</li>
                    </ul>
                </li>
            </ul>

            <div class="mb-6 relative">
                <label for="sidebar-search" class="block text-sm font-semibold text-gray-700 mb-1">Search</label>
                <div class="relative">
                    <input id="sidebar-search" type="text" placeholder="Search…"
                        class="w-full border border-gray-300 rounded-md p-2 pr-9 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <i data-lucide="search" class="absolute right-2.5 top-2.5 w-4 h-4 text-gray-500"></i>
                </div>
            </div>
        </aside>

        <!-- ✅ MAIN CONTENT -->
        <main class="flex-1 p-6">
            <!-- Cards -->
            <div id="card-container" class="grid grid-cols-1 w-5/6 sm:grid-cols-2 lg:grid-cols-3 gap-6"></div>
            <!-- Pagination -->
            <div class="flex justify-center mt-6 space-x-2">
                <button id="btn1" class="px-3 py-1 bg-blue-600 text-white rounded" onclick="changePage(1)">1</button>
                <button id="btn2" class="px-3 py-1 bg-gray-200 rounded" onclick="changePage(2)">2</button>
                <button id="btn3" class="px-3 py-1 bg-gray-200 rounded" onclick="changePage(3)">3</button>
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
@endsection

@push('scripts')
<script>
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
</script>
@endpush