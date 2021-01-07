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

                    <!-- expiration form -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    登録する
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">化粧品の使用期限を登録する</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                    </div>
                    </div>
                    <div id="dialog">
                        <form id="expire-form" method="post">
                            @csrf
                            <div class="expire-group">
                                <div class="expire-group">
                                <label>商品名<input type="text" class="expire-form" name="title" placeholder="例 製品名/ブランド名"></label>
                            </div>
                            <div class="expire-group">
                                <label>使用期限<input type="date" class="expire-form" name="start"></label>
                            </div>
                            <div class="expire-group">
                                <label>文字の色<input type="color" class="expire-form" name="textColor"></label>
                            </div>
                        </form>
                    </div>
                    <button id="expire-btn">登録する</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
