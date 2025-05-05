@props([
    'icon' => 'save',
    'type' => 'submit',
    'class' => '',
    'color' => 'green',
    'tooltip' => null,
    'disabled' => false,
])

@php
    $textClass = "text-{$color}-500";
    $borderClass = "border-2 border-{$color}-500";
    $hoverClass = "hover:bg-{$color}-100";
    $opacityClass = $disabled ? 'opacity-50 cursor-not-allowed' : '';

@endphp

<div class="relative group inline-block">
    <button   @if($disabled) disabled @endif type="{{ $type }}"
        {{ $attributes->merge([
            'class' => "$textClass p-2 rounded-full $borderClass $hoverClass transition $class $opacityClass"
        ]) }}>
        <i data-lucide="{{ $icon }}"></i>
    </button>

    @if($tooltip)
        <div class="absolute z-10 hidden group-hover:block bg-gray-700 text-white text-xs rounded py-1 px-2
                    bottom-full left-1/2 transform -translate-x-1/2 mb-2 whitespace-nowrap">
            {{ $tooltip }}
        </div>
    @endif
</div>
