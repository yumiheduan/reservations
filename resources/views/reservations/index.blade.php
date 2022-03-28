@extends('layouts.reservations')

@section('title', 'reservations_index')

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
            <input type="search" class="form-control me-sm-2" name="search"
            value="" id="search" placeholder="会員検索" aria-label="会員検索">
            <button type="submit" class="btn btn-outline-light flex-shrink-0">検索</button>
        </form>
    </div><!-- /.navbar-collapse -->

@endsection

@section('content')
    <h1>予約一覧</h1>
    <div class="card-header text-white bg-success">
        {{ $member->kana_name }} 様
    </div>
    <!-- 予約情報確認テーブル -->
    <div class="table">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>予約日時</th>
                    <th>利用時間</th>
                    <th>部屋情報</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->reservation_time }}</td>
                        <td>{{ $reservation->utilization_time }}</td>
                        <td>{{ $reservation->room_id }}</td>
                        <td>
                            <a href="{{ route('reservations.show', $reservation)}}" class="btn btn-primary">予約詳細</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="my-2">
            <a href="{{ route('members.show', $member)}}" class="btn btn-outline-secondary mb-3">会員詳細</a>
        </div>
    </div>
    <!-- メンバー情報確認テーブル ここまで -->

@endsection
