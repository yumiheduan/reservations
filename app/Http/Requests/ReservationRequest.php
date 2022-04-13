<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Time;

class ReservationRequest extends FormRequest
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
        /**
         * 予約重複登録の防止バリデーション
         *   $attribute: 検証中の属性名
         *   $value    : 検証中の属性の値
         *   $fail     : 失敗時に呼び出すメソッド?
         **/
        $validate_func = function ($attribute, $value, $fail) {

            // 入力されたデータがtimeテーブルに存在したら失敗にする。
            if (Time::whereDate('reservation_date', '=', $this->reservation_date)
                ->where('room_id', '=', $this->room_id)
                ->where('start_time', '>=', $this->start_time)
                ->where('start_time', '<=', $this->start_time + $this->use_time)->exists()
            ){
                $fail('その時間はすでに予約が入っています。'); // エラーメッセージ
            }
        };
        /**
         * 24時以降予約登録の防止バリデーション（営業時間が24時までの為）
         *   $attribute: 検証中の属性名
         *   $value    : 検証中の属性の値
         *   $fail     : 失敗時に呼び出すメソッド?
         **/
        $validate_time = function ($attribute, $value, $fail) {

            // 入力されたデータが24時を超えていたら失敗にする。
            if ($this->start_time + $this->use_time >= 24)
            {
                $fail('営業時間は24時までです。'); // エラーメッセージ
            }
        };
        
        return [
            'reservation_date' => ['required', 'date', 'after_or_equal:today'],
            'room_id' => ['required', 'integer'],
            'start_time' => ['required', 'integer', $validate_func, $validate_time],
            'use_time' => ['required', 'integer'],

        ];
    }

    /**
     * バリデーションエラーのメッセージをカスタマイズする 。
     * @return array
     */
    public function messages()
    {
        return [
            'reservation_date.required' => '予約日を選択してください。',
            'reservation_date.after_or_equal' => '予約日は本日以降の日付である必要があります。',
            'room_id.required' => '部屋種類を選択してください。',
            'start_time.required' => '開始時間を選択してください。',
            'use_time.required' => '利用時間を選択してください。',

        ];
    }
}
