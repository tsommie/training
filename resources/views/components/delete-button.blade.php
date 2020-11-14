@props(['classes', 'url', 'id'])

<a class="{{ $classes }}" href="{{ $url }}"
   onclick="event.preventDefault();
                 document.getElementById('{{ $id }}').submit();">
    {{ $slot }}
</a>

<form id="{{ $id }}" action="{{ $url }}" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>
