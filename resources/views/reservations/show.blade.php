@extends('layouts.reservations')

@section('title', 'reservations_show')

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
        <form class="d-flex" action="{{ route('members.index') }}" method="get">
            @csrf
            <input type="search" class="form-control me-sm-2" name="search" value="" id="search" placeholder="会員検索"
                aria-label="会員検索">
            <button type="submit" class="btn btn-outline-light flex-shrink-0">検索</button>
        </form>
    </div><!-- /.navbar-collapse -->

@endsection

@section('content')
    <h1>予約詳細</h1>
    <div class="card-header text-white bg-success">
        {{ $member->kana_name }} 様
    </div>
    <!-- 予約詳細確認テーブル -->
    <div class="table">
        <table class="table table-striped table-bordered">
            <tr>
                <th>予約日時</th>
                <td>{{ $reservation->reservation_time }}</td>
            </tr>
            <tr>
                <th>利用時間</th>
                <td>{{ $reservation->utilization_time }}</td>
            </tr>
            <tr>
                <th>部屋情報</th>
                <td>{{ $reservation->room_id }}</td>
            </tr>
        </table>

        <div class="my-2">
            <form action="{{ route('reservations.index') }}" method="get" class="form-inline">
                @csrf
                <input type="hidden" name="member_id" value="{{ $member->id }}">
                <button class="btn btn-outline-success mb-3">予約一覧</button>
            </form>
        </div>
    </div>
    <!-- 予約詳細確認テーブル ここまで -->

@endsection