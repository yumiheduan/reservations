@extends('layouts.reservations')

@section('title', 'reservations_carender')

@section('navbar')
    <div class="collapse navbar-collapse" id="Navbar">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="">予約状況</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="">会員情報</a>
            </li>
        </ul>
        <form class="d-flex" action="" method="">
            <input type="search" class="form-control me-sm-2" name="search" id="search" placeholder="会員検索" aria-label="会員検索">
            <button type="submit" class="btn btn-outline-light flex-shrink-0">検索</button>
        </form>
    </div><!-- /.navbar-collapse -->

@endsection

@section('content')
    <h1>予約カレンダー</h1>

    <!-- カレンダー表示 -->
    <table class="table table-bordered">
        <thead>
            <tr>
                @foreach (['日', '月', '火', '水', '木', '金', '土'] as $dayOfWeek)
                    <th>{{ $dayOfWeek }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($dates as $date)
                @if ($date->dayOfWeek == 0)
                    <tr>
                @endif
                <td @if ($date->month != $currentMonth) class="bg-secondary" @endif>
                    {{ $date->day }}
                </td>
                @if ($date->dayOfWeek == 6)
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    <!-- カレンダー表示 ここまで -->

@endsection
