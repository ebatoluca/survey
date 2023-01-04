<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PeriodEndpointsTest extends TestCase
{

    public function test_period_policies_endpoint()
    {

        $period = \App\Models\Period::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $period->id
        ];

        $this->json('POST', '/api/period/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_period_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('POST', '/api/period/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_period_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('POST', '/api/period/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_period_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('POST', '/api/period/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_period_show_auth_endpoint()
    {

        $period = \App\Models\Period::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'period_id' => $period->id
        ];

        $this->json('POST', '/api/period/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_period_show_guest_endpoint()
    {

        $period = \App\Models\Period::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'period_id' => $period->id
        ];

        $this->json('POST', '/api/period/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_period_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\Period::factory()->make()->getAttributes();

        $this->json('POST', '/api/period/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_period_update_endpoint()
    {

        $period = \App\Models\Period::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\Period::factory()->make()->getAttributes(),
            'period_id' => $period->id
        ];

        $this->json('PUT', '/api/period/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_period_delete_endpoint()
    {

        $period = \App\Models\Period::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'period_id' => $period->id
        ];

        $this->json('DELETE', '/api/period/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_period_restore_endpoint()
    {

        $period = \App\Models\Period::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'period_id' => $period->id
        ];

        $this->json('POST', '/api/period/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_period_force_delete_endpoint()
    {

        $period = \App\Models\Period::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'period_id' => $period->id
        ];

        $this->json('DELETE', '/api/period/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_period_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/period/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
