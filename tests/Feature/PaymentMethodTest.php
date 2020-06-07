<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\PaymentMethod;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DatabaseMigrations;

class PaymentMethodTest extends TestCase 
{
    /** @test **/
    public function aInvoiceStatusCodeMustHaveName() 
    {
        $this->json('POST', '/payment-methods/create/' , [
            // 'name' => 'test desc'
        ]);

        $this->assertEquals(0, PaymentMethod::count());
    }
}
