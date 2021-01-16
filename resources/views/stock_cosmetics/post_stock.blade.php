@extends('layouts.head')

@section('main')

<div class="main row">
    <article class="col-9">
        <div class="container pr-4 pl-5">
            <h1 class="mt-5 mb-5">I bought…</h1>
            <div class="post-content row justify-content-between">
                <div class="post-img col-6">
                    <img src="{{ asset('img/post-stock.jpg') }}" alt="cosmetics">
                </div>
                <section class="co-6">
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
                    <form id="expire-form" method="post" action="{{ route('post_stock') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="stock-group">
                            <input type="file" class="stock-form" name="image">
                        </div>
                        <div class="stock-group">
                            <label>商品名<input type="text" class="stock-form" name="product"></label>
                        </div>
                        <div class="stock-group">
                            <label>カラー<input type="text" class="stock-form" name="text"></label>
                        </div>
                        <div class="stock-group">
                            <label>ブランド<input type="text" class="stock-form" name="brand"></label>
                        </div>
                        <div class="stock-group">
                            <!-- text-align: rightを指定する -->
                            <label>購入価格<input type="text" class="stock-form" name="price" placeholder="1,200">円</label>
                        </div>
                        <div class="stock-group">
                            <label>購入日<input type="date" class="stock-form" name="purchaseDate"></label>
                        </div>
                        <div class="stock-group pulldown">
                            <label>商品カテゴリー<select class="main-category" name="main_category">
                                <option value="">カテゴリーを選択</option>
                                <option value="base-makeup">ベースメイク</option>
                                <option value="eyes-makeup">アイメイク</option>
                                <option value="lip-makeup">リップメイク</option>
                                <option value="nail-care">ネイル・ネイルケア</option>
                                <option value="skin-care">スキンケア</option>
                                <option value="hair-care">ヘアケア</option>
                                <option value="other">その他</option>
                            </select></label>
                            <!-- ベースメイクの詳細 -->
                            <select id="base-makeup" class="sub-category" name="category">
                                @foreach(config('stock-category.base-makeup') as $key => $stock)
                                    <option value="{{ $key }}">{{ $stock['label'] }}</option>
                                @endforeach
                            </select>
                            <!-- アイメイク -->
                            <select id="eyes-makeup" class="sub-category" name="category">
                                @foreach(config('stock-category.eyes-makeup') as $key => $stock)
                                    <option value="{{ $key }}">{{ $stock['label'] }}</option>
                                @endforeach
                            </select>
                            <!-- リップメイク -->
                            <select id="lip-makeup" class="sub-category" name="category">
                                @foreach(config('stock-category.lip-makeup') as $key => $stock)
                                    <option value="{{ $key }}">{{ $stock['label'] }}</option>
                                @endforeach
                            </select>
                            <!-- ネイルケア -->
                            <select id="nail-care" class="sub-category" name="category">
                                @foreach(config('stock-category.nail-care') as $key => $stock)
                                    <option value="{{ $key }}">{{ $stock['label'] }}</option>
                                @endforeach
                            </select>
                            <!-- スキンケア -->
                            <select id="skin-care" class="sub-category" name="category">
                                @foreach(config('stock-category.skin-care') as $key => $stock)
                                    <option value="{{ $key }}">{{ $stock['label'] }}</option>
                                @endforeach
                            </select>
                            <!-- ヘアケア -->
                            <select id="hair-care" class="sub-category" name="category">
                                @foreach(config('stock-category.hair-care') as $key => $stock)
                                    <option value="{{ $key }}">{{ $stock['label'] }}</option>
                                @endforeach
                            </select>
                            <br>
                            <input type="submit" value="登録">
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </article>
    <aside class="col-3">
        <div class="container mt-5">
            <h2 class="logo mt-5 mb-5"><img src="{{ asset('img/sidebar-logo.png') }}" alt="jewelry"></h2>
        </div>
        @include('sidebar.menu')
        @include('sidebar.logout')
    </aside>
</div>
@endsection
