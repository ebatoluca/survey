<?php

namespace App\Http\Requests\Survey;

use App\Models\Survey;
use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{

    public function authorize()
    {
        return $this->user()->can('index', Survey::class);
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
