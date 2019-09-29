@extends('layouts.index')
@section('content')
    <form action="{{route('login.login')}}" class="form-signin" method="post">
        {{ csrf_field() }}
        @if($errors->all())
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Ошибка!</strong> Вход в систему с указанными данными невозможен.
            </div>
        @endif

        <h2 class="form-signin-heading">Авторизация</h2>

        <label for="user_login" class="sr-only">Логин</label>
        <input type="text" id="user_login" class="form-control" name="name" placeholder="Логин" required autofocus>

        <label for="user_password" class="sr-only">Пароль</label>
        <input type="password" id="user_password" class="form-control" name="password" placeholder="Пароль" required>

        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me" name="remember" checked> Запомнить меня
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
    </form>
    <style type="text/css">
        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }

        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }

        .form-signin .checkbox {
            font-weight: normal;
        }

        .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="text"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
@endsection