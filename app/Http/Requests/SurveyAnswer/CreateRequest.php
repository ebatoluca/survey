<?php

namespace App\Http\Requests\SurveyAnswer;

use App\Models\SurveyAnswer;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{

    public function authorize()
    {

        return $this->user()->can('create', SurveyAnswer::class);

    }

    public function rules()
    {
        return [
            //
        ];
    }
    
}
