<?php

namespace App\Http\Requests\SurveyQuestion;

use App\Models\SurveyQuestion;
use Illuminate\Foundation\Http\FormRequest;

class RestoreRequest extends FormRequest
{

    public function authorize()
    {
        
        $surveyQuestion = SurveyQuestion::withTrashed()->findOrFail($this->survey_question_id);
        
        return $this->user()->can('restore', $surveyQuestion);

    }

    public function rules()
    {
        return [
            'survey_question_id' => 'required|numeric'
        ];
    }
    
}
