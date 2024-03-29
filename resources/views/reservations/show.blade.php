@extends('layouts.reservations')

@section('navbar')

@section('content')
    <h1>予約詳細</h1>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">{{ $member->kana_name }} 様</h4>
    </div>
    <!-- 予約詳細確認テーブル -->
    <div class="card border-success">
        <div class="table">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>予約日</th>
                    <td>{{ $reservation['reservation_date']->format('Y年m月d日') }}</td>
                </tr>
                <tr>
                    <th>利用時間</th>
                    <td>{{ $start_time }}時から{{ $end_time }}時まで {{ $use_time }}時間</td>
                </tr>
                <tr>
                    <th>部屋情報</th>
                    <td>{{ $room->room_type }}スタジオ</td>
                </tr>
            </table>

            <!-- 送信ボタン -->
            <div class="m-2">
                <div class="m-2">
                    <div class="btn-toolbar">
                        <div class="btn-group">
                            <form action="{{ route('reservations.index') }}" method="get" class="form-inline">
                                @csrf
                                <input type="hidden" name="member_id" value="{{ $member->id }}">
                                <button class="btn btn-outline-success mb-3">予約一覧</button>
                            </form>
                            <form action="{{ route('reservations.destroy', $reservation) }}" method="post"
                                class="form-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger mb-3"
                                    onclick="return confirm('本当に予約を削除しますか?');">予約削除</button>
                            </form>
                            <a href="{{ route('members.show', $member) }}" class="btn btn-outline-secondary mb-3">会員詳細</a>
                            <a href="{{ route('times.index') }}" class="btn btn-secondary mb-3">処理終了</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 送信ボタン ここまで -->
        </div>
        <!-- 予約詳細確認テーブル ここまで -->
    </div>
@endsection
