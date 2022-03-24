@extends('layouts.reservations')

@section('title', 'reservations_create')

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
    <h1>予約登録</h1>

    <!-- 予約フォーム -->
    <div class="row my-2">
        <form action="{{ route('reservations.store') }}" method="post">
            @csrf
            <div class="col-md">
                <div class="card border-success">
                    <div class="card-header text-white bg-success">
                        さん
                    </div>

                    <div class="card-body text-success">
                        <div class="mb-3">
                            <label for="reservation_time" class="form-label">-- 予約日 --</label>
                            <input type="date" class="form-control" name="reservation_time" id="reservation_time"
                                value="{{ old('reservation_time') }}">
                        </div>

                        <div class="my-3">
                            <label for="room_id" class="form-label">-- 部屋の種類 --</label>
                            <select class="form-select" id="room_id" name="room_id">
                                <option></option>
                                <option value="1">スタジオA</option>
                                <option value="2">スタジオB</option>
                            </select>
                        </div>

                        <div class="my-3">
                            <label for="utilization_time" class="form-label">-- 利用時間 --</label>
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
                    <!-- 予約フォーム ここまで -->

                    <!-- 送信ボタン -->
                    <div class="my-3 mx-3">
                        <button type="submit" class="btn btn-success mb-3" name="btn_confirm">予約登録</button>
                        <a href="{{ route('members.show') }}" class="btn btn-outline-secondary">もどる</a>
                    </div>
                </div>
        </form>
        <!-- 送信ボタン ここまで -->

    @endsection
