<?php

namespace App\Http\Requests\Period;

use App\Models\Period;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    public function authorize()
    {

        $period = Period::withTrashed()->findOrFail($this->period_id);
        
        return $this->user()->can('forceDelete', $period);

    }

    public function rules()
    {
        return [
            'period_id' => 'required|numeric'
        ];
    }
    
}
