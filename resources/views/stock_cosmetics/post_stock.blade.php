@extends('layouts.head')

@section('main')

<div class="main row">
    <article class="col-9">
        <div class="container pr-4 pl-5">
            <h1 class="mt-5 mb-5">I bought…</h1>
            <div class="post-content row justify-content-between">
                <div class="post-img col-6 mb-5">
                    <img src="{{ asset('img/post-stock.jpg') }}" alt="cosmetics">
                </div>
                <section class="stock-form col-6">
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

                    <!-- 入力フォーム -->
                    <form id="expire-form" class="mt-5" method="post" action="{{ route('post_stock') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="upload-button">ファイルを選択する
                            <input type="file" name="image" onchange="uv.style.display='inline-block'; uv.value = this.value;">
                            <input type="text" id="uv" class="upload-value" disabled>
                        </div>
                        <div class="group">
                            <label for="name">商品名</label>
                            <input id="name" type="text" name="product">
                        </div>
                        <div class="group">
                            <label for="color">カラー</label>
                            <input id="color" type="text" name="text">
                        </div>
                        <div class="group">
                            <label for="brand">ブランド</label><input id="brand" type="text" name="brand">
                        </div>
                        <div class="group">
                            <!-- text-align: rightを指定する -->
                            <label for="price">購入価格</label><input id="price" class="price mr-2" type="text" name="price" placeholder="1,200">円
                        </div>
                        <div class="group">
                            <label for="purchase-date">購入日</label><input id="purchase-date" type="date" name="purchaseDate">
                        </div>
                        <div class="group pulldown">
                            <label for="main-category">商品カテゴリー</label><select id="main-category" class="main-category mb-2" name="main_category">
                                <option value="">カテゴリーを選択</option>
                                <option value="1">ベースメイク</option>
                                <option value="2">アイメイク</option>
                                <option value="3">リップメイク</option>
                                <option value="4">ネイル・ネイルケア</option>
                                <option value="5">スキンケア</option>
                                <option value="6">ヘアケア</option>
                                <option value="7">その他</option>
                            </select>
                        </div>
                        <div class="form-btn">
                            <input class="submit-btn mr-3" type="submit" value="登録">
                            <span class="marker"><a class="cancel-btn" href="{{ route('list_of_stock', ['user_id' => Auth::id()]) }}">キャンセル</a></span>
                        </div>
                    </form>
                </section>
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
