<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Time;
use DateTime;
use DateInterval;

/**
 * 日ごとの予約情報の表示(タイムテーブル)と予約確認用のカレンダーの表示を行うクラス
 */
class TimeController extends Controller
{
    /**
     * 指定した日付の予約時間割を取得してタイムテーブルを表示する
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 今日の日付のDateTimeクラスのインスタンスを生成する。
        $today = new DateTime();

        // GETされてきた日付または今日の日付を$dateに代入
        if (isset($request->day)) {
            $date = $request->day;
        } else {
            $date = $today->format('Y-m-d');
        }
        // 指定した日付のAスタジオの予約時間割を取得して配列にする
        for ($i = 10; $i <= 23; $i++) {
            $table_a[] = Time::with('member')->whereDate('reservation_date', '=', $date)
                ->where('start_time', '=', $i)
                ->where('room_id', '=', 1)
                ->first();
        }

        // 指定した日付のBスタジオの予約時間割を取得して配列にする
        for ($i = 10; $i <= 23; $i++) {
            $table_b[] = Time::with('member')->whereDate('reservation_date', '=', $date)
                ->where('start_time', '=', $i)
                ->where('room_id', '=', 2)
                ->first();
        } 

        return view(
            'times.index',
            [
                'date' => $date,
                'table_a' => $table_a,
                'table_b' => $table_b
            ]
        );
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

    /**
     * indexで日付を指定するためのカレンダーを表示する
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function calender(Request $request)
    {
        // カレンダー作成
        // 今月を0とする。
        $month = 0;

        // GETパラメータがあって、かつ、数値形式で、かつ、整数のとき。

        if (isset($request->month) && is_numeric($request->month)) {
            $month = $request->month;
        }

        // 今日の日付のDateTimeクラスのインスタンスを生成する。
        $dateTime = new DateTime();

        // 今日の日付から(今日の日付 - 1)を引き、DateTimeクラスのインスタンスを今月の1日の日付に設定する。
        // 21日なら1を引いた20日前に遡ると1日になる
        $d = $dateTime->format('d');
        $dateTime->sub(new DateInterval('P' . ($d - 1) . 'D'));

        if ($month > 0) {
            // $monthが0より大きいときは、現在月の「ついたち」に、その月数を追加。
            $dateTime->add(new DateInterval("P" . $month . "M"));
        } else {
            // $monthが0より小さいときは、現在月の「ついたち」から、その月数を引く。
            $dateTime->sub(new DateInterval("P" . (0 - $month) . "M"));
        }

        // カレンダーの表示及びリンク用に今月の1日のクローンを作成する。
        $dateTime2 = clone $dateTime;

        // 当月の「ついたち」が何曜日か求める。当月の「ついたち」までに何日あるか、という日数と等しくなる。
        $beginDayOfWeek = $dateTime->format('w');

        // 当月に何日あるかの日数を求める。
        $monthDays = $dateTime->format('t');

        // 当月に何週あるかを求める。小数点以下を切り上げることで、同月の週数が求められる。
        $weeks = ceil(($monthDays + $beginDayOfWeek) / 7);

        // カレンダーに記述する日付のカウンタ。
        $date = 1;

        // 一日のDateIntervalクラスのインスタンスを作成する。
        $interval = new DateInterval('P1D');

        // 日付のカウンターを用意する
        $cnt = 0;

        //    当月にある週数分繰り返し
        for ($week = 0; $week < $weeks; $week++) {
            // 一週間の日数分（7日分）繰り返し
            for ($day = 0; $day < 7; $day++) {
                // 月の1週目で、かつ、月初の日（曜日）以上のときは、日付のクローンを作成し配列に入れて1を足す
                if ($week == 0 && $day >= $beginDayOfWeek) {
                    $weeks1[] = clone $dateTime2;
                    $dateTime2->add($interval);
                    $cnt++;
                    // カウンターが最後の日付になれば処理終了
                    if ($cnt >= $monthDays) {
                        break;
                    }
                } elseif ($week > 0 && $date <= $monthDays) {
                    // 月の2週目以降で、かつ、月末の日までのときは、日付のクローンを作成し配列に入れて1を足す
                    $weeks2[] = clone $dateTime2;
                    $dateTime2->add($interval);
                    $cnt++;
                    // カウンターが最後の日付になれば処理終了
                    if ($cnt >= $monthDays) {
                        break;
                    }
                }
            }
        }

        return view(
            'times.calender',
            [
                'weeks1' => $weeks1,
                'weeks2' => $weeks2,
                'beginDayOfWeek' => $beginDayOfWeek,
                'month' => $month,
                'dateTime' => $dateTime,
            ]
        );
    }

    /**
     * 指定した日付の予約時間割を取得してmember用のタイムテーブルを表示する
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function member_index(Request $request)
    {
        // 今日の日付のDateTimeクラスのインスタンスを生成する。
        $today = new DateTime();

        // GETされてきた日付または今日の日付を$dateに代入
        if (isset($request->day)) {
            $date = $request->day;
        } else {
            $date = $today->format('Y-m-d');
        }
        // 指定した日付のAスタジオの予約時間割を取得して配列にする
        for ($i = 10; $i <= 23; $i++) {
            $table_a[] = Time::with('member')->whereDate('reservation_date', '=', $date)
                ->where('start_time', '=', $i)
                ->where('room_id', '=', 1)
                ->first();
        }

        // 指定した日付のBスタジオの予約時間割を取得して配列にする
        for ($i = 10; $i <= 23; $i++) {
            $table_b[] = Time::with('member')->whereDate('reservation_date', '=', $date)
                ->where('start_time', '=', $i)
                ->where('room_id', '=', 2)
                ->first();
        }

        return view(
            'times.member_index',
            [
                'date' => $date,
                'table_a' => $table_a,
                'table_b' => $table_b
            ]
        );
    }

    /**
     * indexで日付を指定するためのカレンダーを表示する
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function member_calender(Request $request)
    {
        // カレンダー作成
        // 今月を0とする。
        $month = 0;

        // GETパラメータがあって、かつ、数値形式で、かつ、整数のとき。

        if (isset($request->month) && is_numeric($request->month)) {
            $month = $request->month;
        }

        // 今日の日付のDateTimeクラスのインスタンスを生成する。
        $dateTime = new DateTime();

        // 今日の日付から(今日の日付 - 1)を引き、DateTimeクラスのインスタンスを今月の1日の日付に設定する。
        // 21日なら1を引いた20日前に遡ると1日になる
        $d = $dateTime->format('d');
        $dateTime->sub(new DateInterval('P' . ($d - 1) . 'D'));

        if ($month > 0) {
            // $monthが0より大きいときは、現在月の「ついたち」に、その月数を追加。
            $dateTime->add(new DateInterval("P" . $month . "M"));
        } else {
            // $monthが0より小さいときは、現在月の「ついたち」から、その月数を引く。
            $dateTime->sub(new DateInterval("P" . (0 - $month) . "M"));
        }

        // カレンダーの表示及びリンク用に今月の1日のクローンを作成する。
        $dateTime2 = clone $dateTime;

        // 当月の「ついたち」が何曜日か求める。当月の「ついたち」までに何日あるか、という日数と等しくなる。
        $beginDayOfWeek = $dateTime->format('w');

        // 当月に何日あるかの日数を求める。
        $monthDays = $dateTime->format('t');

        // 当月に何週あるかを求める。小数点以下を切り上げることで、同月の週数が求められる。
        $weeks = ceil(($monthDays + $beginDayOfWeek) / 7);

        // カレンダーに記述する日付のカウンタ。
        $date = 1;

        // 一日のDateIntervalクラスのインスタンスを作成する。
        $interval = new DateInterval('P1D');

        // 日付のカウンターを用意する
        $cnt = 0;

        //    当月にある週数分繰り返し
        for ($week = 0; $week < $weeks; $week++) {
            // 一週間の日数分（7日分）繰り返し
            for ($day = 0; $day < 7; $day++) {
                // 月の1週目で、かつ、月初の日（曜日）以上のときは、日付のクローンを作成し配列に入れて1を足す
                if ($week == 0 && $day >= $beginDayOfWeek) {
                    $weeks1[] = clone $dateTime2;
                    $dateTime2->add($interval);
                    $cnt++;
                    // カウンターが最後の日付になれば処理終了
                    if ($cnt >= $monthDays) {
                        break;
                    }
                } elseif ($week > 0 && $date <= $monthDays) {
                    // 月の2週目以降で、かつ、月末の日までのときは、日付のクローンを作成し配列に入れて1を足す
                    $weeks2[] = clone $dateTime2;
                    $dateTime2->add($interval);
                    $cnt++;
                    // カウンターが最後の日付になれば処理終了
                    if ($cnt >= $monthDays) {
                        break;
                    }
                }
            }
        }

        return view(
            'times.member_calender',
            [
                'weeks1' => $weeks1,
                'weeks2' => $weeks2,
                'beginDayOfWeek' => $beginDayOfWeek,
                'month' => $month,
                'dateTime' => $dateTime,
            ]
        );
    }
}
