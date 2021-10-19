<?php

namespace App\Http\Controllers\Stores;

use App\Services\Stores\StoreService;
use App\Models\Stores\Store;
use App\Http\Requests\Stores\StoreRequest;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    protected $storeService;

    /**
     * Instantiate a new service instance
     *
     * @param StoreService $storeService
     */
    public function __construct(StoreService $storeService)
    {
        $this->storeService = $storeService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title          = __("Stores list");
        $description    = __("Here is the list of stores available in the system");
        //
        $tableColumnHeaders = $this->storeService->viewTableColumnsHeader();
        //
        $storesList = Store::orderBy('storeFullName')->paginate(10);
        return view('store.index', compact('storesList', 'tableColumnHeaders', 'title', 'description'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title          = __("New store");
        $description    = __("Use this section to create a new store.");
        //
        $tableColumnHeaders = $this->storeService->editTableColumnsHeader();
        //
        return view('store.create', compact('tableColumnHeaders', 'title', 'description'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Stores\StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        // Process the store
        list($status, $message, $store) = $this->storeService->addUpdate($request);

        // redirect
        return redirect()
            ->route('stores.list')
            ->with($status, __($message, ['name' => $store->storeFullName,]));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stores\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
        $title          = __("Viewing \":name\" store", ['name' => $store->storeFullName]);
        $description    = __("Viewing \":name\" store details.", ['name' => $store->storeFullName]);
        //
        $tableColumnHeaders = $this->storeService->viewTableColumnsHeader();
        //
        return view('store.show', compact('store', 'tableColumnHeaders', 'title', 'description'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stores\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        //
        $title          = __("Editing \":name\" store", ['name' => $store->storeFullName]);
        $description    = __("Editing \":name\" store details.", ['name' => $store->storeFullName]);
        //
        $tableColumnHeaders = $this->storeService->editTableColumnsHeader();
        //
        return view('store.edit', compact('store', 'tableColumnHeaders', 'title', 'description'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Stores\StoreRequest  $request
     * @param  \App\Models\Stores\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Store $store)
    {
        //$store->update($request->toArray());
        list($status, $message, $store) = $this->storeService->addUpdate($request);

        return redirect()
            ->route('stores.list')
            ->with(
                'success',
                __('<strong>:name</strong> store, updated successfully!', ['name' => $store->storeFullName])
            );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stores\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $store->delete();
        return redirect()
            ->route('stores.list')
            ->with(
                'warning',
                __('<strong>:name</strong> store, removed successfully.', ['name' => $store->storeFullName])
            );
    }
}
