<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DatabaseMigrations;

class ProductTest extends TestCase 
{
    /** @test **/
    public function aProductRequiresName() 
    {
        $this->json('POST', '/products/create/' , [
            // name
            'description' => 'Windows 9 activation key',
            'price' => 9,
            'quantity' => rand(4, 99),
            'product_type_id' => 2
        ]);

        $this->assertEquals(0, Product::count());
    }

    /** @test **/
    public function aProductRequiresPrice() 
    {
        $this->json('POST', '/products/create/' , [
            'name' => 'Test Name',
            'description' => 'Windows 9 activation key',
            // 'price' => 9,
            'quantity' => rand(4, 99),
            'product_type_id' => 2
        ]);

        $this->assertEquals(0, Product::count());
    }

    /** @test **/
    public function aProductRequiresQuantity() 
    {
        $this->json('POST', '/products/create/' , [
            'name' => 'Test Name',
            'description' => 'Windows 9 activation key',
            'price' => 9,
            // 'quantity' => rand(4, 99),
            'product_type_id' => 2
        ]);

        $this->assertEquals(0, Product::count());
    }

    /** @test **/
    public function aProductRequiresProductType() 
    {
        $this->json('POST', '/products/create/' , [
            'name' => 'Test Name',
            'description' => 'Windows 9 activation key',
            'price' => 9,
            'quantity' => rand(4, 99),
            // 'product_type_id' => 2
        ]);

        $this->assertEquals(0, Product::count());
    }
}
