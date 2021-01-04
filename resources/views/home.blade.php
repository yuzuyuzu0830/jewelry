@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="calendar"></div>

                    <div class="done-list">
                        <p>できたこと</p>
                        {!! Form::open(['url' => '/ajax/doneItems', 'id' => 'done-items']) !!}
                            {{ Form::token() }}
                            <div class0="done-date">
                                <label>{{ Form::date('start') }}</label>
                            </div>
                            <div class="post_item">
                                <label>
                                {{ Form::text('title',null, ['class' => 'title']) }}</label>
                            </div>
                            <div class="done-submit">
                                {{ Form::submit('登録',['id' => 'done-btn']) }}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
