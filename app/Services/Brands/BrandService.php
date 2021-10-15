<?php

namespace App\Services\Brands;

use App\Models\Brands\Brand;

class BrandService
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
            'Brand Name',
            'Brand Slug'
        ];
    }
}
