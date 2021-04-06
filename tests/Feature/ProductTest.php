<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    private $user;
    private $inputData;

    /**
     * Set up the test
     */
    public function setUp(): void
    {
        parent::setUp();

        $productType = ProductType::create(['name' => 'Test name']);

        $this->user = factory(User::class)->create();

        $this->inputData = [
            'name' => 'Test Name',
            'author' => 'Test Author',
            'publisher' => 'Test Publisher',
            'description' => 'Test Description',
            'genre' => 'Test Genre',
            'price' => 55,
            'product_type_id' => $productType->id,
            'quantity' => 44,
            'other_product_details' => 1
        ];
    }

    /** @test * */
    public function anyoneCanFetchProducts()
    {
        $this
            ->actingAs($this->user, 'api')
            ->json('GET', 'api/products')
            ->assertStatus(200);

        $this->json('GET', 'api/products')->assertStatus(200);
    }

    /** @test * */
    public function nameIsRequired()
    {
        $input = $this->inputData;
        unset($input['name']);

        $this
            ->actingAs($this->user, 'api')
            ->json('POST', 'api/products', $input)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "name" => ["The name field is required."],
                ]
            ]);
    }

    /** @test * */
    public function quantityIsRequired()
    {
        $input = $this->inputData;
        unset($input['quantity']);

        $this
            ->actingAs($this->user, 'api')
            ->json('POST', 'api/products', $input)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "quantity" => [
                        "The quantity field is required."
                    ],
                ]
            ]);
    }

    /** @test * */
    public function productTypeIsRequired()
    {
        $input = $this->inputData;
        unset($input['product_type_id']);

        $this
            ->actingAs($this->user, 'api')
            ->json('POST', 'api/products', $input)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "product_type_id" => ["The product type id field is required."],
                ]
            ]);
    }

    /** @test * */
    public function authenticatedUserCanUpdateProduct()
    {
        $theProduct = Product::create($this->inputData);

        $data = $this->inputData;
        $data['name'] = 'Changed Name';

        $this
            ->actingAs($this->user, 'api')
            ->json('PATCH', 'api/products/' . $theProduct->id, $data)
            ->assertStatus(200);

        $this->assertEquals('Changed Name', Product::find($theProduct->id)->name);
    }

    /** @test * */
    public function authenticatedUserCanDeleteProduct()
    {
        $theProduct = Product::create($this->inputData);

        $this
            ->actingAs($this->user, 'api')
            ->json('DELETE', 'api/products/' . $theProduct->id)
            ->assertStatus(200)
            ->assertJson([
                "message" => "Product successfully deleted!",
                "status" => "success"
            ]);
    }

    /** @test * */
    public function unauthenticatedUserCannotDeleteProduct()
    {
        $theProduct = Product::create($this->inputData);

        $this
            ->json('DELETE', 'api/products/' . $theProduct->id)
            ->assertStatus(401);
    }
}
