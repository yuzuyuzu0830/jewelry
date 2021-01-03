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
                        {!! Form::open(['url' => '/postitems', 'id' => 'list-items']) !!}
                            {{ Form::token() }}
                            <div class0="done-date">
                                <label>{{ Form::date('start') }}</label>
                            </div>
                            <div class="done-checkbox">
                                    <label>{{ Form::text('items')}}</label>
                            </div>
                            <div class="done-other">
                                <label><input type="checkbox">その他</label>
                                {{ Form::text('other',null, ['name' => 'other', 'class' => 'other-form']) }}
                            </div>
                            <div class="done-submit">
                                {{ Form::submit('送信',['name' => 'submit', 'id' => 'done-btn']) }}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
