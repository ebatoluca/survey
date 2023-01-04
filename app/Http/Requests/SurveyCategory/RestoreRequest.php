<?php

namespace App\Http\Requests\SurveyCategory;

use App\Models\SurveyCategory;
use Illuminate\Foundation\Http\FormRequest;

class RestoreRequest extends FormRequest
{

    public function authorize()
    {
        
        $surveyCategory = SurveyCategory::withTrashed()->findOrFail($this->survey_category_id);
        
        return $this->user()->can('restore', $surveyCategory);

    }

    public function rules()
    {
        return [
            'survey_category_id' => 'required|numeric'
        ];
    }
    
}
