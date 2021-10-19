@props([
'items',
'disabled' => false,
'readonly' => false,
])
@empty($items)

<td class="px-6 py-4 text-left align-top whitespace-nowrap">
    <input type="text" name="storeShortName" maxlength="64" value="{{ old('storeShortName') }}" class="w-full" />
</td>
<td class="px-6 py-4 text-left align-top whitespace-nowrap">
    <input type="text" name="storeFullName" maxlength="64" value="{{ old('storeFullName') }}" class="w-full" />
</td>
<td class="flex flex-row px-6 py-4 text-left align-top whitespace-nowrap">
    <div class="w-2/12 pt-3 pr-1 text-right">https://</div>
    <div class="w-10/12">
        <input type="text" name="storeApiUrl" maxlength="64" value="{{ old('storeApiUrl') }}" class="w-full" />
    </div>
</td>
<td class="px-6 py-4 text-left align-top whitespace-nowrap">
    <table>
        <tbody>
            <tr>
                <td class="w-1/3 overflow-hidden">
                    @empty($items)
                    <img src="{{ secure_asset(old('imageUrl')) }}" title="{{ old('storeFullName') }}"
                        class="min-w-[2.5rem] w-autow-auto h-10 mx-auto border-2 border-gray-400 rounded-md" />
                    @else
                    <img src="{{ secure_asset($items->imageUrl) }}" title="{{ $items->storeFullName }}"
                        class="min-w-[2.5rem] w-autow-auto h-10 mx-auto border-2 border-gray-400 rounded-md" />
                    @endempty
                </td>
                <td class="w-2/3 px-6 py-0 text-center align-middle whitespace-nowrap">
                    <input type="file" name="imageUrl" class="w-full" value="{{ secure_asset(old('imageUrl')) }}" />
                </td>
            </tr>
        </tbody>
    </table>
</td>
<td class="px-6 py-4 text-center align-top">
    <input type="hidden" name="enableApiScrapping" value="off">
    <input type="checkbox" name="enableApiScrapping" @if (old('enableApiScrapping')=="on" ) checked @endif
        class="mt-3" />
</td>
<td class="px-6 py-4 text-center align-top">
    <input type="hidden" name="isaVtexStore" value="off">
    <input type="checkbox" name="isaVtexStore" @if (old('isaVtexStore')=="on" ) checked @endif class="mt-3" />
</td>

@else

<td class="px-6 py-4 text-left align-top whitespace-nowrap">
    <input type="text" name="storeShortName" maxlength="64" value="{{ $items->storeShortName }}" class="w-full" />
</td>
<td class="px-6 py-4 text-left align-top whitespace-nowrap">
    <input type="text" name="storeFullName" maxlength="64" value="{{ $items->storeFullName }}" class="w-full" />
</td>
<td class="flex flex-row px-6 py-4 text-left align-top whitespace-nowrap">
    <div class="w-2/12 pt-3 pr-1 text-right">https://</div>
    <div class="w-10/12">
        <input type="text" name="storeApiUrl" maxlength="64" value="{{ $items->storeApiUrl }}" class="w-full" />
    </div>
</td>
<td class="px-6 py-4 text-left align-top whitespace-nowrap">
    <table>
        <tbody>
            <tr>
                <td class="w-1/3 overflow-hidden">
                    @empty($items)
                    <img src="{{ secure_asset(old('imageUrl')) }}" title="{{ old('storeFullName') }}"
                        class="min-w-[2.5rem] w-autow-auto h-10 mx-auto border-2 border-gray-400 rounded-md" />
                    @else
                    <img src="{{ secure_asset($items->imageUrl) }}" title="{{ $items->storeFullName }}"
                        class="min-w-[2.5rem] w-autow-auto h-10 mx-auto border-2 border-gray-400 rounded-md" />
                    @endempty
                </td>
                <td class="w-2/3 px-6 py-0 text-center align-middle whitespace-nowrap">
                    <input type="file" name="imageUrl" class="w-full" value="{{ secure_asset(old('imageUrl')) }}" />
                </td>
            </tr>
        </tbody>
    </table>
</td>
<td class="px-6 py-4 text-center align-top">
    <input type="hidden" name="enableApiScrapping" value="off">
    <input type="checkbox" name="enableApiScrapping" @if ($items->enableApiScrapping) checked @endif class="mt-3" />
</td>
<td class="px-6 py-4 text-center align-top">
    <input type="hidden" name="isaVtexStore" value="off">
    <input type="checkbox" name="isaVtexStore" @if ($items->isaVtexStore) checked @endif class="mt-3" />
</td>

@endempty
