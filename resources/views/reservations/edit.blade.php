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

            <div class="my-3">
                <label for="reservation_date" class="form-label">予約日</label>
                <input type="date" name="reservation_date" id="reservation_date"
                    class="form-control @error('reservation_date') is-invalid @enderror "
                    value="{{ old('reservation_date') }}" aria-describedby="validateReservationDate">
                @error('reservation_date')
                    <div id="validateReservationDate" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="my-3">
                <label for="room_id" class="form-label">部屋種類</label>
                <select id="room_id" name="room_id" class="form-control @error('room_id') is-invalid @enderror "
                    aria-describedby="validateRoomId">
                    <option></option>
                    <option value="1">Aスタジオ</option>
                    <option value="2">Bスタジオ</option>
                </select>
                @error('room_id')
                    <div id="validateRoomId" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="my-3">
                <label for="start_time" class="form-label">開始時間</label>
                <select id="start_time" name="start_time" class="form-control @error('start_time') is-invalid @enderror "
                    aria-describedby="validateStartTime">
                    <option></option>
                    <option value="10">10:00</option>
                    <option value="11">11:00</option>
                    <option value="12">12:00</option>
                    <option value="13">13:00</option>
                    <option value="14">14:00</option>
                    <option value="15">15:00</option>
                    <option value="16">16:00</option>
                    <option value="17">17:00</option>
                    <option value="18">18:00</option>
                    <option value="19">19:00</option>
                    <option value="20">20:00</option>
                    <option value="21">21:00</option>
                    <option value="22">22:00</option>
                    <option value="23">23:00</option>
                </select>
                @error('start_time')
                    <div id="validateStartTime" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="my-3">
                <label for="utilization_time" class="form-label">利用時間</label>
                <select id="utilization_time" name="utilization_time"
                    class="form-control @error('utilization_time') is-invalid @enderror "
                    aria-describedby="validateUtilizationTime">
                    <option></option>
                    <option value="1">1時間</option>
                    <option value="2">2時間</option>
                    <option value="3">3時間</option>
                    <option value="4">4時間</option>
                    <option value="5">5時間</option>
                    <option value="6">6時間</option>
                </select>
                @error('utilization_time')
                    <div id="validateUtilizationTime" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <!-- 予約フォーム ここまで -->

        <!-- 送信ボタン -->
        <div class="my-2">
            <button type="submit" class="btn btn-success mb-3" name="btn_confirm">予約変更</button>
            <a href="{{ route('members.show', $member) }}" class="btn btn-outline-secondary mb-3">もどる</a>
        </div>
    </form>
    <!-- 送信ボタン ここまで -->

@endsection
