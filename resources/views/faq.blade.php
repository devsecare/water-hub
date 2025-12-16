@extends('layouts.frontend')

@section('title', 'FAQ - PPP Water Hub')

@section('content')
<!-- hero section start  -->
<section class="bg-gradient-to-r from-[#070648] to-[#2CBE9D] text-white px-6 lg:px-16 relative">

    <div class="max-w-7xl mx-auto  py-20 sm:py-24 lg:py-28">
        <h1 class="text-[18px] text-[#37C6F4] font-semibold mb-6">FAQS</h1>
        <p class=" font-appetite text-3xl sm:text-5xl font-bold leading-none max-w-[700px]">
            Frequently asked questions
        </p>
    </div>
</section>

<!-- intro section  -->
 <section class="px-6 lg:px-16 lg:py-20 py-10 ">
    <div class="max-w-7xl mx-auto">
        <p class="text-[#1E1D57] text-lg font-bold max-w-[816px]">Whether you're learning about the Hub or exploring water and wastewater PPPs for the first time, we understand you'll have questions. Below you'll find answers to the most common enquiries about how the Hub works and what PPPs actually mean for water services. If you can't find what you're looking for, please contact us.


        </p>
    </div>
</section>

<section class="w-full bg-regal-blue lg:py-20 py-10 lg:pb-50 text-white relative mb-[20px] md:mb-[40px]">

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 440 20.722" class="absolute top-0 left-1/2 -translate-x-1/2 block md:hidden w-full">
        <path id="Path_435" data-name="Path 435" d="M0,21.645c128.377,0,172.165,20.722,230.524,20.722S333.263,21.645,440,21.645H0Z" transform="translate(0 -21.645)" fill="#fff"></path>
    </svg>

    <svg xmlns="http://www.w3.org/2000/svg" width="710" height="33.437" viewBox="0 0 710 33.437" class="absolute top-0 right-[15%] hidden md:block ">
        <path id="Path_419" data-name="Path 419" d="M0,21.645c207.154,0,277.811,33.437,371.982,33.437S537.765,21.645,710,21.645H0Z" transform="translate(0 -21.645)" fill="#fff"></path>
    </svg>

    <div class="max-w-4xl mx-auto px-6 lg:px-16">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 max-[440px]:text-xl">
            About the Hub
        </h2>
        <div class="space-y-4">
            @forelse($aboutTheHubFaqs as $faq)
            <div class="bg-[#131B5A] rounded-[25px] p-4">
                 <button class="w-full flex justify-between items-center faq-btn group text-left">
                    <span class="font-medium text-lg max-[400px]:text-sm transition-colors group-hover:text-[#37C6F4] w-[90%]">
                        {{ $faq->question }}
                    </span>

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        class="transition-transform rotate-0 duration-300 faq-icon">
                        <rect width="24" height="24" fill="none"></rect>
                        <path class="fill-[#ababab] transition-colors duration-300 group-hover:fill-[#37C6F4]"
                            d="M12.68,12,9.6,15.08,11,16.51l4.5-4.5L11,7.51,9.6,8.94l3.08,3.08ZM12,22a9.678,9.678,0,0,1-3.9-.79,9.989,9.989,0,0,1-5.32-5.32,9.678,9.678,0,0,1-.79-3.9,9.678,9.678,0,0,1,.79-3.9A9.989,9.989,0,0,1,8.1,2.77,9.678,9.678,0,0,1,12,1.98a9.678,9.678,0,0,1,3.9.79,9.989,9.989,0,0,1,5.32,5.32,9.678,9.678,0,0,1,.79,3.9,9.678,9.678,0,0,1-.79,3.9,9.989,9.989,0,0,1-5.32,5.32A9.678,9.678,0,0,1,12,22Zm0-2a7.742,7.742,0,0,0,5.68-2.33,7.726,7.726,0,0,0,2.33-5.68,7.726,7.726,0,0,0-2.33-5.68A7.726,7.726,0,0,0,12,3.98,7.726,7.726,0,0,0,6.32,6.31a7.726,7.726,0,0,0-2.33,5.68,7.726,7.726,0,0,0,2.33,5.68A7.726,7.726,0,0,0,12,20Z">
                        </path>
                    </svg>
                </button>
                <div class="accordion-content max-h-0 overflow-hidden transition-all duration-300">
                    <div class="pt-3 text-[#FFFFFF] max-w-[719px]">
                        {!! $faq->answer !!}
                    </div>
                </div>
            </div>
            @empty
            <div class="bg-[#131B5A] rounded-[25px] p-8 text-center">
                <p class="text-white/70">No FAQs available in this category yet.</p>
            </div>
            @endforelse
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-6 lg:px-16 lg:pt-20 pt-10">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 max-[440px]:text-xl">
            About water and wastewater PPPs
        </h2>
        <div class="space-y-4">
            @forelse($aboutWaterPppsFaqs as $faq)
            <div class="bg-[#131B5A] rounded-[25px] p-4">
                 <button class="w-full flex justify-between items-center faq-btn group text-left">
                    <span class="font-medium text-lg max-[400px]:text-sm transition-colors group-hover:text-[#37C6F4] w-[90%]">
                        {{ $faq->question }}
                    </span>

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        class="transition-transform rotate-0 duration-300 faq-icon">
                        <rect width="24" height="24" fill="none"></rect>
                        <path class="fill-[#ababab] transition-colors duration-300 group-hover:fill-[#37C6F4]"
                            d="M12.68,12,9.6,15.08,11,16.51l4.5-4.5L11,7.51,9.6,8.94l3.08,3.08ZM12,22a9.678,9.678,0,0,1-3.9-.79,9.989,9.989,0,0,1-5.32-5.32,9.678,9.678,0,0,1-.79-3.9,9.678,9.678,0,0,1,.79-3.9A9.989,9.989,0,0,1,8.1,2.77,9.678,9.678,0,0,1,12,1.98a9.678,9.678,0,0,1,3.9.79,9.989,9.989,0,0,1,5.32,5.32,9.678,9.678,0,0,1,.79,3.9,9.678,9.678,0,0,1-.79,3.9,9.989,9.989,0,0,1-5.32,5.32A9.678,9.678,0,0,1,12,22Zm0-2a7.742,7.742,0,0,0,5.68-2.33,7.726,7.726,0,0,0,2.33-5.68,7.726,7.726,0,0,0-2.33-5.68A7.726,7.726,0,0,0,12,3.98,7.726,7.726,0,0,0,6.32,6.31a7.726,7.726,0,0,0-2.33,5.68,7.726,7.726,0,0,0,2.33,5.68A7.726,7.726,0,0,0,12,20Z">
                        </path>
                    </svg>
                </button>
                <div class="accordion-content max-h-0 overflow-hidden transition-all duration-300">
                    <div class="pt-3 text-[#FFFFFF] max-w-[719px]">
                        {!! $faq->answer !!}
                    </div>
                </div>
            </div>
            @empty
            <div class="bg-[#131B5A] rounded-[25px] p-8 text-center">
                <p class="text-white/70">No FAQs available in this category yet.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // FAQ Accordion functionality
    const faqButtons = document.querySelectorAll('.faq-btn');

    faqButtons.forEach(button => {
        button.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const icon = this.querySelector('.faq-icon');
            const isOpen = content.style.maxHeight && content.style.maxHeight !== '0px';

            // Close all other FAQs
            const allContents = document.querySelectorAll('.accordion-content');
            const allIcons = document.querySelectorAll('.faq-icon');

            allContents.forEach(item => {
                if (item !== content) {
                    item.style.maxHeight = '0px';
                }
            });

            allIcons.forEach(item => {
                if (item !== icon) {
                    item.style.transform = 'rotate(0deg)';
                }
            });

            // Toggle current FAQ
            if (isOpen) {
                content.style.maxHeight = '0px';
                icon.style.transform = 'rotate(0deg)';
            } else {
                content.style.maxHeight = content.scrollHeight + 'px';
                icon.style.transform = 'rotate(90deg)';
            }
        });
    });
});
</script>
@endpush

@endsection
