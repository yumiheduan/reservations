@extends('layouts.reservations')

@section('title', 'members_index')

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
    <h1>会員一覧</h1>
    <a href="{{ route('members.create') }}" class="btn btn-success">新規追加</a>

    <!-- メンバー情報確認テーブル -->
    <div class="table">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>氏名かな</th>
                    <th>電話番号</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                    <tr>
                        <td>{{ $member->kana_name }}</td>
                        <td>{{ $member->phone }}</td>
                        <td>{{ $member->email }}</td>
                        <td>
                            <a href="{{ route('members.show', $member) }}" class="btn btn-primary">会員詳細</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $members->links() }}
    </div>
    <!-- メンバー情報確認テーブル ここまで -->

@endsection
