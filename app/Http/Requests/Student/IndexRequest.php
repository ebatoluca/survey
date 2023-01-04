<?php

namespace App\Http\Requests\Student;

use App\Models\Student;
use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{

    public function authorize()
    {
        return $this->user()->can('index', Student::class);
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
