<style>
    nav ul li a {
        color: #172B4D !important;
    }

    #hoverr{
        color:white !important;
    }
    #hoverrr{
        color:white !important;
    }
    #hoverr:hover {
        color: #172B4D !important;
    }
    #hoverrr:hover {
        color: #172B4D !important;
    }
</style>
<header>
    <nav>
        @auth
            <div class="navlogo px-5">
                <a href="/dashboard">
                    <img src="{{ asset('images/navLogo.png') }}" alt="Deerwalk Sifal School Logo">
                </a>
            </div>
            <ul class="mx-5">
                <li><a href="/dashboard" id="hoverrr" style="color:white">Dashboard</a></li>
                <li><a href="{{ route('Work_log.create') }}" id="hoverr" style="color:white " class="">Worklog</a></li>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Profile
                    </button>
                    <ul class="dropdown-menu  text-start ">
                        <li class="m-0 my-2"><a href="{{ route('changePassword') }}" class="m-auto">
                            <span style="color:#172B4D;">Change Password</span></a></li>
                        <li class="m-0 mb-1"><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="text-align:center;">
                                <span style="color:#172B4D;">Logout</span>
                                
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>

            </ul>
        @endauth
    </nav>
</header>
