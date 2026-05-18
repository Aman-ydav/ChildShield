<x-app-layout>
    <x-slot name="header">
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
            <div>
                <h2 class="bauhaus-uppercase text-3xl mb-1">Profile</h2>
                <p class="text-secondary mb-0">Update account details, password, and privacy settings.</p>
            </div>
            <a href="{{ route('dashboard') }}" class="bauhaus-btn bauhaus-btn--outline">Back to Dashboard</a>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 gap-6">
        <div class="bauhaus-card p-5 p-lg-6">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="bauhaus-card p-5 p-lg-6">
            @include('profile.partials.update-password-form')
        </div>

        <div class="bauhaus-card p-5 p-lg-6">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</x-app-layout>
