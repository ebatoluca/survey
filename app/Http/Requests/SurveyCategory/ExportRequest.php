<?php

namespace App\Http\Requests\SurveyCategory;

use App\Models\SurveyCategory;
use Illuminate\Foundation\Http\FormRequest;

class ExportRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        
        $this->merge([
            'paginate' => 0,
            'managed' => true,
            'except_view_any' => true,
        ]);

    }

    public function authorize()
    {
        return $this->user()->can('export', SurveyCategory::class);
    }

    public function rules()
    {
        return [
            //
        ];
    }
    
}
