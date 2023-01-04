<?php

namespace App\Http\Requests\Student;

use App\Models\Student;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowRequest extends FormRequest
{

    public function authorize()
    {

        $student = Student::findOrFail($this->student_id);

        return $this->user()->can('view', $student);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in((new Student)->loadable_relations)
            ],
            'student_id' => 'required|numeric'
        ];
    }
    
}
