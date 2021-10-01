@props([
'columnHeaders',
'columnContents',
'columnFooters',
'enableShow' => false,
'enableEdit' => false,
'enableDelete' => false,
'routeBtn',
'paramBtn',
])
<table {{ $attributes->merge(['class' => 'min-w-full w-full table-auto']) }} border="0" cellpadding="0" cellspacing="0">
    @empty ($columnHeaders)
    <thead></thead>
    @else
    <thead>
        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            @foreach ($columnHeaders as $columnHead)
            <th class="py-4 px-6 text-center w-80">{{ __($columnHead) }}</th>
            @endforeach
            <th class="py-4 px-0 text-center w-10">&nbsp;</th>
            <th class="py-4 px-0 text-center w-10">&nbsp;</th>
            <th class="py-4 px-0 text-center w-10">&nbsp;</th>
        </tr>
    </thead>
    @endempty

    @empty ($columnContents)
    <tbody class="text-gray-600 text-sm font-light"></tbody>
    @else
    <tbody class="text-gray-600 text-sm font-light">
        @if($enableShow)
        {{-- If we show the show button we are seeing a lot of items --}}
        @foreach ($columnContents as $content)
        <tr class="border-b border-gray-200 hover:bg-gray-100">
            @switch($routeBtn)
            @case('stores')
            <x-tables.rows.stores :items="$content" disabled readonly />
            @break
            @case('categories')
            <x-tables.rows.categories :items="$content" disabled readonly />
            @break
            @endswitch

            <x-tables.rows.buttons :showBtn="$enableShow" :editBtn="$enableEdit" :deleteBtn="$enableDelete"
                routeName="{{ $routeBtn }}" paramName="{{ $paramBtn }}" itemId="{{ $content->id }}" />
        </tr>
        @endforeach
        @else
        {{-- If not we are seeing a single item --}}
        <tr class="border-b border-gray-200 hover:bg-gray-100">
            @switch($routeBtn)
            @case('stores')
            <x-tables.rows.stores :items="$columnContents" disabled readonly />
            @break
            @case('categories')
            <x-tables.rows.categories :items="$columnContents" disabled readonly />
            @break
            @endswitch

            <x-tables.rows.buttons :editBtn="$enableEdit" :deleteBtn="$enableDelete" routeName="{{ $routeBtn }}"
                paramName="{{ $paramBtn }}" itemId="{{ $columnContents->id }}" />
        </tr>
        @endif
    </tbody>
    @endempty

    @empty ($columnFooters)
    <tfoot></tfoot>
    @else
    <tfoot>
        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            @foreach ($columnFooters as $columnFoot)
            <th class="py-4 px-6 text-center w-80">{{ __($columnFoot) }}</th>
            @endforeach
            <th class="py-4 px-0 text-center w-10">&nbsp;</th>
            <th class="py-4 px-0 text-center w-10">&nbsp;</th>
            <th class="py-4 px-0 text-center w-10">&nbsp;</th>
        </tr>
    </tfoot>
    @endempty
</table>
