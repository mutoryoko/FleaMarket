<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'user_name' => 'required|max:20',
            'user_image' => 'nullable|image|mimes:png,jpg,jpeg',
            'postcode' => 'required|regex:/^\d{3}-\d{4}$/',
            'address' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => 'お名前を入力してください',
            'user_name.max' => 'お名前は20文字以内で入力してください',
            'user_image.image' => '画像はjpg,jpeg,png形式で登録してください',
            'user_image.mimes' => '画像はjpg,jpeg,png形式で登録してください',
            'postcode.required' => '郵便番号を入力してください',
            'postcode.regex' => '郵便番号はハイフンを含めた8桁で入力してください',
            'address.required' => '住所を入力してください'
        ];
    }
}
