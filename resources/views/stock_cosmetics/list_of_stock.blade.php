@extends('layouts.head')

@section('main')
<!-- main-content -->
<div class="main row">
    <article class="col-9">
        <div class="container mt-4 mb-4 pr-4 pl-5">
            <h1 class="mb-6 ml-3">Cosmetics I have</h1>
            <div class="list">
                @foreach($stock_cosmetics as $stock_cosmetic)
                <div class="stock-items mb-5">
                    <img src="{{ asset('upload/stock_cosmetics/' . $stock_cosmetic->image) }}"
                            <ul>
                                <li>{{ $stock_cosmetic->product }}</li>
                                <li>{{ $stock_cosmetic->brand }}</li>
                                <li><a href="{{ route('show_stock', ['id' => $stock_cosmetic->id]) }}">続きをみる</a></li>
                            </ul>
                </div>
                @endforeach
            </div>
            <div class="add-item">
                <div class="add-button">
                    <a href="{{ route('post_stock') }}">アイテムを追加する</a>
                </div>
            </div>
            <!-- ページネーション -->
            {{ $stock_cosmetics->links() }}
        </div>
    </article>

    <aside class="col-3">
        @section('nav')
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('/home') }}">ホーム（カレンダー）</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">ほしい物リスト</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">購入品リスト<a>
        </li>
        @endsection
        @include('layouts.sidebar')
    </aside>
</div>
@endsection
