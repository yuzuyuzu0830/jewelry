@extends('layouts.app')

@section('content')
<div class="list">
    @foreach($stockcosmes as $stockcosme)
    <div class="card" style="width: 15rem;">
    <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">No image</text></svg>
    <div class="card-body">
        <p class="card-text">
            <ul>
                <li>{{ $stockcosme->product }}</li>
                <li>{{ $stockcosme->brand }}</li>
            </ul>
        </p>
    </div>
    </div>
    @endforeach
</div>

<a href="{{ view('/poststock') }}">アイテムを追加する</a>
@endsection
