<?php

namespace App\Services\Products;

use App\Models\Products\Product;

class ProductService
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
            'Product',
            'Name',
            'EAN',
            'Category',
            'Weight / Units',
            'Last update',
        ];
    }


    /**
     * Return an array of columns names for
     * the table headers on the views
     *
     * @return Array
     */
    public function editTableColumnsHeader()
    {
        // Get the original columns
        $headers = $this->viewTableColumnsHeader();
        // Remove the first column
        array_shift($headers);
        // Remove the last column
        array_pop($headers);
        // Add the missing columns at the begining
        array_unshift($headers, 'Image');
        // Add the missing columns at the end
        array_push($headers, 'Short Name', 'Meta Name', 'Meta Title', 'Meta Description');
        // Return all the columns
        return $headers;
    }


    /**
     * Returns a collection of the Products. This is ordered
     * first by category name, and then by product name. Also
     * the collection is paginated.
     *
     * @return Product
     */
    public function productsOrderedByCategory()
    {
        return Product::select('products.*', 'categories.name')
            ->join('categories', 'products.belongsToCategory', '=', 'categories.id')
            ->orderBy('categories.name')
            ->orderBy('products.nameLong')
            ->paginate(10);
    }


    /**
     * This is a service function for the ProductController
     *
     * @param $request
     * @return void
     */
    public function add($request)
    {
        // Product data if
        $product = Product::firstOrCreate(
            // Find the model if these fields exist
            [
                'nameLong' => $request->input('nameLong'),
                'ean' => $request->input('ean'),
                'belongsToCategory' => $request->input('belongsToCategory'),
            ],
            // If not, create record with previous values and add the following
            [
                'metaName' => $request->input('metaName'),
                'metaTitle' => $request->input('metaTitle'),
                'metaDescription' => $request->input('metaDescription'),
                'nameShort' => $request->input('nameShort'),
                'measuramentMultiplier' => $request->input('measuramentMultiplier'),
                'measuramentUnit' => $request->input('measuramentUnit'),
                'imageUrl' => $request->input('imageUrl'),
            ]
        );

        // check if it's new
        $message = ($product->wasRecentlyCreated)
            ? '<strong>:name</strong> product, created successfully!'
            : '<strong>:name</strong> product already exists. Nothing changed!';
        $status = ($product->wasRecentlyCreated)
            ? 'success'
            : 'info';

        return [$status, $message, $product];
    }
}
