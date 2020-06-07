<?php

namespace Tests\Feature;

use Tests\OrderItem;
use App\InvoiceStatusCode;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DatabaseMigrations;

class ProductTest extends TestCase 
{
    /** @test **/
    public function aPaymentMustBelongToAnInvoice() 
    {
        $this->json('POST', '/payment/create/' , [
            // 'invoice_id' => '1',
            'payment_date' => 10/10/2020,
            'payment_amount' => 25,
        ]);

        $this->assertEquals(0, Payment::count());
    }

    /** @test **/
    public function aPaymentMustHaveDate() 
    {
        $this->json('POST', '/payment/create/' , [
            'invoice_id' => '1',
            // 'payment_date' => 10/10/2020,
            'payment_amount' => 25,
        ]);

        $this->assertEquals(0, Payment::count());
    }

    /** @test **/
    public function aPaymentRequiresAmount() 
    {
        $this->json('POST', '/payment/create/' , [
            'invoice_id' => '1',
            'payment_date' => 10/10/2020,
            // 'payment_amount' => 25,
        ]);

        $this->assertEquals(0, Payment::count());
    }
}
