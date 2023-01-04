<?php

namespace App\Http\Requests\SurveyQuestion;

use App\Models\SurveyQuestion;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    public function authorize()
    {
        
        $surveyQuestion = SurveyQuestion::findOrFail($this->survey_question_id);

        return $this->user()->can('delete', $surveyQuestion);

    }

    public function rules()
    {
        return [
            'survey_question_id' => 'required|numeric'
        ];
    }
    
}
