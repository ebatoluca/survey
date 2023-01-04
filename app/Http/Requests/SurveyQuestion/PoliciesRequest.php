<?php

namespace App\Http\Requests\SurveyQuestion;

use Illuminate\Foundation\Http\FormRequest;

class PoliciesRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'nullable|numeric|exists:App\Models\SurveyQuestion,id'
        ];
    }
    
}
