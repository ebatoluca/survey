<?php

namespace App\Http\Requests\CourseCategory;

use App\Models\CourseCategory;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        
        $courseCategory = CourseCategory::findOrFail($this->course_category_id);

        return $this->user()->can('update', $courseCategory);

    }

    public function rules()
    {
        return [
            //
            'course_category_id' => 'required|numeric'
        ];
    }

}
