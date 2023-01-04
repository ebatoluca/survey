<?php

namespace App\Http\Requests\Survey;

use App\Models\Survey;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    public function authorize()
    {
        
        $survey = Survey::findOrFail($this->survey_id);

        return $this->user()->can('delete', $survey);

    }

    public function rules()
    {
        return [
            'survey_id' => 'required|numeric'
        ];
    }
    
}
