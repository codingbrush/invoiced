<?php

use Illuminate\Database\Seeder;
use App\Invoice; 
use App\InvoiceItem; 
use App\User;
use Faker\Factory;

class InvoiceTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Factory::create();
		User::truncate();
		Invoice::truncate();
		InvoiceItem::truncate();

		factory(User::class, 1)->create();

		foreach (range(1, 20) as $i) {
			//$items = collect();

			foreach (range(1,mt_rand(2,10)) as $j) {
				$quantity = mt_rand(2, 10);
				$unit_price = mt_rand(100, 5000);
				$items = InvoiceItem::create([
					'invoice_id' => mt_rand(1, 20),
					'description' => $faker->sentence,
					'quantity' => $quantity,
					'unit_price' => $unit_price,
					'total' => ($quantity * $unit_price)
				]);
			}
			    $subtotal = $items->sum('total');
			    $discount = mt_rand(0, 100);
				$grandtotal = $subtotal - $discount;
				//$invoiceno = 0;

			
				$invoice = Invoice::create([
					'invoice_no' => $faker->numberBetween(1000,4000),
					'invoice_date' => $faker->date('Y-m-d',31),
					'due_date' => $faker->date('Y-m-d',31),
					'discount' => $discount,
					'title' => $faker->word,
					'grand_total' => $grandtotal,
					'subtotal' => $subtotal
				]);
			
		}
	}

	//    function invoiceNumber()
	// {
	//     $latest = Invoice::latest()->first();

	//     if (! $latest) {
	//         return 'INV-0001';
	//     }
	//     $string = preg_replace("/[^0-9\.]/", '', $latest->invoice_no);
	//     //dd($string);
	//     return 'INV-' . sprintf('%04d', ++$string); // sprintf will add leading zeros to the invoice number
	// }
}
