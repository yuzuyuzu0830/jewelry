@extends('layouts.head')

@section('main')
<div class="main row">
    <article class="col-9">
        <div class="container pr-5 pl-5">
            <h1 class="mt-5 mb-5">Editing my data</h1>
            <div class="white-back">
                <form id="expire-form" class="edit-form" method="POST" action="{{ route('update_stock', ['id' => $stock_cosmetic->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div edit-img-form>
                        @if($stock_cosmetic->image === null)
                            <img class="edit-img" src="{{ asset('img/no-image.jpg') }}" alt="no-image">
                        @else
                            <img class="edit-img" src="{{ Storage::disk('s3')->url("stock/{$stock_cosmetic->id}.jpg") }}">
                        @endif
                        <input type="file" class="stock-form" name="image">
                    </div>
                    <div class="edit-content">
                        <div class="stock-group">
                            <label for="name">商品名</label><input id="name" type="text" class="stock-form" name="product" value="{{ $stock_cosmetic->product }}">
                        </div>
                        <div class="stock-group">
                            <label for="color">カラー</label><input id="color" type="text" class="stock-form" name="text" value="{{ $stock_cosmetic->color }}">
                        </div>
                        <div class="stock-group">
                            <label for="brand">ブランド</label><input id="brand" type="text" class="stock-form" name="brand" value="{{ $stock_cosmetic->brand }}">
                        </div>
                        <div class="stock-group">
                            <!-- text-align: rightを指定する -->
                            <label for="price">購入価格</label><input id="price" type="text" class="stock-form price" name="price" placeholder="1,200" value="{{ $stock_cosmetic->price }}">円
                        </div>
                        <div class="stock-group">
                            <label for="purchase-date">購入日</label><input id="purchase-date" type="date" class="stock-form" name="purchaseDate" value="{{ $stock_cosmetic-> purchaseDate }}">
                        </div>
                        <div class="form-btn">
                            <input class="submit-btn mr-3" type="submit" value="変更する">
                            <span class="marker"><a class="cancel-btn" href="{{ route('list_of_stock', ['user_id' => Auth::id()]) }}">キャンセル</a></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </article>
    <aside class="col-3">
        <div class="container mt-10">
            <h2 class="logo mb-5"><img src="{{ asset('img/sidebar-logo.png') }}" alt="jewelry"></h2>
        </div>
        @include('sidebar.menu')
        @include('sidebar.logout')
    </aside>
</div>
@endsection
