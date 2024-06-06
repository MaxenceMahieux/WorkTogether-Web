<header class="navbar">
    <nav>
        <ul>
            <li class="Title">
                <a href="/">WorkTogether</a>
            </li>
        </ul>
        <ul>
            <li>
                <a href="/">Accueil</a>
            </li>
            <li>
                <a href="/offers">Offres</a>
            </li>
        </ul>
        <ul>
            @auth
            <li>
                <a href="/dashboard">Espace client</a>
            </li>
            @endauth
            @guest
            <li>
                <a href="/login">Se connecter</a>
            </li>
            @endguest
        </ul>
    </nav>
</header>