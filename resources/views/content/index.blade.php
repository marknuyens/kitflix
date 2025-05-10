<x-layouts.main :title="$title">
    <!-- Header -->
    <x-content.header :title="$title" :description="$description" />
    @if (request()->routeIs('home'))
        <!-- Hero -->
        <x-content.hero :image="$hero['image']" :content="$hero['content']" />
    @endif
    <!-- Video Sections -->
    <x-content.video-sections :video_sections="$video_sections" />
</x-layouts.main>
