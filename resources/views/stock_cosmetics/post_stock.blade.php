@extends('layouts.app')

@section('content')
<h1>講習した商品をを登録する</h1>
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
            <option value="化粧下地">化粧下地</option>
            <option value="コンシーラー">コンシーラー</option>
            <option value="ファンデーション">ファンデーション</option>
            <option value="bb・ccクリーム">bb・ccクリーム</option>
            <option value="フェイスパウダー">フェイスパウダー</option>
            <option value="ハイライト">ハイライト</option>
            <option value="シェーディング">シェーディング</option>
            <option value="チーク">チーク</option>
        </select>
        <!-- アイメイク -->
        <select id="eyes-makeup" class="sub-category" name="category">
            <option value="アイシャドウ">アイシャドウ</option>
            <option value="アイライナー">アイライナー</option>
            <option value="マスカラ">マスカラ</option>
            <option value="アイブロウ">アイブロウ</option>
        </select>
        <!-- リップメイク -->
        <select id="lip-makeup" class="sub-category" name="category">
            <option value="口紅">口紅</option>
            <option value="リップグロス">リップグロス</option>
            <option value="リップライナー">リップライナー</option>
            <option value="リップクリーム">リップクリーム</option>
        </select>
        <!-- ネイルケア -->
        <select id="nail-care" class="sub-category" name="category">
            <option value="マニキュア">マニキュア</option>
            <option value="トップコート">トップコーと</option>
            <option value="ネイルケア">ネイルケア</option>
            <option value="除光液">除光液</option>
        </select>
        <!-- スキンケア -->
        <select id="skin-care" class="sub-category" name="category">
            <option value="化粧水">化粧水</option>
            <option value="乳液">乳液</option>
            <option value="クリーム">クリーム</option>
            <option value="オイル">オイル</option>
            <option value="ブースター">ブースター</option>
            <option value="アイクリーム">アイクリーム</option>
            <option value="洗顔">洗顔</option>
            <option value="クレンジング">クレンジング</option>
            <option value="オールインワン">オールインワン</option>
            <option value="スペシャルケア">スペシャルケア</option>
        </select>
        <!-- スキンケア -->
        <select id="skin-care" class="sub-category" name="category">
            <option value="日焼け止め">日焼け止め</option>
            <option value="アウトバスケア">アウトバスケア</option>
            <option value="インバスケア">インバスケア</option>
            <option value="オーラルケア">オーラルケア</option>
            <option value="デオドラント">デオドラント</option>
            <option value="パーツボディケア">パーツボディケア</option>
        </select>
        <!-- ヘアケア -->
        <select id="hair-care" class="sub-category" name="category">
            <option value="シャンプー">シャンプー</option>
            <option value="トリートメント">トリートメント</option>
            <option value="スペシャルケア">スペシャルケア</option>
            <option value="ヘアスタイリング">ヘアスタイリング</option>
        </select>
        <br>
        <input type="submit" value="登録">
    </div>
</form>

@endsection
