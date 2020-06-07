<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Invoice;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DatabaseMigrations;

class ProductTest extends TestCase 
{
    /** @test **/
    public function aInvoiceMustBelongToUser() 
    {
        $this->json('POST', '/invoice/create/' , [
            // 'order_id' => '1',
            'invoice_status_code_id' => 1,
            'date' => 5/5/2020,
            'invoice_details' => 'test desc'
        ]);

        $this->assertEquals(0, Invoice::count());
    }

    /** @test **/
    public function aInvoiceMustRequiresStatusCode() 
    {
        $this->json('POST', '/invoice/create/' , [
            'order_id' => '1',
            // 'invoice_status_code_id' => 1,
            'date' => 5/5/2020,
            'invoice_details' => 'test desc'
        ]);

        $this->assertEquals(0, Invoice::count());
    }

    /** @test **/
    public function aInvoiceMustHaveDate() 
    {
        $this->json('POST', '/invoice/create/' , [
            'order_id' => '1',
            'invoice_status_code_id' => 1,
            // 'date' => 5/5/2020,
            'invoice_details' => 'test desc'
        ]);

        $this->assertEquals(0, Invoice::count());
    }
}
