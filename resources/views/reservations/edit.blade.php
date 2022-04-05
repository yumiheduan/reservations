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
                    value="{{ $date }}" aria-describedby="validateReservationDate">
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
                    <option value="1" {{ $reservation->room_id == 1? ' selected' : '' }}>Aスタジオ</option>
                    <option value="2" {{ $reservation->room_id == 2? ' selected' : '' }}>Bスタジオ</option>
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
                    <option value="10" {{ $time == 11? ' selected' : '' }}>11:00</option>
                    <option value="12" {{ $time == 12? ' selected' : '' }}>12:00</option>
                    <option value="13" {{ $time == 13? ' selected' : '' }}>13:00</option>
                    <option value="14" {{ $time == 14? ' selected' : '' }}>14:00</option>
                    <option value="15" {{ $time == 15? ' selected' : '' }}>15:00</option>
                    <option value="16" {{ $time == 16? ' selected' : '' }}>16:00</option>
                    <option value="17" {{ $time == 17? ' selected' : '' }}>17:00</option>
                    <option value="18" {{ $time == 18? ' selected' : '' }}>18:00</option>
                    <option value="19" {{ $time == 19? ' selected' : '' }}>19:00</option>
                    <option value="20" {{ $time == 20? ' selected' : '' }}>20:00</option>
                    <option value="21" {{ $time == 21? ' selected' : '' }}>21:00</option>
                    <option value="22" {{ $time == 22? ' selected' : '' }}>22:00</option>
                    <option value="23" {{ $time == 23? ' selected' : '' }}>23:00</option>
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
                    <option value="1" {{ $reservation->utilization_time == 1? ' selected' : '' }}>1時間</option>
                    <option value="2" {{ $reservation->utilization_time == 2? ' selected' : '' }}>2時間</option>
                    <option value="3" {{ $reservation->utilization_time == 3? ' selected' : '' }}>3時間</option>
                    <option value="4" {{ $reservation->utilization_time == 4? ' selected' : '' }}>4時間</option>
                    <option value="5" {{ $reservation->utilization_time == 5? ' selected' : '' }}>5時間</option>
                    <option value="6" {{ $reservation->utilization_time == 6? ' selected' : '' }}>6時間</option>
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
