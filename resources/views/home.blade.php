<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
        <!-- fullcalendar dependencies -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.0/moment.min.js"></script>
        <!-- fullcalendar script -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/fullcalendar.min.js"></script>
        <!-- fullcalendar style -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/fullcalendar.min.css">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <script>
        $(document).ready(function () {
            $('#calendar').fullCalendar({
                firstDay: 1,
                headerToolbar: {
                    right: 'prevYear,prev,next,nextYear'
                },
                editable: true,
                eventLimit: true,
                selectable: true,
                events: '/home'
            });
        });
        </script>
    </head>
    <body>
        <div class="main row">
            <article class="col-9">
                <div class="container mt-4 mb-4 pr-4 pl-5">
                    <div id="calendar"></div>
                    <button data-micromodal-trigger="modal-1">化粧品を登録する</button>
                    @include('layouts.modal')
                </div>
            </article>
            <aside class="col-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">ホーム（カレンダー）</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ほしい物リスト</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('list_of_stock') }}">購入品リスト<a>
                    </li>
            @include('layouts.sidebar')
            </aside>
        </div>
        <script>
            MicroModal.init();
        </script>
    </body>
</html>
