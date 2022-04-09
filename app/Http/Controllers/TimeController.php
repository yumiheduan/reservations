<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Member;
use App\Room;
use App\Time;
use Carbon\Carbon;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Time $times, Member $member)
    {
        // 本日の日付を取得し一覧表示にする
        $day = Carbon::today();

        for ($i = 10; $i <= 23; $i++) {
            $table_a = Time::whereDate('reservation_date', '=', $day)
                ->where('start_time', '=', $i)
                ->where('room_id', '=', 1)
                ->get();

                // if (isset($table_a)) {
                    // $member_a = Member::where('member_id', '=', $table_a->member_id)->get();
                // }
                if (!is_null($table_a)) {
                    break;
                }
            }
            dd($table_a->member_id);

        //dd($member_a);
        
        for ($i = 10; $i <= 23; $i++) {
            $table_b = Time::whereDate('reservation_date', '=', '2022-04-09')
                ->where('start_time', '=', $i)
                ->where('room_id', '=', 2)
                ->get();
        }

        if (isset($table_b)) {
            $member_b = Member::find($times->member_id);
        }

        return view('times.index', ['day' => $day, 'times' => $times, 'member_a' => $member_a, 'member_b' => $member_b]);
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
}
