@extends('layouts.master')

@section('content')
    <div class="max-w-5xl mx-auto py-12 px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                <div class="bauhaus-card p-8">
                    <h1 class="bauhaus-uppercase text-2xl mb-4">Contact ChildShield</h1>
                    <p class="text-sm text-[#444] mb-6">Use this form for general enquiries, partnership requests, deployment support, or to report issues with the platform. For urgent field escalation, mark the subject as "URGENT" and include a contact number.</p>

                    <form method="POST" action="{{ route('contact.send') }}" class="grid grid-cols-1 gap-4">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm mb-1">Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="bauhaus-input w-full @error('name') is-invalid @enderror" required>
                                @error('name')<div class="text-sm text-red-600 mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div>
                                <label class="block text-sm mb-1">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="bauhaus-input w-full @error('email') is-invalid @enderror" required>
                                @error('email')<div class="text-sm text-red-600 mt-1">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm mb-1">Subject</label>
                            <input type="text" name="subject" value="{{ old('subject') }}" class="bauhaus-input w-full @error('subject') is-invalid @enderror" required>
                            @error('subject')<div class="text-sm text-red-600 mt-1">{{ $message }}</div>@enderror
                        </div>

                        <div>
                            <label class="block text-sm mb-1">Message</label>
                            <textarea name="message" rows="8" class="bauhaus-textarea w-full @error('message') is-invalid @enderror" required>{{ old('message') }}</textarea>
                            @error('message')<div class="text-sm text-red-600 mt-1">{{ $message }}</div>@enderror
                        </div>

                        <div class="flex items-center gap-3">
                            <button class="bauhaus-btn bauhaus-btn--red">Send Message</button>
                            <a href="mailto:support@childshield.test" class="bauhaus-btn bauhaus-btn--outline">Email Support</a>
                        </div>
                    </form>
                </div>
            </div>

            <div>
                <div class="bauhaus-card p-6 mb-6">
                    <h4 class="font-bold mb-2">Office</h4>
                    <p class="text-sm text-[#444] mb-2">ChildShield Monitoring Office</p>
                    <p class="text-sm text-[#444] mb-2">Email: <a href="mailto:support@childshield.test" class="text-[#1040C0]">support@childshield.test</a></p>
                    <p class="text-sm text-[#444]">For urgent field support, include phone number and location.</p>
                </div>

                <div class="bauhaus-card p-6">
                    <h4 class="font-bold mb-3">Quick Questions</h4>
                    <div class="text-sm text-[#444] space-y-3">
                        <div>
                            <strong>Deployment help?</strong>
                            <p class="mt-1">We assist NGOs with deployment planning, server setup, and training. Provide timeline and approximate user counts in your message.</p>
                        </div>
                        <div>
                            <strong>Data & Privacy?</strong>
                            <p class="mt-1">We store attachments encrypted and minimize personal data. See our privacy page for policy details.</p>
                        </div>
                        <div>
                            <strong>Partnerships?</strong>
                            <p class="mt-1">We partner with regional NGOs for pilots, translation, and local training. Include organizational details and contact person.</p>
                        </div>
                        <div>
                            <strong>Report a bug?</strong>
                            <p class="mt-1">Please include steps to reproduce, environment (web/mobile), and screenshots if available.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- EXPANDED FAQ SECTION (accordion) -->
        <section class="mt-10">
            <h3 class="bauhaus-subhead text-xl mb-4">Frequently Asked Questions</h3>
            <div class="accordion" id="contactFaqAccordion">
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
                        <h2 class="accordion-header" id="contactHeading{{ $i }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contactCollapse{{ $i }}" aria-expanded="false" aria-controls="contactCollapse{{ $i }}">
                                {{ $faq[0] }}
                            </button>
                        </h2>
                        <div id="contactCollapse{{ $i }}" class="accordion-collapse collapse" aria-labelledby="contactHeading{{ $i }}" data-bs-parent="#contactFaqAccordion">
                            <div class="accordion-body">
                                {!! nl2br(e($faq[1])) !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection