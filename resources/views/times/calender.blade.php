@extends('layouts.reservations')

@section('title', 'carender')

@section('navbar')

@section('content')
    <h1>予約カレンダー</h1>

    <!-- カレンダー表示 -->
    <div class="card border-success">
        <!-- カレンダーへのリンク -->
        <div class="card-body text-success">
            <div class="table-responsive">
                <table class="table table-success table-striped table-bordered">
                    <tr>
                        <th>日</th>
                        <th>月</th>
                        <th>火</th>
                        <th>水</th>
                        <th>木</th>
                        <th>金</th>
                        <th>土</th>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </table>
                <!-- テーブルここまで -->

                <div class="card-footer" style="text-align: center;">
                    <a href="" class="btn btn-outline-success">&lt;&lt;前の月</a>
                    <a href="" class="btn btn-success">今月</a>
                    <a href="" class="btn btn-outline-success">次の月&gt;&gt;</a>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    </div>
    </div>
    <!-- コンテナ ここまで -->
    <!-- カレンダー表示 ここまで -->

@endsection
