@props([
'items',
'disabled' => false,
'readonly' => false,
])
<td class="px-6 py-4 text-left align-top whitespace-nowrap">{{ $items->storeFullName }}</td>
<td class="px-6 py-4 text-left align-top whitespace-nowrap">{{ 'https://' . $items->storeApiUrl }}</td>
<td class="py-1.5 px-6 text-center whitespace-nowrap align-top">
    <img src="{{ secure_asset($items->imageUrl) }}" title="{{ $items->storeFullName }}"
        class="min-w-[2.5rem] w-auto h-10 mx-auto border-2 border-gray-400 rounded-md">
</td>
<td class="px-6 py-4 text-center align-top">
    <input @if($disabled) disabled @endif @if($readonly) readonly @endif @if ($items->enableApiScrapping) checked @endif
    type="checkbox" />
</td>
<td class="px-6 py-4 text-center align-top">
    <input @if($disabled) disabled @endif @if($readonly) readonly @endif @if ($items->isaVtexStore) checked @endif
    type="checkbox" />
</td>
