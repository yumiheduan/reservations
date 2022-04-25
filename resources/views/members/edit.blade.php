@extends('layouts.reservations')

@section('title', 'members_edit')

@section('navbar')

@section('content')
    <h1>情報変更</h1>

    <div class="card border-success">
        <!-- 入力フォーム -->
        <form action="{{ route('members.update', $member) }}" method="post">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $member->id }}">
            <div class="m-4 row">
                <label for="kana_name" class="col-sm-2 col-form-label">氏名かな</label>
                <div class="col-sm-10">
                    <input type="text" name="kana_name" id="kana_name"
                        class="form-control @error('kana_name') is-invalid @enderror "
                        value="{{ old('kana_name', $member->kana_name) }}" placeholder="スペースなしのひらがなで入力">
                    @error('kana_name')
                        <div id="validateKana_name" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="m-4 row">
                <label for="phone" class="col-sm-2 col-form-label">電話番号</label>
                <div class="col-sm-10">
                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror "
                        value="{{ old('phone', $member->phone) }}" placeholder="半角数字とーで入力 (例:080-1111-2222)">
                    @error('phone')
                        <div id="validatePhone" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="m-4 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" id="email" class="form-control @error('email"') is-invalid @enderror "
                        value="{{ old('email', $member->email) }}">
                    @error('email"')
                        <div id="validate Email" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <!-- 送信ボタン -->
            <div class="row m-2">
                <div class="m-2">
                    <div class="btn-toolbar">
                        <div class="btn-group">
                            <button class="btn btn-primary mb-3" type="submit">情報変更</button>
                            <a href="{{ route('members.show', $member) }}" class="btn btn-outline-secondary mb-3">会員情報</a>
                            <a href="{{ route('times.index') }}" class="btn btn-secondary mb-3">処理終了</a>
                        </div>
                    </div>
        </form>
    </div>
    </div>
    </div>
    <!-- 入力フォーム ここまで -->
    </div>

@endsection
