<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'custname' => $this->faker->name,
            'iduser' => $this->faker->numberBetween(1, 2), 
            'total' => $this->faker->numberBetween(100, 1000),
            'created_at' => $this->faker->dateTimeBetween('2023-09-01', '2023-12-31'),
            'updated_at' => $this->faker->dateTimeBetween('2023-09-01', '2023-12-31'),
        ];
    }
}
