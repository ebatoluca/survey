<?php

namespace App\Http\Requests\Period;

use App\Models\Period;
use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{

    public function authorize()
    {
        return $this->user()->can('index', Period::class);
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
