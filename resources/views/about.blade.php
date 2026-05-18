@extends('layouts.master')

@section('content')
    <div class="max-w-6xl mx-auto py-16 px-6">
        <section class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start mb-12">
            <div>
                <h1 class="bauhaus-uppercase text-4xl lg:text-5xl mb-4">About ChildShield</h1>
                <p class="text-lg text-[#333] max-w-2xl">ChildShield is built to simplify and secure how communities report child protection incidents. We combine lightweight mobile-first reporting with role-based verification and clear case management so NGOs and authorities can act faster and more confidently.</p>
                <div class="mt-6">
                    <a href="{{ route('contact') }}" class="bauhaus-btn bauhaus-btn--blue mr-3">Contact Us</a>
                    <a href="{{ route('register') }}" class="bauhaus-btn bauhaus-btn--red">Create Account</a>
                </div>
            </div>

            <div>
                <div class="bauhaus-card p-6">
                    <h4 class="font-bold mb-2">Our objectives</h4>
                    <ul class="text-sm text-[#444] list-disc pl-5">
                        <li>Increase reporting speed and accessibility</li>
                        <li>Protect reporter privacy and sensitive evidence</li>
                        <li>Provide transparent verification and audit trails</li>
                        <li>Enable coordinated responses across agencies and NGOs</li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="mb-12">
            <h3 class="bauhaus-subhead text-xl mb-4">The project at a glance</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bauhaus-card p-6">
                    <h5 class="font-black text-2xl mb-2">Tech</h5>
                    <p class="text-sm">Laravel 10, Tailwind, Vite, Alpine — server-rendered Blade views for reliability and low-friction deployment.</p>
                </div>
                <div class="bauhaus-card p-6">
                    <h5 class="font-black text-2xl mb-2">Privacy</h5>
                    <p class="text-sm">Encrypted attachments, role-based access controls, and minimal personal data collection by default.</p>
                </div>
                <div class="bauhaus-card p-6">
                    <h5 class="font-black text-2xl mb-2">Deployment</h5>
                    <p class="text-sm">Runs on a standard PHP-FPM + nginx stack; can be deployed to VPS, Forge, Render, or container platforms.</p>
                </div>
            </div>
        </section>

        <section class="mb-12">
            <h3 class="bauhaus-subhead text-xl mb-4">Team & contributors</h3>
            <p class="text-sm text-[#444] mb-4">Core contributors and partner NGOs collaborate on development, translations, and field deployments. If you'd like to contribute, contact us.</p>
            <div class="flex gap-4 flex-wrap">
                <div class="p-4 bg-white border-2 border-[var(--bauhaus-border)]">Lead Developer</div>
                <div class="p-4 bg-white border-2 border-[var(--bauhaus-border)]">NGO Liaison</div>
                <div class="p-4 bg-white border-2 border-[var(--bauhaus-border)]">Field Coordinator</div>
            </div>
        </section>

        <section class="py-12 text-center">
            <div class="inline-block p-8 bg-white border-4 border-[var(--bauhaus-border)]">
                <h3 class="bauhaus-uppercase text-2xl mb-4">Want to deploy ChildShield?</h3>
                <p class="mb-6">We provide deployment guides and can help with setup in new regions.</p>
                <a href="{{ route('contact') }}" class="bauhaus-btn bauhaus-btn--outline">Request Support</a>
            </div>
        </section>
    </div>
@endsection