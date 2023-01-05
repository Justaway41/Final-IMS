<div class="topnav">
    <div class="contetn">
        <strong>
            <div class="role">Welcome, {{ auth()->user()->full_name }}</div>
        </strong>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button title="Log Out">
                <i class="fa fa-sign-out fa-2x"></i>
            </button>
        </form>
    </div>
</div>