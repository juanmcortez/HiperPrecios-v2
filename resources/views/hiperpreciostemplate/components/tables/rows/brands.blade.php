@props([
'items',
'disabled' => false,
'readonly' => false,
])
<td class="px-6 py-4 text-left align-top whitespace-nowrap">{{ $items->name }}</td>
<td class="px-6 py-4 text-left align-top whitespace-nowrap">{{ $items->slug }}</td>
