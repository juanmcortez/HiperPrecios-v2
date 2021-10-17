<?php

namespace Database\Factories\Prices;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Stores\Store;
use App\Models\Products\Product;
use App\Models\Prices\Price;

class PriceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Price::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $productList = Product::select('id')->orderBy('nameLong')->get();
        $storeList = Store::select('id')->orderBy('storeFullName')->get();
        return [
            'belongsToProduct'      => $this->faker->randomElement($productList),
            'belongsToStore'        => $this->faker->randomElement($storeList),
            'price'                 => $this->faker->randomFloat(2, 10, 1500),
            'listPrice'             => $this->faker->randomFloat(2, 10, 1500),
            'priceWithoutDiscount'  => $this->faker->randomFloat(2, 10, 1500),
            'availableQuantity'     => $this->faker->randomNumber(3),
        ];
    }
}
