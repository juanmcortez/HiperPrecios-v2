@props([
'items',
'disabled' => false,
'readonly' => false,
])
<td class="py-4 px-6 text-left whitespace-nowrap align-top">{{ $items->name }}</td>
<td class="py-4 px-6 text-left whitespace-nowrap align-top">{{ $items->slug }}</td>
<td class="py-4 px-6 text-left whitespace-normal align-top">{{ $items->similar }}</td>
<td class="py-4 px-6 text-center align-top">
    <input type="checkbox" @if($disabled) disabled @endif @if($readonly) readonly @endif @if ($items->searchable)
    checked @endif />
</td>
<td class="py-4 px-6 text-center align-top">
    <input type="checkbox" @if($disabled) disabled @endif @if($readonly) readonly @endif @if ($items->enabled) checked
    @endif />
</td>
