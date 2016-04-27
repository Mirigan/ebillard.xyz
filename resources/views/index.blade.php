<!DOCTYPE html>
<html>
    <head>
        <title>Accueil | Ebillard.xyz</title>
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
                    <p>
                        Ce site est une beta, tout est sujet a changement ou suppression.
                    </p>
                    <header class="major">
                        <h2>
                            Développeur web,
                            <br/>
                            Diplômé de la licence professionnel DAWIN de Bordeaux.
                        </h2>
                        <p>
                            Jeune diplomé de 20 ans, vivant à Dublin afin d'améliorer mon anglais,
                            de rencontrer de nouvelle personnes et découvrir une nouvelle culture.
                            <br/>
                            Co-fondateur du projet DynamicScreen
                        </p>
                    </header>
                    <span class="image featured">{{ Html::image('images/pic01.jpg"') }}</span>
                </section>
                <section class="box special features">
                    <div class="features-row">
                        <section>
                            <span class="icon major fa-bolt accent2"></span>
                            <h3>Dynamique</h3>
                            <p>Dynamique et toujours enthousiaste pour expérimenter de nouvelles façons de travailler, je sais aussi très bien m'adapter a toute sorte d'environement de travail, afin de rester productif et de contribuer a la bonne ambiance dans l'équipe.</p>
                        </section>
                        <section>
                            <span class="icon major fa-laptop accent3"></span>
                            <h3>Passionné</h3>
                            <p>Passionné par mon travail, je reste au courant des nouveautés en grande partie grace a Twitter mais aussi en lisant régulièrement des blogs. Je n'hésite pas aussi a lire ou relire des livre sur certaines façon de coder, comme "The clean code" ou encore "Test-driven Developpement".</p>
                        </section>
                    </div>
                    <div class="features-row">
                        <section>
                            <span class="icon major fa-cloud accent4"></span>
                            <h3>Après le travail</h3>
                            <p>Car il n'y a pas que le travail dans la vie, j'aime aussi sortir avec mes amis afin de se détendre et de se changer les idées. Je privilégie aussi le longboard pour me déplacer. Adèpte aussi de jeux vidéos depuis mon enfance, j'essaye toujours de jouer avec des amis afin de travailler mon esprit d'équipe.</p>
                        </section>
                        <section>
                            <span class="icon major fa-plane accent5"></span>
                            <h3>Anglophone</h3>
                            <p>Après avoir passé 4 mois a Dublin pour mon stage de fin d'étude, je suis totalement autonome et capable aussi bien de parler un anglais courent qu'un anglais plus technique.</p>
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
                <div class="box 12u">
                    <h3>Autre faits</h3>
					<div class="row">
						<div class="12u">
							<ul class="alt">
								<li>Pratique du basket durant 12 ans (en Corrèze) dont 4 où j'ai aussi arbitré.</li>
								{{-- <li>Pratique </li> --}}
							</ul>
						</div>
					</div>
        		</div>
            </section>
            @include('partials._footer')
        </div>
    </body>
    <script src="{{ elixir('js/app.js') }}"></script>
</html>
