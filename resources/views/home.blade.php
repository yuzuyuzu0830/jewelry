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
                    <!-- モーダル  -->
                    <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
                        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                                <header class="modal__header">
                                    <h2>新規登録</h2>
                                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                                </header>
                                <main class="modal__content" id="modal-1-content">
                                    <form id="expire-form" method="post" action="{{ route('expirationStore') }}">
                                        @csrf
                                        <div class="expire-group">
                                            <label>商品名<input type="text" class="expire-form" name="title" placeholder="例 製品名/ブランド名"></label>
                                        </div>
                                        <div class="expire-group">
                                            <label>使用期限<input type="date" class="expire-form" name="start"></label>
                                        </div>
                                         <div class="expire-group">
                                            <label>文字の色<input type="color" class="expire-form" name="textColor"></label>
                                        </div>
                                        <button class="modal__btn modal__btn-primary"　type="submit">登録</button>
                                        <button id="expire-btn"　class="modal__btn" data-micromodal-close aria-label="Close this dialog window">キャンセル</button>
                                     </form>
                                </main>
                            </div>
                        </div>
                    </div>

                    <!-- 開くボタン -->
                    <button data-micromodal-trigger="modal-1" action="">化粧品を登録する</button>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
