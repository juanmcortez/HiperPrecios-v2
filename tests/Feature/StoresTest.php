<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Stores\Store;

class StoresTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Check stores list.
     *
     * @return void
     */
    public function test_CheckStoresList()
    {
        $response = $this->get(route('stores.list'));
        $response->assertStatus(200);
        $response->assertSeeText('Stores list');
    }


    /**
     * Check not existing resource
     *
     * @return void
     */
    public function test_Show404Store()
    {
        $response = $this->get(route('stores.show', ['store' => 1]));
        $response->assertStatus(404);
    }


    /**
     * Create a new resource
     *
     * @return void
     */
    public function test_CreateNewStore()
    {
        $response = $this->get(route('stores.create'));
        $response->assertStatus(200);
        $response->assertSeeText('New store');

        $newStore = Store::factory()->create();
        $response = $this->get(route('stores.show', ['store' => $newStore->id]));
        $response->assertStatus(200);
    }


    /**
     * Update a newly created resource
     *
     * @return void
     */
    public function test_UpdateNewStore()
    {
        $newStore = Store::factory()->create();
        $response = $this->post(
            route('stores.update', ['store' => $newStore->id]),
            [
                'storeShortName' => 'test',
                'storeFullName' => 'Test',
                'storeApiUrl' => 'www.test.com'
            ]
        );
        $response->assertSessionHas('success');
    }


    /**
     * Update a newly created resource
     *
     * @return void
     */
    public function test_UpdateNoDataStore()
    {
        $newStore = Store::factory()->create();
        $response = $this->post(route('stores.update', ['store' => $newStore->id]));
        $response->assertSessionHas('errors');
    }


    /**
     * Edit a newly created resource
     *
     * @return void
     */
    public function test_EditNewStore()
    {
        $newStore = Store::factory()->create();
        $response = $this->get(route('stores.edit', ['store' => $newStore->id]));
        $response->assertStatus(200);
    }


    /**
     * Delete a newly created resource
     *
     * @return void
     */
    public function test_DeleteNewStore()
    {
        $newStore = Store::factory()->create();
        $response = $this->get(route('stores.delete', ['store' => $newStore->id]));
        $response->assertStatus(405);

        $response = $this->post(route('stores.delete', ['store' => $newStore->id]));
        $response->assertStatus(405);

        $response = $this->patch(route('stores.delete', ['store' => $newStore->id]));
        $response->assertStatus(302);
    }
}
