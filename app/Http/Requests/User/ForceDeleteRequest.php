<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    public function authorize()
    {

        $user = User::withTrashed()->findOrFail($this->user_id);
        
        return $this->user()->can('forceDelete', $user);

    }

    public function rules()
    {
        return [
            'user_id' => 'required|numeric'
        ];
    }
    
}
