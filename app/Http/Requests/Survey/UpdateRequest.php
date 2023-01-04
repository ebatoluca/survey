<?php

namespace App\Http\Requests\Survey;

use App\Models\Survey;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        
        $survey = Survey::findOrFail($this->survey_id);

        return $this->user()->can('update', $survey);

    }

    public function rules()
    {
        return [
            //
            'survey_id' => 'required|numeric'
        ];
    }

}
