<?php

namespace App\Services\Stores;

use App\Models\Stores\Store;

class StoreService
{
    /**
     * Return an array of columns names for
     * the table headers on the views
     *
     * @return Array
     */
    public function viewTableColumnsHeader()
    {
        return [
            'Store Name',
            'Store API Url',
            'Get products and prices?',
            'Is a VTEX Store?',
        ];
    }


    /**
     * Return an array of columns names for
     * the table headers on the edit/create views
     *
     * @return Array
     */
    public function editTableColumnsHeader()
    {
        // Get the original columns
        $headers = $this->viewTableColumnsHeader();
        // Add the missing columns at the begining
        array_unshift($headers, 'System Name');
        // Return all the columns
        return $headers;
    }


    /**
     * This is a service function for the StoreController
     *
     * @param $request
     * @return void
     */
    public function add($request)
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

        return [$status, $message, $store];
    }
}
