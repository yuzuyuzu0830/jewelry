<!-- モーダル  -->
<div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
                <h2>I've Done…</h2>
                <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <main>
                <form id="task-form" method="POST" action="{{ route('done_task') }}">
                    @csrf
                    <div class="tasks-group">
                        <p>できたことをチェック</p>
                        <input id="brush" type="checkbox" name="title" value="ブラシ洗浄"><label class="label" for="brush">ブラシ洗浄</label>

                        <label><input type="checkbox" name="title" value="パフ洗浄">パフ洗浄</label>

                        <label><input type="checkbox" name="title" value="顔のパック">顔のパック</label>

                        <label><input type="checkbox" name="title" value="トリートメント">トリートメント</label>

                        <label><input type="checkbox" name="title" value="ピーリング">ピーリング</label>

                        <label>その他<input type="text" name="title"></label>
                    </div>
                    <div class="tasks-group">
                        <label>登録する日付<input type="date" class="task-form" name="start"></label>
                    </div>
                    <div class="tasks-group">
                        <label>文字の色<input type="color" class="task-form" name="textColor"></label>
                    </div>
                    <div class="modal-btn">
                        <button class="modal__btn modal__btn-primary"　type="submit">登録</button>
                        <div class="marker"><a id="expire-btn"　class="modal__btn" data-micromodal-close aria-label="Close this dialog window">キャンセル</a></div>
                    </div>
                </form>
            </main>
        </div>
    </div>
</div>
