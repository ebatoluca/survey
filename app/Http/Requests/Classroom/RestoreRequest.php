<?php

namespace App\Http\Requests\Classroom;

use App\Models\Classroom;
use Illuminate\Foundation\Http\FormRequest;

class RestoreRequest extends FormRequest
{

    public function authorize()
    {
        
        $classroom = Classroom::withTrashed()->findOrFail($this->classroom_id);
        
        return $this->user()->can('restore', $classroom);

    }

    public function rules()
    {
        return [
            'classroom_id' => 'required|numeric'
        ];
    }
    
}
