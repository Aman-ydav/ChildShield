@extends('layouts.master')

@section('content')
    <!-- HERO SECTION -->
    <section class="hero-panel p-5 p-lg-6 mb-5 mb-lg-6 rounded-4" style="min-height: 500px; display: flex; align-items: center;">
        <div class="row align-items-center g-4 w-100">
            <div class="col-lg-7">
                <span class="badge text-bg-warning text-dark mb-3 fs-6">{{ __('childshield.tagline') }}</span>
                <h1 class="display-4 fw-bold mb-4 text-white">Report child labour cases with speed, privacy, and accountability.</h1>
                <p class="lead text-white-75 mb-5">ChildShield helps citizens, NGOs, and administrators report, verify, and monitor cases through a secure Laravel platform designed for real-world field operations.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('register') }}" class="btn btn-warning btn-lg px-5 fw-semibold">Start Reporting</a>
                    <a href="#how-it-works" class="btn btn-outline-light btn-lg px-5 fw-semibold">Learn More</a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="section-surface p-4 bg-white text-dark shadow-lg">
                    <h2 class="h5 fw-bold mb-4 text-primary">Quick Impact</h2>
                    <div class="row g-3">
                        @foreach ($heroStats as $stat)
                            <div class="col-4">
                                <div class="bg-light rounded-3 p-3 text-center border-top border-4 border-warning">
                                    <div class="display-6 fw-bold text-primary">{{ $stat['value'] }}</div>
                                    <div class="small text-secondary fw-semibold">{{ $stat['label'] }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES SECTION -->
    <section class="mb-5 mb-lg-6">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Why ChildShield?</h2>
            <p class="lead text-secondary">A complete solution for reporting and monitoring child labour incidents</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="section-surface h-100 p-4 border-top border-4 border-warning">
                    <div class="h3 mb-3">🔒</div>
                    <h3 class="h5 fw-bold mb-2">Secure & Private</h3>
                    <p class="text-secondary mb-0">CSRF protection, encrypted storage, role-based access, and authentication keep all data safe and confidential.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="section-surface h-100 p-4 border-top border-4 border-warning">
                    <div class="h3 mb-3">⚡</div>
                    <h3 class="h5 fw-bold mb-2">Fast Response</h3>
                    <p class="text-secondary mb-0">Submit reports instantly with image evidence. Real-time notifications alert admins and NGOs to take immediate action.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="section-surface h-100 p-4 border-top border-4 border-warning">
                    <div class="h3 mb-3">📊</div>
                    <h3 class="h5 fw-bold mb-2">Transparent Tracking</h3>
                    <p class="text-secondary mb-0">Track your reports from submission through verification, resolution. Full audit trail for accountability.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="section-surface h-100 p-4 border-top border-4 border-info">
                    <div class="h3 mb-3">👥</div>
                    <h3 class="h5 fw-bold mb-2">Community Driven</h3>
                    <p class="text-secondary mb-0">Built for citizens, NGOs, and government agencies to collaborate and protect children together.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="section-surface h-100 p-4 border-top border-4 border-info">
                    <div class="h3 mb-3">📱</div>
                    <h3 class="h5 fw-bold mb-2">Mobile Friendly</h3>
                    <p class="text-secondary mb-0">Responsive design works on phones, tablets, and desktops. Report cases from anywhere, anytime.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="section-surface h-100 p-4 border-top border-4 border-info">
                    <div class="h3 mb-3">🎯</div>
                    <h3 class="h5 fw-bold mb-2">Smart Verification</h3>
                    <p class="text-secondary mb-0">Admin verification workflow with evidence review, location tracking, and detailed case notes.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section class="section-surface p-5 p-lg-6 mb-5 mb-lg-6 rounded-4" id="how-it-works">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h2 class="display-5 fw-bold mb-4 text-primary">How it works</h2>
                <div class="d-grid gap-4">
                    <div class="d-flex gap-3">
                        <span class="status-pill bg-warning text-dark fw-bold" style="min-width: 45px; justify-content: center; font-size: 1.2rem;">1</span>
                        <div>
                            <h4 class="fw-bold mb-1">Create Account</h4>
                            <p class="text-secondary mb-0">Register securely with your email and password. No personal information required.</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <span class="status-pill bg-warning text-dark fw-bold" style="min-width: 45px; justify-content: center; font-size: 1.2rem;">2</span>
                        <div>
                            <h4 class="fw-bold mb-1">Submit Evidence</h4>
                            <p class="text-secondary mb-0">Provide child details, location, description, and upload proof images (jpg, png).</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <span class="status-pill bg-warning text-dark fw-bold" style="min-width: 45px; justify-content: center; font-size: 1.2rem;">3</span>
                        <div>
                            <h4 class="fw-bold mb-1">Admin Review</h4>
                            <p class="text-secondary mb-0">ChildShield admins verify the report and add official remarks or follow-up information.</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <span class="status-pill bg-success text-white fw-bold" style="min-width: 45px; justify-content: center; font-size: 1.2rem;">4</span>
                        <div>
                            <h4 class="fw-bold mb-1">Action & Resolution</h4>
                            <p class="text-secondary mb-0">Track the case through verification, resolution, or closure with real-time notifications.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="bg-light rounded-4 p-5 border-start border-5 border-warning">
                    <h3 class="h4 fw-bold mb-3 text-primary">Why This Matters</h3>
                    <p class="mb-3 text-secondary">Child labour is a global crisis affecting millions of children. Every report matters.</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><span class="text-warning fw-bold">✓</span> <strong>Faster response times</strong> - Digital pipeline vs. manual reporting</li>
                        <li class="mb-2"><span class="text-warning fw-bold">✓</span> <strong>Evidence preservation</strong> - Secure storage of photos and details</li>
                        <li class="mb-2"><span class="text-warning fw-bold">✓</span> <strong>Transparent tracking</strong> - Know the status of every case</li>
                        <li class="mb-2"><span class="text-warning fw-bold">✓</span> <strong>Accountability</strong> - Complete audit trail for agencies</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- STATS SECTION -->
    <section class="mb-5 mb-lg-6">
        <div class="row g-3 text-center">
            <div class="col-md-3">
                <div class="section-surface p-4">
                    <div class="display-5 fw-bold text-warning mb-2">100%</div>
                    <p class="text-secondary mb-0">Secure & Encrypted</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="section-surface p-4">
                    <div class="display-5 fw-bold text-info mb-2">24/7</div>
                    <p class="text-secondary mb-0">Available Anytime</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="section-surface p-4">
                    <div class="display-5 fw-bold text-success mb-2">Real-time</div>
                    <p class="text-secondary mb-0">Instant Notifications</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="section-surface p-4">
                    <div class="display-5 fw-bold text-danger mb-2">∞</div>
                    <p class="text-secondary mb-0">Unlimited Reports</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section class="bg-primary text-white rounded-4 p-5 p-lg-6 text-center mb-5 mb-lg-6">
        <h2 class="display-5 fw-bold mb-3">Ready to Make a Difference?</h2>
        <p class="lead mb-4">Join thousands of citizens and NGOs protecting children through secure, accountable reporting.</p>
        <div class="d-flex flex-wrap gap-3 justify-content-center">
            <a href="{{ route('register') }}" class="btn btn-warning btn-lg px-5 fw-semibold">Get Started Now</a>
            <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg px-5 fw-semibold">Contact Us</a>
        </div>
    </section>

    <!-- FAQ SECTION -->
    <section class="mb-5 mb-lg-6">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Frequently Asked Questions</h2>
        </div>
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item border-0 section-surface mb-3">
                <h2 class="accordion-header">
                    <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        Is my report really anonymous?
                    </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-secondary">
                        Yes, your personal identity is protected. Reports are stored securely and accessed only by authorized admins and NGO personnel.
                    </div>
                </div>
            </div>
            <div class="accordion-item border-0 section-surface mb-3">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        What happens after I submit a report?
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-secondary">
                        Your report enters our verification queue. Admins review the evidence and may request additional details. You'll receive email notifications about the status.
                    </div>
                </div>
            </div>
            <div class="accordion-item border-0 section-surface mb-3">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                        Can I edit or delete my report?
                    </button>
                </h2>
                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-secondary">
                        You can edit pending reports. Once verified, reports become immutable for audit trail purposes. Contact support if you need assistance.
                    </div>
                </div>
            </div>
            <div class="accordion-item border-0 section-surface mb-3">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                        Who can see my report?
                    </button>
                </h2>
                <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-secondary">
                        Only you and authorized ChildShield admins can view your report details. NGO partners see summarized, anonymized data only.
                    </div>
                </div>
            </div>
            <div class="accordion-item border-0 section-surface">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                        Is there a cost to use ChildShield?
                    </button>
                </h2>
                <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-secondary">
                        No, ChildShield is completely free for all citizens and NGOs. It's funded to support child labour prevention efforts.
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection