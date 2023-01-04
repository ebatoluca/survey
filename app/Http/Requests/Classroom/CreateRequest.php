<?php

namespace App\Http\Requests\Classroom;

use App\Models\Classroom;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{

    public function authorize()
    {

        return $this->user()->can('create', Classroom::class);

    }

    public function rules()
    {
        return [
            //
        ];
    }
    
}
