<div class="sidenav">
    <div class="logo">
        <a href="/dashboard">
            <img src="{{ asset('images/navLogo.png') }}" alt="DSS Logo" />
        </a>
    </div>

    <div class="sidelinks">
        <ul>
            <li>
                <a href="/view">
                    <i class="fa fa-sitemap fa-lg icons"></i>
                    <span>Departments</span>
                </a>
            </li>
            <li>
                <a href="{{ route('users.index') }}">
                    <i class="fa fa-users fa-lg icons"></i>
                    <span>Interns</span>
                </a>
            </li>
            <li>
                <a href="{{ route('Work_log.index') }}">
                    <i class="fa fa-history fa-lg icons"></i>
                    <span>Worklog</span>
                </a>
            </li>
            <li>
                <a href="{{ route('leaves.create') }}">
                    <span>Leaves</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-pencil-square-o fa-lg icons"></i>
                    <span>Projects</span>
                </a>
            </li>
            <li>

                <a href="/settings">
                    <i class="fa fa-cog fa-lg icons"></i>
                    <span>Settings</span>
                </a>
            </li>
        </ul>
    </div>
</div>
