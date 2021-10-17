<?php

namespace Database\Factories\Products;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Products\Product;
use App\Models\Categories\Category;
use App\Models\Brands\Brand;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categoryList = Category::select('id')->orderBy('name')->get();
        $brandList = Brand::select('id')->orderBy('name')->get();
        return [
            'metaName'              => $this->faker->name,
            'metaTitle'             => $this->faker->title,
            'metaDescription'       => $this->faker->text,
            'nameShort'             => $this->faker->name,
            'nameLong'              => $this->faker->name,
            'ean'                   => $this->faker->ean13(),
            'belongsToCategory'     => $this->faker->randomElement($categoryList),
            'belongsToBrand'        => $this->faker->randomElement($brandList),
            'imageUrl'              => $this->faker->imageUrl,
        ];
    }
}
