<?php

namespace Database\Factories;

use App\Models\Invoicedetail;
use App\Models\InvoiceDetails;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class InvoicedetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoicedetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'invoiceid' => $this->faker->unique()->numberBetween(1, 10), 
            'items' => $this->faker->word,
            'amount' => $this->faker->numberBetween(1, 10),
            'prices' => $this->faker->numberBetween(10, 100),
            'created_at' => $this->faker->dateTimeBetween('2023-09-01', '2023-12-31'),
            'updated_at' => $this->faker->dateTimeBetween('2023-09-01', '2023-12-31'),
        ];
    }
}
