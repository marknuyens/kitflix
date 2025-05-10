@php $el = isset($href) ? 'a' : 'button' @endphp

<{{ $el }} {{ $attributes->merge(['class' => 'px-3 py-2 bg-red-500 text-white font-medium rounded-lg cursor-pointer']) }}>{{ $text ?? $slot }}</{{ $el }}>