@extends('layouts.members')

@section('navbar')

@section('content')
    <h1>スタジオ空き状況</h1>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ $date }}</h4>
           </div>

    <!-- 公開用予約状況一覧テーブル -->
    <div class="card border-success">
        <!-- カレンダーへのリンク -->
        <div class="card-header" style="text-align: right;">
            <a href="{{ route('times.member_index',['day' => $date]) }}" class="btn btn-outline-success">最新情報に更新</a>
            <a href="{{ route('times.member_calender') }}" class="btn btn-success">カレンダー表示</a>
        </div>
        <div class="card-body text-success">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>時間</th>
                            <th>Aスタジオ</th>
                            <th>Bスタジオ</th>
                        </tr>
                    </thead>

                    <!-- // 指定した日時の予約時間割を表示 -->
                    <tbody>
                        <tr>
                            <td>10:00~11:00</td>
                            <td>{{ isset($table_a[0]) ? '予約有' : '' }}</td>
                            <td>{{ isset($table_b[0]) ? '予約有' : '' }}</td>
                        </tr>
                        <tr>
                            <td>11:00~12:00</td>
                            <td>{{ isset($table_a[1]) ? '予約有' : '' }}</td>
                            <td>{{ isset($table_b[1]) ? '予約有' : '' }}</td>
                        </tr>
                        <tr>
                            <td>12:00~13:00</td>
                            <td>{{ isset($table_a[2]) ? '予約有' : '' }}</td>
                            <td>{{ isset($table_b[2]) ? '予約有' : '' }}</td>
                        </tr>
                        <tr>
                            <td>13:00~14:00</td>
                            <td>{{ isset($table_a[3]) ? '予約有' : '' }}</td>
                            <td>{{ isset($table_b[3]) ? '予約有' : '' }}</td>
                        </tr>
                        <tr>
                            <td>14:00~15:00</td>
                            <td>{{ isset($table_a[4]) ? '予約有' : '' }}</td>
                            <td>{{ isset($table_b[4]) ? '予約有' : '' }}</td>
                        </tr>
                        <tr>
                            <td>15:00~16:00</td>
                            <td>{{ isset($table_a[5]) ? '予約有' : '' }}</td>
                            <td>{{ isset($table_b[5]) ? '予約有' : '' }}</td>
                        </tr>
                        <tr>
                            <td>16:00~17:00</td>
                            <td>{{ isset($table_a[6]) ? '予約有' : '' }}</td>
                            <td>{{ isset($table_b[6]) ? '予約有' : '' }}</td>
                        </tr>
                        <tr>
                            <td>17:00~18:00</td>
                            <td>{{ isset($table_a[7]) ? '予約有' : '' }}</td>
                            <td>{{ isset($table_b[7]) ? '予約有' : '' }}</td>
                        </tr>
                        <tr>
                            <td>18:00~19:00</td>
                            <td>{{ isset($table_a[8]) ? '予約有' : '' }}</td>
                            <td>{{ isset($table_b[8]) ? '予約有' : '' }}</td>
                        </tr>
                        <tr>
                            <td>19:00~20:00</td>
                            <td>{{ isset($table_a[9]) ? '予約有' : '' }}</td>
                            <td>{{ isset($table_b[9]) ? '予約有' : '' }}</td>
                        </tr>
                        <tr>
                            <td>20:00~21:00</td>
                            <td>{{ isset($table_a[10]) ? '予約有' : '' }}</td>
                            <td>{{ isset($table_b[10]) ? '予約有' : '' }}</td>
                        </tr>
                        <tr>
                            <td>21:00~22:00</td>
                            <td>{{ isset($table_a[11]) ? '予約有' : '' }}</td>
                            <td>{{ isset($table_b[11]) ? '予約有' : '' }}</td>
                        </tr>
                        <tr>
                            <td>22:00~23:00</td>
                            <td>{{ isset($table_a[12]) ? '予約有' : '' }}</td>
                            <td>{{ isset($table_b[12]) ? '予約有' : '' }}</td>
                        </tr>
                        <tr>
                            <td>23:00~24:00</td>
                            <td>{{ isset($table_a[13]) ? '予約有' : '' }}</td>
                            <td>{{ isset($table_b[13]) ? '予約有' : '' }}</td>
                        </tr>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- テーブルここまで -->

            <!-- カレンダーへのリンク -->
            <div class="card-footer" style="text-align: right;">
                <a href="{{ route('times.member_index',['date' => $date]) }}" class="btn btn-outline-success">最新情報に更新</a>
                <a href="{{ route('times.member_calender') }}" class="btn btn-success">カレンダー表示</a>
            </div>
        </div>
    </div>
    <!-- コンテナ ここまで -->
@endsection
