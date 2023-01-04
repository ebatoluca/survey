<?php

namespace App\Http\Requests\Course;

use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{

    public function authorize()
    {
        return $this->user()->can('index', Course::class);
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
