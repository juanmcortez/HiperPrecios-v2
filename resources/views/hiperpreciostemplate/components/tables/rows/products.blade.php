@props([
'items',
'disabled' => false,
'readonly' => false,
])
<td class="py-1.5 px-6 text-center whitespace-nowrap align-top">
    <img src="{{ secure_asset($items->imageUrl) }}" title="{{ $items->nameLong }}"
        class="min-w-[2.5rem] w-auto h-10 mx-auto border-2 border-gray-400 rounded-md">
</td>
<td class="px-6 py-4 text-left align-top whitespace-nowrap">{{ $items->nameLong }}</td>
<td class="px-6 py-4 text-center align-top whitespace-nowrap">{{ $items->ean }}</td>
<td class="px-6 py-4 text-center align-top whitespace-nowrap">{{ $items->brand->name }}</td>
<td class="px-6 py-4 text-center align-top whitespace-nowrap">{{ $items->category->name }}</td>
<td class="px-6 py-4 text-center align-top whitespace-nowrap">
    {{ $items->measuramentMultiplier . ' ' . $items->measuramentUnit }}
</td>
<td class="px-6py-4text-centeralign-topwhitespace-nowrap">
    <ul class="flex flex-col">
        <li class="inline-flex align-middle">
            <img src="{{ secure_asset($items->prices->first()->store->imageUrl) }}"
                title="{{ $items->prices->first()->store->storeFullName }}"
                class="min-w-[2.5rem] w-auto h-10 mx-2 border-2 border-gray-400 rounded-md">
            <p class="px-3 pt-3">$ {{ $items->prices->first()->price }}</p>
        </li>
    </ul>
</td>
