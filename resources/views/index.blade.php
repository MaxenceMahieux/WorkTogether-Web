
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkTogether</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="main-container">
        <x-navbar />
        <x-hero-section />
    </div>
    <div class="info">
        <h2>Nos Services</h2>
        <div>
            <div class="server-info prime">
                <img src="{{ asset('img/serveur.png') }}" alt="">
                <p><ion-icon name="cloud"></ion-icon> 1 Rac</p>
                <p><ion-icon name="hardware-chip"></ion-icon> Sécuriser !</p>
                <p><ion-icon name="file-tray-full"></ion-icon> 1TB bande passante</p>
                <a href="{{ route('purchase.index') }}">Acheter</a>
            </div>
            <div class="server-info baie">
                <img src="{{ asset('img/serveur.png') }}" alt="">
                <p><ion-icon name="cloud"></ion-icon> 1 Baie</p>
                <p><ion-icon name="hardware-chip"></ion-icon> Sécuriser !</p>
                <p><ion-icon name="file-tray-full"></ion-icon> 1TB bande passante</p>
                <a href="{{ route('purchase.index') }}">Acheter</a>
            </div>
        </div>
    </div>

</body>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>
