<?php

namespace Tests\Feature;

use Tests\Order;
use App\InvoiceStatusCode;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DatabaseMigrations;

class ProductTest extends TestCase 
{
    /** @test **/
    public function aOrderMustBelongToUser() 
    {
        $this->json('POST', '/order/create/' , [
            'date_placed' => 5/5/2020,
            // 'user_id' => '1',
            'order_status_codes_id' => 1,
        ]);

        $this->assertEquals(0, Order::count());
    }

    /** @test **/
    public function aOrderMustHaveDatePlaced() 
    {
        $this->json('POST', '/order/create/' , [
            // 'date_placed' => 5/5/2020,
            'user_id' => '1',
            'order_status_codes_id' => 1,
        ]);

        $this->assertEquals(0, Order::count());
    }

    /** @test **/
    public function aOrderMustHavOrderStatus() 
    {
        $this->json('POST', '/order/create/' , [
            'date_placed' => 5/5/2020,
            'user_id' => '1',
            // 'order_status_codes_id' => 1,
        ]);

        $this->assertEquals(0, Order::count());
    }
}
