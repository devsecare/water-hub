@extends('layouts.frontend')

@section('title', 'About Us - PPP Water Hub')

@section('content')


<!-- Section -->
<section class="relative w-full h-[350px] overflow-hidden page-hero-section-overlay ">
    <!-- Background Image -->
    <img src="{{ asset('images/aboutbg.jpg') }}" alt="background" class="absolute inset-0 w-full h-full object-cover" />

    <!-- Overlay Image (39% opacity) -->
    <!-- <img src="{{ asset('images/aboutoverlay.jpg') }}" alt="overlay" class="absolute inset-0 w-full h-full object-cover opacity-[0.39] mix-blend-overlay" /> -->

    <!-- Optional gradient for better contrast -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent"></div>

    <!-- Text Content -->
    <div class="relative z-10 flex items-center py-16 px-6 lg:px-16 h-full ">
        <svg xmlns="http://www.w3.org/2000/svg" width="440" height="20.722" viewBox="0 0 440 20.722"
            class="absolute top-0 w-[80%] max-w-fit left-0 right-auto h-auto z-10">
            <path id="Path_412" data-name="Path 412"
                d="M0,21.645c128.377,0,172.165,20.722,230.524,20.722S333.263,21.645,440,21.645H0Z"
                transform="translate(0 -21.645)" fill="#fff"></path>
        </svg>
        <div class="w-full max-w-7xl mx-auto  text-left">
            <h1 class="text-sky-300 font-medium uppercase tracking-wide mb-2  sm:text-base">
                The Global Water PPP Hub
            </h1>

            <p class="text-3xl sm:text-[48px] font-bold leading-snug font-appetite text-white max-w-[730px]">
                Terms of Service
            </p>
        </div>
    </div>
</section>


