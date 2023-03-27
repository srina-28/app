<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewStoreRequest extends FormRequest
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
            'title' => 'required|max:50',
            'image' => 'required',
            'post' => 'required|min:10'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルは必須項目です。',
            'title.max' => 'タイトルは50文字以内で入力してください。',
            'image.required' => '画像は必須項目です。',
            'post.required' => 'レビューは必須項目です。',
            'post.min' => 'レビューは10文字以上で入力してください。'
        ];
    }
}
