@extends('layouts.reservations')

@section('title', 'times_index')

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
    </div>
    <!-- /.navbar-collapse -->

@endsection

@section('content')
    <h1>予約状況</h1>
    <div class="card-header text-white bg-success">
        {{ $day->format('Y年m月d日') }}
    </div>

    <!-- テーブル -->
    <div class="card border-success">
        <!-- カレンダーへのリンク -->
        <div class="card-header" style="text-align: right;">
            <a href="" class="btn btn-success">カレンダー表示</a>
        </div>
        <div class="card-body text-success">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>時間</th>
                            <th>Aスタジオ</th>
                            <th>Bスタジオ</th>
                        </tr>
                    </thead>

                    <!-- // 指定した日時の予約時間割を取得 -->
                    <tbody>
                        <tr>
                            <td>10:00~11:00</td>
                            <td>{{ is_null($member_a) ? '' : $member->kana_name }}</td>
                            <td>{{ is_null($member_b) ? '' : $member->kana_name }}</td>
                        </tr>
                        <tr>
                            <td>11:00~12:00</td>
                            <td>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>12:00~13:00</td>
                            <td>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>13:00~14:00</td>
                            <td>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>14:00~15:00</td>
                            <td>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>15:00~16:00</td>
                            <td>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>16:00~17:00</td>
                            <td>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>17:00~18:00</td>
                            <td>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>18:00~19:00</td>
                            <td>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>19:00~20:00</td>
                            <td>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>20:00~21:00</td>
                            <td>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>21:00~22:00</td>
                            <td>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>22:00~23:00</td>
                            <td>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>23:00~24:00</td>
                            <td>
                            <td>
                            </td>
                        </tr>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- テーブルここまで -->

            <!-- カレンダーへのリンク -->
            <div class="card-footer" style="text-align: right;">
                <a href="" class="btn btn-success">カレンダー表示</a>
            </div>

        </div>
    </div>
    </div>
    </div>
    <!-- コンテナ ここまで -->

    <!-- javascript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

@endsection
