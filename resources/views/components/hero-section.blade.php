<div class="hero-section">
    <h1>Plongez dans le futur <br/> du datacenter</h1>
    <p>Nous proposons plusieurs type de services avec des prix attractifs et un service après vente exemplaire.</p>
    <div>
        @auth
            <a href="/dashboard">Espace client</a>
        @endauth
        @guest
            <a href="/login">Se connecter</a>
            <a href="/register">Créer un compte</a>
        @endguest
    </div>
</div>