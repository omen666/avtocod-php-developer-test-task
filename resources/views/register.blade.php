@extends('layouts.index')
@section('content')
    @if (!empty($messages))
        <ul>
            @foreach ($messages->all() as $message)
                <li>{{$message}}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{route('register.reg')}}" class="form-signup" method="post">
        {{ csrf_field() }}
        <h2 class="form-signup-heading">Регистрация</h2>

        <label for="user_login" class="sr-only">Логин</label>
        <input type="text" id="user_login" name="name" class="form-control" placeholder="Логин" required autofocus>

        <label for="user_password" class="sr-only">Пароль</label>
        <input type="password" name="password" id="user_password" class="form-control" placeholder="Пароль" required>

        <label for="user_password_repeat" class="sr-only">Повторите пароль</label>
        <input type="password" name="password_confirmation" id="user_password_repeat" class="form-control" placeholder="Пароль (ещё раз)" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
    </form>
    <style type="text/css">
        .form-signup {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }

        .form-signup .form-signup-heading {
            margin-bottom: 10px;
        }

        .form-signup .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }

        .form-signup .form-control:focus {
            z-index: 2;
        }

        .form-signup input#user_login {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signup input#user_password {
            margin-bottom: -1px;
            border-radius: 0;
        }

        .form-signup input#user_password_repeat {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
@endsection