<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'payment_method' => 'required',
            'shipping_postcode' => 'required|string',
            'shipping_address' => 'required|string',
            'shipping_building' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'payment_method.required' => 'お支払い方法を選択してください',
            'payment_method.in' => 'お支払い方法を選択してください',
            'shipping_postcode.required' => '配送先を選択してください',
            'shipping_address.required' => '配送先を選択してください',
        ];
    }
}
