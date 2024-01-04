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
        $createdAt = $this->faker->dateTimeBetween('2023-01-01', '2023-12-31')->format('Y-m-d H:i:s');
        return [
            'invoiceid' => $this->faker->numberBetween(1, 1000), 
            'items' => $this->faker->randomElement([
                'T-shirt', 'Jeans', 'Sneakers', 'Hat', 'Watch',
                'Pizza', 'Burger', 'Sushi', 'Pasta', 'Smoothie',
                'Laptop', 'Phone', 'Camera', 'Headphones', 'Backpack',
                'Book', 'Magazine', 'Notebook', 'Pen', 'Painting',
                'Coffee Mug', 'Fitness Tracker', 'Sunglasses', 'Guitar',
                'Running Shoes', 'Handbag', 'Desk Chair', 'Candle',
                'Bluetooth Speaker', 'Plant', 'Art Print', 'Smartwatch',
                'Water Bottle', 'Earrings', 'Board Game', 'Wallet',
                'Dress', 'Sandals', 'Cupcake', 'Yoga Mat', 'Soccer Ball',
            ]),
            
            'amount' => $this->faker->numberBetween(1, 10),
            'prices' => $this->faker->numberBetween(10000, 100000),
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
