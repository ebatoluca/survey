<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourseCategoryEndpointsTest extends TestCase
{

    public function test_course_category_policies_endpoint()
    {

        $courseCategory = \App\Models\CourseCategory::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $courseCategory->id
        ];

        $this->json('POST', '/api/course-category/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_course_category_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('POST', '/api/course-category/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_course_category_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('POST', '/api/course-category/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_course_category_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('POST', '/api/course-category/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_course_category_show_auth_endpoint()
    {

        $courseCategory = \App\Models\CourseCategory::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'course_category_id' => $courseCategory->id
        ];

        $this->json('POST', '/api/course-category/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_course_category_show_guest_endpoint()
    {

        $courseCategory = \App\Models\CourseCategory::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'course_category_id' => $courseCategory->id
        ];

        $this->json('POST', '/api/course-category/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_course_category_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\CourseCategory::factory()->make()->getAttributes();

        $this->json('POST', '/api/course-category/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_course_category_update_endpoint()
    {

        $courseCategory = \App\Models\CourseCategory::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\CourseCategory::factory()->make()->getAttributes(),
            'course_category_id' => $courseCategory->id
        ];

        $this->json('PUT', '/api/course-category/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_course_category_delete_endpoint()
    {

        $courseCategory = \App\Models\CourseCategory::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'course_category_id' => $courseCategory->id
        ];

        $this->json('DELETE', '/api/course-category/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_course_category_restore_endpoint()
    {

        $courseCategory = \App\Models\CourseCategory::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'course_category_id' => $courseCategory->id
        ];

        $this->json('POST', '/api/course-category/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_course_category_force_delete_endpoint()
    {

        $courseCategory = \App\Models\CourseCategory::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'course_category_id' => $courseCategory->id
        ];

        $this->json('DELETE', '/api/course-category/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_course_category_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/course-category/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
