<?php

namespace App\Http\Requests\Student;

use App\Models\Student;
use Illuminate\Foundation\Http\FormRequest;

class RestoreRequest extends FormRequest
{

    public function authorize()
    {
        
        $student = Student::withTrashed()->findOrFail($this->student_id);
        
        return $this->user()->can('restore', $student);

    }

    public function rules()
    {
        return [
            'student_id' => 'required|numeric'
        ];
    }
    
}
