@extends('layouts.reservations')

@section('title', 'members_show')

@section('navbar')

@section('content')
    <h1>会員情報</h1>

    <!-- メンバー情報確認テーブル -->
    <div class="table">
        <table class="table table-striped table-bordered">
            <tr>
                <th>氏名かな</th>
                <td>{{ $member->kana_name }}</td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>{{ $member->phone }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $member->email }}</td>
            </tr>
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

                        <form action="{{ route('reservations.index') }}" method="get" class="form-inline">
                            @csrf
                            <input type="hidden" name="member_id" value="{{ $member->id }}">
                            <button class="btn btn-outline-success mb-3">予約一覧</button>
                        </form>

                        <a href="{{ route('members.edit', $member) }}" class="btn btn-warning mb-3">情報変更</a>

                        <form action="{{ route('members.destroy', $member) }}" method="post" class="form-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger mb-3"
                                onclick="return confirm('本当に会員情報を削除しますか?');">情報削除</button>
                        </form>
                        <a href="{{ route('members.index') }}" class="btn btn-secondary mb-3">処理終了</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- 送信ボタン ここまで -->
    </div>
    <!-- メンバー情報確認テーブル ここまで -->

@endsection
