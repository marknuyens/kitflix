@props(['title' => null, 'description' => null])

<header class="max-w-7xl mx-auto mt-6 flex justify-between items-center pb-6 mb-6 border-b border-white/20">
    @if ($title)
        <h1 class="text-white font-bold text-3xl">
            {{ $title }}
            @if ($description)
                <small class="ml-4 text-sm text-white/60">{{ $description }}</small>
            @endif
        </h1>
    @endif
    <form method="get" class="flex justify-end gap-12">
        <fieldset class="flex gap-4">
            <x-input name="search" value="{{ request()->input('search') }}"
                placeholder="{{ __('Search by title, actor or genre') }}" />
            <x-button type="submit" :text="__('Search')" />
        </fieldset>
        <fieldset class="flex gap-4">
            <x-select name="sort" value="{{ request()->input('sort') }}"
                placeholder="{{ __('– Sort by title, release or score') }}" :options="[
                    'name_asc' => __('Title: a-z'),
                    'name_desc' => __('Title: z-a'),
                    'release_asc' => __('Release: old to new'),
                    'release_desc' => __('Release: new to old'),
                    'score_desc' => __('Score: awful to excellent'),
                    'score_asc' => __('Score: excellent to awful'),
                ]" />
            <x-button type="submit" :text="__('Sort')" />
        </fieldset>
    </form>
</header>
