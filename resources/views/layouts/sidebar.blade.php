<div class="container mt-5">
    <h2 class="logo"><img src="{{ asset('img/sidebar.png') }}" alt="jewelry"></h2>
    <!-- 検索バー -->
    <section>
        <form method="GET" action="{{ route('list_of_stock') }}">
            <!-- データを持ってくるにはname属性が必須 -->
            <p>アイテムを検索する</p>
            <input name="search" type="search" placeholder="エクセル　パウダー" aria-label="Search">
            <button type="submit">検索</button>
        </form>
    </section>
        @yield('nav')
    <div class="logout">
        <a class="dropdown-item" href="{{ route('logout') }}"　onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('ログアウト') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>
