@props(['value' => null, 'options' => [], 'placeholder' => __('- Select an option')])

<select {{ $attributes->merge(['class' => 'block w-full px-3 py-2 rounded-md bg-white text-black shadow-sm']) }}>
    @if ($placeholder)
        <option value="" disabled selected>{{ $placeholder }}</option>
    @endif
    @foreach ($options as $key => $text)
        <option @if ($value == $key) selected @endif value="{{ $key }}">{{ $text }}
        </option>
    @endforeach
</select>
