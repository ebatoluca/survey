<?php

namespace App\Http\Requests\Course;

use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{

    public function authorize()
    {

        return $this->user()->can('create', Course::class);

    }

    public function rules()
    {
        return [
            //
        ];
    }
    
}
