<?php

namespace App\Services\Categories;

use App\Models\Categories\Category;

class CategoryService
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
            'Category Name',
            'Category Slug',
            'Similar To This Category',
            'Searchable?',
            'Enabled?'
        ];
    }


    /**
     * Add a new item via the categories model
     *
     * @param $request
     * @return void
     */
    public function add($request)
    {
        // Store data if
        $category = Category::firstOrCreate(
            // Find the model if these fields exist
            [
                'name' => $request->input('name'),
                'slug' => $request->input('slug'),
            ],
            // If not, create record with previous values and add the following
            [
                'similar' => $request->input('similar'),
                'searchable' => $request->input('searchable'),
                'enabled' => $request->input('enabled'),
            ]
        );

        // check if it's new
        $message = ($category->wasRecentlyCreated)
            ? '<strong>:name</strong> category, created successfully!'
            : '<strong>:name</strong> category already exists. Nothing changed!';
        $status = ($category->wasRecentlyCreated)
            ? 'success'
            : 'info';

        // Return the operation result
        return [$status, $message, $category];
    }
}
