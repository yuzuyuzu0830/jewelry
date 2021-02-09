<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'jewelry') }}</title>

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
        <link href="https://fonts.googleapis.com/css2?family=Bad+Script&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- FullCalendar -->
        <script>
            $(document).ready(function () {
                $('#calendar').fullCalendar({
                    firstDay: 1,
                    headerToolbar: {
                        right: 'prev,next'
                    },
                    editable: true,
                    eventLimit: true,
                    selectable: true,
                    events: '/home',
                    contentHeight: 550,
                    aspectRatio: 2,

                    eventClick: function(info) {
                        document.getElementById("id").value = info.id;
                        var title = info.title;
                        if(title.match(/ブラシ洗浄/)) {
                            document.getElementById("brush_edit").checked = true
                        }
                        if (title.match(/パフ洗浄/)){
                            document.getElementById("puff_edit").checked = true;
                        }
                        if (title.match(/顔のパック/)){
                            document.getElementById("puck_edit").checked = true;
                        }
                        if (title.match(/ピーリング/)){
                            document.getElementById("peeling_edit").checked = true;
                        }
                        if (title.match(/トリートメント/)){
                            document.getElementById("treatment_edit").checked = true;
                        }
                        MicroModal.show('modal-2');
                    }
                });
            })
        </script>
    </head>
    <body>
        <div class="main row">
            <article class="col-9">
                <div class="container pr-6 pl-6">
                    <h1 class=" mt-5 mb-5 ml-3">My beauty Calendar</h1>
                    <!-- エラー -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <section class="calendar mb-5">
                        <div id="calendar"></div>
                    </section>
                    <div class="post-button mb-5">
                        <a data-micromodal-trigger="modal-1" id="modal" class="calendar-modal">I've Done…</a>
                    </div>
                    @include('layouts.modal')
                    @include('layouts.edit_modal')
                </div>
            </article>
            <aside class="col-3">
                <h2 class="logo mt-10 mb-5"><img src="{{ asset('img/sidebar-logo.png') }}" alt="jewelry"></h2>
                <nav class="menu mb-5">
                    <div class="nav-title">
                        <p>メニュー</p>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">ホーム（カレンダー）</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('list_of_stock', ['user_id' => Auth::id()]) }}">購入品リスト<a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('list_of_item', ['user_id' => Auth::id()]) }}">ほしい物リスト</a>
                        </li>
                    </ul>
                </nav>
            @include('sidebar.logout')
            </aside>
        </div>
        <script>
            MicroModal.init();
        </script>
    </body>
</html>
