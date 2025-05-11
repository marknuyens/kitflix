@props(['video_sections' => []])

@if (count($video_sections))
    <section class="max-w-7xl mx-auto flex flex-wrap gap-6 mt-6">
        @foreach ($video_sections as $video_section)
            <!-- Video Category -->
            <div class="relative w-full group">
                <h4 class="text-white text-xl font-medium mb-4">
                    <a href="{{ route('genres', $video_section['title']) }}" class="border-b-2 border-white/20">
                        {{ $video_section['title'] }}
                    </a>
                </h4>
                <figure
                    class="absolute top-0 right-0 w-56 h-full bg-gradient-to-r from-black/0 to-neutral-900 z-20 group-hover:hidden">
                </figure>
                @if ($video_section['videos'])
                    <ul class="flex h-44 gap-4 overflow-x-scroll">
                        @foreach ($video_section['videos'] as $i => $video)
                            <x-modal-toggler>
                                <x-slot name="trigger">
                                    <li class="relative flex justify-end cursor-pointer w-72 h-44">
                                        <img src="{{ $video->image_url }}" alt="{{ $video->title }}"
                                            class="{{ isset($video_section['count']) ? 'w-1/2' : 'w-full' }} h-full rounded-md object-cover z-10" />
                                        @if (isset($video_section['count']))
                                            <figure
                                                class="absolute top-0 {{ $i == 0 ? 'left-17' : ($i == 9 ? '-left-2' : 'left-8') }} leading-45 h-full overflow-hidden text-[14rem] font-bold text-neutral-900 text-outline">
                                                {{ $i + 1 }}</figure>
                                        @endif
                                    </li>
                                </x-slot>
                                <x-slot name="content">
                                    <x-content.video.info :content="$video" />
                                </x-slot>
                            </x-modal-toggler>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endforeach
    </section>
@endif
