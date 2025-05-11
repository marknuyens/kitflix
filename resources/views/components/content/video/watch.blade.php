@props(['content' => null])

<div class="relative aspect-video">
    <iframe loading="lazy" class="absolute top-0 left-0 w-full h-full" src="{{ $content->embed_url }}"
        title="{{ $content->tirle }}" frameborder="0" allowfullscreen></iframe>
</div>
