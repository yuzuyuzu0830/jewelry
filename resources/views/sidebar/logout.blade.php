<div class="logout">
    <a class="dropdown-item" href="{{ route('logout') }}"　onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('ログアウト') }}</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    </div>
</div>
