<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    /**
     * Set up the test
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    /** @test * */
    public function authenticatedUserCanFetchOrders()
    {
//        $this->placeOrder();

        $this
            ->actingAs($this->user, 'api')
            ->json('GET', 'api/orders')
            ->assertStatus(200);
    }
}
