@extends('layouts.reservations')

@section('title', 'members_index')

@section('navbar')

@section('content')
    <h1>検索結果</h1>

    <div class="card border-success">
    <!-- 新規登録へのリンク -->
    <div class="card-header" style="text-align: right;">
        <a href="{{ route('members.create') }}" class="btn btn-success">新規追加</a>
    </div>

    <!-- 登録がない場合のメッセージ表示 -->
    <div class="card-body text-success">
        @if ($members->isEmpty())
            <div class="table-responsive">
                <table class="table table-success">
                    <tbody>
                        <th>該当するメンバーは登録されていません</th>
                    </tbody>
                </table>
            </div>
            <!-- メッセージ ここまで -->

            <!-- メンバー情報確認テーブル -->
        @else
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
                <!-- メンバー情報確認テーブル ここまで -->
                {{ $members->appends(['search' => $search])->links() }}
        @endif
    </div>
    </div>

@endsection
