<?php

namespace App\Http\Requests\Teacher;

use App\Models\Teacher;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    public function authorize()
    {
        
        $teacher = Teacher::findOrFail($this->teacher_id);

        return $this->user()->can('delete', $teacher);

    }

    public function rules()
    {
        return [
            'teacher_id' => 'required|numeric'
        ];
    }
    
}
