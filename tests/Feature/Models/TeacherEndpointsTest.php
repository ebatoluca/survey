<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TeacherEndpointsTest extends TestCase
{

    public function test_teacher_policies_endpoint()
    {

        $teacher = \App\Models\Teacher::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $teacher->id
        ];

        $this->json('POST', '/api/teacher/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_teacher_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('POST', '/api/teacher/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_teacher_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('POST', '/api/teacher/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_teacher_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('POST', '/api/teacher/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_teacher_show_auth_endpoint()
    {

        $teacher = \App\Models\Teacher::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'teacher_id' => $teacher->id
        ];

        $this->json('POST', '/api/teacher/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_teacher_show_guest_endpoint()
    {

        $teacher = \App\Models\Teacher::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'teacher_id' => $teacher->id
        ];

        $this->json('POST', '/api/teacher/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_teacher_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\Teacher::factory()->make()->getAttributes();

        $this->json('POST', '/api/teacher/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_teacher_update_endpoint()
    {

        $teacher = \App\Models\Teacher::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\Teacher::factory()->make()->getAttributes(),
            'teacher_id' => $teacher->id
        ];

        $this->json('PUT', '/api/teacher/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_teacher_delete_endpoint()
    {

        $teacher = \App\Models\Teacher::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'teacher_id' => $teacher->id
        ];

        $this->json('DELETE', '/api/teacher/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_teacher_restore_endpoint()
    {

        $teacher = \App\Models\Teacher::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'teacher_id' => $teacher->id
        ];

        $this->json('POST', '/api/teacher/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_teacher_force_delete_endpoint()
    {

        $teacher = \App\Models\Teacher::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'teacher_id' => $teacher->id
        ];

        $this->json('DELETE', '/api/teacher/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_teacher_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/teacher/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
