@extends('layouts.app')

@section('content')

{{ $stock_cosmetic->product }}
{{ $stock_cosmetic->color }}
{{ $stock_cosmetic->brand }}
{{ $stock_cosmetic->price }}
{{ $stock_cosmetic-> purchaseDate }}
{{ $stock_cosmetic->category }}

<form method="GET" action="">
    @csrf
    <input type="submit" value="編集する">
</form>
@endsection
