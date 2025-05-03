@props([
    'name',
    'options' => [],
    'label' => null,
    'selected' => null,
])

@php
    $selected = old($name, $selected);
@endphp

<div class="flex flex-col gap-1">
    @if ($label)
        <label for="{{ $name }}" class="text-sm font-medium text-gray-700">{{ $label }}</label>
    @endif

    <select name="{{ $name }}" id="{{ $name }}" class="bw-input bg-white">
        <option value="" disabled {{ $selected === null || $selected === '' ? 'selected' : '' }}>-- Select --</option>

        @foreach ($options as $option)
            <option value="{{ $option['value'] }}"
                {{ (string)$selected === (string)$option['value'] ? 'selected' : '' }}>
                {{ $option['label'] }}
            </option>
        @endforeach
    </select>
</div>
