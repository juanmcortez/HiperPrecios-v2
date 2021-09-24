<x-main-layout>
    <h1>{{ __('Viewing :name', ['name' => $store->storeFullName]) }}</h1>
    <br />
    <table>
        <thead>
            <tr>
                <th>{{ __('Systen Name') }}</th>
                <th>{{ __('Store Name') }}</th>
                <th>{{ __('Store API Url') }}</th>
                <th>{{ __('Get products and prices?') }}</th>
                <th>{{ __('Is a VTEX Store?') }}</th>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $store->storeShortName }}</td>
                <td>{{ $store->storeFullName }}</td>
                <td>{{ $store->storeApiUrl }}</td>
                <td>
                    <input type="checkbox" disabled @if ($store->enableApiScrapping) checked @endif
                    />
                </td>
                <td>
                    <input type="checkbox" disabled @if ($store->isaVtexStore) checked @endif />
                </td>
                <td>
                    <a href="{{ route('stores.edit', ['store' => $store->id]) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form method="POST" action="{{ route('stores.delete', ['store' => $store->id]) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</x-main-layout>
