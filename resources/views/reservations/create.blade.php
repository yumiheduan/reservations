@extends('layouts.reservations')

<style>
    input[type="date"] {
        width: 200px;
    }

</style>

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
    {{-- @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif --}}
    <!-- 入力フォーム -->
    <form action="{{ route('reservations.store') }}" method="post">
        @csrf
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
                    <option value="1" {{ old('room_id') == 1 ? ' selected' : '' }}>Aスタジオ</option>
                    <option value="2" {{ old('room_id') == 2 ? ' selected' : '' }}>Bスタジオ</option>
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
                    <option value="10" {{ old('start_time') == 10 ? ' selected' : '' }}>10:00</option>
                    <option value="11" {{ old('start_time') == 11 ? ' selected' : '' }}>11:00</option>
                    <option value="12" {{ old('start_time') == 12 ? ' selected' : '' }}>12:00</option>
                    <option value="13" {{ old('start_time') == 13 ? ' selected' : '' }}>13:00</option>
                    <option value="14" {{ old('start_time') == 14 ? ' selected' : '' }}>14:00</option>
                    <option value="15" {{ old('start_time') == 15 ? ' selected' : '' }}>15:00</option>
                    <option value="16" {{ old('start_time') == 16 ? ' selected' : '' }}>16:00</option>
                    <option value="17" {{ old('start_time') == 17 ? ' selected' : '' }}>17:00</option>
                    <option value="18" {{ old('start_time') == 18 ? ' selected' : '' }}>18:00</option>
                    <option value="19" {{ old('start_time') == 19 ? ' selected' : '' }}>19:00</option>
                    <option value="20" {{ old('start_time') == 20 ? ' selected' : '' }}>20:00</option>
                    <option value="21" {{ old('start_time') == 21 ? ' selected' : '' }}>21:00</option>
                    <option value="22" {{ old('start_time') == 22 ? ' selected' : '' }}>22:00</option>
                    <option value="23" {{ old('start_time') == 23 ? ' selected' : '' }}>23:00</option>
                </select>
                @error('start_time')
                    <div id="validateStartTime" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="my-3">
                <label for="use_time" class="form-label">利用時間</label>
                <select id="use_time" name="use_time" class="form-control @error('use_time') is-invalid @enderror "
                    aria-describedby="validateUseTime">
                    <option></option>
                    <option value="1" {{ old('use_time') == 1 ? ' selected' : '' }}>1時間</option>
                    <option value="2" {{ old('use_time') == 2 ? ' selected' : '' }}>2時間</option>
                    <option value="3" {{ old('use_time') == 3 ? ' selected' : '' }}>3時間</option>
                    <option value="4" {{ old('use_time') == 4 ? ' selected' : '' }}>4時間</option>
                    <option value="5" {{ old('use_time') == 5 ? ' selected' : '' }}>5時間</option>
                    <option value="6" {{ old('use_time') == 6 ? ' selected' : '' }}>6時間</option>
                </select>
                @error('use_time')
                    <div id="validateUseTime" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <!-- 予約フォーム ここまで -->

        <!-- 送信ボタン -->
        <div class="my-2">
            <div class="btn-toolbar">
                <div class="btn-group">
                    <button type="submit" class="btn btn-success mb-3" name="btn_confirm">予約登録</button>
                    <a href="{{ route('members.show', $member) }}" class="btn btn-outline-secondary mb-3">会員情報</a>
                    <a href="{{ route('members.index') }}" class="btn btn-secondary mb-3">処理終了</a>
                </div>
            </div>
        </div>
    </form>
    <!-- 送信ボタン ここまで -->

@endsection
