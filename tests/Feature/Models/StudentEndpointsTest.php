<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentEndpointsTest extends TestCase
{

    public function test_student_policies_endpoint()
    {

        $student = \App\Models\Student::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $student->id
        ];

        $this->json('POST', '/api/student/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_student_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('POST', '/api/student/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_student_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('POST', '/api/student/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_student_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('POST', '/api/student/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_student_show_auth_endpoint()
    {

        $student = \App\Models\Student::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'student_id' => $student->id
        ];

        $this->json('POST', '/api/student/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_student_show_guest_endpoint()
    {

        $student = \App\Models\Student::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'student_id' => $student->id
        ];

        $this->json('POST', '/api/student/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_student_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\Student::factory()->make()->getAttributes();

        $this->json('POST', '/api/student/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_student_update_endpoint()
    {

        $student = \App\Models\Student::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\Student::factory()->make()->getAttributes(),
            'student_id' => $student->id
        ];

        $this->json('PUT', '/api/student/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_student_delete_endpoint()
    {

        $student = \App\Models\Student::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'student_id' => $student->id
        ];

        $this->json('DELETE', '/api/student/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_student_restore_endpoint()
    {

        $student = \App\Models\Student::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'student_id' => $student->id
        ];

        $this->json('POST', '/api/student/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_student_force_delete_endpoint()
    {

        $student = \App\Models\Student::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'student_id' => $student->id
        ];

        $this->json('DELETE', '/api/student/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_student_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/student/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
