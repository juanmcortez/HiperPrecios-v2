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
    <thead>
        <tr>
            <td></td>
        </tr>
    </thead>
    @else
    <thead>
        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            @foreach ($columnHeaders as $columnHead)
            <th class="py-4 px-6 text-center w-[{{ (91/count($columnHeaders)).'%' }}]">
                {{ __($columnHead) }}
            </th>
            @endforeach
            <th colspan="3" class="py-4 px-0 text-center w-[9%]">
                <a href="{{ route("$routeBtn.create") }}" title="{{ __('New Item') }}"
                    class="bg-gray-500 text-white active:bg-gray-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                    <i class="fas fa-plus-circle"></i> {{ __('New Item') }}
                </a>
            </th>
        </tr>
    </thead>
    @endempty

    @empty ($columnContents)
    <tbody>
        <tr>
            <td></td>
        </tr>
    </tbody>
    @else
    <tbody class="text-gray-600 text-sm font-light">
        @if($enableShow)
        {{-- If we show the show button we are seeing a lot of items --}}
        @forelse ($columnContents as $content)
        <tr class="border-b border-gray-200 hover:bg-gray-100">
            @switch($routeBtn)
            @case('products')
            <x-tables.rows.products :items="$content" disabled readonly />
            @break
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
        @empty
        <tr class="border-b border-gray-200 hover:bg-gray-100">
            <td class="py-4 px-6 text-center whitespace-nowrap align-top" colspan="{{ count($columnHeaders)+1 }}">
                {!! __('No <strong>:item</strong> available in the system.', ['item' => $routeBtn]) !!}
            </td>
        </tr>
        @endforelse
        @else
        {{-- If not we are seeing a single item --}}
        <tr class="border-b border-gray-200 hover:bg-gray-100">
            @switch($routeBtn)
            @case('products')
            <x-tables.rows.products :items="$columnContents" disabled readonly />
            @break
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
    <tfoot>
        <tr>
            <td></td>
        </tr>
    </tfoot>
    @else
    <tfoot>
        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            @foreach ($columnFooters as $columnFoot)
            <td class="py-4 px-6 text-center w-[{{ (91/count($columnFooters)).'%' }}]">{{ __($columnFoot) }}</td>
            @endforeach
            <td colspan="3" class="py-4 px-0 text-center w-[9%]">&nbsp;</td>
        </tr>
    </tfoot>
    @endempty
</table>
