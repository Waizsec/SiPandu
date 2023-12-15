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
        $categories = ['invoice', 'other_category'];

        return [
            'cashflow' => $this->faker->word,
            'type' => $this->faker->randomElement(['income', 'outcome']),
            'category' => $this->faker->randomElement($categories),
            'total' => $this->faker->numberBetween(100, 1000),
            'desc' => $this->faker->sentence,
            'invoiceid' => $this->faker->boolean(70) ? $this->faker->numberBetween(1, 3) : null,
            'iduser' => $this->faker->numberBetween(1,2), // Adjust the range as needed
            'created_at' => $this->faker->dateTimeBetween('2023-09-01', '2023-12-31'),
            'updated_at' => $this->faker->dateTimeBetween('2023-09-01', '2023-12-31'),
        ];
    }
}
