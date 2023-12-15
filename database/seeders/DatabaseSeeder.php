<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\Cashflows::factory(50)->create();
        // \App\Models\Stocks::factory(50)->create();
        \App\Models\Invoice::factory(20)->create();
        \App\Models\Invoicedetail::factory(20)->create();
    }
}
