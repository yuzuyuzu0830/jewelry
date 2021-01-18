@extends('layouts.head')

@section('main')

<div class="main row">
    <article class="col-9">
        <div class="container pr-6 pl-5">
            <h1 class="mt-5 mb-5">My Cosmetic</h1>
            <div class="show-display">
                <div class="show-content ml-5">
                    <div class="show-detail">
                        <div class="show-img mt-4">
                            @if($stock_cosmetic->image === null)
                                <img src="{{ asset('img/no-image.jpg') }}">
                            @else
                                <img src="{{ asset('upload/stock_cosmetics/' . $stock_cosmetic->image) }}" alt="cosmetic-image"></article>
                            @endif
                        </div>
                        <section class="show-list>
                            <ul>
                                <li>{{ $stock_cosmetic->product }}</li>
                                <li>{{ $stock_cosmetic->color }}</li>
                                <li>{{ $stock_cosmetic->brand }}</li>
                                <li>{{ $stock_cosmetic->price . '円' }}</li>
                                <li>{{ $stock_cosmetic-> purchaseDate }}</li>
                            </ul>
                            <div class="show-btn">
                                <form method="GET" action="{{ route('edit_stock', ['id' => $stock_cosmetic->id]) }}">
                                    @csrf
                                    <input class="submit-btn" type="submit" value="編集する">
                                </form>
                                <form method="POST" action="{{ route('destroy_stock', ['id' => $stock_cosmetic->id]) }}" id="delete_{{ $stock_cosmetic->id }}">
                                    @csrf
                                    <span class="marker"><a href="#" class="cancel-btn" data-id="{{ $stock_cosmetic->id }}" onclick="deletePost(this);">削除する</a></span>
                                </form>
                            </div>
                        </section>
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
