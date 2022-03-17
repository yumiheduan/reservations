@extends('layouts.reservations')

@section('title', 'show')

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
    <h1>会員情報</h1>

    <!-- メンバー情報確認テーブル -->
    <div class="table">
        <table class="table table-striped table-bordered">
            @foreach ($members as $member)
                <tr>
                    <th>ID</th>
                    <td>{{ $member->id }}</td>
                </tr>
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
            @endforeach
        </table>
        <!-- 送信ボタン -->
        <div class="row my-2">
            <div class="my-2">
                <a href="" class="btn btn-outline-success mb-3">予約入力</a>
                <a href="" class="btn btn-outline-success mb-3">予約確認</a>
                <a href="" class="btn btn-outline-secondary mb-3">情報変更</a>
                <a href="{{ route('index') }}" class="btn btn-outline-secondary mb-3">処理終了</a>
            </div>
        </div>
        <!-- 送信ボタン ここまで -->
    </div>
    <!-- メンバー情報確認テーブル ここまで -->

@endsection
