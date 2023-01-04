<?php

namespace App\Http\Requests\SurveyAnswer;

use App\Models\SurveyAnswer;
use Illuminate\Foundation\Http\FormRequest;

class RestoreRequest extends FormRequest
{

    public function authorize()
    {
        
        $surveyAnswer = SurveyAnswer::withTrashed()->findOrFail($this->survey_answer_id);
        
        return $this->user()->can('restore', $surveyAnswer);

    }

    public function rules()
    {
        return [
            'survey_answer_id' => 'required|numeric'
        ];
    }
    
}
