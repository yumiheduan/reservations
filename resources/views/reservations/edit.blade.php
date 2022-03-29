@extends('layouts.reservations')

@section('title', 'reservations_edit')

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
    <h1>予約変更</h1>

    <!-- 変更フォーム -->
    <form action="{{ route('reservations.update', $reservation) }}" method="post">
        @csrf
        @method('PATCH')
        <input type="hidden" name="member_id" value="{{ $member->id }}">
        <div class="col-md">
            <div class="card-header text-white bg-success">
                {{ $member->kana_name }} 様
            </div>
            <div class="my-4 row">
                <label for="reservation_time" class="form-label">予約日時</label>
                <div class="col-sm-10">
                    <input type="datetime-local" class="form-control" name="reservation_time" id="reservation_time"
                    value="">
                </div>
            </div>

            <div class="my-4 row">
                <label for="room_id" class="form-label">部屋種類</label>
                <div class="col-sm-10">
                    <select class="form-select" id="room_id" name="room_id">
                        <option></option>
                        <option value="1">スタジオA</option>
                        <option value="2">スタジオB</option>
                    </select>
                </div>
            </div>

            <div class="my-4 row">
                <label for="utilization_time" class="form-label">利用時間</label>
                <div class="col-sm-10">
                    <select class="form-select" id="utilization_time" name="utilization_time">
                        <option></option>
                        <option value="1">1時間</option>
                        <option value="2">2時間</option>
                        <option value="3">3時間</option>
                        <option value="4">4時間</option>
                        <option value="5">5時間</option>
                        <option value="6">6時間</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- 入力フォーム ここまで -->

        <!-- 送信ボタン -->
        <div class="my-2">
            <button type="submit" class="btn btn-success mb-3" name="btn_confirm">予約変更</button>
            <a href="{{ route('members.show', $member) }}" class="btn btn-outline-secondary mb-3">もどる</a>
        </div>
    </form>
    <!-- 送信ボタン ここまで -->

@endsection
