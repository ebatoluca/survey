<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SurveyQuestionEndpointsTest extends TestCase
{

    public function test_survey_question_policies_endpoint()
    {

        $surveyQuestion = \App\Models\SurveyQuestion::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $surveyQuestion->id
        ];

        $this->json('POST', '/api/survey-question/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_survey_question_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('POST', '/api/survey-question/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_survey_question_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('POST', '/api/survey-question/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_survey_question_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('POST', '/api/survey-question/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_survey_question_show_auth_endpoint()
    {

        $surveyQuestion = \App\Models\SurveyQuestion::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'survey_question_id' => $surveyQuestion->id
        ];

        $this->json('POST', '/api/survey-question/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_survey_question_show_guest_endpoint()
    {

        $surveyQuestion = \App\Models\SurveyQuestion::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'survey_question_id' => $surveyQuestion->id
        ];

        $this->json('POST', '/api/survey-question/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_survey_question_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\SurveyQuestion::factory()->make()->getAttributes();

        $this->json('POST', '/api/survey-question/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_survey_question_update_endpoint()
    {

        $surveyQuestion = \App\Models\SurveyQuestion::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\SurveyQuestion::factory()->make()->getAttributes(),
            'survey_question_id' => $surveyQuestion->id
        ];

        $this->json('PUT', '/api/survey-question/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_survey_question_delete_endpoint()
    {

        $surveyQuestion = \App\Models\SurveyQuestion::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'survey_question_id' => $surveyQuestion->id
        ];

        $this->json('DELETE', '/api/survey-question/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_survey_question_restore_endpoint()
    {

        $surveyQuestion = \App\Models\SurveyQuestion::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'survey_question_id' => $surveyQuestion->id
        ];

        $this->json('POST', '/api/survey-question/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_survey_question_force_delete_endpoint()
    {

        $surveyQuestion = \App\Models\SurveyQuestion::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'survey_question_id' => $surveyQuestion->id
        ];

        $this->json('DELETE', '/api/survey-question/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_survey_question_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/survey-question/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
