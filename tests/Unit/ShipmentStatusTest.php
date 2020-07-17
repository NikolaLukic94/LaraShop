<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ShipmentStatusTest extends TestCase
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
