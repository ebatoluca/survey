<?php

namespace App\Http\Requests\SurveyQuestion;

use App\Models\SurveyQuestion;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowRequest extends FormRequest
{

    public function authorize()
    {

        $surveyQuestion = SurveyQuestion::findOrFail($this->survey_question_id);

        return $this->user()->can('view', $surveyQuestion);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in((new SurveyQuestion)->loadable_relations)
            ],
            'survey_question_id' => 'required|numeric'
        ];
    }
    
}
