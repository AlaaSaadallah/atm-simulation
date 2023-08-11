<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'currency_id' => fake()->numberBetween(1,4),
            'balance' => fake()->numberBetween(0,50000),
            'branch_number' => fake()->randomDigit(),
            'branch_name' => fake()->word(),
        ];
    }
}
