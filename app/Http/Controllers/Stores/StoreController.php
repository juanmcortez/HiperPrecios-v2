<?php

namespace App\Http\Controllers\Stores;

use App\Models\Stores\Store;
use App\Http\Requests\Stores\StoreRequest;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $storesList = Store::orderBy('storeFullName')->get();
        return view('store.index', compact('storesList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Stores\StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        // Store data if
        $store = Store::firstOrCreate(
            // Find the model if these fields exist
            [
                'storeShortName' => $request->input('storeShortName'),
                'storeFullName' => $request->input('storeFullName'),
                'storeApiUrl' => $request->input('storeApiUrl'),
            ],
            // If not, create record with previous values and add the following
            [
                'enableApiScrapping' => $request->input('enableApiScrapping'),
                'isaVtexStore' => $request->input('isaVtexStore'),
            ]
        );

        // check if it's new
        $message = ($store->wasRecentlyCreated)
            ? '<strong>:name</strong> store, created successfully!'
            : '<strong>:name</strong> store already exists. Nothing changed!';
        $status = ($store->wasRecentlyCreated)
            ? 'success'
            : 'info';

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
        return view('store.show', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stores\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        return view('store.edit', compact('store'));
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
        $store->update($request->toArray());
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
