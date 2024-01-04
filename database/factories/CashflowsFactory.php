<?php

namespace Database\Factories;

use App\Models\Cashflows;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class CashflowsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cashflows::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $createdAt = $this->faker->dateTimeBetween('2023-01-01', '2023-12-31')->format('Y-m-d H:i:s');
        return [
            'cashflow' => $this->faker->word,
            'type' => 'income', 
            'category' => $this->faker->randomElement([
                'salary', 
                'other_income', 
                'rental_income', 
                'dividends',
                'freelance',
                'gifts',
                'investment',
                'savings_interest',
                'business_income',
                'lottery_winnings',
                'pension',
                'scholarship',
                'tips',
                'commission',
                'bonus',
                'alimony',
                'child_support',
                'royalties',
                'annuity',
                'reimbursement'
            ]),
            'total' => $this->faker->numberBetween(555000, 1500000),
            'desc' => $this->faker->sentence,
            'invoiceid' => null,
            'iduser' => $this->faker->numberBetween(1, 1000), 
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
    
}
