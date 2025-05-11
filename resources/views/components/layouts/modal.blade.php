@props(['key' => null, 'title' => null])

<div {{ $attributes }} x-show="{{ $key }}" style="display: none;">
    <section class="fixed inset-12 p-10 bg-neutral-900 rounded-xl shadow-xl z-90 overflow-scroll">
        @if ($title)
            <header class="flex justify-between pb-8 mb-8 border-b border-white/20 text-white">
                <h2 class="text-2xl font-medium ml-1">{{ $title }}</h2>
                <button @click="{{ $key }} = false" class="px-8 py-2 -mr-4 text-white/50 hover:text-white"
                    title="{{ __('Close') }}">
                    <x-icons.close class="size-5" />
                </button>
            </header>
        @endif
        <main>
            {{ $slot }}
        </main>
    </section>
    <!-- Backdrop -->
    <div class="bg-black/50 fixed inset-0 z-80" @click="{{ $key }} = false"></div>
</div>
