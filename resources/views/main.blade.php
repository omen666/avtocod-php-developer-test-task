@extends('layouts.index')
@section('title','Главная страница')
@section('content')
    <div class="page-header">
        <h1>Сообщения от всех пользователей</h1>
    </div>
    @if(Auth::check())
        <form action="{{route('messages.addComment')}}" method="post" class="form-horizontal">
            @csrf
            @if($errors->all())
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Ошибка!</strong> Сообщение не может быть пустым.
                </div>
            @endif
            <div class="controls">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="message_text">Текст сообщения:</label>
                        <textarea id="message_text" name="content" class="form-control"
                                  placeholder="Ваше сообщение" rows="4"
                        ></textarea>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <input type="submit" class="btn btn-success btn-send" value="Отправить сообщение"/>
                </div>
            </div>
        </form>
    @endif
    @if($messages)
        @foreach ($messages as $message)
            <div class="row wall-message">
                <div class="col-md-1 col-xs-2">
                    <img src="https://ui-avatars.com/api/?name={{$message->user->name}}" alt=""
                         class="img-circle user-avatar"/>
                </div>
                <div class="col-md-11 col-xs-10">
                    <div class="row">
                        <div class="col-md-11 col-xs-10">
                            <p>
                                <strong>{{$message->user->name}}:</strong>
                            </p>
                        </div>
                        <div class="col-md-1 col-xs-2">
                            @if(Auth::check() && $message->user->id==Auth::user()->id)
                                <form action="{{ route('messages.removeComment') }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="hidden" name="id" value="{{$message->id}}">
                                    <a class="glyphicon glyphicon-trash glyphicon" style="cursor: pointer"
                                       onclick="$(this).parent('form').submit();"></a>
                                </form>
                            @endif
                        </div>
                    </div>


                    <blockquote>
                        {{$message->content}}
                    </blockquote>
                </div>
            </div>
        @endforeach
    @endif

@endsection