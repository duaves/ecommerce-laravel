<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Магазин</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/site.js') }}"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <!-- Бренд и кнопка «Гамбургер» -->
            <a class="navbar-brand" href="{{ route('index') }}">Магазин</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-example"
                aria-controls="navbar-example" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Основная часть меню (может содержать ссылки, формы и прочее) -->
            <div class="collapse navbar-collapse" id="navbar-example">
                <!-- Этот блок расположен слева -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/public/catalog/index">Каталог</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Доставка</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Контакты</a>
                    </li>
                </ul>

                <!-- Этот блок расположен посередине -->
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Поиск по каталогу"
                        aria-label="Search">
                    <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Искать</button>
                </form>
                <!-- Этот блок расположен справа -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link @if ($positions) text-success @endif" href="{{ route('basket.index') }}">
                            Корзина
                            @if ($positions) ({{ $positions }}) @endif
                        </a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.login') }}">Войти</a>
                        </li>
                        @if (Route::has('user.register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.register') }}">Регистрация</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.index') }}">Личный кабинет</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>

            <div class="row">
                <div class="col-md-3">
                    @include('layout.part.roots')
                    @include('layout.part.brands')
                </div>
                <div class="col-md-9">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible mt-4" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ $message }}
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
    </body>

    </html>
