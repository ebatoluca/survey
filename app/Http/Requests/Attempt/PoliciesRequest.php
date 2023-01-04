<?php

namespace App\Http\Requests\Attempt;

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
            'id' => 'nullable|numeric|exists:App\Models\Attempt,id'
        ];
    }
    
}
