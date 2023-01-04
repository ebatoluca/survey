<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        
        $user = User::findOrFail($this->user_id);

        return $this->user()->can('update', $user);

    }

    public function rules()
    {
        return [
            //
            'user_id' => 'required|numeric'
        ];
    }

}
