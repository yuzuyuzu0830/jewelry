@extends('layouts.app')

@section('content')
<!-- main-content -->
<div class="stock-cosmetic row">
    <article class="col-9">
        <div class="container mt-4">
            <h1 class="mb-4">持っているコスメの一覧</h1>
            <div class="list row justify-content-between">
            @foreach($stock_cosmetics as $stock_cosmetic)
            <div class="card col-3" style="width: 15rem;">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em"><img src="{{ asset('upload/stock_cosmetics/' . $stock_cosmetic->image) }}" alt="Non-Image"></text></svg>
                <div class="card-body">
                    <p class="card-text">
                        <ul>
                            <li>{{ $stock_cosmetic->product }}</li>
                            <li>{{ $stock_cosmetic->brand }}</li>
                            <li><a href="{{ route('show_stock', ['id' => $stock_cosmetic->id]) }}">続きをみる</a></li>
                        </ul>
                    </p>
                </div>
            </div>
            @endforeach
            <a href="{{ route('post_stock') }}">アイテムを追加する</a>
            <!-- ページネーション -->
            {{ $stock_cosmetics->links() }}
        </div>
    </article>

    <aside class="col-3">
        <div class="container mt-5">
        <!-- 検索バー -->
            <nav class="navbar navbar-light bg-light">
            <form method="GET" action="{{ route('list_of_stock') }}" class="form-inline">
                <!-- データを持ってくるにはname属性が必須 -->
                <p>アイテムを検索する</p>
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="エクセル　パウダー" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
            </form>
            </nav>
        </div>
    </aside>
</div>
@endsection
