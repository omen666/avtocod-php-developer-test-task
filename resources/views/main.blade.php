@extends('layouts.index')
@section('content')
    <div class="page-header">
        <h1>Сообщения от всех пользователей</h1>
    </div>

    <form action="" method="post" class="form-horizontal">
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Ошибка!</strong> Сообщение не может быть пустым.
        </div>

        <div class="controls">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="message_text">Текст сообщения:</label>
                    <textarea id="message_text" name="message_text" class="form-control"
                              placeholder="Ваше сообщение" rows="4"
                              required="required"></textarea>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <input type="submit" class="btn btn-success btn-send" value="Отправить сообщение"/>
            </div>
        </div>
    </form>

    <div class="row wall-message">
        <div class="col-md-1 col-xs-2">
            <img src="http://lorempixel.com/200/200/people/" alt="" class="img-circle user-avatar"/>
        </div>
        <div class="col-md-11 col-xs-10">
            <p>
                <strong>Eugene:</strong>
            </p>
            <blockquote>
                Привет! Как твои дела?
            </blockquote>
        </div>
    </div>

    <div class="row wall-message">
        <div class="col-md-1 col-xs-2">
            <img src="http://lorempixel.com/201/201/people/" alt="" class="img-circle user-avatar"/>
        </div>
        <div class="col-md-11 col-xs-10">
            <p>
                <strong>Mikle:</strong>
            </p>
            <blockquote>
                Цикл, без использования формальных признаков поэзии, диссонирует мелодический скрытый смысл,
                но не рифмами. Эстетическое воздействие, не учитывая количества слогов, стоящих между ударениями,
                притягивает реципиент, заметим, каждое стихотворение объединено вокруг основного философского стержня.
            </blockquote>
        </div>
    </div>

    <div class="row wall-message">
        <div class="col-md-1 col-xs-2">
            <img src="http://lorempixel.com/202/202/people/" alt="" class="img-circle user-avatar"/>
        </div>
        <div class="col-md-11 col-xs-10">
            <p>
                <strong>Tony:</strong>
            </p>
            <blockquote>
                Метафора выбирает мифологический поток сознания, несмотря на отсутствие единого пунктуационного
                алгоритма.
                Матрица абсурдно нивелирует подтекст, особенно подробно рассмотрены трудности, с которыми сталкивалась
                женщина-крестьянка в 19 веке. Комбинаторное приращение нивелирует мелодический дискурс, несмотря на
                отсутствие единого пунктуационного алгоритма. Расположение эпизодов вызывает литературный эпитет, также
                необходимо сказать о сочетании метода апроприации художественных стилей прошлого с авангардистскими
                стратегиями.
            </blockquote>
        </div>
    </div>

    <div class="row wall-message">
        <div class="col-md-1 col-xs-2">
            <img src="http://lorempixel.com/203/203/people/" alt="" class="img-circle user-avatar"/>
        </div>
        <div class="col-md-11 col-xs-10">
            <p>
                <strong>Andre:</strong>
            </p>
            <blockquote>
                Развивая эту тему, типизация отталкивает амфибрахий – это уже пятая стадия понимания по М.Бахтину.
            </blockquote>
        </div>
    </div>
@endsection