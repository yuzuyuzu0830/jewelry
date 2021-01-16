<nav class="menu mb-5">
    <div class="nav-title">
        <p>メニュー</p>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('/home') }}">ホーム（カレンダー）</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">ほしい物リスト</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('list_of_stock') }}">購入品リスト<a>
        </li>
    </ul>
</nav>
