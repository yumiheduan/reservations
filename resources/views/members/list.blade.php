@extends('layouts.reservations')

@section('navbar')

@section('content')
    <h1>会員一覧</h1>

    <div class="card border-success">
    <!-- 新規登録へのリンク -->
    <div class="card-header" style="text-align: right;">
        <a href="{{ route('members.create') }}" class="btn btn-success">新規追加</a>
    </div>

    <!-- 会員一覧表示 -->
    <div class="table">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>会員番号</th>
                    <th>氏名かな</th>
                    <th>電話番号</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($members as $member)
                    <tr>
                        <td>{{ $member->id }}</td>
                        <td>{{ $member->kana_name }}</td>
                        <td>{{ $member->phone }}</td>
                        <td>
                            <a href="{{ route('members.show', $member) }}" class="btn btn-primary">会員詳細</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
                <!-- テーブル ここまで -->
        {{ $members->links() }}
    </div>

@endsection
