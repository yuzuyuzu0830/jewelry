@extends('layouts.app')

@section('content')
<ul>
    <li><img src="{{ asset('upload/stock_cosmetics/' . $stock_cosmetic->image) }}" alt="Non-Image"></li>
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
    <a href="#" class="btn btn-danger" data-id="{{ $stock_cosmetic->id }}" onclick="deletePost(this);">削除する</a>

</form>
@endsection
@section('script')
<script>
    // キャンセルボタン
    function deletePost(e){
        'use strict';
        if (confirm('本当に削除していいですか？')){
            document.getElementById('delete_' + e.dataset.id).submit();
        }
    }
</script>
@endsection
