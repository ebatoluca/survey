<?php

namespace App\Http\Requests\Classroom;

use App\Models\Classroom;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    public function authorize()
    {
        
        $classroom = Classroom::findOrFail($this->classroom_id);

        return $this->user()->can('delete', $classroom);

    }

    public function rules()
    {
        return [
            'classroom_id' => 'required|numeric'
        ];
    }
    
}
