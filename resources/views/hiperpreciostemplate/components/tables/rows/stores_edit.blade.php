@props([
'items',
'disabled' => false,
'readonly' => false,
])
@empty($items)

<td class="py-4 px-6 text-left whitespace-nowrap align-top">
    <input type="text" name="storeShortName" maxlength="64" value="{{ old('storeShortName') }}" class="w-full" />
</td>
<td class="py-4 px-6 text-left whitespace-nowrap align-top">
    <input type="text" name="storeFullName" maxlength="64" value="{{ old('storeFullName') }}" class="w-full" />
</td>
<td class="py-4 px-6 text-left whitespace-nowrap align-top flex flex-row">
    <div class="w-2/12 pt-3 pr-1 text-right">https://</div>
    <div class="w-10/12">
        <input type="text" name="storeApiUrl" maxlength="64" value="{{ old('storeApiUrl') }}" class="w-full" />
    </div>
</td>
<td class="py-4 px-6 text-center align-top">
    <input type="hidden" name="enableApiScrapping" value="off">
    <input type="checkbox" name="enableApiScrapping" @if (old('enableApiScrapping')=="on" ) checked @endif
        class="mt-3" />
</td>
<td class="py-4 px-6 text-center align-top">
    <input type="hidden" name="isaVtexStore" value="off">
    <input type="checkbox" name="isaVtexStore" @if (old('isaVtexStore')=="on" ) checked @endif class="mt-3" />
</td>

@else

<td class="py-4 px-6 text-left whitespace-nowrap align-top">
    <input type="text" name="storeShortName" maxlength="64" value="{{ $items->storeShortName }}" class="w-full" />
</td>
<td class="py-4 px-6 text-left whitespace-nowrap align-top">
    <input type="text" name="storeFullName" maxlength="64" value="{{ $items->storeFullName }}" class="w-full" />
</td>
<td class="py-4 px-6 text-left whitespace-nowrap align-top flex flex-row">
    <div class="w-2/12 pt-3 pr-1 text-right">https://</div>
    <div class="w-10/12">
        <input type="text" name="storeApiUrl" maxlength="64" value="{{ $items->storeApiUrl }}" class="w-full" />
    </div>
</td>
<td class="py-4 px-6 text-center align-top">
    <input type="hidden" name="enableApiScrapping" value="off">
    <input type="checkbox" name="enableApiScrapping" @if ($items->enableApiScrapping) checked @endif class="mt-3" />
</td>
<td class="py-4 px-6 text-center align-top">
    <input type="hidden" name="isaVtexStore" value="off">
    <input type="checkbox" name="isaVtexStore" @if ($items->isaVtexStore) checked @endif class="mt-3" />
</td>

@endempty
