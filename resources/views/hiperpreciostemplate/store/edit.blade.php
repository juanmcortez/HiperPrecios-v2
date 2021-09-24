<x-main-layout>
    <h1>{{ __('Edit :name', ['name' => $store->storeFullName]) }}</h1>
    <br />
    <form method="POST">
        @csrf
        @method('POST')
        <table>
            <thead>
                <tr>
                    <th>{{ __('Systen Name') }}</th>
                    <th>{{ __('Store Name') }}</th>
                    <th>{{ __('Store API Url') }}</th>
                    <th>{{ __('Get products and prices?') }}</th>
                    <th>{{ __('Is a VTEX Store?') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="text" maxlength="64" value="{{ $store->storeShortName }}" />
                    </td>
                    <td>
                        <input type="text" maxlength="128" value="{{ $store->storeFullName }}" />
                    </td>
                    <td>
                        <input type="text" maxlength="256" value="{{ $store->storeApiUrl }}" />
                    </td>
                    <td>
                        <input type="checkbox" name="enableApiScrapping" @if ($store->enableApiScrapping) checked @endif
                        />
                    </td>
                    <td>
                        <input type="checkbox" name="isaVtexStore" @if ($store->isaVtexStore) checked @endif />
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">&nbsp;</td>
                    <td><button type="submit"><i class="fas fa-save"></i>{{ __('Save') }}</button></td>
                    <td>Cancel</td>
                </tr>
            </tfoot>
        </table>
    </form>
</x-main-layout>
