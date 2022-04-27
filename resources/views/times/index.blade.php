@extends('layouts.reservations')

@section('title', 'times_index')

@section('navbar')

@section('content')
    <h1>予約状況</h1>
    <div class="card-header text-white bg-success">
        {{ $date }}
    </div>

    <!-- 予約状況一覧テーブル -->
    <div class="card border-success">
        <!-- カレンダーへのリンク -->
        <div class="card-header" style="text-align: right;">
            <a href="{{ route('times.calender') }}" class="btn btn-success">カレンダー表示</a>
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

                    <!-- // 指定した日時の予約時間割を取得 -->
                    <tbody>
                        <tr>
                            <td>10:00~11:00</td>
                            <td>{{ isset($table_a[0]->member->kana_name) ? $table_a[0]->member->kana_name : '' }}</td>
                            <td>{{ isset($table_b[0]->member->kana_name) ? $table_b[0]->member->kana_name : '' }}</td>
                        </tr>
                        <tr>
                            <td>11:00~12:00</td>
                            <td>{{ isset($table_a[1]->member->kana_name) ? $table_a[1]->member->kana_name : '' }}</td>
                            <td>{{ isset($table_b[1]->member->kana_name) ? $table_b[1]->member->kana_name : '' }}</td>
                        </tr>
                        <tr>
                            <td>12:00~13:00</td>
                            <td>{{ isset($table_a[2]->member->kana_name) ? $table_a[2]->member->kana_name : '' }}</td>
                            <td>{{ isset($table_b[2]->member->kana_name) ? $table_b[2]->member->kana_name : '' }}</td>
                        </tr>
                        <tr>
                            <td>13:00~14:00</td>
                            <td>{{ isset($table_a[3]->member->kana_name) ? $table_a[3]->member->kana_name : '' }}</td>
                            <td>{{ isset($table_b[3]->member->kana_name) ? $table_b[3]->member->kana_name : '' }}</td>
                        </tr>
                        <tr>
                            <td>14:00~15:00</td>
                            <td>{{ isset($table_a[4]->member->kana_name) ? $table_a[4]->member->kana_name : '' }}</td>
                            <td>{{ isset($table_b[4]->member->kana_name) ? $table_b[4]->member->kana_name : '' }}</td>
                        </tr>
                        <tr>
                            <td>15:00~16:00</td>
                            <td>{{ isset($table_a[5]->member->kana_name) ? $table_a[5]->member->kana_name : '' }}</td>
                            <td>{{ isset($table_b[5]->member->kana_name) ? $table_b[5]->member->kana_name : '' }}</td>
                        </tr>
                        <tr>
                            <td>16:00~17:00</td>
                            <td>{{ isset($table_a[6]->member->kana_name) ? $table_a[6]->member->kana_name : '' }}</td>
                            <td>{{ isset($table_b[6]->member->kana_name) ? $table_b[6]->member->kana_name : '' }}</td>
                        </tr>
                        <tr>
                            <td>17:00~18:00</td>
                            <td>{{ isset($table_a[7]->member->kana_name) ? $table_a[7]->member->kana_name : '' }}</td>
                            <td>{{ isset($table_b[7]->member->kana_name) ? $table_b[7]->member->kana_name : '' }}</td>
                        </tr>
                        <tr>
                            <td>18:00~19:00</td>
                            <td>{{ isset($table_a[8]->member->kana_name) ? $table_a[8]->member->kana_name : '' }}</td>
                            <td>{{ isset($table_b[8]->member->kana_name) ? $table_b[8]->member->kana_name : '' }}</td>
                        </tr>
                        <tr>
                            <td>19:00~20:00</td>
                            <td>{{ isset($table_a[9]->member->kana_name) ? $table_a[9]->member->kana_name : '' }}</td>
                            <td>{{ isset($table_b[9]->member->kana_name) ? $table_b[9]->member->kana_name : '' }}</td>
                        </tr>
                        <tr>
                            <td>20:00~21:00</td>
                            <td>{{ isset($table_a[10]->member->kana_name) ? $table_a[10]->member->kana_name : '' }}</td>
                            <td>{{ isset($table_b[10]->member->kana_name) ? $table_b[10]->member->kana_name : '' }}</td>
                        </tr>
                        <tr>
                            <td>21:00~22:00</td>
                            <td>{{ isset($table_a[11]->member->kana_name) ? $table_a[11]->member->kana_name : '' }}</td>
                            <td>{{ isset($table_b[11]->member->kana_name) ? $table_b[11]->member->kana_name : '' }}</td>
                        </tr>
                        <tr>
                            <td>22:00~23:00</td>
                            <td>{{ isset($table_a[12]->member->kana_name) ? $table_a[12]->member->kana_name : '' }}</td>
                            <td>{{ isset($table_b[12]->member->kana_name) ? $table_b[12]->member->kana_name : '' }}</td>
                        </tr>
                        <tr>
                            <td>23:00~24:00</td>
                            <td>{{ isset($table_a[13]->member->kana_name) ? $table_a[13]->member->kana_name : '' }}</td>
                            <td>{{ isset($table_b[13]->member->kana_name) ? $table_b[13]->member->kana_name : '' }}</td>
                        </tr>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- テーブルここまで -->

            <!-- カレンダーへのリンク -->
            <div class="card-footer" style="text-align: right;">
                <a href="{{ route('times.calender') }}" class="btn btn-success">カレンダー表示</a>
            </div>

        </div>
    </div>
    <!-- コンテナ ここまで -->

    <!-- javascript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

@endsection
