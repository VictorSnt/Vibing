@props(['link'])

{{-- local storage {{ asset('storage/' . $song->artist->image) }} --}}
<img src="{{ $link }}" class="object-cover w-24 h-24 rounded-full" />
