<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', __('childshield.brand')) }}</title>
    <meta name="description" content="{{ __('childshield.tagline') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- Fonts: Outfit (Bauhaus) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;700;900&display=swap" rel="stylesheet">
    <style>
        .accordion {
            display: block !important;
            visibility: visible !important;
        }
        .accordion-body {
            display: block !important;
            visibility: visible !important;
        }
        .collapse.show {
            display: block !important;
            visibility: visible !important;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="childshield-body">
    @include('layouts.navbar')

    <main class="childshield-main">
        <div class="w-full max-w-7xl mx-auto py-5 px-1 py-lg-4">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger shadow-sm">
                    <strong>Please review the highlighted fields.</strong>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script>
        // Ensure all Bootstrap components are initialized
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize all tooltips and popovers
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Fix accordion display
            const accordions = document.querySelectorAll('.accordion');
            accordions.forEach(accordion => {
                accordion.style.display = 'block';
                accordion.style.visibility = 'visible';
            });
        });
    </script>
    @stack('scripts')
</body>
</html>