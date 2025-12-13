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
                Water PPP Hub
            </h1>

            <p class="text-3xl sm:text-[48px] font-bold leading-snug font-appetite text-white max-w-[730px]">
                Privacy Policy
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
                This Privacy Policy describes how the Global Water PPP Hub ('we', 'us', 'our') collects, uses, and
                protects your personal information when you use our website and services. We are committed to protecting
                your privacy and complying with the General Data Protection Regulation (GDPR) and other applicable data
                protection laws.
            </p>

            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">1. Data Controller</h2>

            <p class="text-[#1E1D57]  sm:text-base  md:text-[18px] leading-snug ">
                The Global Water PPP Hub is the data controller responsible for your personal information. For any
                questions regarding this Privacy Policy or your personal data, please contact us at
                contact@waterppphub.org
            </p>

            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">2. Information We Collect</h2>
            <h3 class="text-[22px] mb-4 font-bold text-[#1E1D57]">2.1 Information You Provide</h3>
            <p class="text-[#1E1D57]   sm:text-base  md:text-[18px] leading-snug "> When you create an
                account, we collect:
            </p>
            <ol class="text-[#1E1D57] list-decimal ml-10 mt-3 space-y-2">
                <li>Your name</li>
                <li>Your email address</li>
                <li>Any other information you choose to provide</li>
            </ol>


            <h3 class="text-[22px] mb-4 font-bold text-[#1E1D57] mt-4">2.2 Information Automatically Collected</h3>
            <p class="text-[#1E1D57]   sm:text-base  md:text-[18px] leading-snug ">We automatically collect
                certain information when you visit our website:
            </p>
            <ol class="text-[#1E1D57] list-decimal ml-10 mt-3 space-y-2" start="4">
                <li>Usage data (pages visited, time spent, navigation patterns)</li>
                <li>Device information (browser type, operating system, IP address)</li>
                <li>Cookie data (see Section 5 for details)</li>
            </ol>



            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">3. How We Use Your Information</h2>
            <p class="text-[#1E1D57]  sm:text-base  md:text-[18px] leading-snug ">We use your personal
                information for the following purposes:
            </p>
            <ol class="text-[#1E1D57] list-decimal ml-10 mt-3 space-y-2" start="7">
                <li>To create and manage your user account</li>
                <li>To provide access to curated resources on water public-private partnerships</li>
                <li>To send you notifications about new content and resources (with your consent)</li>
                <li>To improve our website and services</li>
                <li>To analyse usage patterns through Google Analytics</li>
                <li>To comply with legal obligations</li>
            </ol>


            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">4. Legal Basis for Processing</h2>
            <p class="text-[#1E1D57]  sm:text-base  md:text-[18px] leading-snug ">Under GDPR, we process your
                personal data based on the following legal grounds:
            </p>
            <ol class="text-[#1E1D57] list-decimal ml-10 mt-3 space-y-2" start="13">
                <li>Contract: To provide you with account services you have requested</li>
                <li>Legitimate interests: To improve our services and analyse website usage</li>
                <li>Consent: For marketing communications and non-essential cookies</li>
                <li>Legal obligation: To comply with applicable laws and regulations</li>
            </ol>


            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">5. Cookies and Tracking Technologies</h2>
            <p class="text-[#1E1D57]  sm:text-base  md:text-[18px] leading-snug ">We use cookies and similar
                tracking technologies to collect information about your browsing activities. We use Google Analytics to
                analyse how users interact with our website. You can control cookie settings through your browser
                preferences. For more information about the cookies we use, please see our Cookie Policy [link if
                separate policy exists].
            </p>
            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">6. Data Sharing and Disclosure</h2>
            <p class="text-[#1E1D57] sm:text-base  md:text-[18px] leading-snug ">We do not sell, rent, or share
                your personal information with third parties for their marketing purposes. We may share your data only
                in the following circumstances: (a) with service providers who assist us in operating our website (such
                as Google Analytics), who are bound by confidentiality obligations; (b) when required by law or to
                protect our rights; (c) in connection with a business transfer, merger, or acquisition.
            </p>
            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">7. International Data Transfers</h2>
            <p class="text-[#1E1D57]  sm:text-base  md:text-[18px] leading-snug ">Your information may be
                transferred to and processed in countries outside the European Economic Area (EEA), including through
                our use of Google Analytics. We ensure that appropriate safeguards are in place, such as Standard
                Contractual Clauses or adequacy decisions, to protect your data during such transfers.
            </p>

            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">8. Data Retention</h2>
            <p class="text-[#1E1D57]  sm:text-base  md:text-[18px] leading-snug ">We retain your personal
                information only for as long as necessary to fulfil the purposes outlined in this Privacy Policy, unless
                a longer retention period is required by law. Account information is retained whilst your account
                remains active. If you delete your account, we will delete or anonymise your personal data within 30
                days, except where we are required to retain it for legal purposes.
            </p>


            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">9. Your Rights Under GDPR </h2>
            <p class="text-[#1E1D57]  sm:text-base  md:text-[18px] leading-snug ">As a data subject under
                GDPR, you have the following rights:
            </p>
            <ol class="text-[#1E1D57] list-decimal ml-10 mt-3 space-y-2" start="17">
                <li><strong>Right of access: </strong>You can request a copy of the personal data we hold about you
                </li>
                <li><strong>Right to rectification: </strong>You can ask us to correct inaccurate or incomplete data
                </li>
                <li><strong>Right to erasure:</strong> You can request deletion of your personal data</li>
                <li><strong>Right to restrict processing:</strong> You can ask us to limit how we use your data</li>
                <li><strong>Right to data portability: </strong>You can request your data in a structured,
                    machine-readable format</li>
                <li><strong>Right to object:</strong> You can object to processing based on legitimate interests
                </li>
                <li><strong>Right to withdraw consent: </strong>Where we rely on consent, you can withdraw it at any
                    time</li>
            </ol>
            <p class="text-[#1E1D57]  sm:text-base  md:text-[18px] mt-4 leading-snug ">To exercise any of these
                rights, please contact us at [insert contact email]. We will respond to your request within one
                month.
            </p>


            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">10. Security</h2>
            <p class="text-[#1E1D57]  sm:text-base  md:text-[18px] leading-snug ">We implement appropriate
                technical and organisational measures to protect your personal information against unauthorised access,
                alteration, disclosure, or destruction. However, no method of transmission over the internet is
                completely secure, and we cannot guarantee absolute security.
            </p>

            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">11. Children's Privacy</h2>
            <p class="text-[#1E1D57]  sm:text-base  md:text-[18px] leading-snug ">Our website is not intended for
                children under 18 years of age. We do not knowingly collect personal information from children. If we
                become aware that we have collected data from a child, we will take steps to delete it promptly.
            </p>

            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">12. Changes to This Privacy Policy</h2>
            <p class="text-[#1E1D57]  sm:text-base  md:text-[18px] leading-snug ">We may update this Privacy
                Policy from time to time. We will notify you of any material changes by posting the new Privacy Policy
                on this page and updating the 'Last Updated' date. Your continued use of the website after changes
                become effective constitutes acceptance of the revised policy.
            </p>

            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">13. Supervisory Authority</h2>
            <p class="text-[#1E1D57]  sm:text-base  md:text-[18px] leading-snug ">You have the right to lodge a
                complaint with your local data protection supervisory authority if you believe we have not complied with
                applicable data protection laws.
            </p>

            <h2 class="text-[32px] font-bold text-[#1E1D57] mb-4 mt-8">14. Contact Us</h2>
            <p class="text-[#1E1D57]  sm:text-base  md:text-[18px] leading-snug ">If you have any questions about
                this Privacy Policy or our data practices, please contact us at:
            </p>

            <p class="text-[#1E1D57]  sm:text-base font-bold md:text-[18px] mt-4 leading-snug ">The Global Water
                PPP Hub
            </p>
            <p class="sm:text-base md:text-[18px] mt-4 leading-snug "><span
                    class="text-[#1E1D57]">Email:</span><a href="mailto:contact@waterppphub.org"
                    class="underline ml-2 text-">contact@waterppphub.org</a>
            </p>
            <p class="text-[#1E1D57]  sm:text-base md:text-[18px] mt-2 leading-snug ">Address: 19 avenue de
                Messine, 75008 Paris, France</p>

            <p class="text-[#1E1D57] sm:text-base  md:text-[18px] leading-snug mt-2">All information on this
                website
                is copyrighted by AquaFed © - all rights reserved (2005-2026) except where indicated. Information can be
                shared on the condition that appropriate reference is given. AquaFed is a registered trademark name,
                filed since 2005 with the appropriate authorities.
            </p>

            <p class="text-[#1E1D57]  sm:text-base  md:text-[18px] leading-snug mt-2">This website is hosted in
                France and is operated in accordance with French and EU legislation (and in particular GDPR). In
                particular, the website complies with dispensations 6, 7 and 8 of the French Communication Act: French
                Law n° 2004-575 of June 21, 2004. The AquaFed website is a non-commercial website presenting the
                AquaFed, a "type 1901 Association". The AquaFed team takes compliance with French and European law
                seriously and will never transfer your data to third parties. You have a right to consult, edit and
                request deletion of your database entry if you signed up to our mailing list.
            </p>
            <p class="text-[#1E1D57]  sm:text-base  md:text-[18px] leading-snug mt-2">This website is maintained
                by
                the AquaFed team under supervision of its President.
            </p>

            <ul class="text-[#1E1D57] list-disc pl-10 mt-3 space-y-2"> 
                <li>AquaFed was incorporated on March 3, 2005 as a non-for-profit non-governmental organization under
                    the French Law governing "associations under the Law 1901". Profile is visible under the French
                    official website: http://www.journal-officiel.gouv.fr. Our UN ECOSOC NGO database entry is
                    accessible here.</li>
                <li>AquaFed SIRET number: 48464640100022</li>
                <li>AquaFed Intra-European VAT number is: FR 0748464601</li>
            </ul>


        </div>
    </div>
</section>

@endsection