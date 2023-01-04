<?php

namespace App\Http\Requests\Course;

use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;

class RestoreRequest extends FormRequest
{

    public function authorize()
    {
        
        $course = Course::withTrashed()->findOrFail($this->course_id);
        
        return $this->user()->can('restore', $course);

    }

    public function rules()
    {
        return [
            'course_id' => 'required|numeric'
        ];
    }
    
}
