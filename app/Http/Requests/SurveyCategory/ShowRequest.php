<?php

namespace App\Http\Requests\SurveyCategory;

use App\Models\SurveyCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowRequest extends FormRequest
{

    public function authorize()
    {

        $surveyCategory = SurveyCategory::findOrFail($this->survey_category_id);

        return $this->user()->can('view', $surveyCategory);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in((new SurveyCategory)->loadable_relations)
            ],
            'survey_category_id' => 'required|numeric'
        ];
    }
    
}
