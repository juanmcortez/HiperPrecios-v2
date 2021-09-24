<x-main-layout>
    <h1 class="py-4 px-6 text-xl font-bold text-gray-700 mb-2">
        {{ __('Edit :name', ['name' => $store->storeFullName]) }}
    </h1>
    <form method="POST">
        @csrf
        @method('POST')
        <table class="min-w-max w-full table-auto" border="0" cellpadding="0" cellspacing="0">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-4 px-6 text-left">{{ __('Systen Name') }}</th>
                    <th class="py-4 px-6 text-left">{{ __('Store Name') }}</th>
                    <th class="py-4 px-6 text-left">{{ __('Store API Url') }}</th>
                    <th class="py-4 px-6 text-center">{{ __('Get products and prices?') }}</th>
                    <th class="py-4 px-6 text-center">{{ __('Is a VTEX Store?') }}</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-4 px-6 text-left whitespace-nowrap">
                        <input type="text" maxlength="64" value="{{ $store->storeShortName }}" />
                    </td>
                    <td class="py-4 px-6 text-left whitespace-nowrap">
                        <input type="text" maxlength="128" value="{{ $store->storeFullName }}" />
                    </td>
                    <td class="py-4 px-6 text-left whitespace-nowrap">
                        <input type="text" maxlength="256" value="{{ $store->storeApiUrl }}" />
                    </td>
                    <td class="py-4 px-6 text-center">
                        <input type="checkbox" name="enableApiScrapping" @if ($store->enableApiScrapping) checked @endif
                        />
                    </td>
                    <td class="py-4 px-6 text-center">
                        <input type="checkbox" name="isaVtexStore" @if ($store->isaVtexStore) checked @endif />
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
                        <button type="reset"
                            class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-red-600 bg-red-50 hover:text-red-800 hover:bg-red-100 active:bg-red-200 focus:ring-red-300">
                            <i class="fas fa-times"></i> {{ __('Cancel') }}
                        </button>
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</x-main-layout>
