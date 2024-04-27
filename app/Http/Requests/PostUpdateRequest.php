<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
            "title" => "required|max:200",
            "excerpt" => "required|max:300",
            "body" => "required",
            "category_id" => "required|numeric",
            "thumbnail" => "image|mimes:png,jpg,jpeg,svg"
        ];
    }
}
