<div>
    <nav>
        <div class="navLogo">
            <a href="/users">
                <img src="{{ asset('images/navLogo.png') }}" alt="">
            </a>
        </div>
        @auth
        <div class="navlinks">
            <ul>
                <a href="/dashboard">
                <li>
                    Dashboard
                </li>
                </a> 
                <li>
                    <a href="{{ route('Work_log.create') }}">
                        Worklog
                    </a>
                
                </li>
                <a href="/profile">
                    <li>Profile</li>
                    </a>
                <li>
                    <form method="POST" action="/logout">
                        @csrf
                        <button class="nobtn" type="submit">
                            Log Out
                        </button>
                    </form>
                </li>
    
            </ul>
        </div>
        @endauth
    </nav>
    
    
</div>
