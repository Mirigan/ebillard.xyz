@extends('layouts.skeleton')

@section('title')
    index
@endsection

@section('content')
    <!-- Main -->
    <section id="main" class="container">

        <section class="box special">
            <header class="major">
                <h2>
                    Présentation en une phrase
                    <br />
                    2ème ligne
                </h2>
                <p>Une deuxième phrase ? Je ne sais pas par exemple le fait que j'utilise les method agile ! Pouvoir choisir aussi les différentes photos, mais si possible faire que cette phrase fasse la ligne entière</p>
            </header>
            <span class="image featured"><img src="images/pic01.jpg" alt="" /></span>
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
                    <span class="image featured"><img src="images/pic02.jpg" alt="" /></span>
                    <h3>Un projet</h3>
                    <p>Car c'est qui fait que l'on peut dire que je suis un bon développeur ou non. Mes réalisations!! (DynamicScreen)</p>
                    <ul class="actions">
                        <li><a href="#" class="button alt">Learn More</a></li>
                    </ul>
                </section>

            </div>
            <div class="6u 12u(narrower)">

                <section class="box special">
                    <span class="image featured"><img src="images/pic03.jpg" alt="" /></span>
                    <h3>Un autre projet</h3>
                    <p>Je ne sais pas hazard se que je fait en ce moment.</p>
                    <ul class="actions">
                        <li><a href="#" class="button alt">Learn More</a></li>
                    </ul>
                </section>

            </div>
        </div>

    </section>
@endsection
