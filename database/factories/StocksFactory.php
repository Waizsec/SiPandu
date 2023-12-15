<?php

namespace Database\Factories;

use App\Models\Stocks;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class StocksFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stocks::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'items' => $this->faker->word,
            'sell_price' => $this->faker->randomFloat(2, 10000, 50000),
            'buy_price' => $this->faker->randomFloat(2, 5000, 25000),
            'stock' => $this->faker->numberBetween(10, 100),
            'type' => $this->faker->word, // You can customize this based on your specific use case
            'iduser' => $this->faker->numberBetween(1,2), // Adjust the range as needed
            'created_at' => $this->faker->dateTimeBetween('2023-09-01', '2023-12-31'),
            'updated_at' => $this->faker->dateTimeBetween('2023-09-01', '2023-12-31'),
        ];
    }
}
