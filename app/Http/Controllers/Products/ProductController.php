<?php

namespace App\Http\Controllers\Products;

use App\Services\Products\ProductService;
use App\Models\Products\Product;
use App\Http\Requests\Products\ProductRequest;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected $productService;

    /**
     * Instantiate a new service instance
     *
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title          = __("Products list");
        $description    = __("Here is the list of products available in the system");
        //
        $tableColumnHeaders = $this->productService->viewTableColumnsHeader();
        //
        //$productsList = Product::orderBy('nameLong')->paginate(10);
        $productsList = $this->productService->productsOrderedByCategory();
        return view('product.index', compact('productsList', 'tableColumnHeaders', 'title', 'description'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title          = __("New Product");
        $description    = __("Use this section to create a new product.");
        //
        $categories     = $this->productService->producCategoriesOptions();
        $units          = $this->productService->productWeightUnitsOptions();
        //
        return view('product.create', compact('categories', 'units', 'title', 'description'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Products\ProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // Process the store
        list($status, $message, $product) = $this->productService->addUpdate($request);

        // redirect
        return redirect()
            ->route('products.list')
            ->with($status, __($message, ['name' => $product->nameLong,]));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        $title          = __("Viewing \":name\" product", ['name' => $product->nameLong]);
        $description    = __("Viewing \":name\" product details.", ['name' => $product->nameLong]);
        //
        $tableColumnHeaders = $this->productService->viewTableColumnsHeader();
        //
        return view('product.show', compact('product', 'tableColumnHeaders', 'title', 'description'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $title          = __("Editing \":name\" product", ['name' => $product->nameLong]);
        $description    = __("Editing \":name\" product details.", ['name' => $product->nameLong]);
        //
        $categories     = $this->productService->producCategoriesOptions();
        $units          = $this->productService->productWeightUnitsOptions();
        //
        return view('product.edit', compact('product', 'categories', 'units', 'title', 'description'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Products\ProductRequest  $request
     * @param  \App\Models\Products\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        // $product->update($request->toArray());
        list($status, $message, $product) = $this->productService->addUpdate($request);

        return redirect()
            ->route('products.list')
            ->with(
                'success',
                __('<strong>:name</strong> product, updated successfully!', ['name' => $product->nameLong])
            );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.list')
            ->with(
                'warning',
                __('<strong>:name</strong> product, removed successfully.', ['name' => $product->nameLong])
            );
    }
}
