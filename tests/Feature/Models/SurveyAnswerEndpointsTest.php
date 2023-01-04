<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SurveyAnswerEndpointsTest extends TestCase
{

    public function test_survey_answer_policies_endpoint()
    {

        $surveyAnswer = \App\Models\SurveyAnswer::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $surveyAnswer->id
        ];

        $this->json('POST', '/api/survey-answer/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_survey_answer_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('POST', '/api/survey-answer/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_survey_answer_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('POST', '/api/survey-answer/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_survey_answer_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('POST', '/api/survey-answer/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_survey_answer_show_auth_endpoint()
    {

        $surveyAnswer = \App\Models\SurveyAnswer::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'survey_answer_id' => $surveyAnswer->id
        ];

        $this->json('POST', '/api/survey-answer/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_survey_answer_show_guest_endpoint()
    {

        $surveyAnswer = \App\Models\SurveyAnswer::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'survey_answer_id' => $surveyAnswer->id
        ];

        $this->json('POST', '/api/survey-answer/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_survey_answer_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\SurveyAnswer::factory()->make()->getAttributes();

        $this->json('POST', '/api/survey-answer/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_survey_answer_update_endpoint()
    {

        $surveyAnswer = \App\Models\SurveyAnswer::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\SurveyAnswer::factory()->make()->getAttributes(),
            'survey_answer_id' => $surveyAnswer->id
        ];

        $this->json('PUT', '/api/survey-answer/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_survey_answer_delete_endpoint()
    {

        $surveyAnswer = \App\Models\SurveyAnswer::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'survey_answer_id' => $surveyAnswer->id
        ];

        $this->json('DELETE', '/api/survey-answer/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_survey_answer_restore_endpoint()
    {

        $surveyAnswer = \App\Models\SurveyAnswer::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'survey_answer_id' => $surveyAnswer->id
        ];

        $this->json('POST', '/api/survey-answer/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_survey_answer_force_delete_endpoint()
    {

        $surveyAnswer = \App\Models\SurveyAnswer::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'survey_answer_id' => $surveyAnswer->id
        ];

        $this->json('DELETE', '/api/survey-answer/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_survey_answer_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/survey-answer/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
