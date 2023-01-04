<?php

namespace App\Http\Requests\CourseCategory;

use App\Models\CourseCategory;
use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{

    public function authorize()
    {
        return $this->user()->can('index', CourseCategory::class);
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
