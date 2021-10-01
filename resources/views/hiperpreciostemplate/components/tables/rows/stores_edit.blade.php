@props([
'items',
'disabled' => false,
'readonly' => false,
])
@empty($items)

<td class="py-4 px-6 text-left whitespace-nowrap align-top">
    <input type="text" name="storeShortName" maxlength="64" value="{{ old('storeShortName') }}" />
</td>
<td class="py-4 px-6 text-left whitespace-nowrap align-top">
    <input type="text" name="storeFullName" maxlength="64" value="{{ old('storeFullName') }}" />
</td>
<td class="py-4 px-6 text-left whitespace-nowrap align-top">
    <input type="text" name="storeApiUrl" maxlength="64" value="{{ old('storeApiUrl') }}" />
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
    <input type="text" name="storeShortName" maxlength="64" value="{{ $items->storeShortName }}" />
</td>
<td class="py-4 px-6 text-left whitespace-nowrap align-top">
    <input type="text" name="storeFullName" maxlength="64" value="{{ $items->storeFullName }}" />
</td>
<td class="py-4 px-6 text-left whitespace-nowrap align-top">
    <input type="text" name="storeApiUrl" maxlength="64" value="{{ $items->storeApiUrl }}" />
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
