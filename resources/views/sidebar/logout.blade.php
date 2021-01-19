<div class="logout">
    <a href="{{ route('logout') }}">
        {{ __('ログアウト') }}</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    </div>
</div>
