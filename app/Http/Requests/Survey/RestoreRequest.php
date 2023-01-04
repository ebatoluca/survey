<?php

namespace App\Http\Requests\Survey;

use App\Models\Survey;
use Illuminate\Foundation\Http\FormRequest;

class RestoreRequest extends FormRequest
{

    public function authorize()
    {
        
        $survey = Survey::withTrashed()->findOrFail($this->survey_id);
        
        return $this->user()->can('restore', $survey);

    }

    public function rules()
    {
        return [
            'survey_id' => 'required|numeric'
        ];
    }
    
}
