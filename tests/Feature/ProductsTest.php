<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Products\Product;
use App\Models\Categories\Category;
use App\Models\Brands\Brand;

class ProductsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Check products list.
     *
     * @return void
     */
    public function test_CheckProductsList()
    {
        $response = $this->get(route('products.list'));
        $response->assertStatus(200);
        $response->assertSeeText('Products list');
    }


    /**
     * Check not existing resource
     *
     * @return void
     */
    public function test_Show404Product()
    {
        $response = $this->get(route('products.show', ['product' => 1]));
        $response->assertStatus(404);
    }


    /**
     * Create a new resource
     *
     * @return void
     */
    public function test_CreateNewProduct()
    {
        $response = $this->get(route('products.create'));
        $response->assertStatus(200);
        $response->assertSeeText('New Product');

        $newCategories = Category::factory(10)->create();
        $newBrands = Brand::factory(10)->create();
        $newProduct = Product::factory()->create();
        $response = $this->get(route('products.show', ['product' => $newProduct->id]));
        $response->assertStatus(200);
    }


    /**
     * Update a newly created resource
     *
     * @return void
     */
    public function test_UpdateNewProduct()
    {
        $newCategories = Category::factory(10)->create();
        $newBrands = Brand::factory(10)->create();
        $newProduct = Product::factory()->create();
        $response = $this->post(
            route('products.update', ['product' => $newProduct->id]),
            [
                'nameLong'              => 'test',
                'ean'                   => '1234567890123',
                'belongsToCategory'     => 5,
                'belongsToBrand'        => 3,
                'measuramentMultiplier' => 0.25,
                'measuramentUnit'       => 'kg',
            ]
        );
        $response->assertSessionHas('success');
    }


    /**
     * Update a newly created resource
     *
     * @return void
     */
    public function test_UpdateNoDataProduct()
    {
        $newCategories = Category::factory(10)->create();
        $newBrands = Brand::factory(10)->create();
        $newProduct = Product::factory()->create();
        $response = $this->post(route('products.update', ['product' => $newProduct->id]));
        $response->assertSessionHas('errors');
    }


    /**
     * Edit a newly created resource
     *
     * @return void
     */
    public function test_EditNewProduct()
    {
        $newCategories = Category::factory(10)->create();
        $newBrands = Brand::factory(10)->create();
        $newProduct = Product::factory()->create();
        $response = $this->get(route('products.edit', ['product' => $newProduct->id]));
        $response->assertStatus(200);
    }


    /**
     * Delete a newly created resource
     *
     * @return void
     */
    public function test_DeleteNewProduct()
    {
        $newCategories = Category::factory(10)->create();
        $newBrands = Brand::factory(10)->create();
        $newProduct = Product::factory()->create();
        $response = $this->get(route('products.delete', ['product' => $newProduct->id]));
        $response->assertStatus(405);

        $response = $this->post(route('products.delete', ['product' => $newProduct->id]));
        $response->assertStatus(405);

        $response = $this->patch(route('products.delete', ['product' => $newProduct->id]));
        $response->assertStatus(302);
    }
}
