<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{ 
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'title' => 'required|min:3|unique:posts,title,',
            'image' => 'nullable|mimes:jpg,png,jpeg|max:2048',
            'description' => 'required|max:3074|min:10',
            'postedBy' => 'required',
            'user_id' => 'required'
        ];
    }
}
