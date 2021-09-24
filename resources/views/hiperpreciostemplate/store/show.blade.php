<x-main-layout>
    <h1 class="py-4 px-6 text-xl font-bold text-gray-700 mb-2">
        {{ __('Viewing :name', ['name' => $store->storeFullName]) }}
    </h1>
    <table class="min-w-max w-full table-auto" border="0" cellpadding="0" cellspacing="0">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-4 px-6 text-left">{{ __('Systen Name') }}</th>
                <th class="py-4 px-6 text-left">{{ __('Store Name') }}</th>
                <th class="py-4 px-6 text-left">{{ __('Store API Url') }}</th>
                <th class="py-4 px-6 text-center">{{ __('Get products and prices?') }}</th>
                <th class="py-4 px-6 text-center">{{ __('Is a VTEX Store?') }}</th>
                <th class="py-4 px-6 text-center">&nbsp;</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-4 px-6 text-left whitespace-nowrap">{{ $store->storeShortName }}</td>
                <td class="py-4 px-6 text-left whitespace-nowrap">{{ $store->storeFullName }}</td>
                <td class="py-4 px-6 text-left whitespace-nowrap">{{ 'https://' . $store->storeApiUrl }}</td>
                <td class="py-4 px-6 text-center">
                    <input type="checkbox" disabled readonly @if ($store->enableApiScrapping) checked @endif
                    />
                </td>
                <td class="py-4 px-6 text-center">
                    <input type="checkbox" disabled readonly @if ($store->isaVtexStore) checked @endif />
                </td>
                <td class="py-4 px-6 text-center">
                    <div class="flex item-center justify-center">
                        <a href="{{ route('stores.edit', ['store' => $store->id]) }}"
                            class="w-4 mr-2 transform hover:text-green-500 hover:scale-110 duration-300">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form method="POST" action="{{ route('stores.delete', ['store' => $store->id]) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="w-4 mr-2 transform hover:text-red-500 hover:scale-110 duration-300">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</x-main-layout>
