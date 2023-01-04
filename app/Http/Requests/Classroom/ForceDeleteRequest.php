<?php

namespace App\Http\Requests\Classroom;

use App\Models\Classroom;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    public function authorize()
    {

        $classroom = Classroom::withTrashed()->findOrFail($this->classroom_id);
        
        return $this->user()->can('forceDelete', $classroom);

    }

    public function rules()
    {
        return [
            'classroom_id' => 'required|numeric'
        ];
    }
    
}
