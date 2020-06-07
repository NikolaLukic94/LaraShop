<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\OrderItemStatusCode;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DatabaseMigrations;

class ProductTest extends TestCase 
{
    /** @test **/
    public function aInvoiceStatusCodeMustHaveName() 
    {
        $this->json('POST', '/order-item-status-codes/create/' , [
            // 'name' => 'test desc'
        ]);

        $this->assertEquals(0, OrderItemStatusCode::count());
    }
}
