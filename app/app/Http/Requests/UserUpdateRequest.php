<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:10'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前は必須項目です。',
            'name.max' => '名前は10文字以内で入力してください。'
    
        ];
    }
}
