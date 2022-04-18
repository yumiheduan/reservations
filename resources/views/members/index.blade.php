@extends('layouts.reservations')

@section('title', 'members_index')

@section('navbar')

@section('content')
    <h1>会員一覧</h1>
    <P>
        @if (isset($msg))
            {{ $msg }}
        @endif
    </P>


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
        {{ $members->appends(['search' => $search])->links() }}
    </div>
    <!-- メンバー情報確認テーブル ここまで -->

@endsection
