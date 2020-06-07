<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Shipment;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DatabaseMigrations;

class ShipmentTest extends TestCase 
{
    /** @test **/
    public function aShipmentMustBelongToOrder() 
    {
        $this->json('POST', '/shipment/create/' , [
            // 'order_id' => '1',
            'invoice_id' => 1,
            'tracking_number' => 1,
            'date' => 10/10/2020,
        ]);

        $this->assertEquals(0, Shipment::count());
    }

    /** @test **/
    public function aShipmentMustHaveAnInvoice() 
    {
        $this->json('POST', '/shipment/create/' , [
            'order_id' => '1',
            // 'invoice_id' => 1,
            'tracking_number' => 1,
            'date' => 10/10/2020,
        ]);

        $this->assertEquals(0, Shipment::count());
    }

    /** @test **/
    public function aShipmentMustHaveTrackingNumber() 
    {
        $this->json('POST', '/shipment/create/' , [
            'order_id' => '1',
            'invoice_id' => 1,
            // 'tracking_number' => 1,
            'date' => 10/10/2020,
        ]);

        $this->assertEquals(0, Shipment::count());
    }

    /** @test **/
    public function aShipmentMustHaveDate() 
    {
        $this->json('POST', '/shipment/create/' , [
            'order_id' => '1',
            'invoice_id' => 1,
            'tracking_number' => 1,
            // 'date' => 10/10/2020,
        ]);

        $this->assertEquals(0, Shipment::count());
    }
}
