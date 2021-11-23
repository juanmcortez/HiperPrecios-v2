<?php

namespace Database\Factories\Categories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Stores\Store;
use App\Models\Categories\InternalExternal;
use App\Models\Categories\Category;

class InternalExternalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InternalExternal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categoryList = Category::select('id')->orderBy('name')->get();
        $storesList = Store::select('id')->orderBy('storeFullName')->get();
        $extCategory = ucfirst($this->faker->word);
        return [
            'internalParent'        => $this->faker->randomElement($categoryList),
            'externalParent'        => $this->faker->randomNumber(1),
            'externalName'          => $extCategory,
            'externalSlug'          => strtolower($extCategory),
            'externalCategoryID'    => $this->faker->randomNumber(4),
            'internalStoreID'       => $this->faker->randomElement($storesList),
        ];
    }
}
