<?php

namespace App\Http\Requests\Teacher;

use App\Models\Teacher;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowRequest extends FormRequest
{

    public function authorize()
    {

        $teacher = Teacher::findOrFail($this->teacher_id);

        return $this->user()->can('view', $teacher);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in((new Teacher)->loadable_relations)
            ],
            'teacher_id' => 'required|numeric'
        ];
    }
    
}
