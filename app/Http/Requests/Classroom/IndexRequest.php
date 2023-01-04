<?php

namespace App\Http\Requests\Classroom;

use App\Models\Classroom;
use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{

    public function authorize()
    {
        return $this->user()->can('index', Classroom::class);
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
