<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChartOfAccountFactory extends Factory
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
            'status' => $this->faker->randomElement(['draft', 'active']),
            'descr'  => $this->faker->paragraph(),
        ];
    }
}
