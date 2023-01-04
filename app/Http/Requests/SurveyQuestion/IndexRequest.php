<?php

namespace App\Http\Requests\SurveyQuestion;

use App\Models\SurveyQuestion;
use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{

    public function authorize()
    {
        return $this->user()->can('index', SurveyQuestion::class);
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
