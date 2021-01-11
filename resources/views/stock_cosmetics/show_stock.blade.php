@extends('layouts.app')

@section('content')
<ul>
    <li>{{ $stock_cosmetic->product }}</li>
</ul>
{{ $stock_cosmetic->color }}
{{ $stock_cosmetic->brand }}
{{ $stock_cosmetic->price }}
{{ $stock_cosmetic-> purchaseDate }}
{{ $stock_cosmetic->category }}

<form method="GET" action="{{ route('edit_stock', ['id' => $stock_cosmetic->id]) }}">
    @csrf
    <input type="submit" value="編集する">
</form>
<form method="POST" action="{{ route('destroy_stock', ['id' => $stock_cosmetic->id]) }}" id="delete_{{ $stock_cosmetic->id }}">
    @csrf
    <a href="#" id="{{ $stock_cosmetic->id }}" onclick="deletePost(this);">削除する</a>

</form>
@endsection
