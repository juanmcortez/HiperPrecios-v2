@props([
'showBtn' => false,
'editBtn' => false,
'deleteBtn' => false,
'routeName',
'paramName',
'itemId',
])

@if($showBtn)
<td class="py-4 px-0 text-center w-10 align-top">
    <a href="{{ route("$routeName.show", ["$paramName" => $itemId]) }}" title="{{ __("Show item") }}"
        class="w-4 transform hover:text-yellow-500 hover:scale-110 duration-300">
        <i class="fas fa-eye"></i>
    </a>
</td>
@else
<td class="py-4 px-0 text-center w-10 align-top">&nbsp;</td>
@endif

@if($editBtn)
<td class="py-4 px-0 text-center w-10 align-top">
    <a href="{{ route("$routeName.edit", ["$paramName" => $itemId]) }}" title="{{ __("Edit item") }}"
        class="w-4 transform hover:text-yellow-500 hover:scale-110 duration-300">
        <i class="fas fa-edit"></i>
    </a>
</td>
@else
<td class="py-4 px-0 text-center w-10 align-top">&nbsp;</td>
@endif

@if($deleteBtn)
<td class="py-4 px-0 text-center w-10 align-top">
    <form method="POST" action="{{ route("$routeName.delete", ["$paramName" => $itemId]) }}">
        @csrf
        @method('PATCH')
        <button type="submit" title="{{ __("Delete item") }}"
            class="w-4 transform hover:text-red-500 hover:scale-110 duration-300">
            <i class="fas fa-trash"></i>
        </button>
    </form>
</td>
@else
<td class="py-4 px-0 text-center w-10 align-top">&nbsp;</td>
@endif
