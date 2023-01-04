<?php

namespace App\Http\Requests\Classroom;

use App\Models\Classroom;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        
        $classroom = Classroom::findOrFail($this->classroom_id);

        return $this->user()->can('update', $classroom);

    }

    public function rules()
    {
        return [
            //
            'classroom_id' => 'required|numeric'
        ];
    }

}
