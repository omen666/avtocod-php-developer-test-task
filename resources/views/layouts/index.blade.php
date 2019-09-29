<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous"/>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        .user-avatar {
            margin-top: 5px;
            width: 100%;
        }

        .wall-message {
            border: solid #eee;
            border-width: 0 0 1px 0;
            margin-bottom: 1em;
        }

        .wall-message:last-child {
            border-width: 0;
        }
    </style>

    <title>Стена сообщений | @yield('title')</title>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('main')}}">Avtocod | Стена сообщений</a>
        </div>
        <ul class="nav navbar-nav">
            <li{{ Route::currentRouteName()=='main' ? ' class=active' : '' }}>
                <a href="{{route('main')}}">Главная</a>
            </li>
            @if(!Auth::check())
                <li {{ Route::currentRouteName()=='login.showLoginForm' ? 'class=active' : '' }}>
                    <a href="{{route('login.showLoginForm')}}">Авторизация</a></li>
                <li {{ Route::currentRouteName()=='register.index' ? 'class=active' : '' }}>
                    <a href="{{route('register.index')}}">Регистрация</a>
                </li>
            @endif
        </ul>
        @if(Auth::check())
            <ul class="nav navbar-nav navbar-right">
                <li class="navbar-text"><span class="glyphicon glyphicon-user"></span> {{Auth::user()->name}}</li>
                <li><a href="{{route('login.logout')}}"><span class="glyphicon glyphicon-log-out"></span> Выход</a></li>
            </ul>
        @endif
    </div>
</nav>

<!-- Begin page content -->
<div class="container">
    @yield('content')
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

</body>
</html>