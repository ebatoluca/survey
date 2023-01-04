<?php

namespace App\Http\Requests\Attempt;

use App\Models\Attempt;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{

    public function authorize()
    {

        return $this->user()->can('create', Attempt::class);

    }

    public function rules()
    {
        return [
            //
        ];
    }
    
}
