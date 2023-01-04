<?php

namespace App\Http\Requests\CourseCategory;

use App\Models\CourseCategory;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    public function authorize()
    {
        
        $courseCategory = CourseCategory::findOrFail($this->course_category_id);

        return $this->user()->can('delete', $courseCategory);

    }

    public function rules()
    {
        return [
            'course_category_id' => 'required|numeric'
        ];
    }
    
}
