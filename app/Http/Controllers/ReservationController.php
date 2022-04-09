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
        $reservations = Reservation::whereDate('reservation_date', '>=', $today)
            ->where('member_id', $request->member_id)
            ->orderBy('reservation_date', 'asc')->get();

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
    public function store(Reservation $reservation, Time $time, ReservationRequest $request)
    {
        // reservationsテーブルへレコードのインサート
        $reservation = new Reservation();
        $reservation->fill($request->all());
        $reservation->save();

        // timeテーブルに登録する予約IDと統一する為、最後に登録されたIDを返す 
        $last_insert_id = $reservation->id;

        // timesテーブルへレコードのインサート
        // データベースに登録する内容を連想配列にする。
        $time_data = array(
            'reservation_id' => $last_insert_id,
            'member_id' => $request->member_id,
            'reservation_date' => $request->reservation_date,
            'start_time' => $request->start_time,
            'room_id' => $request->room_id,
        );
        // 使用時間分をループする
        $num = $request->utilization_time;

        for ($i = 1; $i <= $num; $i++) {
            $time = new Time();
            $time->fill($time_data);
            $time->save();
            $request->start_time++;
        }

        return redirect()->route('reservations.show', $reservation)->with(['id' => $request->member_id]);;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation, Time $time)
    {
        $member = Member::find($reservation->member_id);
        $room = Room::find($reservation->room_id);
        $time = Time::find($reservation->id);
        return view('reservations.show', ['member' => $member, 'reservation' => $reservation, 'room' => $room, 'time' => $time]);
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
}
