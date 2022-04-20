<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Time;
use Carbon\Carbon;

class TimeController extends Controller
{
    /**
     * 指定した日付の予約時間割を取得してタイムテーブルを表示する
     *
     * @param Time $time
     * @return \Illuminate\Http\Response
     */
    public function index(Time $time)
    {
        // 本日の日付を取得し一覧表示にする
        $day = Carbon::today();

        // 指定した日付のAスタジオの予約時間割を取得して配列にする
        for ($i = 10; $i <= 23; $i++) {
            $table_a[] = Time::with('member')->whereDate('reservation_date', '=', $day)
                ->where('start_time', '=', $i)
                ->where('room_id', '=', 1)
                ->first();
        }

        // 指定した日付のBスタジオの予約時間割を取得して配列にする
        for ($i = 10; $i <= 23; $i++) {
            $table_b[] = Time::with('member')->whereDate('reservation_date', '=', $day)
                ->where('start_time', '=', $i)
                ->where('room_id', '=', 2)
                ->first();
        }

        return view('times.index', ['day' => $day, 'table_a' => $table_a, 'table_b' => $table_b]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function calender()
    {
        // for ($w = 0; $w <= 4; $w++) {
            for ($i = 1; $i <= 7; $i++) {
                $days[] = $i;
            }
        // }

        return view('times.calender', ['days' => $days]);
    }
}
