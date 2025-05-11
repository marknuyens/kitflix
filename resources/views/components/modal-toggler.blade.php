@props(['key' => null, 'title' => null])
@php $key ??= 'modal_'.str()->random(5) @endphp

<div {{ $attributes }} x-data="{ {{ $key }}: false }" @keyup.escape="{{ $key }} = false" tabindex="10">
    <div @click="{{ $key }} = true">
        {{ $trigger }}
    </div>
    <x-layouts.modal :key="$key" :title="$title">
        {{ $content }}
    </x-layouts.modal>
</div>
