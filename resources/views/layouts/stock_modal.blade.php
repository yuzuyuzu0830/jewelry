
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
                <ul>
    <li><img src="{{ asset('upload/stock_cosmetics/' . $stock_cosmetic->image) }}" alt="Non-Image"></li>
    <li>{{ $stock_cosmetic->product }}</li>
</ul>
{{ $stock_cosmetic->color }}
{{ $stock_cosmetic->brand }}
{{ $stock_cosmetic->price }}
{{ $stock_cosmetic-> purchaseDate }}
{{ $stock_cosmetic->category }}

<form method="GET" action="{{ route('edit_stock', ['id' => $stock_cosmetic->id]) }}">
    @csrf
    <input type="submit" value="編集する">
</form>
<form method="POST" action="{{ route('destroy_stock', ['id' => $stock_cosmetic->id]) }}" id="delete_{{ $stock_cosmetic->id }}">
    @csrf
    <a href="#" class="btn btn-danger" data-id="{{ $stock_cosmetic->id }}" onclick="deletePost(this);">削除する</a>

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
        <button data-micromodal-trigger="modal-1">open</button>
