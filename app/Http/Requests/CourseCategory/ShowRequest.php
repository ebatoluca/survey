<?php

namespace App\Http\Requests\CourseCategory;

use App\Models\CourseCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowRequest extends FormRequest
{

    public function authorize()
    {

        $courseCategory = CourseCategory::findOrFail($this->course_category_id);

        return $this->user()->can('view', $courseCategory);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in((new CourseCategory)->loadable_relations)
            ],
            'course_category_id' => 'required|numeric'
        ];
    }
    
}
