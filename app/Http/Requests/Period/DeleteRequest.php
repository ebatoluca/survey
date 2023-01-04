<?php

namespace App\Http\Requests\Period;

use App\Models\Period;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    public function authorize()
    {
        
        $period = Period::findOrFail($this->period_id);

        return $this->user()->can('delete', $period);

    }

    public function rules()
    {
        return [
            'period_id' => 'required|numeric'
        ];
    }
    
}
