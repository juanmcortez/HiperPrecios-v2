<x-main-layout>
    <h1 class="py-4 px-6 text-xl font-bold text-gray-700 mb-2">
        {{ __('New Store') }}
    </h1>
    <form method="POST" action="{{ route('stores.store') }}">
        @csrf
        @method('POST')
        <table class="min-w-max w-full table-auto" border="0" cellpadding="0" cellspacing="0">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-4 px-6 text-left">{{ __('System Name') }}</th>
                    <th class="py-4 px-6 text-left">{{ __('Store Name') }}</th>
                    <th class="py-4 px-6 text-left">{{ __('Store API Url') }}</th>
                    <th class="py-4 px-6 text-center">{{ __('Get products and prices?') }}</th>
                    <th class="py-4 px-6 text-center">{{ __('Is a VTEX Store?') }}</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-4 px-6 text-left whitespace-nowrap">
                        <input name="storeShortName" type="text" maxlength="64" value="{{ old('storeShortName') }}" />
                    </td>
                    <td class="py-4 px-6 text-left whitespace-nowrap">
                        <input name="storeFullName" type="text" maxlength="128" value="{{ old('storeFullName') }}" />
                    </td>
                    <td class="py-4 px-6 text-left whitespace-nowrap">
                        <input name="storeApiUrl" type="text" maxlength="256" value="{{ old('storeApiUrl') }}" />
                    </td>
                    <td class="py-4 px-6 text-center">
                        <input type="hidden" name="enableApiScrapping" value="off">
                        <input name="enableApiScrapping" type="checkbox" @if (old('enableApiScrapping')=="on" ) checked
                            @endif />
                    </td>
                    <td class="py-4 px-6 text-center">
                        <input type="hidden" name="isaVtexStore" value="off">
                        <input name="isaVtexStore" type="checkbox" @if (old('isaVtexStore')=="on" ) checked @endif />
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="py-4 px-6 text-left whitespace-nowrap">&nbsp;</td>
                    <td class="py-4 px-6 text-center">
                        <button type="submit"
                            class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-green-600 bg-green-50 hover:text-green-800 hover:bg-green-100 active:bg-green-200 focus:ring-green-300">
                            <i class="fas fa-save"></i> {{ __('Save') }}
                        </button>
                    </td>
                    <td class="py-4 px-6 text-center">
                        <a href="{{ route('stores.list') }}"
                            class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-red-600 bg-red-50 hover:text-red-800 hover:bg-red-100 active:bg-red-200 focus:ring-red-300">
                            <i class="fas fa-times"></i> {{ __('Cancel') }}
                        </a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</x-main-layout>
