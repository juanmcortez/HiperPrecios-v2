<?php

namespace App\Services\Products;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\Products\Product;
use App\Models\Categories\Category;
use App\Models\Brands\Brand;

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
            'Brand',
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
     * Return an array of categories available in the system
     * to build a select component in the view
     *
     * @return Array
     */
    public function productCategoriesOptions()
    {
        return Category::select('id', 'name')->orderBy('name')->get()->toArray();
    }


    /**
     * Return an array of Brands available in the system
     * to build a select component in the view
     *
     * @return Array
     */
    public function productBrandsOptions()
    {
        return Brand::select('id', 'name')->orderBy('name')->get()->toArray();
    }


    /**
     * Return an array of units available
     * to build a select component in the view
     *
     * @return Array
     */
    public function productWeightUnitsOptions()
    {
        return [
            'gr'    => 'Gr.',
            'kg'    => 'Kg.',
            'un'    => 'Un.',
            'cm3'   => 'cm3',
            'ml'    => 'Ml.',
            'l'     => 'Lt.',
            'mm'    => 'Mm.',
            'mt'    => 'Mt.'
        ];
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
            ->with('brand', 'category', 'prices')
            ->paginate(10);
    }


    /**
     * This is a service function for the ProductController
     *
     * @param $request
     * @return void
     */
    public function addUpdate($request)
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
                'belongsToBrand' => $request->input('belongsToBrand'),
                'metaName' => $request->input('metaName'),
                'metaTitle' => $request->input('metaTitle'),
                'metaDescription' => $request->input('metaDescription'),
                'nameShort' => $request->input('nameShort'),
                'measuramentMultiplier' => $request->input('measuramentMultiplier'),
                'measuramentUnit' => $request->input('measuramentUnit'),
                'imageUrl' => $request->input('imageUrl'),
            ]
        );

        // Handle Image
        if ($request->hasFile('imageUrl')) {
            // Get the uploaded image and resize it with aspect ratio change it to jpg in 75% quality
            $modifyupload = Image::make($request->file('imageUrl')->path())->fit(100)->encode('jpg', 75);
            // Create the new name
            $newfilenam = md5(uniqid(time(), true)) . '.jpg';
            // Store the file in the system and prepare reference for db
            if (Storage::put("products" . DIRECTORY_SEPARATOR . $newfilenam, $modifyupload)) {
                $product->update(['imageUrl' => "products" . DIRECTORY_SEPARATOR . $newfilenam]);
            }
        }

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
