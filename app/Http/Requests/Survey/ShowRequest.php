<?php

namespace App\Http\Requests\Survey;

use App\Models\Survey;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowRequest extends FormRequest
{

    public function authorize()
    {

        $survey = Survey::findOrFail($this->survey_id);

        return $this->user()->can('view', $survey);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in((new Survey)->loadable_relations)
            ],
            'survey_id' => 'required|numeric'
        ];
    }
    
}
