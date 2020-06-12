<?php

use Illuminate\Database\Seeder;
use App\Customer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Customer::class,50)->create();
       // $this->call(InvoiceTableSeeder::class);
    }
}
