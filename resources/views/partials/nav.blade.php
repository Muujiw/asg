<nav class="navbar navbar-expand-lg navbar-dark py-lg-3 fixed-top" id="mainNav" style="background-color: #21618c;">
    <div class="container">
        <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="/" style="font-family: 'The Bold Font', sans-serif; color: #ebf5fb;">St GABRIEL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/" style="color: #ebf5fb; font-family: 'Roboto', sans-serif;">Accueil</a></li>
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/about" style="color: #ebf5fb; font-family: 'Roboto', sans-serif;">Nos activités</a></li>
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/products" style="color: #ebf5fb; font-family: 'Roboto', sans-serif;">Nos contrats</a></li>
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/crew" style="color: #ebf5fb; font-family: 'Roboto', sans-serif;">Nos équipes</a></li>
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/contact" style="color: #ebf5fb; font-family: 'Roboto', sans-serif;">Nous contacter</a></li>
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/simulator" style="color: #ebf5fb; font-family: 'Roboto', sans-serif;">Simulateur de prime</a></li>
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/news" style="color: #ebf5fb; font-family: 'Roboto', sans-serif;">Actualités</a></li>

            </ul>

            <div class="d-flex ms-auto">
                @auth
                <a href="{{ route('dashboard') }}" class="btn btn-outline-light me-2">
                    <i class="fas fa-tachometer-alt"></i> Votre espace
                </a>

                    <!-- Bouton de déconnexion quand l'utilisateur est connecté -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-light">
                            <i class="fas fa-sign-out-alt"></i> Déconnexion
                        </button>
                    </form>

                    
                @else
                    <!-- Boutons Inscription et Connexion quand l'utilisateur est invité (non connecté) -->
                    <a href="{{ route('register') }}" class="btn btn-outline-light me-2">
                        <i class="fas fa-user-plus"></i> Inscription
                    </a>
                    <a href="{{ route('login') }}" class="btn btn-outline-light">
                        <i class="fas fa-sign-in-alt"></i> Connexion
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
