<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OtherStoreRequest extends FormRequest
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
            'image' => 'required',
            'hotel' => 'required',
            'address' => 'required',
            'text' => 'required|max:500'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => '画像は必須項目です。',
            'hotel.required' => 'ホテル名は必須項目です。',
            'address.required' => '所在地は必須項目です。',
            'text.required' => 'フリーテキストは必須項目です。',
            'text.max' => 'フリーテキストは500文字以内で入力してください。'
        ];
    }
}
