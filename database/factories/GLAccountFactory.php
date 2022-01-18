<?php

namespace Database\Factories;

use App\Models\GLAccount;
use Illuminate\Database\Eloquent\Factories\Factory;

class GLAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    : array
    {
        return [
            'account'         => $this->faker->numerify("#####"),
            'name'            => $this->faker->word(),
            'status'          => $this->faker->randomElement(['draft', 'active']),
            'desc'            => $this->faker->paragraph(10),
            'posting_account' => $this->faker->randomElement([1, 0]),
            'type'            => 'asset',
            'designation'     => 'cash',
        ];
    }
}
