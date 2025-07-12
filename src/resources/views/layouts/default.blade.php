<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a href=""><img src="{{ asset('storage/materials/logo.svg') }}" alt="ロゴ"></a>
            <form class="search-form" action="" method="GET">
                <input class="search-form__input" type="text" name="keyword" placeholder="なにをお探しですか？">
            </form>
            <div class="login-out__btn">
                <a href="">ログイン・ログアウト</a>
            </div>
            <div class="mypage__btn">
                <a href="">マイページ</a>
            </div>
            <div class="sell-item__btn">
                <a href="">出品</a>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>