@props(['align' => 'left'])

@php
    $textAlighClass = [
        'left' => 'text-left',
        'right' => 'text-right',
        'center' => 'text-center',
    ][$align] ?? 'text-left';
@endphp

<td class="whitespace-nowrap px-2 py-4">
    {{ $slot }}
</td>
