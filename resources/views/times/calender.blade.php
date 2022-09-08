@extends('layouts.reservations')

@section('navbar')

@section('content')
    <h1>予約カレンダー</h1>
    <h4>{{ $dateTime->format('Y年n月') }}</h4>

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
                        @for ($i = 0; $i < $beginDayOfWeek; $i++)
                            <td></td>
                        @endfor
                        @foreach ($weeks1 as $day)
                            <td>
                                <a href="{{ route('times.index', ['day' => $day->format('Y-m-d')] ) }}">{{ $day->format('j') }}</a>
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        @foreach ($weeks2 as $day)
                            <td>
                                <a href="{{ route('times.index', ['day' => $day->format('Y-m-d')] ) }}">{{ $day->format('j') }}</a>
                                @if ($loop->index % 7 == 6)
                            </td>
                    </tr>
                                @endif
                        @endforeach
                </table>
                <!-- テーブルここまで -->

                <div class="card-footer" style="text-align: center;">
                    <a href="{{ route('times.calender', ['month' => $month - 1] )}} " class="btn btn-outline-success">&lt;&lt;前の月</a>
                    <a href="{{ route('times.calender') }}" class="btn btn-success">今月</a>
                    <a href="{{ route('times.calender', ['month' => $month + 1] ) }}" class="btn btn-outline-success">次の月&gt;&gt;</a>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <!-- コンテナ ここまで -->
    <!-- カレンダー表示 ここまで -->

@endsection
