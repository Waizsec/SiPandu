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
        $createdAt = $this->faker->dateTimeBetween('2023-01-01', '2023-12-31')->format('Y-m-d H:i:s');
        return [
            'custname' => $this->faker->name,
            'iduser' => $this->faker->numberBetween(1, 1000), 
            'total' => $this->faker->numberBetween(500000, 999000),
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
