<?php

namespace Database\Factories;

use App\Models\Budget;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Budget>
 */
class BudgetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Budget::class;

    public function definition(): array
    {
        $amountReceived = $this->faker->randomFloat(2, 900, 1000);
        $monthlyExpense = $this->faker->randomFloat(2, 500, 700);
        $profit = $amountReceived - $monthlyExpense;
        $profitPercentage = $amountReceived > 0 ? ($profit / $amountReceived) * 100 : 0;

        return [
            'customer_id'       => 1,
            'menu_type_id'      => 10,
            'amount_received'   => $amountReceived,
            'monthly_expense'   => $monthlyExpense,
            'month'             => $this->faker->monthName,
            'profit'            => $profit,
            'profit_percentage' => number_format($profitPercentage, 2),
            'notes'             => $this->faker->optional()->paragraph,
            'user_id'           => 1,
        ];
    }
}
