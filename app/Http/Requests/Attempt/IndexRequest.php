<?php

namespace App\Http\Requests\Attempt;

use App\Models\Attempt;
use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{

    public function authorize()
    {
        return $this->user()->can('index', Attempt::class);
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
