<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class OrderItemsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var array
     */
    private $inputData;
    /**
     * @var Collection|Model|mixed
     */
    private $user;
    /**
     * @var Collection|Model|mixed
     */
    private $status;

    /**
     * Set up the test
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->withExceptionHandling();

        $this->user = factory(User::class)->create();
    }

    /** @test * */
    public function posts_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('order_items', [
                'id','user_id', 'order_id', 'product_id', 'quantity', 'price'
            ]), 1);
    }

    /** @test * */
    public function authenticatedUserCanFetchOrderItems()
    {
        $this
            ->actingAs($this->user, 'api')
            ->json('GET', 'api/order-items')
            ->assertStatus(200);
    }

    /** @test * */
    public function unauthenticatedUserCannotFetchOrderItems()
    {
        $this->json('GET', 'api/order-items')->assertStatus(401);
    }

    /** @test * */
    public function orderItemMustBelongToAUser()
    {
        $input = [
            'order_id' => factory(Order::class)->create()->id,
            'productId' => factory(Product::class)->create()->id,
            'quantity' => 5,
        ];

        $this
            ->actingAs($this->user, 'api')
            ->json('POST', 'api/order-items', $input)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "user_id" => ["The user id field is required."],
                ]
            ]);
    }


    /** @test * */
    public function orderItemCanBelongToAOrder()
    {
        $product = factory(Product::class)->create();

        $input = [
            'user_id' => $this->user->id,
            'order_id' => factory(Order::class)->create()->id,
            'productId' => $product->id,
            'quantity' => 1,
        ];

        $this
            ->actingAs($this->user, 'api')
            ->json('POST', 'api/order-items', $input)
            ->assertStatus(200);

        unset($input['order_id']);

        $this
            ->actingAs($this->user, 'api')
            ->json('POST', 'api/order-items', $input)
            ->assertStatus(200);
    }

    /** @test * */
    public function orderItemMustHaveAProduct()
    {
        $input = [
            'user_id' => $this->user->id,
            'order_id' => factory(Order::class)->create()->id,
            'quantity' => 1,
        ];

        $this
            ->actingAs($this->user, 'api')
            ->json('POST', 'api/order-items', $input)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "productId" => ["The product id field is required."],
                ]
            ]);
    }

    /** @test * */
    public function addingTheSameOrderItemTwiceIncreasesQuantity()
    {
        $product = factory(Product::class)->create();

        $input = [
            'user_id' => $this->user->id,
            'order_id' => factory(Order::class)->create()->id,
            'productId' => $product->id,
            'quantity' => 1,
        ];

        $this
            ->actingAs($this->user, 'api')
            ->json('POST', 'api/order-items', $input);
        $this
            ->actingAs($this->user, 'api')
            ->json('POST', 'api/order-items', $input);

        $this->assertEquals( $product->price * 2, OrderItem::latest()->first()->price);
    }
}
