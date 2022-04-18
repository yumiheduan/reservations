<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SearchRequest extends FormRequest
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
            'search' =>  'required|regex:/^[ぁ-んー]+$/',
        ];
    }

    /**
     * バリデーションエラーのメッセージをカスタマイズする *
     * @return array
     */
    public function messages()
    {
        return [
            'search.required' => 'ひらがなを入力してください。',
            'search.regex'=> 'ひらがなを入力してください。',
        ];
    }
}
