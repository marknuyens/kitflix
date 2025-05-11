@props(['content' => null])

<section class="max-w-7xl mx-auto">
    <figure class="relative lg:rounded-xl overflow-hidden aspect-[2/1]">
        <img src="{{ $content->image_url }}" class="w-full h-full object-cover" />
        <!-- Dark overlay -->
        <figcaption class="absolute text-white left-0 bottom-0 right-0 h-96 bg-gradient-to-t from-black/80 to-black/0">
            <div class="absolute bottom-6 left-6 text-shadow">
                <img src="/images/logo.svg" class="w-18 mb-2" />
                <h3 class="block text-4xl font-light">{{ $content->title }}</h3>
                <p class="mt-2 text-md max-w-2/3">{{ $content->description }}</p>
                <div class="flex gap-4 mt-6">
                    <!-- Play Modal -->
                    <x-modal-toggler>
                        <x-slot name="trigger">
                            <x-tertiary-button>
                                <x-icons.play class="size-5" />
                                {{ __('Play') }}
                            </x-tertiary-button>
                        </x-slot>
                        <x-slot name="content">
                            <x-content.video.watch :content="$content" />
                        </x-slot>
                    </x-modal-toggler>
                    <!-- Info Modal -->
                    <x-modal-toggler title="{{ $content->title }}">
                        <x-slot name="trigger">
                            <x-secondary-button>
                                <x-icons.info class="size-5" />
                                {{ __('More info') }}
                            </x-secondary-button>
                        </x-slot>
                        <x-slot name="content">
                            <x-content.video.info :content="$content" />
                        </x-slot>
                    </x-modal-toggler>
                </div>
            </div>
        </figcaption>
    </figure>
</section>
