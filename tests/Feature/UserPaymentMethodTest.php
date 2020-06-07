<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\UserPaymentMethod;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DatabaseMigrations;

class UserPaymentMethodTest extends TestCase 
{
    /** @test **/
    public function aPaymentMethodMustBelongToUser() 
    {
        $this->json('POST', '/user-payment-methods/create/' , [
            'credit_card_number' => '8888999944445555',
            // 'user_id' => 1,
            'payment_method_id' => 1
        ]);

        $this->assertEquals(0, UserPaymentMethod::count());
    }

    /** @test **/
    public function aPaymentMethodMustHaveCreditCardNumber() 
    {
        $this->json('POST', '/user-payment-methods/create/' , [
            // 'credit_card_number' => '8888999944445555',
            'user_id' => 1,
            'payment_method_id' => 1
        ]);

        $this->assertEquals(0, UserPaymentMethod::count());
    }

    /** @test **/
    public function aPaymentMethodMustBelongToPaymentMethod() 
    {
        $this->json('POST', '/user-payment-methods/create/' , [
            'credit_card_number' => '8888999944445555',
            'user_id' => 1,
            // 'payment_method_id' => 1
        ]);

        $this->assertEquals(0, UserPaymentMethod::count());
    }
}
