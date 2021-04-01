<?php

namespace Tests\Feature;

use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StatusTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Set up the test
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        $this->statusExampleData = [
            "name" => "Test 1",
            "type" => "Order",
        ];
    }

    /** @test * */
    public function unauthenticatedUserCannotFetchStatuses()
    {
        $this
            ->json('GET', 'api/statuses')
            ->assertStatus(401);
    }

    /** @test * */
    public function authenticatedUserCanFetchStatuses()
    {
        Status::create($this->statusExampleData);

        $secondStatus = [
            "name" => "Test 2",
            "type" => "Order",
        ];

        Status::create($secondStatus);

        $this->actingAs($this->user, 'api')
            ->json('GET', 'api/statuses')
            ->assertStatus(200)
            ->assertJson([
                "data" => [
                    $this->statusExampleData,
                    $secondStatus
                ],
                "message" => "Retrieved successfully"
            ]);
    }

    /** @test * */
    public function unauthenticatedUserCannotCreateStatus()
    {
        $this->json('POST', 'api/statuses', $data = [])
            ->assertStatus(401)
            ->assertJson([
                "message" => "Unauthenticated.",
            ]);
    }

    /** @test * */
    public function nameIsRequired()
    {
        $this->actingAs($this->user, 'api')->json('POST', 'api/statuses', $data = [])
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "name" => ["The name field is required."],
                    "type" => ["The type field is required."],
                ]
            ]);
    }

    /** @test * */
    public function typeIsRequired()
    {
        $this->actingAs($this->user, 'api')
            ->json('POST', 'api/statuses', ['name' => 'Exists'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "type" => ["The type field is required."],
                ]
            ]);
    }

    /** @test * */
    public function canCreateStatus()
    {
        $this->actingAs($this->user, 'api')
            ->json('POST', 'api/statuses', $this->statusExampleData)
            ->assertStatus(201)
            ->assertJson([
                "createdStatus" => $this->statusExampleData,
                "message" => "Status successfully created!",
                "status" => "success"
            ]);
    }

    /** @test * */
    public function canUpdateStatus()
    {
        $theStatus = Status::create($this->statusExampleData);

        $data = [
            'name' => 'New name',
            'type' => 'New type'
        ];

        $this->actingAs($this->user, 'api')
            ->json('PATCH', 'api/statuses/' . $theStatus->id, $data)
            ->assertStatus(200);
    }

    /** @test * */
    public function authenticatedUserCanDeleteStatus()
    {
        $theStatus = Status::create($this->statusExampleData);

        $this->actingAs($this->user, 'api')
            ->json('DELETE', 'api/statuses/' . $theStatus->id)
            ->assertStatus(200)
            ->assertJson([
                "message" => "Status successfully deleted!",
                "status" => "success"
            ]);
    }

    /** @test * */
    public function unauthenticatedUserCannotDeleteStatus()
    {
        $status = Status::create($this->statusExampleData);

        $this
            ->json('DELETE', 'api/statuses/' . $status->id)
            ->assertStatus(401);
    }
}
