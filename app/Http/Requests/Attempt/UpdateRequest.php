<?php

namespace App\Http\Requests\Attempt;

use App\Models\Attempt;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        
        $attempt = Attempt::findOrFail($this->attempt_id);

        return $this->user()->can('update', $attempt);

    }

    public function rules()
    {
        return [
            //
            'attempt_id' => 'required|numeric'
        ];
    }

}
