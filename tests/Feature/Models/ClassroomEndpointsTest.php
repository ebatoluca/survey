<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClassroomEndpointsTest extends TestCase
{

    public function test_classroom_policies_endpoint()
    {

        $classroom = \App\Models\Classroom::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $classroom->id
        ];

        $this->json('POST', '/api/classroom/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_classroom_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('POST', '/api/classroom/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_classroom_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('POST', '/api/classroom/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_classroom_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('POST', '/api/classroom/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_classroom_show_auth_endpoint()
    {

        $classroom = \App\Models\Classroom::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'classroom_id' => $classroom->id
        ];

        $this->json('POST', '/api/classroom/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_classroom_show_guest_endpoint()
    {

        $classroom = \App\Models\Classroom::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'classroom_id' => $classroom->id
        ];

        $this->json('POST', '/api/classroom/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_classroom_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\Classroom::factory()->make()->getAttributes();

        $this->json('POST', '/api/classroom/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_classroom_update_endpoint()
    {

        $classroom = \App\Models\Classroom::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\Classroom::factory()->make()->getAttributes(),
            'classroom_id' => $classroom->id
        ];

        $this->json('PUT', '/api/classroom/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_classroom_delete_endpoint()
    {

        $classroom = \App\Models\Classroom::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'classroom_id' => $classroom->id
        ];

        $this->json('DELETE', '/api/classroom/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_classroom_restore_endpoint()
    {

        $classroom = \App\Models\Classroom::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'classroom_id' => $classroom->id
        ];

        $this->json('POST', '/api/classroom/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_classroom_force_delete_endpoint()
    {

        $classroom = \App\Models\Classroom::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'classroom_id' => $classroom->id
        ];

        $this->json('DELETE', '/api/classroom/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_classroom_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/classroom/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
