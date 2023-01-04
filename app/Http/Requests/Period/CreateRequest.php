<?php

namespace App\Http\Requests\Period;

use App\Models\Period;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{

    public function authorize()
    {

        return $this->user()->can('create', Period::class);

    }

    public function rules()
    {
        return [
            //
        ];
    }
    
}
