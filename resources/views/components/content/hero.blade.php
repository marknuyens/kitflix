@props(['image' => null, 'content' => null])

<section class="max-w-7xl mx-auto">
    <figure class="relative lg:rounded-xl overflow-hidden">
        <img src="{{ $image['url'] }}" width="{{ $image['width'] }}" height="{{ $image['height'] }}"
            class="w-full aspect-[2/1] h-full object-cover" />
        <figcaption
            class="absolute text-white left-0 bottom-0 right-0 h-54 bg-gradient-to-t from-black/80 to-black/0">
            <div class="absolute bottom-6 left-6 text-shadow">
                <img src="/images/logo.svg" class="w-18 mb-2" />
                <h3 class="block text-4xl font-light">{{ $content->title }}</h3>
                <p class="mt-2 text-md max-w-2/3">{{ $content->description }}</p>
                <div class="flex gap-4 mt-6">
                    <x-tertiary-button>
                        <x-icons.play class="size-5" />
                        {{ __('Play') }}
                    </x-tertiary-button>
                    <x-secondary-button>
                        <x-icons.info class="size-5" />
                        {{ __('More info') }}
                    </x-seconda-button>
                </div>
            </div>
        </figcaption>
    </figure>
</section>