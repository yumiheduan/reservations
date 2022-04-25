<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
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
                <a class="navbar-brand" href="#">ーースタジオ未来のかたち予約サイトーー</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#Navbar"
                    aria-controls="Navbar" aria-expanded="false" aria-label="ナビゲーションの切替"> --}}
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="Navbar">
                    @yield('navbar')
                    <!-- /.navbar-collapse -->
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

</body>

</html>
