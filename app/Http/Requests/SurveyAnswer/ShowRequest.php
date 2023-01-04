<?php

namespace App\Http\Requests\SurveyAnswer;

use App\Models\SurveyAnswer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowRequest extends FormRequest
{

    public function authorize()
    {

        $surveyAnswer = SurveyAnswer::findOrFail($this->survey_answer_id);

        return $this->user()->can('view', $surveyAnswer);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in((new SurveyAnswer)->loadable_relations)
            ],
            'survey_answer_id' => 'required|numeric'
        ];
    }
    
}
