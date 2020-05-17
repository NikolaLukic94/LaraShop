<?php

use Illuminate\Database\Seeder;

class InvoiceStatusCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('invoice_status_codes')->insert([
            'name' => 'Issued',
        ]);

        DB::table('invoice_status_codes')->insert([
            'name' => 'Paid',
        ]);
    }
}
