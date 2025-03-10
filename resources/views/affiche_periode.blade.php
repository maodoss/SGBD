<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Période de Parrainage - République du Sénégal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-green: #006B3F;
            --secondary-green: #008D52;
            --hover-green: #005432;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Header Styles */
        .header {
            background: white;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 1rem;
            text-decoration: none;
        }

        .logo-text h1 {
            font-size: 1.25rem;
            color: #1A202C;
            text-decoration: none;
        }

        .logo-text p {
            font-size: 0.875rem;
            color: #4A5568;
            text-decoration: none;
        }

        /* Main Content Styles */
        .main-content {
            margin-top: 120px;
            padding: 2rem 0;
            text-align: center;
        }

        .periode-info {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        .periode-info h2 {
            font-size: 2rem;
            color: var(--primary-green);
            margin-bottom: 1.5rem;
        }

        .periode-info p {
            font-size: 1.25rem;
            color: #4A5568;
            margin-bottom: 1rem;
        }

        .countdown {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
        }

        .countdown-item {
            background: var(--primary-green);
            color: white;
            padding: 1rem;
            border-radius: 8px;
            text-align: center;
            min-width: 100px;
        }

        .countdown-item span {
            display: block;
            font-size: 2rem;
            font-weight: bold;
        }

        .countdown-item small {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.8);
        }

        /* Footer Styles */
        .footer {
            background: #1A202C;
            color: white;
            padding: 2rem 0;
            margin-top: 4rem;
            text-align: center;
        }

        .footer a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: var(--primary-green);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <a href="/" class="logo-section">
                    <img src="{{ asset('image/presi.jpg') }}" alt="Logo République du Sénégal" width="50" height="50">
                    <div class="logo-text">
                        <h1>République du Sénégal</h1>
                        <p>Système de Parrainage Électoral</p>
                    </div>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <div class="periode-info">
                <h2>Période de Parrainage</h2>
                @if($periode)
                    <p>La période de parrainage <strong>ouvre le {{ \Carbon\Carbon::parse($periode->date_debut)->format('d/m/Y') }}</strong> et <strong>ferme le {{ \Carbon\Carbon::parse($periode->date_fin)->format('d/m/Y') }}</strong>.</p>

                    <!-- Countdown Timer -->
                    <div class="countdown" id="countdown">
                        <div class="countdown-item">
                            <span id="days">00</span>
                            <small>Jours</small>
                        </div>
                        <div class="countdown-item">
                            <span id="hours">00</span>
                            <small>Heures</small>
                        </div>
                        <div class="countdown-item">
                            <span id="minutes">00</span>
                            <small>Minutes</small>
                        </div>
                        <div class="countdown-item">
                            <span id="seconds">00</span>
                            <small>Secondes</small>
                        </div>
                    </div>
                @else
                    <p>Aucune période de parrainage n'a été définie.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 MMMPH. Tous droits réservés.</p>
        </div>
    </footer>

    <!-- Countdown Script -->
    <script>
        @if($periode)
            // Date de fin de la période de parrainage
            const endDate = new Date("{{ \Carbon\Carbon::parse($periode->date_fin)->format('Y-m-d H:i:s') }}").getTime();

            // Mettre à jour le compte à rebours toutes les secondes
            const countdown = setInterval(() => {
                const now = new Date().getTime();
                const timeLeft = endDate - now;

                if (timeLeft <= 0) {
                    clearInterval(countdown);
                    document.getElementById('countdown').innerHTML = "<p>La période de parrainage est terminée.</p>";
                    return;
                }

                // Calcul des jours, heures, minutes et secondes
                const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
                const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

                // Affichage du compte à rebours
                document.getElementById('days').innerText = String(days).padStart(2, '0');
                document.getElementById('hours').innerText = String(hours).padStart(2, '0');
                document.getElementById('minutes').innerText = String(minutes).padStart(2, '0');
                document.getElementById('seconds').innerText = String(seconds).padStart(2, '0');
            }, 1000);
        @endif
    </script>
</body>
</html>