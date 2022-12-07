<div class="topnav">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button title="Log Out">
            <i class="fa fa-sign-out fa-2x"></i>
        </button>
    </form>
</div>
