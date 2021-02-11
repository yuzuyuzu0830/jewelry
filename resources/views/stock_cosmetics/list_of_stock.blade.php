@extends('layouts.head')

@section('main')
<!-- main-content -->
<div class="main row">
    <article class="col-9">
        <div class="container pr-4 pl-5">
            <h1 class="mt-5 mb-5">Cosmetics I have</h1>
            <div class="list">
                @foreach($stock_cosmetics as $stock_cosmetic)
                <div class="stock-items mb-5">
                @if($stock_cosmetic->image === null)
                    <img src="{{ asset('img/no-image.jpg') }}" alt="no-image">
                    @else
                    <img src="{{ Storage::disk('s3')->url("stock/{$stock_cosmetic->id}.jpg") }}">
                    @endif
                    <div class="stock-items-text pt-3 pb-2 pr-3 pl-3">
                        <p>{{ $stock_cosmetic->product  . '/'  .$stock_cosmetic->brand }}</p>
                        <span class="marker"><a href="{{ route('show_stock', ['id' => $stock_cosmetic->id]) }}">詳細/編集</a></span>
                    </div>
                </div>
                @endforeach
            </div>
            <section class="page-bottom">
                <div class="page-link">
                    {{ $stock_cosmetics->links('vendor.pagination.pagination') }}
                </div>
                <div class="post-button">
                    <a href="{{ route('post_stock') }}">アイテムを追加する</a>
                </div>
            </section>
        </div>
    </article>

    <aside class="col-3">
        <div class="container mt-10">
            <h2 class="logo mb-5"><img src="{{ asset('img/sidebar-logo.png') }}" alt="jewelry"></h2>
            <section>
                <form class="stock-search mb-5" method="GET" action="{{ route('list_of_stock', ['user_id' => Auth::id()]) }}">
                <!-- データを持ってくるにはname属性が必須 -->
                    <div class="nav-title">
                        <p class="mb-4">アイテムを検索する</p>
                    </div>
                    <div class="search-box">
                        <input class="search" name="search" type="search" placeholder="エクセル　パウダー" aria-label="Search">
                        <button class="post-search" type="submit">search</button>
                    </div>

                </form>
            </section>
            <nav class="menu mb-5">
                <div class="nav-title">
                    <p>メニュー</p>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/home') }}">ホーム（カレンダー）</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">購入品リスト</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('list_of_item', ['user_id' => Auth::id()]) }}">ほしい物リスト</a>
                    </li>
                </ul>
            </nav>
            @include('sidebar.logout')
        </div>
    </aside>
</div>
@endsection
