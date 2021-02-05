<!-- edit modal  -->
<div class="modal micromodal-slide" id="modal-2" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
                <h2>Editing my task list</h2>
                <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <main>
                <!-- 入力フォーム -->
                <form id="task-form" method="POST" action="{{ route('editEvent') }}">
                    @csrf
                    <input type="hidden" id="id" value="">
                    <div class="tasks-group">
                        <p>できたことをチェック</p>
                        <input id="brush" type="checkbox" name="title[]" value="0"><label for="brush">ブラシ洗浄</label>
                        <input id="puff" type="checkbox" name="title[]" value="1"><label for="puff">パフ洗浄</label>
                        <input id="pack" type="checkbox" name="title[]" value="2"><label for="pack">顔のパック</label><br>
                        <input id="peeling" type="checkbox" name="title[]" value="3"><label for="peeling">ピーリング</label>
                        <input id="treatment" type="checkbox" name="title[]" value="4"><label for="treatment">ヘアトリートメント</label><br>
                        <div class="form-check form-check-inline">
                        <label for="other"><input type="checkbox"><label for="other">その他</label><input id="other" type="text" name="title[]">
                        </div>
                    </div>
                    <div class="tasks-group">
                        <label>登録する日付</label><input type="date" id="start" class="task-form" name="start">
                    </div>
                    <div class="tasks-group">
                        <label>文字の色<input type="color" class="task-form" name="textColor"></label>
                    </div>
                    <div class="modal-btn">
                        <button id="task-update" class="modal__btn modal__btn-primary mr-3" type="submit">変更する</button>
                        <a id="expire-btn"　class="modal__btn" data-micromodal-close aria-label="Close this dialog window">キャンセル</a>
                    </div>
                </form>
            </main>
        </div>
    </div>
</div>
