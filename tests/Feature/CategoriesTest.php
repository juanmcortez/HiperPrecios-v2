<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Categories\Category;

class CategoriesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Check categories list.
     *
     * @return void
     */
    public function test_CheckCategoriesList()
    {
        $response = $this->get(route('categories.list'));
        $response->assertStatus(200);
        $response->assertSeeText('Product\'s categories list');
    }


    /**
     * Check not existing resource
     *
     * @return void
     */
    public function test_Show404Category()
    {
        $response = $this->get(route('categories.show', ['category' => 1]));
        $response->assertStatus(404);
    }


    /**
     * Create a new resource
     *
     * @return void
     */
    public function test_CreateNewCategory()
    {
        $response = $this->get(route('categories.create'));
        $response->assertStatus(200);
        $response->assertSeeText('New category');

        $newCategory = Category::factory()->create();
        $response = $this->get(route('categories.show', ['category' => $newCategory->id]));
        $response->assertStatus(200);
    }


    /**
     * Update a newly created resource
     *
     * @return void
     */
    public function test_UpdateNewCategory()
    {
        $newCategory = Category::factory()->create();
        $response = $this->post(
            route('categories.update', ['category' => $newCategory->id]),
            [
                'name' => 'Test',
                'slug' => 'test',
                'similar' => 'test, test, test, test, test'
            ]
        );
        $response->assertSessionHas('success');
    }


    /**
     * Update a newly created resource
     *
     * @return void
     */
    public function test_UpdateNoDataCategory()
    {
        $newCategory = Category::factory()->create();
        $response = $this->post(route('categories.update', ['category' => $newCategory->id]));
        $response->assertSessionHas('errors');
    }


    /**
     * Edit a newly created resource
     *
     * @return void
     */
    public function test_EditNewCategory()
    {
        $newCategory = Category::factory()->create();
        $response = $this->get(route('categories.edit', ['category' => $newCategory->id]));
        $response->assertStatus(200);
    }


    /**
     * Delete a newly created resource
     *
     * @return void
     */
    public function test_DeleteNewCategory()
    {
        $newCategory = Category::factory()->create();
        $response = $this->get(route('categories.delete', ['category' => $newCategory->id]));
        $response->assertStatus(405);

        $response = $this->post(route('categories.delete', ['category' => $newCategory->id]));
        $response->assertStatus(405);

        $response = $this->patch(route('categories.delete', ['category' => $newCategory->id]));
        $response->assertStatus(302);
    }
}
