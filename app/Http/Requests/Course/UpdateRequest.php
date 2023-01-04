<?php

namespace App\Http\Requests\Course;

use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        
        $course = Course::findOrFail($this->course_id);

        return $this->user()->can('update', $course);

    }

    public function rules()
    {
        return [
            //
            'course_id' => 'required|numeric'
        ];
    }

}
