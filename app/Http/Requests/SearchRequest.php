<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * 会員検索のバリデーションクラス
 */
class SearchRequest extends FormRequest
{
    /**
     * ユーザーがこの要求を行うことを許可されているかどうかを確認する
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * リクエストに適用される検証ルールを取得する
     *
     * @return array
     */
    public function rules()
    {
        return [
            'search' =>  'required|regex:/^[ぁ-んー]+$/',
        ];
    }

    /**
     * バリデーションエラーのメッセージをカスタマイズする
     * @return array
     */
    public function messages()
    {
        return [
            'search.required' => 'ひらがなを入力してください。',
            'search.regex'=> 'ひらがなで入力してください。',
        ];
    }
}
