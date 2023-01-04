<?php

namespace App\Http\Requests\Course;

use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowRequest extends FormRequest
{

    public function authorize()
    {

        $course = Course::findOrFail($this->course_id);

        return $this->user()->can('view', $course);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in((new Course)->loadable_relations)
            ],
            'course_id' => 'required|numeric'
        ];
    }
    
}
