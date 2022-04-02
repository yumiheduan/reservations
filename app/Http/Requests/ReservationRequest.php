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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // $date = new DateTime();
        // $today = $date->format('Y-m-d');
        return [
            'reservation_date' => 'required|date|after_or_equal:today',
            'room_id' => 'required|integer',
            'start_time' => 'required|integer',
            'utilization_time' => 'required|integer',

        ];
    }
}
