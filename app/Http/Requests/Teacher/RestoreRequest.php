<?php

namespace App\Http\Requests\Teacher;

use App\Models\Teacher;
use Illuminate\Foundation\Http\FormRequest;

class RestoreRequest extends FormRequest
{

    public function authorize()
    {
        
        $teacher = Teacher::withTrashed()->findOrFail($this->teacher_id);
        
        return $this->user()->can('restore', $teacher);

    }

    public function rules()
    {
        return [
            'teacher_id' => 'required|numeric'
        ];
    }
    
}
