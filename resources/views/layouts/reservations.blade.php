<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>音楽スタジオ予約システム</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <!-- コンテナ -->
    <div class="container-md">
        <!-- ナビゲーション -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">スタジオ予約管理</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#Navbar"
                    aria-controls="Navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="Navbar">
                    @yield('navbar')
                    <div class="collapse navbar-collapse" id="Navbar">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page"
                                    href="{{ route('times.index') }}">本日の予約状況</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page"
                                    href="{{ route('times.calender') }}">カレンダー表示</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page"
                                    href="{{ route('members.list') }}">会員一覧</a>
                            </li>
                        </ul>
                        <form class="d-flex" action="{{ route('members.search') }}" method="get">
                            @csrf
                            <input type="search" name="search" id="search" placeholder="会員検索" aria-label="会員検索"
                                class="form-control @error('search') is-invalid @enderror "
                                aria-describedby="validateSearch">
                            @error('search')
                                <div id="validateSearch" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <button type="submit" class="btn btn-outline-light flex-shrink-0">検索</button>
                        </form>
                    </div>
                    <!-- /.navbar-collapse -->
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <ol class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </ol>
                    @endguest
                </div>
        </nav>
        <!-- ナビゲーション ここまで -->

        <!-- コンテンツ -->
        <div class="row my-2">
            <div class="col-md">
                <div class="card border-success">
                    <div class="card-body text-success">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <!-- コンテンツ ここまで -->

        <!-- javascript -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
                integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
                integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>

</body>

</html>
