<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiCrudTest extends TestCase
{
    // use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();

        $token = $user->createToken('test-token')->plainTextToken;

        $this->withHeader('Authorization', 'Bearer ' . $token);
    }

    public function test_can_create_resource()
    {
        $response = $this->Json('Post', 'api/store', [
            'title' => 'title',
            'description' => 'description'
        ]);
        $response->assertCreated();
    }

    public function test_can_get_all_resources()
    {
        $response = $this->Json('GET', 'api/showdata');
        $response->assertStatus(200);
    }
    public function test_can_get_single_resource()
    {
        $response = $this->Json('GET', 'api/search/45');
        $response->assertStatus(200);
    }
    public function test_can_update_resource()
    {
        // Assuming there is a resource with ID 2 in your database
        $response = $this->json('PUT', 'api/update/48', [
            'title' => 'Updated title',
            'description' => 'Updated description',
        ]);

        $response->assertStatus(200);
    }
    public function test_can_delete_resource()
    {
        $response = $this->Json('GET', 'api/delete/68');
        $response->assertStatus(200);
    }
    public function test_user_can_logout(){
        $response=$this->Json('Post','api/logout');
        $response->assertStatus(200);
    }
}
