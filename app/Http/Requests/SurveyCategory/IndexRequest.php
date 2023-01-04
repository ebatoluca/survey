<?php

namespace App\Http\Requests\SurveyCategory;

use App\Models\SurveyCategory;
use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{

    public function authorize()
    {
        return $this->user()->can('index', SurveyCategory::class);
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
