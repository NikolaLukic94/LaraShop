<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('invoice_status_codes')->insert([
            'name' => 'Paid',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
