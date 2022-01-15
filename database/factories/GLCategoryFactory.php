<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GLCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'   => $this->faker->word(),
            'status' => $this->faker->randomElement(['draft', 'active', 'suspended', 'cancelled', 'deleted']),
            'type'   => $this->faker->randomElement(['asset', 'liability', 'equity', 'revenue', 'expense']),
            'descr'  => $this->faker->paragraph(),
        ];
    }

}
