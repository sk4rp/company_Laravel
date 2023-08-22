<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Поиск компании')</title>
    <link rel="stylesheet" href="{{ asset('./public/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('./public/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('./public/icons/web.png') }}">
</head>
<body>
    <header class="site-header sticky-top py-1">
        <nav class="container d-flex flex-column flex-md-row justify-content-between">
            <a href="{{ route('welcome') }}" class="py-2 d-none d-md-inline-block text-decoration-none text-black fs-5">Главная</a>
            <a href="{{ route('user-events.index') }}" class="py-2 d-none d-md-inline-block text-decoration-none text-black fs-5">Пользовательские события</a>
            <a href="{{ route('event-categories.index') }}" class="py-2 d-none d-md-inline-block text-decoration-none text-black fs-5">Категории событий</a>
            <a href="{{ route('event-participants.index') }}" class="py-2 d-none d-md-inline-block text-decoration-none text-black fs-5">Участники коммерческих событий</a>
            <a href="{{ route('commercial-events.index') }}" class="py-2 d-none d-md-inline-block text-decoration-none text-black fs-5">Коммерческие события</a>
        </nav>
    </header>

    @if(Route::currentRouteName() == 'welcome')
            <div class="position-relative overflow-hidden p-3 p-md-5 text-center bg-light mt-2">
                <div class="col-md-5 p-lg-5 mx-auto my-5">
                    <h1 class="display-5 fw-normal">Поиск компании</h1>
                    <p class="lead fw-normal fs-3">Веб-приложение предназначено для поиска компании на различные события.</p>
                </div>
            </div>
    @endif

    <main>
            <div class="container">
                @yield('content')
            </div>
    </main>

    <footer>
        <div id="map"></div>
    </footer>

    <script src="{{ asset('./public/js/maps.js') }}"></script>
    @if(Route::currentRouteName() == 'welcome')
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcLb1qDh4_oDi6ladNrq0M5Mro9u2wEG8&callback=initMap" async defer></script>
    @endif
</body>
</html>
