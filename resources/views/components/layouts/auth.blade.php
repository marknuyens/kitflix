@props(['title' => '', 'width' => 'max-w-4xl'])

<x-layouts.main class="{{ $width }} rounded-xl bg-white/10 my-12 px-8 py-7.5 border border-white/10 mx-auto text-white">
    <h1 class="text-3xl">{{ $title }}</h1>
    <hr class="border-white/20 my-6" />
    {{ $slot }}
</x-layouts.main>