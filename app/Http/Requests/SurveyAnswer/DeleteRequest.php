<?php

namespace App\Http\Requests\SurveyAnswer;

use App\Models\SurveyAnswer;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    public function authorize()
    {
        
        $surveyAnswer = SurveyAnswer::findOrFail($this->survey_answer_id);

        return $this->user()->can('delete', $surveyAnswer);

    }

    public function rules()
    {
        return [
            'survey_answer_id' => 'required|numeric'
        ];
    }
    
}
