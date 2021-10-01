@props([
'items',
'disabled' => false,
'readonly' => false,
])
@empty($items)

<td class="py-4 px-6 text-left whitespace-nowrap align-top">
    <input type="text" name="name" maxlength="64" value="{{ old('name') }}" />
</td>
<td class="py-4 px-6 text-left whitespace-nowrap align-top">
    <input type="text" name="slug" maxlength="64" value="{{ old('slug') }}" />
</td>
<td class="py-4 px-6 text-left align-top">
    <textarea name="similar" rows="10">{{ old('similar') }}</textarea>
</td>
<td class="py-4 px-6 text-center align-top">
    <input type="hidden" name="searchable" value="off">
    <input type="checkbox" name="searchable" @if (old('searchable')=="on" ) checked @endif />
</td>
<td class="py-4 px-6 text-center align-top">
    <input type="hidden" name="enabled" value="off">
    <input type="checkbox" name="enabled" @if (old('enabled')=="on" ) checked @endif />
</td>

@else

<td class="py-4 px-6 text-left whitespace-nowrap align-top">
    <input type="text" name="name" maxlength="64" value="{{ $items->name }}" />
</td>
<td class="py-4 px-6 text-left whitespace-nowrap align-top">
    <input type="text" name="slug" maxlength="64" value="{{ $items->slug }}" />
</td>
<td class="py-4 px-6 text-left align-top">
    <textarea name="similar" rows="10">{{ $items->similar }}</textarea>
</td>
<td class="py-4 px-6 text-center align-top">
    <input type="hidden" name="searchable" value="off">
    <input type="checkbox" name="searchable" @if ($items->searchable) checked @endif />
</td>
<td class="py-4 px-6 text-center align-top">
    <input type="hidden" name="enabled" value="off">
    <input type="checkbox" name="enabled" @if ($items->enabled) checked @endif />
</td>

@endempty
