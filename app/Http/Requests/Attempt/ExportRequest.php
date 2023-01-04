<?php

namespace App\Http\Requests\Attempt;

use App\Models\Attempt;
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
        return $this->user()->can('export', Attempt::class);
    }

    public function rules()
    {
        return [
            //
        ];
    }
    
}
