<nav class="menu mb-5">
    <div class="nav-title">
        <p>メニュー</p>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('/home') }}">ホーム（カレンダー）</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('list_of_stock', ['user_id' => Auth::id()]) }}">購入品リスト<a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('list_of_item', ['user_id' => Auth::id()]) }}">ほしい物リスト</a>
        </li>
    </ul>
</nav>
