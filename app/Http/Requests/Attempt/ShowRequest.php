<?php

namespace App\Http\Requests\Attempt;

use App\Models\Attempt;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowRequest extends FormRequest
{

    public function authorize()
    {

        $attempt = Attempt::findOrFail($this->attempt_id);

        return $this->user()->can('view', $attempt);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in((new Attempt)->loadable_relations)
            ],
            'attempt_id' => 'required|numeric'
        ];
    }
    
}
