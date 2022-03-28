<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name'        => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'type'        => Arr::random(['Arrangement', 'Cut Flower', 'Misc']),
            'price'       => rand(1000, 20000),
            'on_hand'     => rand(0, 100),
        ];
    }
}
