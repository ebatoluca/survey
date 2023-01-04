<?php

namespace App\Http\Requests\CourseCategory;

use App\Models\CourseCategory;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{

    public function authorize()
    {

        return $this->user()->can('create', CourseCategory::class);

    }

    public function rules()
    {
        return [
            //
        ];
    }
    
}
