<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkTogether</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main-page.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/purchase-page.css') }}">
</head>

<body>
    <div class="main-container">
        <div class="nav-bar">
            <p class="title">WorkTogether</p>
            <ul>
                <li><a href="{{ url('') }}"><img src="{{ asset('img/serveur.png') }}">Offres</a></li>
                <li><a href="http://"><img src="{{ asset('img/une-entente.png') }}">Partenaire</a></li>
            </ul>
            <a class="client" href="/login">Espace Client</a>
        </div>
        <form action="{{ route('process.store') }}" method="POST" id="purchase-form">
            @csrf
            <div class="product-details">
                <h2>Location de racs dans notre data center</h2>
                <p>Racs</p>
                <p>Prix: <span id="total-price">100</span> €</p>
                <p>Réduction: - <span id="discount-price">0</span> %</p>
                <p>Total: <span id="finish-price">100</span> €</p>
            </div>

            <div class="purchase-options">
                <h2>Options d'achat</h2>
                <select name="purchase_option" id="purchase-option">
                    @foreach ($offers as $offer)
                        <option value="{{ $offer->rack_qty }}">{{ $offer->title }} \ {{ $offer->description }} - {{ $offer->price }} € (-{{ $offer->discount }}%)</option>
                    @endforeach

                </select>
            </div>

            <div class="contract-duration">
                <h2>Durée du contrat</h2>
                <input type="number" name="custom_duration" id="custom-duration" min="1"
                    placeholder="Nombre de mois">
            </div>
            <hr style="margin: 5px">
            @auth
                <div class="payment-methode">
                    <button type="submit" style="background: #ffd15e ;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-credit-card-fill" viewBox="0 0 16 16">
                            <path
                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1" />
                        </svg>
                    </button>
                    <button type="submit" style="background: #5772fd ;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-paypal" viewBox="0 0 16 16">
                            <path
                                d="M14.06 3.713c.12-1.071-.093-1.832-.702-2.526C12.628.356 11.312 0 9.626 0H4.734a.7.7 0 0 0-.691.59L2.005 13.509a.42.42 0 0 0 .415.486h2.756l-.202 1.28a.628.628 0 0 0 .62.726H8.14c.429 0 .793-.31.862-.731l.025-.13.48-3.043.03-.164.001-.007a.35.35 0 0 1 .348-.297h.38c1.266 0 2.425-.256 3.345-.91q.57-.403.993-1.005a4.94 4.94 0 0 0 .88-2.195c.242-1.246.13-2.356-.57-3.154a2.7 2.7 0 0 0-.76-.59l-.094-.061ZM6.543 8.82a.7.7 0 0 1 .321-.079H8.3c2.82 0 5.027-1.144 5.672-4.456l.003-.016q.326.186.548.438c.546.623.679 1.535.45 2.71-.272 1.397-.866 2.307-1.663 2.874-.802.57-1.842.815-3.043.815h-.38a.87.87 0 0 0-.863.734l-.03.164-.48 3.043-.024.13-.001.004a.35.35 0 0 1-.348.296H5.595a.106.106 0 0 1-.105-.123l.208-1.32z" />
                        </svg>
                    </button>
                    <button type="submit" style="background: #95a6fc ;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-stripe" viewBox="0 0 16 16">
                            <path
                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.226 5.385c-.584 0-.937.164-.937.593 0 .468.607.674 1.36.93 1.228.415 2.844.963 2.851 2.993C11.5 11.868 9.924 13 7.63 13a7.7 7.7 0 0 1-3.009-.626V9.758c.926.506 2.095.88 3.01.88.617 0 1.058-.165 1.058-.671 0-.518-.658-.755-1.453-1.041C6.026 8.49 4.5 7.94 4.5 6.11 4.5 4.165 5.988 3 8.226 3a7.3 7.3 0 0 1 2.734.505v2.583c-.838-.45-1.896-.703-2.734-.703" />
                        </svg>
                    </button>
                </div>
            @else
                <p>Vous devez être connecter pour pouvoir faire un achat</p>
            @endauth
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const purchaseOption = document.getElementById("purchase-option");
            const customDuration = document.getElementById("custom-duration");
            const totalPrice = document.getElementById("total-price");
            const discountPrice = document.getElementById("discount-price");
            const finishPrice = document.getElementById("finish-price");

            purchaseOption.addEventListener("change", updatePrice);
            customDuration.addEventListener("input", updatePrice);

            function updatePrice() {
                const selectedOption = purchaseOption.options[purchaseOption.selectedIndex];
                const optionPrice = parseFloat(selectedOption.value);
                let duration = parseFloat(customDuration.value) || 1;
                let price = 100;
                let discount = 0;
                switch (optionPrice) {
                    @foreach ($offers as $offer)
                    case {{ $offer->rack_qty }}:
                        price = {{ $offer->price }};
                        discount = {{ $offer->discount }};
                        break;
                    @endforeach

                    default:
                        break;
                }


                if (duration >= 12) {
                    discount += 20
                }

                price = price * duration;
                totalPrice.textContent = price;
                discountPrice.textContent = discount;
                let calculatedPrice = price - (discount * price / 100);
                finishPrice.textContent = calculatedPrice;

            }
        });
    </script>

</body>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>
