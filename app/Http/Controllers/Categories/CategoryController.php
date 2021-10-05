<?php

namespace App\Http\Controllers\Categories;

use App\Services\Categories\CategoryService;
use App\Models\Categories\Category;
use App\Http\Requests\Categories\CategoryRequest;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    protected $categoryService;

    /**
     * Instantiate a new service instance
     *
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title          = __("Product's categories list");
        $description    = __("Here is the list of product's categories");
        //
        $categoriesList = Category::orderBy('name')->paginate(10);
        $tableColumnHeaders = $this->categoryService->viewTableColumnsHeader();
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
        $title          = __("New category");
        $description    = __("Use this section to create a new category.");
        //
        $tableColumnHeaders = $this->categoryService->viewTableColumnsHeader();
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
        // Process the category
        list($status, $message, $category) = $this->categoryService->add($request);

        // redirect
        return redirect()
            ->route('categories.list')
            ->with($status, __($message, ['name' => $category->name,]));
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
        $title          = __("Viewing \":name\" category", ['name' => $category->name]);
        $description    = __("Viewing \":name\" category details.", ['name' => $category->name]);
        //
        $tableColumnHeaders = $this->categoryService->viewTableColumnsHeader();
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
        $title          = __("Editing \":name\" category", ['name' => $category->name]);
        $description    = __("Editing \":name\" category details.", ['name' => $category->name]);
        //
        $tableColumnHeaders = $this->categoryService->viewTableColumnsHeader();
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
