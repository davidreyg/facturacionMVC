<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(CountrySeeder::class);
        // $this->call(EstimateTemplateSeeder::class);
        $this->call(InvoiceTemplateSeeder::class);
    }
}
