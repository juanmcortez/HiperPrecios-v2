@props([
'columnHeaders',
'columnContents',
'columnFooters',
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
        </tr>
    </thead>
    @endempty

    @empty ($columnContents)
    <tbody class="text-gray-600 text-sm font-light">
        <tr class="border-b border-gray-200 hover:bg-gray-100">
            <x-tables.rows.categories_edit />
        </tr>
    </tbody>
    @else
    <tbody class="text-gray-600 text-sm font-light">
        <tr class="border-b border-gray-200 hover:bg-gray-100">
            <x-tables.rows.categories_edit :items="$columnContents" />
        </tr>
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
        </tr>
    </tfoot>
    @endempty
</table>
