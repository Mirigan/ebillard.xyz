<!DOCTYPE html>
<html>
    <head>
        <title>Index | Ebillard.xyz</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="{{ elixir('css/app.css') }}" rel="stylesheet" type="text/css">
    </head>

    <body class="landing">
        <div id="page-wrapper">
            <!-- Header -->
            <header id="header" class="alt">
                <h1><a href="{{ route("index") }}">eBillard.xyz</a></h1>
                <nav id="nav">
                    <ul>
                        <li><a href="{{ route("index") }}">Accueil</a></li>
                        <li><a href="{{ route("blog.index") }}">Blog</a></li>
                        <li><a href="{{ route("contact") }}">Me contacter</a></li>
                        @if(Auth::guest())
                            <li><a href="{{ route("login") }}">Connexion</a></li>
                            <li><a href="{{ route("signup") }}" class="button">Créer un compte</a></li>
                        @else
                        <li>
                            <a href="#" class="icon fa-angle-down">{{ Auth::user()->username }}</a>
                            <ul>
                                <li><a href="{{ route("account") }}" class="icon fa-user"> Mon compte</a></li>
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
            <!-- Banner -->
            <section id="banner">
                <h2>Emilien Billard</h2>
                <p>Laraval, Rails, Angular, TDD ...</p>
                <ul class="actions">
                    @if(Auth::check())
                        <li><a href="{{ route("blog.index") }}" class="button special">Mon Blog</a></li>
                    @else
                        <li><a href="{{ route("signup") }}" class="button special">Créer un compte</a></li>
                    @endif
					<li><a href="{{ route("contact") }}" class="button">Me contacter</a></li>
				</ul>
            </section>
            <!-- Main -->
            <section id="main" class="container">

                <section class="box special">
                    <header class="major">
                        <h2>
                            Bienvenur sur mon site et découvrez qui je suis
                            <br />
                            2ème ligne
                        </h2>
                        <p>Une deuxième phrase ? Je ne sais pas par exemple le fait que j'utilise les method agile ! Pouvoir choisir aussi les différentes photos, mais si possible faire que cette phrase fasse la ligne entière</p>
                    </header>
                    <span class="image featured">{{ Html::image('images/pic01.jpg"') }}</span>
                </section>

                <section class="box special features">
                    <div class="features-row">
                        <section>
                            <span class="icon major fa-bolt accent2"></span>
                            <h3>Longboard</h3>
                            <p>Mettre une petite phrase sur la longboard.</p>
                        </section>
                        <section>
                            <span class="icon major fa-area-chart accent3"></span>
                            <h3>Passionné</h3>
                            <p>Oui je reste quand même une personne passionné par mon boulot</p>
                        </section>
                    </div>
                    <div class="features-row">
                        <section>
                            <span class="icon major fa-cloud accent4"></span>
                            <h3>Gamer</h3>
                            <p>Mais aussi une personne qui joue au jeux vidéos pour travailler ses réflex, et bien se marrer avec les potes car bon c'est quand même bien marrantde jouer avec les copains</p>
                        </section>
                        <section>
                            <span class="icon major fa-lock accent5"></span>
                            <h3>Voyageur</h3>
                            <p>Mais j'aime me balader dans d'autre pays et voir des paysages toujours plus beaux et rencontrer des gens de toutes les cultures, car c'est ce qui forge la vie aussi</p>
                        </section>
                    </div>
                </section>

                <div class="row">
                    <div class="6u 12u(narrower)">

                        <section class="box special">
                            <span class="image featured">{{ Html::image('images/index/DynamicScreen_logo.png') }}</span>
                            <h3>Dynamic Screen</h3>
                            <p>
                                Projet de fin d'étude pour ma licence DAWIN, réalisé avec: Rémi Bertin, Marty Lamoureux et Simon Lejeune.
                            </p>
                            <ul class="actions">
                                <li><a target="_blank" href="http://dynamicscreen.xyz/" class="button alt">En apprendre plus !</a></li>
                            </ul>
                        </section>

                    </div>
                    {{-- <div class="6u 12u(narrower)">

                        <section class="box special">
                            <span class="image featured">{{ Html::image('images/index/DynamicScreen_logo.png') }}</span>
                            <h3>Un autre projet</h3>
                            <p>Je ne sais pas hazard se que je fait en ce moment.</p>
                            <ul class="actions">
                                <li><a href="#" class="button alt">Learn More</a></li>
                            </ul>
                        </section>

                    </div> --}}
                </div>

            </section>
            @include('partials._footer')
        </div>
    </body>
    <script src="{{ elixir('js/app.js') }}"></script>
</html>
