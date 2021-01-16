
      <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
            <div class="modal__overlay" tabindex="-1" data-micromodal-close>
              <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                  <h2 class="modal__title" id="modal-1-title">
                    Micromodal
                  </h2>
                  <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                <form id="expire-form" method="post" action="{{ route('post_stock') }}">
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
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                                        <button type="submit" id="expire-btn" class="btn btn-primary">登録</button>
                                    </form>
                </main>
                <footer class="modal__footer">
                  <button class="modal__btn modal__btn-primary">Continue</button>
                  <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
                </footer>
              </div>
            </div>
        </div>

        <!-- 開くボタン -->
        <button data-micromodal-trigger="modal-1" action="">open</button>
