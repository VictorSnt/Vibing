@props(['link'])


@if (strpos($link, 'http') === 0)
    <img src="{{ $link }}" class="object-cover w-24 h-24 rounded-full" />
@else
    <img src="{{ asset('storage/' . $link) }}" class="object-cover w-24 h-24 rounded-full" />
@endif