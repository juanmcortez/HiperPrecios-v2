@props([
'items',
'disabled' => false,
'readonly' => false,
])
<td class="py-1.5 px-6 text-center whitespace-nowrap align-top">
    <img src="{{ secure_asset($items->imageUrl) }}" title="{{ $items->nameLong }}"
        class="min-w-[2.5rem] w-auto h-10 mx-auto border-2 border-gray-400 rounded-md">
</td>
<td class="py-4 px-6 text-left whitespace-nowrap align-top">{{ $items->nameLong }}</td>
<td class="py-4 px-6 text-center whitespace-nowrap align-top">{{ $items->ean }}</td>
<td class="py-4 px-6 text-center whitespace-nowrap align-top">{{ $items->category->name }}</td>
<td class="py-4 px-6 text-center whitespace-nowrap align-top">
    {{ $items->measuramentMultiplier . ' ' . $items->measuramentUnit }}
</td>
<td class="py-4 px-6 text-center whitespace-nowrap align-top">{{ $items->updated_at }}</td>
