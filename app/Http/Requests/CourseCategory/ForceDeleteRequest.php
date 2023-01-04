<?php

namespace App\Http\Requests\CourseCategory;

use App\Models\CourseCategory;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    public function authorize()
    {

        $courseCategory = CourseCategory::withTrashed()->findOrFail($this->course_category_id);
        
        return $this->user()->can('forceDelete', $courseCategory);

    }

    public function rules()
    {
        return [
            'course_category_id' => 'required|numeric'
        ];
    }
    
}
