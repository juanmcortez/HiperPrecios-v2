<x-main-layout>
    {{-- Default blocks --}}
    <x-slot name="title">{!! $title !!}</x-slot>
    <x-slot name="description">{!! $description !!}</x-slot>
    {{-- Page Title --}}
    <h1 class="px-6 py-4 text-xl font-bold leading-loose text-gray-700">{!! $title !!}</h1>
    {{-- Page Content --}}
    <form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}"
        enctype="multipart/form-data">
        @csrf
        @method('POST')
        <x-tables.product_edit :brandSelect="$brands" :categorySelect="$categories" :unitSelect="$units"
            :columnContents="$product" />

        <x-tables.rows.savecancel routeName="products" paramName="product" itemId="{{ $product->id }}" />
    </form>
</x-main-layout>
