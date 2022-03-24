@extends('layouts.reservations')

@section('title', 'edit')

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
    <h1>情報変更</h1>

    <!-- 入力フォーム -->
    <form action="{{ route('members.update', $member) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="my-4 row">
            <label for="kana_name" class="col-sm-2 col-form-label">氏名かな</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="kana_name" id="kana_name" value="{{ old('kana_name',$member->kana_name) }}"
                    placeholder="ひらがな入力 スペースなし">
            </div>
        </div>
        <div class="my-4 row">
            <label for="phone" class="col-sm-2 col-form-label">電話番号</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone', $member->phone) }}"
                    placeholder="半角数字 ハイフンなし">
            </div>
        </div>
        <div class="my-4 row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $member->email) }}">
            </div>
        </div>

        <div class="my-2">
            <div class="my-2">
                <button class="btn btn-primary mb-3" type="submit">情報変更</button>
                <a href="{{ route('members.show', $member) }}" class="btn btn-outline-secondary mb-3">会員情報</a>
            </div>
        </div>
    </form>
    </div>
    <!-- 入力フォーム ここまで -->

@endsection
