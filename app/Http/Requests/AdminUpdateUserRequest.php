<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateUserRequest extends FormRequest
{
    public $user_id;
   
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "sometimes|min:3|max:15",
            "email" => "sometimes|email|unique:users,email,".$this->user->id,
            "password" => "nullable|min:8|max:20",
            "role_id" => "sometimes|numeric",
        ];
    }
}
