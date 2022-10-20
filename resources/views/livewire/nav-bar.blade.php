<header>
    <nav>
        @auth
            <div class="navlogo">
                <a href="/dashboard">
                    <img src="{{ asset('images/navLogo.png') }}" alt="Deerwalk Sifal School Logo">
                </a>
            </div>
            <ul>
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href={{ route('work_logs.create') }}>Worklog</a></li>
                <li><a href="/profile">Profile</a></li>
                <li>
                    
                 <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                Log Out
            </a>
                  <form  id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                        @csrf
                </form>
                </li>
            </ul>
        @endauth
    </nav>
</header>
