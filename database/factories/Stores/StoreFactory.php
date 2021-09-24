<?php

namespace Database\Factories\Stores;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Stores\Store;

class StoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Store::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'storeShortName'        => $this->faker->companySuffix,
            'storeFullName'         => $this->faker->company,
            'storeApiUrl'           => $this->faker->url,
            'enableApiScrapping'    => $this->faker->boolean,
            'isaVtexStore'          => $this->faker->boolean,
        ];
    }
}
