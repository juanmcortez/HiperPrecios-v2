<x-main-layout>
    <h1>Stores list</h1>
    <br />
    <table>
        <thead>
            <tr>
                <th>{{ __('Store Name') }}</th>
                <th>{{ __('Store API Url') }}</th>
                <th>{{ __('Get products and prices?') }}</th>
                <th>{{ __('Is a VTEX Store?') }}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($storesList as $store)
            <tr>
                <td>{{ $store->storeFullName }}</td>
                <td>{{ $store->storeApiUrl }}</td>
                <td>
                    <input type="checkbox" disabled readonly @if ($store->enableApiScrapping) checked @endif
                    />
                </td>
                <td>
                    <input type="checkbox" disabled readonly @if ($store->isaVtexStore) checked @endif />
                </td>
                <td>
                    <a href="{{ route('stores.show', ['store' => $store->id]) }}">
                        <i class="fas fa-eye"></i>
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
            @empty
            <tr>
                <td colspan="5">{{ __('There are no stores available in the system yet.') }}</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</x-main-layout>
