@props([
'categorySelect',
'unitSelect',
'columnContents',
])
<table {{ $attributes->merge(['class' => 'min-w-full w-full table-auto']) }} border="0" cellpadding="0" cellspacing="0">
    <tbody class="text-gray-600 text-sm font-light">
        <tr class="border-b-0 border-gray-200 hover:bg-gray-100">
            <td class="py-4 px-0 text-right whitespace-nowrap align-middle font-bold uppercase w-[10%]">
                {{ __('Name') }}
            </td>
            <td class="py-4 px-6 text-center whitespace-nowrap align-middle w-[25%]">
                @empty($columnContents)
                <input type="text" name="nameLong" maxlength="256" value="{{ old('nameLong') }}" class="w-full" />
                @else
                <input type="text" name="nameLong" maxlength="256" value="{{ $columnContents->nameLong }}"
                    class="w-full" />
                @endempty
            </td>
            <td class="py-4 px-0 text-right whitespace-nowrap align-middle font-bold uppercase w-[10%]">
                {{ __('EAN') }}
            </td>
            <td class="py-4 px-6 text-center whitespace-nowrap align-middle w-[25%]">
                @empty($columnContents)
                <input type="text" name="ean" maxlength="20" value="{{ old('ean') }}" class="w-full"
                    placeholder="XXXXXXXXXXXXX" />
                @else
                <input type="text" name="ean" maxlength="20" value="{{ $columnContents->ean }}" class="w-full" />
                @endempty
            </td>
            <td class="py-4 px-0 text-right whitespace-nowrap align-middle font-bold uppercase w-[10%]">
                {{ __('Category') }}
            </td>
            <td class="py-4 px-6 text-center whitespace-nowrap align-middle w-[20%]">
                <select name="belongsToCategory" class="w-full">
                    <option value="">{{ __('Select an option') }}</option>
                    @foreach ($categorySelect as $catID => $category)
                    @empty($columnContents)
                    <option @if(old('belongsToCategory')==($catID+1)) selected @endif value="{{ ($catID+1) }}">
                        {{ $category['name'] }}
                    </option>
                    @else
                    <option @if($columnContents->category->id==($catID+1)) selected @endif value="{{ ($catID+1) }}">
                        {{ $category['name'] }}
                    </option>
                    @endempty
                    @endforeach
                </select>
            </td>
        </tr>
        <tr class="border-b-0 border-gray-200 hover:bg-gray-100">
            <td class="py-4 px-0 text-right whitespace-nowrap align-middle font-bold uppercase">
                {{ __('Short Name') }}
            </td>
            <td class="py-4 px-6 text-center whitespace-nowrap align-middle">
                @empty($columnContents)
                <input type="text" name="nameShort" maxlength="128" value="{{ old('nameShort') }}" class="w-full" />
                @else
                <input type="text" name="nameShort" maxlength="128" value="{{ $columnContents->nameShort }}"
                    class="w-full" />
                @endempty
            </td>
            <td class="py-4 px-0 text-right whitespace-nowrap align-middle font-bold uppercase">
                {{ __('Weight / Units') }}
            </td>
            <td class="py-4 px-6 text-center whitespace-nowrap align-middle">
                <table class="w-full">
                    <tbody>
                        <tr>
                            <td class="w-1/2">
                                @empty($columnContents)
                                <input type="text" name="measuramentMultiplier"
                                    value="{{ old('measuramentMultiplier') }}" class="w-full" placeholder="1" />
                                @else
                                <input type="text" name="measuramentMultiplier"
                                    value="{{ $columnContents->measuramentMultiplier }}" class="w-full" />
                                @endempty
                            </td>
                            <td class="w-1/2">
                                <select name="measuramentUnit" class="w-full">
                                    <option value="">{{ __('Select an option') }}</option>
                                    @foreach ($unitSelect as $value => $name)
                                    @empty($columnContents)
                                    <option @if(old('measuramentUnit')==$value) selected @endif value="{{ $value }}">
                                        {{ $name }}
                                    </option>
                                    @else
                                    <option @if($columnContents->measuramentUnit==$value) selected @endif
                                        value="{{ $value }}">
                                        {{ $name }}
                                    </option>
                                    @endempty
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td class="py-4 px-0 text-right whitespace-nowrap align-middle font-bold uppercase">
                {{ __('Product') }}
            </td>
            <td class="py-4 px-6 text-center whitespace-nowrap align-middle">
                <table>
                    <tbody>
                        <tr>
                            <td class="w-1/3 overflow-hidden">
                                @empty($columnContents)
                                <img src="{{ secure_asset(old('imageUrl')) }}" title="{{ old('nameShort') }}"
                                    class="min-w-[2.5rem] w-autow-auto h-10 mx-auto border-2 border-gray-400 rounded-md" />
                                @else
                                <img src="{{ secure_asset($columnContents->imageUrl) }}"
                                    title="{{ $columnContents->nameShort }}"
                                    class="min-w-[2.5rem] w-autow-auto h-10 mx-auto border-2 border-gray-400 rounded-md" />
                                @endempty
                            </td>
                            <td class="py-4 px-6 text-center whitespace-nowrap align-middle w-2/3">
                                <input type="file" name="imageUrl" class="w-full" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr class="border-b-0 border-gray-200 hover:bg-gray-100">
            <td class="py-4 px-0 text-right whitespace-nowrap align-middle font-bold uppercase">
                {{ __('Meta Name') }}
            </td>
            <td class="py-4 px-6 text-center whitespace-nowrap align-middle">
                @empty($columnContents)
                <input type="text" name="metaName" maxlength="128" value="{{ old('metaName') }}" class="w-full" />
                @else
                <input type="text" name="metaName" maxlength="128" value="{{ $columnContents->metaName }}"
                    class="w-full" />
                @endempty
            </td>
            <td class="py-4 px-0 text-right whitespace-nowrap align-middle font-bold uppercase">
                {{ __('Meta Title') }}
            </td>
            <td class="py-4 px-6 text-center whitespace-nowrap align-middle">
                @empty($columnContents)
                <input type="text" name="metaTitle" maxlength="128" value="{{ old('metaTitle') }}" class="w-full" />
                @else
                <input type="text" name="metaTitle" maxlength="128" value="{{ $columnContents->metaTitle }}"
                    class="w-full" />
                @endempty
            </td>
        </tr>
        <tr class="border-b-0 border-gray-200 hover:bg-gray-100">
            <td class="pb-4 pt-7 px-0 text-right whitespace-nowrap align-top font-bold uppercase">
                {{ __('Meta Description') }}
            </td>
            <td class="py-4 px-6 text-center whitespace-nowrap align-middle" colspan="7">
                @empty($columnContents)
                <textarea name="metaDescription" class="w-full resize-none"
                    rows="3">{{ old('metaDescription') }}</textarea>
                @else
                <textarea name="metaDescription" class="w-full resize-none"
                    rows="3">{{ $columnContents->metaDescription }}</textarea>
                @endempty
            </td>
        </tr>
    </tbody>
</table>
