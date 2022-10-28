<header>
    <nav>
        @auth
            <div class="navlogo">
                <a href="/dashboard">
                    <img src="{{ asset('images/navLogo.png') }}" alt="Deerwalk Sifal School Logo">
                </a>
            </div>
            <ul>
                <li><a href="{{ route('departments.index') }}">Departments</a></li>
                <li><a href="#">Leaves</a></li>
                <li><a href="{{ route('users.index') }}">Interns</a></li>
                <li><a href="#">Settings</a></li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Log Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                        @csrf
                    </form>
                </li>
            </ul>
        @endauth
    </nav>
</header>
