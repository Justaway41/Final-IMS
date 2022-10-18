<header>
    <nav>
        <div class="navlogo">
            <a href="/dashboard">
                <img src="{{ asset('images/navLogo.png') }}" alt="Deerwalk Sifal School Logo">
            </a>
        </div>
        @auth
            <ul>

                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="/worklog">Worklog</a></li>
                <li><a href="/profile">Profile</a></li>
                <li>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit">Log Out</button>
                    </form>
                </li>
            </ul>
        @endauth
    </nav>
</header>
