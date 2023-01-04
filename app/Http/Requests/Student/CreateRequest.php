<?php

namespace App\Http\Requests\Student;

use App\Models\Student;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{

    public function authorize()
    {

        return $this->user()->can('create', Student::class);

    }

    public function rules()
    {
        return [
            //
        ];
    }
    
}
