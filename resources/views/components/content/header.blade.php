@props(['title' => null, 'description' => null])

<header
    class="max-w-7xl mx-auto px-6 2xl:px-0 mt-6 flex flex-col lg:flex-row gap-8 justify-between items-start lg:items-center pb-4 mb-4">
    @if ($title)
        <h1 class="text-white font-bold text-3xl">
            {{ $title }}
            @if ($description)
                <small class="ml-4 text-sm text-white/60">{{ $description }}</small>
            @endif
        </h1>
    @endif
    <div class="flex items-center gap-6 h-10" x-data="{ showTools: false }">
        <!-- Tools Form -->
        <form method="get" class="flex justify-end gap-12 transition-opacity duration-300 opacity-100 lg:opacity-0" x-bind:class="showTools ? 'lg:opacity-100' : 'lg:opacity-0'">
            <fieldset class="flex gap-4">
                <x-input name="search" value="{{ request()->input('search') }}"
                    placeholder="{{ __('Search by title, actor or genre') }}" />
                <x-primary-button type="submit" :text="__('Search')" />
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
                <x-primary-button type="submit" :text="__('Sort')" />
            </fieldset>
        </form>
        <!-- Tools Toggle Button -->
        <button class="size-5 text-white/50 hover:text-white hidden lg:block" @click="showTools = !showTools">
            <x-icons.tools x-show="!showTools" />
            <x-icons.close x-show="showTools" />
        </button>
    </div>
</header>
