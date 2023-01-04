<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SurveyEndpointsTest extends TestCase
{

    public function test_survey_policies_endpoint()
    {

        $survey = \App\Models\Survey::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $survey->id
        ];

        $this->json('POST', '/api/survey/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_survey_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('POST', '/api/survey/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_survey_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('POST', '/api/survey/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_survey_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('POST', '/api/survey/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_survey_show_auth_endpoint()
    {

        $survey = \App\Models\Survey::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'survey_id' => $survey->id
        ];

        $this->json('POST', '/api/survey/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_survey_show_guest_endpoint()
    {

        $survey = \App\Models\Survey::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'survey_id' => $survey->id
        ];

        $this->json('POST', '/api/survey/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_survey_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\Survey::factory()->make()->getAttributes();

        $this->json('POST', '/api/survey/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_survey_update_endpoint()
    {

        $survey = \App\Models\Survey::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\Survey::factory()->make()->getAttributes(),
            'survey_id' => $survey->id
        ];

        $this->json('PUT', '/api/survey/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_survey_delete_endpoint()
    {

        $survey = \App\Models\Survey::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'survey_id' => $survey->id
        ];

        $this->json('DELETE', '/api/survey/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_survey_restore_endpoint()
    {

        $survey = \App\Models\Survey::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'survey_id' => $survey->id
        ];

        $this->json('POST', '/api/survey/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_survey_force_delete_endpoint()
    {

        $survey = \App\Models\Survey::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'survey_id' => $survey->id
        ];

        $this->json('DELETE', '/api/survey/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_survey_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/survey/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
