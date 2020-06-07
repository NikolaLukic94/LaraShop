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
    public function aOrderItemMustBelongToUser() 
    {
        $this->json('POST', '/order-items/create/' , [
            // 'user_id' => '1',
            'order_item_status_code_id' => '1',
            'product_id' => '1',
            'quantity' => '1',
            'price' => '22',
        ]);

        $this->assertEquals(0, OrderItem::count());
    }

    /** @test **/
    public function aOrderItemMustHaveStatusCode() 
    {
        $this->json('POST', '/order-items/create/' , [
            'user_id' => '1',
            // 'order_item_status_code_id' => '1',
            'product_id' => '1',
            'quantity' => '1',
            'price' => '22',
        ]);

        $this->assertEquals(0, OrderItem::count());
    }

    /** @test **/
    public function aOrderItemMustHaveProductId() 
    {
        $this->json('POST', '/order-items/create/' , [
            'user_id' => '1',
            'order_item_status_code_id' => '1',
            // 'product_id' => '1',
            'quantity' => '1',
            'price' => '22',
        ]);

        $this->assertEquals(0, OrderItem::count());
    }

    /** @test **/
    public function aOrderItemrequiresQuantity() 
    {
        $this->json('POST', '/order-items/create/' , [
            'user_id' => '1',
            'order_item_status_code_id' => '1',
            'product_id' => '1',
            // 'quantity' => '1',
            'price' => '22',
        ]);

        $this->assertEquals(0, OrderItem::count());
    }

    /** @test **/
    public function aOrderItemrequiresPrice() 
    {
        $this->json('POST', '/order-items/create/' , [
            'user_id' => '1',
            'order_item_status_code_id' => '1',
            'product_id' => '1',
            'quantity' => '1',
            // 'price' => '22',
        ]);

        $this->assertEquals(0, OrderItem::count());
    }
}
