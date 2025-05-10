<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} @if(isset($title)) - {{ $title }} @endif</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <!-- AlpineJS -->
    <script src="//unpkg.com/alpinejs" defer></script>

<body class="bg-neutral-900">
    <!-- Global Header -->
    <x-global-header />

    <!-- Main Content -->
    <main {{ $attributes }}>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="flex justify-between">
        <ul>
            <li><a href="{{ route('privacy') }}">{{ __('Privacy') }}</a></li>
            <li><a href="{{ route('terms') }}">{{ __('Terms & Conditions') }}</a></li>
            <li><a href="{{ route('support') }}">{{ __('Support') }}</a></li>
        </ul>
    </footer>

</body>

</html>
