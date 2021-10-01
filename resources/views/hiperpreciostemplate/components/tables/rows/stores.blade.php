@props([
'items',
'disabled' => false,
'readonly' => false,
])
<td class="py-4 px-6 text-left whitespace-nowrap align-top">{{ $items->storeFullName }}</td>
<td class="py-4 px-6 text-left whitespace-nowrap align-top">{{ 'https://' . $items->storeApiUrl }}</td>
<td class="py-4 px-6 text-center align-top">
    <input @if($disabled) disabled @endif @if($readonly) readonly @endif @if ($items->enableApiScrapping) checked @endif
    type="checkbox" />
</td>
<td class="py-4 px-6 text-center align-top">
    <input @if($disabled) disabled @endif @if($readonly) readonly @endif @if ($items->isaVtexStore) checked @endif
    type="checkbox" />
</td>
