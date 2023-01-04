<?php

namespace App\Http\Requests\Classroom;

use App\Models\Classroom;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowRequest extends FormRequest
{

    public function authorize()
    {

        $classroom = Classroom::findOrFail($this->classroom_id);

        return $this->user()->can('view', $classroom);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in((new Classroom)->loadable_relations)
            ],
            'classroom_id' => 'required|numeric'
        ];
    }
    
}
