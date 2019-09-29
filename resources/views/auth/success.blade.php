@extends('layouts.index')
@section('title','Регистрация завершена')
@section('content')
    <h1>Ура!</h1>
    <h3>Поздравляем! Вы успешно зарегистрировались.</h3>
    <p>Воспользуйтесь <a href="{{route('login.showLoginForm')}}">формой авторизации</a> чтобы войти на сайт под своей учетной записью</p>
@endsection    