<?php

namespace App\Http\Requests;

use DateTime;
use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'reservation_date' => 'required|date|after_or_equal:today',
            'room_id' => 'required|integer',
            'start_time' => 'required|integer',
            'utilization_time' => 'required|integer',

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
            'utilization_time.required' => '利用時間を選択してください。',

        ];
    }
}
