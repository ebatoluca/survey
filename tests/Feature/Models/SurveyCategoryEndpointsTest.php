<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SurveyCategoryEndpointsTest extends TestCase
{

    public function test_survey_category_policies_endpoint()
    {

        $surveyCategory = \App\Models\SurveyCategory::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $surveyCategory->id
        ];

        $this->json('POST', '/api/survey-category/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_survey_category_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('POST', '/api/survey-category/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_survey_category_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('POST', '/api/survey-category/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_survey_category_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('POST', '/api/survey-category/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_survey_category_show_auth_endpoint()
    {

        $surveyCategory = \App\Models\SurveyCategory::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'survey_category_id' => $surveyCategory->id
        ];

        $this->json('POST', '/api/survey-category/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_survey_category_show_guest_endpoint()
    {

        $surveyCategory = \App\Models\SurveyCategory::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'survey_category_id' => $surveyCategory->id
        ];

        $this->json('POST', '/api/survey-category/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_survey_category_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\SurveyCategory::factory()->make()->getAttributes();

        $this->json('POST', '/api/survey-category/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_survey_category_update_endpoint()
    {

        $surveyCategory = \App\Models\SurveyCategory::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\SurveyCategory::factory()->make()->getAttributes(),
            'survey_category_id' => $surveyCategory->id
        ];

        $this->json('PUT', '/api/survey-category/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_survey_category_delete_endpoint()
    {

        $surveyCategory = \App\Models\SurveyCategory::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'survey_category_id' => $surveyCategory->id
        ];

        $this->json('DELETE', '/api/survey-category/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_survey_category_restore_endpoint()
    {

        $surveyCategory = \App\Models\SurveyCategory::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'survey_category_id' => $surveyCategory->id
        ];

        $this->json('POST', '/api/survey-category/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_survey_category_force_delete_endpoint()
    {

        $surveyCategory = \App\Models\SurveyCategory::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'survey_category_id' => $surveyCategory->id
        ];

        $this->json('DELETE', '/api/survey-category/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_survey_category_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/survey-category/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
