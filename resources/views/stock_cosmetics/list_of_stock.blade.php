@extends('layouts.app')

@section('content')
<div class="list">
    @foreach($stock_cosmetics as $stock_cosmetic)
    <div class="card" style="width: 15rem;">
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
    {{ $stock_cosmetics->links() }}
</div>
@endsection
