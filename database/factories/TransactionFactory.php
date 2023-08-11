<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Atm;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'account_id' => Account::factory(),
            'atm_id' => Atm::factory(),
            'type_id' => fake()->numberBetween(1,2),
            'amount' => fake()->numberBetween(0,50000),
            'balance_before' => fake()->numberBetween(0,50000),
            'balance_after' => fake()->numberBetween(0,50000),
        ];
    }
}
