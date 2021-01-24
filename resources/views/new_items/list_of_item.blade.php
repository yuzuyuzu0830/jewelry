@extends('layouts.head')

@section('main')
<!-- main-content -->
<div class="main row">
    <article class="col-9">
        <div class="container pr-4 pl-5">
            <h1 class="mt-5 mb-5">My cosmetics wish list</h1>
            <div class="list">
                @foreach($new_items as $new_item)
                <div class="stock-items mb-5">
                    @if($new_item->image === null)
                    <img src="{{ asset('img/no-image.jpg') }}" alt="no-image">
                    @else
                    <img src="{{ asset('upload/new_items/' . $new_item->image) }}" alt="cosmetic-image">
                    @endif
                    <div class="stock-items-text pt-3 pb-2 pr-3 pl-3">
                        <p>{{ $new_item->title  . '/'  .$new_item->brand }}</p>
                        <span class="marker"><a href="{{ route('show_item', ['id' => $new_item->id]) }}">詳細/編集</a></span>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="post-button mb-5">
                <a href="{{ route('post_item') }}">アイテムを追加する</a>
            </div>
            <!-- ページネーション -->
            {{ $new_items->links() }}
        </div>
    </article>

    <aside class="col-3">
        <div class="container mt-10">
            <h2 class="logo mb-5"><img src="{{ asset('img/sidebar-logo.png') }}" alt="jewelry"></h2>
            <section>
                <form class="stock-search mb-5" method="GET" action="{{ route('list_of_item', ['user_id' => Auth::id()]) }}">
                <!-- データを持ってくるにはname属性が必須 -->
                    <div class="nav-title">
                        <p class="mb-4">アイテムを検索する</p>
                    </div>
                    <input class="search" name="search" type="search" placeholder="エテュセ　リップ" aria-label="Search">
                    <button class="post-search" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </section>
            <nav class="menu mb-5">
                <div class="nav-title">
                    <p>メニュー</p>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}">ホーム（カレンダー）</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">ほしい物リスト</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('list_of_stock', ['user_id' => Auth::id()]) }}">購入品リスト</a>
                    </li>
                </ul>
            </nav>
            @include('sidebar.logout')
        </div>
    </aside>
</div>
@endsection
