<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', __('childshield.brand')) }}</title>
    <meta name="description" content="{{ __('childshield.tagline') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="childshield-body">
    @include('layouts.navbar')

    <main class="childshield-main">
        <div class="container py-4 py-lg-5">
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
    @stack('scripts')
</body>
</html>