@extends('layouts.app')

@section('content')
<form id="expire-form" method="POST" action="{{ route('update_stock', ['id' => $stock_cosmetic->id]) }}" enctype="multipart/form-data">
    @csrf
    <div class="stock-group">
        <img src="{{ asset('upload/stock_cosmetics/' . $stock_cosmetic->image) }}" alt="Non-Image">
        <input type="file" class="stock-form" name="image">
    </div>
    <div class="stock-group">
        <label>商品名<input type="text" class="stock-form" name="product" value="{{ $stock_cosmetic->product }}"></label>
    </div>
    <div class="stock-group">
        <label>カラー<input type="text" class="stock-form" name="text" value="{{ $stock_cosmetic->color }}"></label>
    </div>
    <div class="stock-group">
        <label>ブランド<input type="text" class="stock-form" name="brand" value="{{ $stock_cosmetic->brand }}"></label>
    </div>
    <div class="stock-group">
        <!-- text-align: rightを指定する -->
        <label>購入価格<input type="text" class="stock-form" name="price" placeholder="1,200" value="{{ $stock_cosmetic->price }}">円</label>
    </div>
    <div class="stock-group">
        <label>購入日<input type="date" class="stock-form" name="purchaseDate" value="{{ $stock_cosmetic-> purchaseDate }}"></label>
    </div>
    <input type="submit" value="変更する">
</form>
@endsection
