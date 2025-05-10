@php $el = isset($href) ? 'a' : 'button' @endphp

<{{ $el }} {{ $attributes->merge(['class' => 'inline-flex items-center justify-center gap-1 px-4 py-2 rounded-lg text-shadow transition-colors']) }}>{{ $text ?? $slot }}</{{ $el }}>