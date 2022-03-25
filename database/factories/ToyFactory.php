<?php

namespace Database\Factories;

use App\Models\Toy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Toy>
 */
class ToyFactory extends Factory
{
    protected $model = Toy::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),        
        ];
    }
}
