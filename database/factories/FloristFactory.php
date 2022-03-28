<?php

namespace Database\Factories;

use App\Models\Florist;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Florist>
 */
class FloristFactory extends Factory
{
    protected $model = Florist::class;

    public function definition()
    {
        return [
            'name'     => $this->faker->name(),
            'position' => $this->faker->word(),
        ];
    }
}
