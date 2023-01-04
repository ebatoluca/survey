<?php

namespace App\Http\Requests\SurveyCategory;

use App\Models\SurveyCategory;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    public function authorize()
    {
        
        $surveyCategory = SurveyCategory::findOrFail($this->survey_category_id);

        return $this->user()->can('delete', $surveyCategory);

    }

    public function rules()
    {
        return [
            'survey_category_id' => 'required|numeric'
        ];
    }
    
}
