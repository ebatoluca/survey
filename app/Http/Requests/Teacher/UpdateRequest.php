<?php

namespace App\Http\Requests\Teacher;

use App\Models\Teacher;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        
        $teacher = Teacher::findOrFail($this->teacher_id);

        return $this->user()->can('update', $teacher);

    }

    public function rules()
    {
        return [
            //
            'teacher_id' => 'required|numeric'
        ];
    }

}
