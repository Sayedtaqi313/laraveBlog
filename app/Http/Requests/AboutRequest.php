<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            "who_are_we" => "required|min:50|max:300",
            "our_mission" => "required|min:50|max:300",
            "our_vision" => "required|min:50|max:300",
            "our_service" => "required|min:50|max:300",
            "about_our_site" => "required|min:50|max:300",
            "imageOne" => "required|image",
            "imageTwo" => "required|image",
        ];
    }
}
