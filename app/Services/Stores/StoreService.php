<?php

namespace App\Services\Stores;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
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
            'Store Logo',
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
    public function addUpdate($request)
    {
        // Store data if
        $store = Store::updateOrCreate(
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

        // Handle Image
        if ($request->hasFile('imageUrl')) {
            // Get the uploaded image and resize it with aspect ratio change it to jpg in 75% quality
            $modifyupload = Image::make($request->file('imageUrl')->path())->fit(100)->encode('jpg', 75);
            // Create the new name
            $newfilenam = md5(uniqid(time(), true)) . '.jpg';
            // Check if folder exists
            $storesFolder = "images" . DIRECTORY_SEPARATOR . "stores";
            if (Storage::missing("public" . DIRECTORY_SEPARATOR . $storesFolder)) {
                Storage::makeDirectory("public" . DIRECTORY_SEPARATOR . $storesFolder);
            }
            // Store the file in the system and prepare reference for db
            if (Storage::put("public" . DIRECTORY_SEPARATOR . $storesFolder . DIRECTORY_SEPARATOR . $newfilenam, $modifyupload)) {
                $store->update(['imageUrl' => $storesFolder . DIRECTORY_SEPARATOR . $newfilenam]);
            }
        }

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
