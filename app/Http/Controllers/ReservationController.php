<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Member;
use App\Room;
use App\Time;
use App\Http\Requests\ReservationRequest;
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * 指定したmemberの予約一覧を表示する
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 予約削除後も指定したmemberを保持する
        if (!($request->session()->get('id') == null)) {
            $request->member_id = $request->session()->get('id');
        }

        // 指定したmemberを取得する
        $member = Member::find($request->member_id);

        // 本日の日付を取得し本日以降の予約一覧を表示する
        $today = Carbon::today();
        $reservations = Reservation::whereDate('reservation_date', '>=', $today)
            ->where('member_id', $request->member_id)
            ->orderBy('reservation_date', 'asc')->get();

        return view('reservations.index', ['member' => $member, 'reservations' => $reservations]);
    }

    /**
     * 予約登録画面を表示する
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Reservation $reservations)
    {
        $member = Member::find($request->member_id);
        return view('reservations.create', ['member' => $member, 'reservations' => $reservations]);
    }

    /**
     * reservationsテーブル(予約情報)及び、
     * timeテーブル(予約時間割)を登録する
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Reservation $reservation, Time $time, ReservationRequest $request)
    {
        // reservationsテーブルへレコードのインサート
        $reservation = new Reservation();
        $reservation->fill($request->all());
        $reservation->save();

        // timeテーブルに登録する予約IDと統一する為、
        // 最後にreservationsテーブルに登録されたIDを返す
        $last_insert_id = $reservation->id;

        // 使用時間分をループするため$numに代入
        $num = $request->use_time;

        // 指定した日付の予約時間割を取得（予約重複の防止）
        // for ($i = 1; $i <= $num; $i++) {
        //     $table = Time::whereDate('reservation_date', $request->reservation_date)
        //     ->where('start_time', $request->start_time)
        //     ->where('room_id', $request->room_id)->get();
        //     $request->start_time++;
        // }
        //     if ($table != false) {
        //         $errors  = 'その時間はすでに予約が入っています。';
        //     }

        // time_tableテーブルへレコードのインサート
        for ($i = 1; $i <= $num; $i++) {
        // timesテーブルに登録する内容を連想配列にする。
            $time_data = array(
                'reservation_id' => $last_insert_id,
                'member_id' => $request->member_id,
                'reservation_date' => $request->reservation_date,
                'start_time' => $request->start_time,
                'room_id' => $request->room_id,
            );
            $time = new Time();
            $time->fill($time_data);
            $time->save();
            $request->start_time++;
        }

        return redirect()->route('reservations.show', $reservation)
        ->with(['id' => $request->member_id]);
    }

    /**
     * 指定した予約IDの詳細表示
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        $member = Member::find($reservation->member_id);
        $room = Room::find($reservation->room_id);

        // 利用時間の表示
        $start_time = Time::where('reservation_id', $reservation->id)->min('start_time');
        $end_time = Time::where('reservation_id', $reservation->id)->max('start_time')+1;
        $use_time = $end_time - $start_time;

        return view(
            'reservations.show',
            [
            'member' => $member,
            'reservation' => $reservation,
            'room' => $room,
            'start_time' =>$start_time,
            'end_time' => $end_time,
            'use_time' => $use_time,
        ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
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
        //
    }

    /**
     * 指定した予約IDのreservationsテーブル(予約情報)及び、
     * timeテーブル(予約時間割)を削除する
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation, Time $time, Request $request)
    {
        $reservation->delete();
        $time->where('reservation_id', $reservation->id)->delete();

        // delete()実行後もmember_idを保持する
        $request->member_id = $reservation->member_id;
        return redirect()->route('reservations.index')->with(['id' => $request->member_id]);
    }
}
