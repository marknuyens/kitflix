@props(['content' => []])

<section class="flex flex-col lg:flex-row justify-between gap-8">
    <img src="{{ $content->image_url }}" loading="lazy" class="w-1/2 object-contain rounded-xl" />
    <article class="w-1/2">
        <p class="text-white/50 text-lg">{{ $content->description }}</p>
        <div class="flex gap-6 mt-12">
            <x-primary-button>
                <x-icons.play class="size-5" />
                {{ __('Play') }}
            </x-primary-button>
            <x-tertiary-button>
                <x-icons.info class="size-5" />
                {{ __('Watch Later') }}
            </x-tertiary-button>
        </div>
    </article>
</section>
