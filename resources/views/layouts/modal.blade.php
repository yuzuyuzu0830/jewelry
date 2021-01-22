<!-- モーダル  -->
<div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
                <h2>I've Done…</h2>
                <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <main>
                 <!-- エラー -->
                 @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- 入力フォーム -->
                <form id="task-form" method="POST" action="{{ route('done_task') }}">
                    @csrf
                    <div class="tasks-group">
                        <p>できたことをチェック</p>
                        <input id="brush" type="radio" name="title" value="ブラシ洗浄"><label for="brush">ブラシ洗浄</label>
                        <input id="puff" type="radio" name="title" value="パフ洗浄"><label for="puff">パフ洗浄</label>
                        <input id="pack" type="radio" name="title" value="顔のパック"><label for="pack">顔のパック</label>
                        <input id="other" type="radio" name="title" value="その他"><label for="other">その他</label>

                    </div>
                    <div class="tasks-group">
                        <label>登録する日付</label><input type="date" class="task-form" name="start">
                    </div>
                    <div class="tasks-group">
                        <label>文字の色<input type="color" class="task-form" name="textColor"></label>
                    </div>
                    <div class="modal-btn">
                        <button class="modal__btn modal__btn-primary mr-3"　type="submit">登録</button>
                        <span class="marker"><a id="expire-btn"　class="modal__btn" data-micromodal-close aria-label="Close this dialog window">キャンセル</a></span>
                    </div>
                </form>
            </main>
        </div>
    </div>
</div>
