<!-- Header -->
<header id="header">
    <h1><a href="{{ route("index") }}">eBillard.xyz</a></h1>
    <nav id="nav">
        <ul>
            <li><a href="{{ route("index") }}">Accueil</a></li>
            <li><a href="{{ route("blog.index") }}">Mon Blog</a></li>
            <li><a href="{{ route("contact") }}">Me contacter</a></li>
            @if(Auth::guest())
                <li><a href="{{ route("login") }}">Connexion</a></li>
                <li><a href="{{ route("signup") }}" class="button">Créer un compte</a></li>
            @else
                <li>
                    <a href="#" class="icon fa-angle-down">{{ Auth::user()->username }}</a>
                    <ul>
						<li><a href="{{ route('account') }}" class="icon fa-user"> Mon Compte</a></li>
                        @if(Auth::user()->admin)
                            <li><a href="{{ route("admin.index") }}" class="icon fa-briefcase"> Admin</a></li>
                        @endif
						<li><a href="{{ route("logout") }}" class="icon fa-sign-out"> Déconnexion</a></li>
					</ul>
                </li>
            @endif
        </ul>
    </nav>
</header>
