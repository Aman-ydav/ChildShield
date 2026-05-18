@extends('layouts.master')

@section('content')
    <div class="w-full max-w-7xl mx-auto py-16 px-6">
        <!-- HERO -->
        <section class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center py-12">
            <div>
                <h1 class="bauhaus-uppercase text-4xl sm:text-6xl lg:text-7xl leading-[0.92] text-[#0b0b0b]">Report faster. Protect sooner.</h1>
                <p class="mt-6 text-lg text-[#333] max-w-2xl">ChildShield is a lightweight reporting platform that empowers communities, NGOs, and authorities to log incidents, triage reports, and coordinate responses — built for speed, privacy and real-world field use.</p>
                <div class="mt-8 flex gap-4">
                    <a href="{{ route('register') }}" class="bauhaus-btn bauhaus-btn--red">Start Reporting</a>
                    <a href="{{ route('about') }}" class="bauhaus-btn bauhaus-btn--outline">See How It Works</a>
                </div>
            </div>

            <div class="relative">
                <div class="w-full h-[420px] bg-white border-4 border-[var(--bauhaus-border)] overflow-hidden relative">
                    <div class="absolute" style="left:6%;top:8%;">
                        <div style="width:140px;height:140px;background:var(--bauhaus-yellow);border:6px solid var(--bauhaus-border);transform:rotate(40deg);"></div>
                    </div>
                    <div class="absolute" style="right:8%;top:18%;">
                        <div style="width:110px;height:110px;background:var(--bauhaus-red);border:6px solid var(--bauhaus-border);border-radius:9999px"></div>
                    </div>
                    <div class="absolute" style="left:42%;top:36%;">
                        <div style="width:64px;height:64px;background:var(--bauhaus-ink);border:4px solid var(--bauhaus-border);"></div>
                    </div>
                    <div class="absolute" style="left:52%;top:6%;transform:rotate(18deg);">
                        <div style="width:48px;height:2px;background:var(--bauhaus-border);"></div>
                    </div>
                </div>

                <div class="bauhaus-card absolute -right-8 top-1/2 transform -translate-y-1/2 w-[320px]">
                    <h4 class="bauhaus-subhead text-[#121212] mb-3">Impact</h4>
                    <div class="grid grid-cols-3 gap-3">
                        @foreach ($heroStats as $stat)
                            <div class="text-center">
                                <div class="text-2xl font-extrabold">{{ $stat['value'] }}</div>
                                <div class="text-xs">{{ $stat['label'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- FEATURES -->
        <section class="py-12">
            <h3 class="bauhaus-subhead text-xl mb-6">What we do</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bauhaus-card p-6">
                    <h4 class="font-bold mb-2">Fast Reporting</h4>
                    <p class="text-sm">Mobile-first forms and offline-first behavior for field workers.</p>
                </div>
                <div class="bauhaus-card p-6">
                    <h4 class="font-bold mb-2">Secure Triage</h4>
                    <p class="text-sm">Role-based access, encrypted attachments, and privacy-first defaults.</p>
                </div>
                <div class="bauhaus-card p-6">
                    <h4 class="font-bold mb-2">Coordinated Response</h4>
                    <p class="text-sm">Assign, comment, and escalate cases with clear audit trails.</p>
                </div>
            </div>
        </section>

        <!-- HOW IT WORKS -->
        <section class="py-12">
            <h3 class="bauhaus-subhead text-xl mb-6">How it works</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-6 bg-white border-4 border-[var(--bauhaus-border)]">
                    <div class="text-2xl font-black mb-2">1</div>
                    <div class="font-semibold">Report</div>
                    <p class="text-sm mt-2">Simple form with attachments and location.</p>
                </div>
                <div class="p-6 bg-white border-4 border-[var(--bauhaus-border)]">
                    <div class="text-2xl font-black mb-2">2</div>
                    <div class="font-semibold">Verify</div>
                    <p class="text-sm mt-2">Local officers and NGOs verify reports and mark status.</p>
                </div>
                <div class="p-6 bg-white border-4 border-[var(--bauhaus-border)]">
                    <div class="text-2xl font-black mb-2">3</div>
                    <div class="font-semibold">Respond</div>
                    <p class="text-sm mt-2">Actions assigned and tracked until resolution.</p>
                </div>
            </div>
        </section>

        <!-- FAQ (single accordion) -->

        <!-- CTA -->
            <section class="py-16 text-center bg-[var(--bauhaus-bg)]">
                <div class="max-w-3xl mx-auto p-10 bg-white border-4 border-[var(--bauhaus-border)]">
                    <h3 class="bauhaus-uppercase text-3xl mb-4">Join the network</h3>
                    <p class="mb-6">Help us protect children by reporting incidents quickly and safely. Partner with us to expand reach and support.</p>
                    <div class="flex justify-center gap-4">
                        <a href="{{ route('register') }}" class="bauhaus-btn bauhaus-btn--red">Get Started</a>
                        <a href="{{ route('contact') }}" class="bauhaus-btn bauhaus-btn--outline">Contact Us</a>
                    </div>
                </div>
            </section>

            <!-- PARTNERS -->
            <section class="py-12">
                <h3 class="bauhaus-subhead text-xl mb-6">Partners & Supporters</h3>
                <p class="mb-6 text-sm text-[#444]">We collaborate with NGOs, local agencies and community groups. (Logos placeholder)</p>
                <div class="flex flex-wrap gap-6 items-center">
                    <div class="p-4 bg-white border-2 border-[var(--bauhaus-border)]">NGO Logo</div>
                    <div class="p-4 bg-white border-2 border-[var(--bauhaus-border)]">Agency Logo</div>
                    <div class="p-4 bg-white border-2 border-[var(--bauhaus-border)]">Community Group</div>
                </div>
            </section>

            <!-- FAQ accordion -->
            <section class="py-12" id="faq">
                <h3 class="bauhaus-subhead text-xl mb-6">Frequently Asked Questions</h3>
                <div class="accordion" id="faqAccordion">
                    @php
                        $faqs = [
                            ['Is my report anonymous?', 'You may submit reports without providing identifying details. If you include contact information, staff may use it to request clarification; otherwise your identity remains protected. All access to reports is audited.'],
                            ['What happens after I submit a report?', 'Submitted reports enter a region-specific verification queue. Local moderators or NGO partners review evidence, may request follow-up, and set a verification status. Typical non-urgent verification windows are 24–72 hours; mark the message "URGENT" for faster triage.'],
                            ['What file types can I attach?', 'You can attach images (JPG/PNG), PDFs, and short video clips. Attachments are encrypted at rest. If files are very large, we provide secure upload links to avoid mobile timeouts.'],
                            ['Who can view my submission?', 'Only authorized ChildShield admins and configured NGO partners for your region can access full report details. Public exports or dashboards present aggregated and anonymized statistics only.'],
                            ['Can I edit or delete a report?', 'Pending reports can be edited by the original submitter to add clarification. Once verified for audit purposes, reports are locked; contact support for exceptional requests and we will review them case-by-case.'],
                            ['How long is data retained?', 'Retention policies vary by deployment and local regulations. By default, attachments and case metadata are retained for the project-specific retention period; contact your regional admin for exact retention windows or request export/deletion where policy permits.'],
                            ['Is the platform mobile and offline-friendly?', 'Yes. Forms are optimized for mobile use and can cache basic entries offline. When connectivity is restored, cached reports synchronize to the server. For mission-critical setups we recommend field data collection best-practices and periodic syncs.'],
                            ['How secure is the system?', 'The system uses industry-standard TLS for transport, encryption for stored attachments, and role-based access control. Admin actions are logged for audit; we recommend strong passwords and multi-factor authentication for admin accounts.'],
                            ['Can ChildShield integrate with other systems?', 'Yes. We offer API endpoints and webhook support for integrations with case management systems, SMS gateways, and notification services. Provide desired workflows and we can prepare an integration plan.'],
                            ['How can I request deployment support or training?', 'Contact us via the contact form or email support@childshield.test. Include your organization, estimated user count, and target regions. We offer deployment guidance, training plans, and hands-on support for pilots.'],
                        ];
                    @endphp

                    @foreach ($faqs as $i => $faq)
                        <div class="accordion-item bauhaus-card">
                            <h2 class="accordion-header" id="heading{{ $i }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded="false" aria-controls="collapse{{ $i }}">
                                    {{ $faq[0] }}
                                </button>
                            </h2>
                            <div id="collapse{{ $i }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $i }}" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    {!! nl2br(e($faq[1])) !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>