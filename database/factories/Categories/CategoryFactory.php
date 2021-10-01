<?php

namespace Database\Factories\Categories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categories\Category;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = ucfirst($this->faker->word);
        return [
            'name'      => $category,
            'slug'      => strtolower($category),
            'similar'   => $this->faker->word,
        ];
    }
}
