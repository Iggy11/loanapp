<?php

namespace Database\Factories;

use App\Models\BankAccount;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class BankAccountsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BankAccount::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'user_id' => User::all()->random()->id, //1,
            'account_id' => Str::random(6),
            'account_type' => $this->faker->randomElement(['checking', 'savings']),
            'balance' => random_int(10000,50000),
            'bank_name' => $this->faker->randomElement(['BOFA', 'Chase', 'Citigroup']),//Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
