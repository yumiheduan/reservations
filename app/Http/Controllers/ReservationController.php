<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Member;
use App\Room;
use App\Http\Requests\ReservationRequest;
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!($request->session()->get('id') == null)) {
            $request->member_id = $request->session()->get('id');
        }

        $member = Member::find($request->member_id);

        // 本日の日付を取得し本日以降の一覧表示にする
        $today = Carbon::today();
        $reservations = Reservation::whereDate('reservation_time', '>=', $today)
            ->where('member_id', $request->member_id)
            ->orderBy('reservation_time', 'asc')->get();

        return view('reservations.index', ['member' => $member, 'reservations' => $reservations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Reservation $reservations)
    {
        $member = Member::find($request->member_id);
        return view('reservations.create', ['member' => $member, 'reservations' => $reservations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Reservation $reservation,ReservationRequest $request)
    {
        // データベースに登録する内容を連想配列にする。
        $reservation_data = array(
            'member_id' => $request->member_id,
            'utilization_time' => $request->utilization_time,
            'room_id' => $request->room_id,
        );

        dd($reservation);
        $this->check($reservation->reservation_date, $request->start_time, $reservation->utilization_time, $request->utilization_time);

        $reservation = new Reservation();
        $reservation->fill($reservation_data);
        $reservation->reservation_time = $request->reservation_date . ' ' . $request->start_time . ':00:00';
        $reservation->save();

        return redirect()->route('reservations.show', $reservation);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        $member = Member::find($reservation->member_id);
        $room = Room::find($reservation->room_id);
        return view('reservations.show', ['member' => $member, 'reservation' => $reservation, 'room' => $room]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        $date = substr($reservation->reservation_time, 0, 10);
        $time = substr($reservation->reservation_time, 11, 2);

        $member = Member::find($reservation->member_id);
        $room = Room::find($reservation->room_id);
        return view('reservations.edit', ['date' => $date, 'time' => $time, 'member' => $member, 'reservation' => $reservation, 'room' => $room]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationRequest $request, Reservation $reservation)
    {
        // データベースに登録する内容を連想配列にする。
        $reservation_data = array(
            'member_id' => $request->member_id,
            'utilization_time' => $request->utilization_time,
            'room_id' => $request->room_id,
        );

        // 使用時間分をループするため$numに代入
        // $num = $request->utilization_time;

        // reservationテーブルへレコードのアップデート
        // for ($i = 1; $i <= $num; $i++) {
        $reservation->fill($reservation_data);
        $reservation->reservation_time = $request->reservation_date . ' ' . $request->start_time . ':00:00';
        $reservation->save();

        // $request->start_time++;
        // }
        return redirect()->route('reservations.show', $reservation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation, Request $request)
    {
        $reservation->delete();
        $request->member_id = $reservation->member_id;
        return redirect()->route('reservations.index')->with(['id' => $request->member_id]);
    }

    /*
 * @param $reservations　DBに登録されているデータの予約開始時間
 * @param $input_time 入力データの予約開始時間
 * @param $reservations_hour　DBに登録されているデータの利用時間　DBでは4などを入力する
 * @param $input_time_hour 入力データの利用時間
 *
 * @var $start_time DBに登録されている予約時間から時間のみ切り取った部分
 * @var $times DBに登録されている予約の予約時間を1時間ごとに分割した配列
 * @var $input_start_time 入力データの予約時間から時間のみ切り取った部分
 * @var $times2 入力データの予約時間を1時間ごとに分割した配列
 * @var $check 予約時間の重複をまとめた配列
 */
    public function check($reservations, $input_time, $reservations_hour, $input_time_hour)
    {

        $times = [];
        $times2 = [];

        dd($reservations);
        $start_time = substr($reservations, 11, 2);
        array_push($times, $start_time);
        for ($i=1;$i<=$reservations_hour;$i++) {
            array_push($times, $start_time + $i);
        }

        //$input_start_time = substr($input_time, 11, 2);
        array_push($times2, $input_time);
        for ($j=1;$j<=$input_time_hour;$j++) {
            //dd($input_time);
            array_push($times2,$input_time + $j);
        }
        $check = array_intersect($times,$times2);

        dd($times,$times2);
        dd($check);
        if (!empty($check)) {
            back();
        }
    }
}
