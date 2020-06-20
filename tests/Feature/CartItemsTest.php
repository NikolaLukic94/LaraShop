<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\CartItem;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DatabaseMigrations;

class CartItemsTest extends TestCase 
{
    /** @test **/
    public function unableToSetQuantityToZero() 
    {

    }

    /** @test **/
    public function unableToDecreaseQuantityIfIsOne() 
    {

    }

    /** @test **/
    public function unableToIncreaseQuantityIfThereAreNotEnoughItemsLeft() 
    {

    }

    /** @test **/
    public function increasingQuantityWillDecreaseTotalNumerOfProductsLeft() 
    {

    }

    /** @test **/
    public function decreasingQuantityWillIncreaseTotalNumerOfProductsLeft() 
    {

    }
}