<section class="w-full bg-white py-10 md:py-20 flex items-center px-6 lg:px-16 pb-[100px] md:pb-[150px]">
    <div class="max-w-7xl mx-auto  w-full">
        <div class="max-w-[790px] text-left">

            <p class="text-[#1E1D57] font-semibold text-sm sm:text-base md:text-[18px] leading-snug mb-4">
                Last Updated: 8 December 2025
            </p>

            <p class="text-[#1E1D57]   sm:text-base mt-8 md:text-[18px] leading-snug ">
                Welcome to The Global Water PPP Hub. These Terms of Service ('Terms') govern your access to and use of
                our website and services. By accessing or using our website, you agree to be bound by these Terms. If
                you do not agree to these Terms, please do not use our services.
            </p>

            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">1. Acceptance of Terms</h2>

            <p class="text-[#1E1D57]  sm:text-base  md:text-[18px] leading-snug ">
                By creating an account or accessing our website, you acknowledge that you have read, understood, and
                agree to be bound by these Terms and our Privacy Policy. These Terms constitute a legally binding
                agreement between you and The Global Water PPP Hub.
            </p>

            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">2. Description of Service</h2>
            <p class="text-[#1E1D57]   sm:text-base  md:text-[18px] leading-snug ">The Global Water PPP Hub provides a
                platform that curates and provides access to resources, information, and educational materials related
                to water public-private partnerships (PPPs). Our service is provided free of charge for educational and
                informational purposes.
            </p>
            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">3. User Accounts</h2>
            <h3 class="text-[22px] mb-4 font-bold text-[#1E1D57] mt-4">3.1 Account Creation</h3>
            <p class="text-[#1E1D57]   sm:text-base  md:text-[18px] leading-snug ">To access certain features of our
                website, you must create an account by providing your name and email address. You agree to provide
                accurate, current, and complete information during the registration process and to update such
                information to keep it accurate, current, and complete.
            </p>
            <h3 class="text-[22px] mb-4 font-bold text-[#1E1D57] mt-4">3.2 Account Security</h3>
            <p class="text-[#1E1D57]   sm:text-base  md:text-[18px] leading-snug ">You are responsible for maintaining
                the confidentiality of your account credentials and for all activities that occur under your account.
                You agree to notify us immediately of any unauthorised use of your account or any other breach of
                security.
            </p>
            <h3 class="text-[22px] mb-4 font-bold text-[#1E1D57] mt-4">3.3 Account Termination</h3>
            <p class="text-[#1E1D57]   sm:text-base  md:text-[18px] leading-snug ">You may terminate your account at any
                time by contacting us. We reserve the right to suspend or terminate your account if you violate these
                Terms or engage in conduct that we determine, in our sole discretion, to be inappropriate or harmful.
            </p>

            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">4. User Conduct</h2>
            <p class="text-[#1E1D57]   sm:text-base  md:text-[18px] leading-snug ">You agree not to:
            </p>
            <ol class="text-[#1E1D57] list-decimal ml-10 mt-3 space-y-2">
                <li>Use the website for any unlawful purpose or in violation of any applicable laws or regulations</li>
                <li>Attempt to gain unauthorised access to any portion of the website or any other systems or networks
                </li>
                <li>Interfere with or disrupt the website or servers or networks connected to the website</li>
                <li>Use any automated system, including robots or spiders, to access the website without our prior
                    written permission</li>
                <li>Transmit any viruses, malware, or other harmful code</li>
                <li>Impersonate any person or entity or falsely state or misrepresent your affiliation with any person
                    or entity</li>
            </ol>
            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">5. Intellectual Property Rights</h2>
            <h3 class="text-[22px] mb-4 font-bold text-[#1E1D57] mt-4">5.1 Our Content</h3>
            <p class="text-[#1E1D57]   sm:text-base  md:text-[18px] leading-snug ">All content on the The Global Water
                PPP Hub website, including text, graphics, logos, images, and software, is the property of The Global
                Water PPP Hub or its content suppliers and is protected by copyright, trademark, and other intellectual
                property laws. The curated resources and materials we provide remain the property of their respective
                owners.
            </p>
            <h3 class="text-[22px] mb-4 font-bold text-[#1E1D57] mt-4">5.2 Limited Licence</h3>
            <p class="text-[#1E1D57]   sm:text-base  md:text-[18px] leading-snug ">We grant you a limited,
                non-exclusive, non-transferable licence to access and use our website for personal, non-commercial
                purposes in accordance with these Terms. You may not reproduce, distribute, modify, create derivative
                works of, publicly display, or otherwise exploit any content without our prior written consent.
            </p>
            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">6. Third-Party Content and Links</h2>
            <p class="text-[#1E1D57]   sm:text-base  md:text-[18px] leading-snug ">Our website may contain links to
                third-party websites and resources that are not owned or controlled by The Global Water PPP Hub. We have
                no control over and assume no responsibility for the content, privacy policies, or practices of any
                third-party websites. You acknowledge and agree that we shall not be responsible or liable for any
                damage or loss caused by your use of any third-party content or services.
            </p>

            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">7. Disclaimer of Warranties</h2>
            <p class="text-[#1E1D57]   sm:text-base  md:text-[18px] leading-snug ">The website and all content are
                provided 'as is' and 'as available' without warranties of any kind, either express or implied, including
                but not limited to warranties of merchantability, fitness for a particular purpose, or non-infringement.
                We do not warrant that the website will be uninterrupted, error-free, or free of viruses or other
                harmful components.
            </p>
            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">8. Limitation of Liability</h2>
            <p class="text-[#1E1D57]   sm:text-base  md:text-[18px] leading-snug ">To the maximum extent permitted by
                applicable law, The Global Water PPP Hub shall not be liable for any indirect, incidental, special,
                consequential, or punitive damages, or any loss of profits or revenues, whether incurred directly or
                indirectly, or any loss of data, use, goodwill, or other intangible losses resulting from: (a) your
                access to or use of or inability to access or use the website; (b) any conduct or content of any third
                party on the website; or (c) unauthorised access, use, or alteration of your content.
            </p>
            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">9. Indemnification</h2>
            <p class="text-[#1E1D57]   sm:text-base  md:text-[18px] leading-snug ">You agree to indemnify, defend, and
                hold harmless The Global Water PPP Hub and its officers, directors, employees, and agents from and
                against any claims, liabilities, damages, losses, and expenses, including reasonable legal fees, arising
                out of or in any way connected with your access to or use of the website, your violation of these Terms,
                or your violation of any rights of another.
            </p>

            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">10. Privacy</h2>
            <p class="text-[#1E1D57]   sm:text-base  md:text-[18px] leading-snug ">Your use of the website is also
                governed by our Privacy Policy, which is incorporated into these Terms by reference. Please review our
                Privacy Policy to understand our practices regarding the collection and use of your personal
                information.
            </p>
            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">11. Communications</h2>
            <p class="text-[#1E1D57]   sm:text-base  md:text-[18px] leading-snug ">By creating an account, you consent
                to receive electronic communications from us, including emails about new content and resources.
            </p>

            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">12. Changes to Terms</h2>
            <p class="text-[#1E1D57]   sm:text-base  md:text-[18px] leading-snug ">We reserve the right to modify or
                replace these Terms at any time at our sole discretion. If we make material changes, we will notify you
                by posting the new Terms on this page and updating the 'Last Updated' date. Your continued use of the
                website after any changes become effective constitutes your acceptance of the revised Terms.
            </p>

            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">13. Governing Law and Jurisdiction</h2>
            <p class="text-[#1E1D57]   sm:text-base  md:text-[18px] leading-snug ">These Terms shall be governed by and
                construed in accordance with the laws of the European Union and the applicable laws of France without
                regard to its conflict of law provisions. Any disputes arising from these Terms or your use of the
                website shall be subject to the exclusive jurisdiction of the courts of France.
            </p>
            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">14. Severability</h2>
            <p class="text-[#1E1D57]   sm:text-base  md:text-[18px] leading-snug ">If any provision of these Terms is
                found to be invalid or unenforceable by a court of competent jurisdiction, the remaining provisions
                shall continue in full force and effect. The invalid or unenforceable provision shall be replaced with a
                valid and enforceable provision that most closely matches the intent of the original provision.
            </p>
            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">15. Entire Agreement</h2>
            <p class="text-[#1E1D57]   sm:text-base  md:text-[18px] leading-snug ">These Terms, together with our
                Privacy Policy, constitute the entire agreement between you and The Global Water PPP Hub regarding your
                use of the website and supersede all prior agreements and understandings, whether written or oral.
            </p>

            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">16. Contact Information</h2>
            <p class="text-[#1E1D57]   sm:text-base  md:text-[18px] leading-snug ">If you have any questions about these
                Terms, please contact us at:
            </p>
            <p class="text-[#1E1D57]   sm:text-base  md:text-[18px] leading-snug ">The Global Water PPP Hub
            </p>
            <!-- <p class="sm:text-base md:text-[18px] mt-4 leading-snug "><span class="text-[#1E1D57]">Email:</span><a
                    href="mailto:contact@waterppphub.org" class="underline ml-2 text-">contact@waterppphub.org</a>
            </p> -->

            <p class="sm:text-base  inline-block md:text-[18px] mt-4 leading-snug px-1" style="background-color: #FFFF00;">
                <span class="text-[#1E1D57]">Email:</span><a href="mailto:contact@waterppphub.org"
                    class="underline ml-2 text-">contact@waterppphub.org</a>
            </p>
            <p class="text-[#1E1D57]  sm:text-base md:text-[18px] mt-2 leading-snug "><mark>Address:</mark> 19 avenue de
                Messine,
                75008 Paris, France</p>
            <p class="text-[#1E1D57]   sm:text-base  md:text-[18px] leading-snug ">By using The Global Water PPP Hub,
                you acknowledge that you have read, understood, and agree to be bound by these Terms of Service.</p>



        </div>
    </div>
</section>

@endsection