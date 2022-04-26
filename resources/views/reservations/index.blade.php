@extends('layouts.reservations')

@section('title', 'reservations_index')

@section('navbar')

@section('content')
    <h1>予約一覧</h1>
    <div class="card-header text-white bg-success">
        {{ $member->kana_name }} 様
    </div>

    <!-- テーブル -->
    <div class="card border-success">
        <!-- 予約がない場合のメッセージ表示 -->
        <div class="card-body text-success">
            @if ($reservations->isEmpty())
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
                                <a href="{{ route('members.show', $member) }}"
                                    class="btn btn-outline-secondary mb-3">会員詳細</a>
                                <a href="{{ route('times.index') }}" class="btn btn-secondary mb-3">処理終了</a>Ï
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 送信ボタン ここまで -->

                <!-- 予約情報確認テーブル -->
            @else
                <div class="table">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>予約日</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td>{{ $reservation['reservation_date']->format('Y年m月d日') }}</td>
                                    <td>
                                        <a href="{{ route('reservations.show', $reservation) }}"
                                            class="btn btn-primary">予約詳細</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- 送信ボタン -->
                    <div class="row m-2">
                        <div class="m-2">
                            <div class="btn-toolbar">
                                <div class="btn-group">
                                    <form action="{{ route('reservations.create') }}" method="get" class="form-inline">
                                        @csrf
                                        <input type="hidden" name="member_id" value="{{ $member->id }}">
                                        <button class="btn btn-success mb-3">予約入力</button>
                                    </form>
                                    <a href="{{ route('members.show', $member) }}"
                                        class="btn btn-outline-secondary mb-3">会員詳細</a>
                                    <a href="{{ route('times.index') }}" class="btn btn-secondary mb-3">処理終了</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 送信ボタン ここまで -->
                </div>
                <!-- 予約情報確認テーブル ここまで -->
            @endif
        </div>
    </div>

@endsection
