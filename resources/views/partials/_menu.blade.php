<!-- Header -->
<header id="header">
    <h1><a href="{{ route("index") }}">eBillard.xyz</a></h1>
    <nav id="nav">
        <ul>
            <li><a href="{{ route("index") }}">Home</a></li>
            <li><a href="{{ route("blog.index") }}">Blog</a></li>
            <li><a href="{{ route("contact") }}">Contact Me</a></li>
            @if(Auth::guest())
                <li><a href="{{ route("login") }}">Sign In</a></li>
                <li><a href="{{ route("signup") }}" class="button">Sign Up</a></li>
            @else
                <li>
                    <a href="#" class="icon fa-angle-down">{{ Auth::user()->username }}</a>
                    <ul>
						<li><a href="{{ route('account') }}" class="icon fa-user"> Account</a></li>
                        @if(Auth::user()->admin)
                            <li><a href="{{ route("logout") }}" class="icon fa-briefcase"> Admin</a></li>
                        @endif
						<li><a href="{{ route("logout") }}" class="icon fa-sign-out"> Logout</a></li>
					</ul>
                </li>
            @endif
        </ul>
    </nav>
</header>
