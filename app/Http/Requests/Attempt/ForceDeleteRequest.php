<?php

namespace App\Http\Requests\Attempt;

use App\Models\Attempt;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    public function authorize()
    {

        $attempt = Attempt::withTrashed()->findOrFail($this->attempt_id);
        
        return $this->user()->can('forceDelete', $attempt);

    }

    public function rules()
    {
        return [
            'attempt_id' => 'required|numeric'
        ];
    }
    
}
