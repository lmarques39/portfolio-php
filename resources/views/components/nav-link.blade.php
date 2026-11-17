@props(['active' => false])

<a {{$attributes->class([
    'rounded underline-offset-4 hover:underline',
    'font-semibold text-brand' => $active,
]) }}
    @if ($active) aria-current="page" @endif>
    {{ $slot }}

</a>

