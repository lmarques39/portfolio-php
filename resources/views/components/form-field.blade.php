@props(['name', 'label', 'type' => 'text'])

<div>
    <label for="{{ $name }}" class="block font-semibold">{{ $label }}</label>

    @if ($type === 'textarea')
        <textarea id="{{ $name }}" name="{{ $name }}" rows="6"
            @error($name) aria-invalid="true" aria-describedby="{{ $name }}-erro" @enderror
            {{ $attributes->merge(['class' => 'mt-1 w-full rounded border border-muted px-3 py-2']) }}>{{ old($name) }}</textarea>
    @else
        <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" value="{{ old($name) }}"
            @error($name) aria-invalid="true" aria-describedby="{{ $name }}-erro" @enderror
            {{ $attributes->merge(['class' => 'mt-1 w-full rounded border border-muted px-3 py-2']) }}>
    @endif

    @error($name)
        <p id="{{ $name }}-erro" class="mt-1 text-sm text-red-700">{{ $message }}</p>
    @enderror
</div>