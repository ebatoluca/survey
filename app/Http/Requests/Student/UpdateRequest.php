<?php

namespace App\Http\Requests\Student;

use App\Models\Student;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        
        $student = Student::findOrFail($this->student_id);

        return $this->user()->can('update', $student);

    }

    public function rules()
    {
        return [
            //
            'student_id' => 'required|numeric'
        ];
    }

}
