<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'kana_name' =>  'required|max:100',
            'phone' => 'required|max:100',
            'email' => 'nullable|email|max:255',
        ];
    }

    /**
     * バリデーションエラーのメッセージをカスタマイズする *
     * @return array
     */
    public function messages()
    {
        return [
            'kana_name.required' => '氏名かなを入力してください。',
            'kana_name.max:100' => '氏名かなは100文字以下にしてください。',
            'phone.required' => '電話番号を入力してください。',
            'phone.max:100' => '電話番号は100文字以下にしてください。',
            'email.email' => 'Emsilは255文字以下にしてください。',
        ];
    }
}
