<?php

namespace Database\Factories;

use App\Models\ChartOfAccount;
use App\Models\GLCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssignedCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'parent_g_l_category_id' => GLCategory::query()->inRandomOrder()->first()->id,
            'child_g_l_category_id' => null,
            'chart_of_account_id' => ChartOfAccount::query()->inRandomOrder()->first()->id,
        ];
    }
}
