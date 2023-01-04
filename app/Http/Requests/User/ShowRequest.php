<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowRequest extends FormRequest
{

    public function authorize()
    {

        $user = User::findOrFail($this->user_id);

        return $this->user()->can('view', $user);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in((new User)->loadable_relations)
            ],
            'user_id' => 'required|numeric'
        ];
    }
    
}
