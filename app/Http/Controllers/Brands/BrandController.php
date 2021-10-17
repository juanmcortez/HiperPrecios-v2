<?php

namespace App\Http\Controllers\Brands;

use Illuminate\Http\Request;
use App\Services\Brands\BrandService;
use App\Models\Brands\Brand;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    protected $brandService;

    /**
     * Instantiate a new brand instance
     *
     * @param BrandService $brandService
     */
    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title          = __("Product's brands list");
        $description    = __("Here is the list of product's brands");
        //
        $brandsList = Brand::orderBy('name')->paginate(10);
        $tableColumnHeaders = $this->brandService->viewTableColumnsHeader();
        //
        return view('brand.index', compact('brandsList', 'tableColumnHeaders', 'title', 'description'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('brands.list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->route('brands.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brands\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
        $title          = __("Viewing \":name\" brand", ['name' => $brand->name]);
        $description    = __("Viewing \":name\" brand details.", ['name' => $brand->name]);
        //
        $tableColumnHeaders = $this->brandService->viewTableColumnsHeader();
        //
        return view('brand.show', compact('brand', 'tableColumnHeaders', 'title', 'description'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brands\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return redirect()->route('brands.list');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brands\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        return redirect()->route('brands.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brands\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        return redirect()->route('brands.list');
    }
}
