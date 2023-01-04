<?php

namespace App\Http\Requests\SurveyQuestion;

use App\Models\SurveyQuestion;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{

    public function authorize()
    {

        return $this->user()->can('create', SurveyQuestion::class);

    }

    public function rules()
    {
        return [
            //
        ];
    }
    
}
