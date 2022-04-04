<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * リクエストに適用される検証ルールを取得する。
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kana_name' =>  'required|max:100|regex:/^[ぁ-んー]+$/',
            'phone' => [
                'regex:/^[0-9]+$/',
                // membersテーブルでユニーク制約。ignoreで入力されたidはバリデーションから除外する
                Rule::unique('members')->ignore($this->id)->where(function ($query) {
                    // 入力されたkana_nameの値と同じ値を持つレコードでのみ検証する
                    $query->where('kana_name', $this->kana_name);
                }),
            ],
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
            'kana_name.regex'=> '氏名かなはひらがなだけで入力してください。',
            'phone.regex' => '電話番号はハイフンなしの半角数字で入力してください。',
            'phone.unique' => 'このメンバーはすでに登録されています。',
            'email.email' => 'Emailは255文字以下にしてください。',
        ];
    }
}
