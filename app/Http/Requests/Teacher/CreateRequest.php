<?php

namespace App\Http\Requests\Teacher;

use App\Models\Teacher;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{

    public function authorize()
    {

        return $this->user()->can('create', Teacher::class);

    }

    public function rules()
    {
        return [
            //
        ];
    }
    
}
