<?php

namespace Database\Factories;

use App\Models\ChartOfAccount;
use App\Models\GLAccount;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssigedGLAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'parent_g_l_account_id' => GLAccount::query()->inRandomOrder()->first()->id,
            'child_g_l_account_id' => null,
            'chart_of_account_id' => ChartOfAccount::query()->inRandomOrder()->first()->id,
        ];
    }
}
