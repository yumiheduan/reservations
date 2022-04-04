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
            <input type="search" class="form-control me-sm-2" name="search" value="" id="search" placeholder="会員検索"
                aria-label="会員検索">
            <button type="submit" class="btn btn-outline-light flex-shrink-0">検索</button>
        </form>
    </div><!-- /.navbar-collapse -->

@endsection

@section('content')
    <h1>予約一覧</h1>
    <div class="card-header text-white bg-success">
        {{ $member->kana_name }} 様
    </div>

    <!-- 予約がない場合のメッセージ表示 -->
    <div class="card-body text-success">
        @if (count($reservations) == 0)
            <div class="table-responsive">
                <table class="table table-success">
                    <tbody>
                        <th>予約はありません</th>
                    </tbody>
                </table>
            </div>
            <!-- メッセージ ここまで -->

            <!-- 送信ボタン -->
            <div class="row my-2">
                <div class="my-2">
                    <div class="btn-toolbar">
                        <div class="btn-group">
                            <form action="{{ route('reservations.create') }}" method="get" class="form-inline">
                                @csrf
                                <input type="hidden" name="member_id" value="{{ $member->id }}">
                                <button class="btn btn-success mb-3">予約入力</button>
                            </form>
                            <a href="{{ route('members.show', $member) }}" class="btn btn-outline-secondary mb-3">会員詳細</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 送信ボタン ここまで -->
    </div>


    <!-- 予約情報確認テーブル -->
@else
    <div class="table">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>予約日時</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation['reservation_time']->format('Y年m月d日 H時') }}</td>
                        <td>
                            <a href="{{ route('reservations.show', $reservation) }}" class="btn btn-primary">予約詳細</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- 送信ボタン -->
        <div class="row my-2">
            <div class="my-2">
                <div class="btn-toolbar">
                    <div class="btn-group">
                        <form action="{{ route('reservations.create') }}" method="get" class="form-inline">
                            @csrf
                            <input type="hidden" name="member_id" value="{{ $member->id }}">
                            <button class="btn btn-success mb-3">予約入力</button>
                        </form>
                        <a href="{{ route('members.show', $member) }}" class="btn btn-outline-secondary mb-3">会員詳細</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- 送信ボタン ここまで -->
    </div>
    <!-- 予約情報確認テーブル ここまで -->
    @endif

@endsection
