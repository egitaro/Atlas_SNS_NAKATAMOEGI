<!DOCTYPE html>
<html>

<head>
    <script type="{{asset('text/javascript')}}" src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="js/login.js"></script>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0b66c28063.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>

<body>

    <header>
        <div id ="head">
            <h1 class="header__logo"><a href="/top"><img src="{{ asset('images/atlas.png')}}"></a></h1>
            <!-- 共通で使用する画像もassetで囲わないと表示されなくなる -->
            <div id="user-menu">
                <div class="dropdown__body">
                    <p>{{Auth::user()->username}}さん</p>
                    <button class="dropdown__btn"><p></p></button>
                    <figure class="user__icon"><a href="/profileShow"><img src="{{ asset('storage/'.auth()->user()->images)}}"></a></figure>
                </div>
            </div>
        </div>
        <div class="dropdown__wrap">
            <ul class="dropdown__list">
                <a href="/top"><li class="dropdown__item">HOME</li></a>
                <a href="/profileShow"><li class="dropdown__item">プロフィール編集</li></a>
                <a href="/logout"><li class="dropdown__item">ログアウト</li></a>
            </ul>
        </div>
    </header>

    <div id="row">

        <div id="container">
            @yield('content')
        </div>

        <div id="side-bar">
            <div id="confirm">
                <!-- 自分の情報出すときは下の形！ -->
                <p>{{Auth::user()->username}}さんの</p>

                <div class="side-bar-follow">
                    <p>フォロー数</p>
                    <p>{{Auth::user()->getFollowCount(Auth::user()->id)}}名</p>
                </div>
                <div class="side-bar-btn">
                    <p class="btn btn-primary submit"><a href="/follow-list">フォローリスト</a></p>
                </div>
                <div class="side-bar-follow">
                    <p>フォロワー数</p>
                    <p>{{Auth::user()->getFollowerCount(Auth::user()->id)}}名</p>
                </div>
                <div class="side-bar-btn">
                    <p class="btn btn-primary submit"><a href="/follower-list">フォロワーリスト</a></p>
                </div>
            </div>
            <div class="side-bar-search">
                <p class="btn btn-primary"><a href="/search">ユーザー検索</a></p>
            </div>
        </div>

    </div>
    <footer>
    </footer>
</body>
</html>
