@props(['video_sections' => []])

<!-- Video Sections -->
@if (count($video_sections))
    <section class="max-w-7xl mx-auto flex flex-wrap gap-6 mt-6">
        @foreach ($video_sections as $video_section)
            <!-- Video Category -->
            <div class="relative w-full">
                <h4 class="text-white text-xl font-medium mb-4">
                    <a href="{{ route('genres', $video_section['title']) }}">
                        {{ $video_section['title'] }}
                    </a>
                </h4>
                <figure class="absolute top-0 right-0 w-48 h-full bg-gradient-to-r from-black/0 to-neutral-900">
                </figure>
                @if ($video_section['videos'])
                    <ul class="flex h-44 gap-8 overflow-x-scroll">
                        @foreach ($video_section['videos'] as $video)
                            <li class="cursor-pointer aspect-video h-full w-72">
                                <img src="{{ $video->image['url'] }}" alt="{{ $video->title }}"
                                    class="h-full w-full rounded-md object-cover" />
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endforeach
    </section>
@endif
