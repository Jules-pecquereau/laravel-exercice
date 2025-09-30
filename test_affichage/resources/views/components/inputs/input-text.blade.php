@props([
    'property',
    'label',
])

<label for="{{ $property }}">{{ $label }}</label>
<input type="text" name="{{ $property }}" id="{{ $property }}" value="" >
