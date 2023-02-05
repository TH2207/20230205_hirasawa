<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'fname' => 'required',
            'gname' => 'required',
            'email' => 'required|email',
            'postcode' => 'required|regex:/^[a-zA-Z0-9-_]+$/|max:8|min:8',
            'address' => 'required',
            'opinion' => 'required|max:120',
        ];
    }

    public function messages()
    {
        return [
            'fname.required' => '姓を入力してください。',
            'gname.required' => '名を入力してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => 'メールアドレスの形式で入力してください。',
            'postcode.required' => '郵便番号を入力してください。',
            'postcode.regex' => '半角ハイフンと半角数字で入力してください。',
            'postcode.max' => '半角8文字で入力してください。',
            'postcode.min' => '半角8文字で入力してください。',
            'address.required' => '住所を入力してください。',
            'opinion.required' => '意見を入力してください。',
            'opinion.max' => '120文字以内で入力してください。',
        ];
    }
}
