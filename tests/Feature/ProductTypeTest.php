<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\ProductType;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DatabaseMigrations;

class ProductTypeTest extends TestCase 
{
    /** @test **/
    public function aProductTypeRequiresName() 
    {
        $this->json('POST', '/product-types/create/' , [
            // name
        ]);

        $this->assertEquals(0, ProductType::count());
    }
}
