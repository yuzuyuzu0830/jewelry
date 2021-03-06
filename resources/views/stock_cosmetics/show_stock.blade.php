@extends('layouts.head')

@section('main')

<div class="main row">
    <article class="col-9">
        <div class="container pr-5 pl-5">
            <h1 class="mt-5 mb-5">My Cosmetic</h1>
                <div class="white-back">
                    <div class="show-detail">
                        <div class="show-img-form">
                            @if($stock_cosmetic->image === null)
                                <img class="show-img" src="{{ asset('img/no-image.jpg') }}" alt="no-image">
                            @else
                                <img class="show-img" src="{{ Storage::disk('s3')->url("stock/{$stock_cosmetic->id}.jpg") }}">
                            @endif
                        </div>
                        <div class="show-content">
                            <table class="show-table">
                                <tr>
                                    <th>商品名</th><td>{{ $stock_cosmetic->product }}</td>
                                </tr>
                                <tr>
                                    <th>カラー</th><td>{{ $stock_cosmetic->color }}</td>
                                </tr>
                                <tr>
                                    <th>ブランド</th><td>{{ $stock_cosmetic->brand }}</td>
                                </tr>
                                <tr>
                                    <th>価格</th><td>{{ $stock_cosmetic->price . '円' }}</td>
                                </tr>
                                <tr>
                                    <th>購入日</th><td>{{ $stock_cosmetic-> purchaseDate }}</td>
                                </tr>
                            </table>
                            <div class="show-btn">
                                <form method="GET" action="{{ route('edit_stock', ['id' => $stock_cosmetic->id]) }}">
                                    @csrf
                                    <input class="submit-btn" type="submit" value="編集する">
                                </form>
                                <form method="POST" action="{{ route('destroy_stock', ['id' => $stock_cosmetic->id]) }}">
                                    @csrf
                                    <span class="delete-marker"><input class="delete-btn" type="submit" value="削除する"></span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </article>
    <aside class="col-3">
        <div class="container">
            <h2 class="logo mb-5"><img src="{{ asset('img/sidebar-logo.png') }}" alt="jewelry"></h2>
        </div>
        @include('sidebar.menu')
        @include('sidebar.logout')
    </aside>
</div>
@endsection
