@props([
'routeName',
'paramName',
'itemId'
])
<div class="flex flex-row p-5 items-end justify-end">
    <button type="submit"
        class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-green-600 bg-green-50 hover:text-green-800 hover:bg-green-100 active:bg-green-200 focus:ring-green-300 mr-5">
        <i class="fas fa-save"></i> {{ __('Save') }}
    </button>
    @isset($itemID)
    <a href="{{ route("$routeName.show", ["$paramName" => $itemId]) }}"
        class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-red-600 bg-red-50 hover:text-red-800 hover:bg-red-100 active:bg-red-200 focus:ring-red-300">
        <i class="fas fa-times"></i> {{ __('Cancel') }}
    </a>
    @else
    <a href="{{ route("$routeName.list") }}"
        class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-red-600 bg-red-50 hover:text-red-800 hover:bg-red-100 active:bg-red-200 focus:ring-red-300">
        <i class="fas fa-times"></i> {{ __('Cancel') }}
    </a>
    @endisset
</div>
