<?php

namespace App\Http\Controllers\Categories;

use App\Models\Categories\Category;
use App\Http\Requests\Categories\CategoryRequest;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title          = __("Product's Categories List");
        $description    = __("Here is the list of product's categories");
        //
        $categoriesList = Category::orderBy('name')->paginate(10);
        $tableColumnHeaders = [
            'Category Name',
            'Category Slug',
            'Similar To This Category',
            'Searchable?',
            'Enabled?'
        ];
        //
        return view('category.index', compact('categoriesList', 'tableColumnHeaders', 'title', 'description'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title          = __("New Category");
        $description    = __("Use this section to create a new category.");
        //
        $tableColumnHeaders = [
            'Category Name',
            'Category Slug',
            'Similar To This Category',
            'Searchable?',
            'Enabled?'
        ];
        //
        return view('category.create', compact('tableColumnHeaders', 'title', 'description'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Categories\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
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
            ? '<strong>:name</strong> store, created successfully!'
            : '<strong>:name</strong> store already exists. Nothing changed!';
        $status = ($category->wasRecentlyCreated)
            ? 'success'
            : 'info';

        // redirect
        return redirect()
            ->route('categories.list')
            ->with($status, __($message, ['name' => $category->storeFullName,]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        $title          = __("Viewing \":name\" Category", ['name' => $category->name]);
        $description    = __("Viewing \":name\" Category details.", ['name' => $category->name]);
        //
        $tableColumnHeaders = [
            'Category Name',
            'Category Slug',
            'Similar To This Category',
            'Searchable?',
            'Enabled?'
        ];
        //
        return view('category.show', compact('category', 'tableColumnHeaders', 'title', 'description'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        $title          = __("Editing \":name\" Category", ['name' => $category->name]);
        $description    = __("Editing \":name\" Category details.", ['name' => $category->name]);
        //
        $tableColumnHeaders = [
            'Category Name',
            'Category Slug',
            'Similar To This Category',
            'Searchable?',
            'Enabled?'
        ];
        //
        return view('category.edit', compact('category', 'tableColumnHeaders', 'title', 'description'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Categories\CategoryRequest  $request
     * @param  \App\Models\Categories\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->toArray());
        return redirect()
            ->route('categories.list')
            ->with(
                'success',
                __('<strong>:name</strong> category, updated successfully!', ['name' => $category->name])
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()
            ->route('categories.list')
            ->with(
                'warning',
                __('<strong>:name</strong> category, removed successfully.', ['name' => $category->name])
            );
    }
}
