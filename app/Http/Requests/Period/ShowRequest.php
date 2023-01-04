<?php

namespace App\Http\Requests\Period;

use App\Models\Period;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowRequest extends FormRequest
{

    public function authorize()
    {

        $period = Period::findOrFail($this->period_id);

        return $this->user()->can('view', $period);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in((new Period)->loadable_relations)
            ],
            'period_id' => 'required|numeric'
        ];
    }
    
}
