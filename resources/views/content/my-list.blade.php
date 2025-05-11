<x-layouts.main :title="$title">
    <!-- Header -->
    <x-content.header :title="$title" :description="$description" />
    <!-- Video Sections -->
    <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-6 gap-y-8 max-w-7xl mx-auto px-6 lg:px-0">
        @foreach ($videos as $video)
            <x-modal-toggler>
                <x-slot name="trigger">
                    <li>
                        <img src="{{ $video->image_url }}" alt="{{ $video->title }}"
                            class="w-full h-54 rounded-md object-cover z-10" />
                    </li>
                </x-slot>
                <x-slot name="content">
                    <x-content.video.info :content="$video" />
                </x-slot>
            </x-modal-toggler>
        @endforeach
    </ul>
</x-layouts.main>
