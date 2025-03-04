<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi des Parrainages</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-green: #006B3F;
            --hover-green: #005432;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
        }

        .header {
            background: white;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-section {
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 1rem;
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

        .profile-menu {
            position: relative;
            cursor: pointer;
        }

        .profile-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-green);
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 18px;
            font-weight: bold;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 50px;
            background: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
            z-index: 10;
            width: 150px;
        }

        .dropdown-menu a {
            display: block;
            padding: 10px;
            color: black;
            text-decoration: none;
            font-size: 16px;
            text-align: center;
            transition: background 0.3s;
        }

        .dropdown-menu a:hover {
            background-color: var(--hover-green);
            color: white;
        }

        .dashboard {
            max-width: 1000px;
            margin: 0 auto;
            width: 100%;
            flex-grow: 1;
            padding: 20px;
        }

        .dashboard-header {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .dashboard-header h1 {
            color: rgb(48, 167, 137);
            font-size: 24px;
        }

        .total-parrainages, .chart-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .total-number {
            font-size: 48px;
            font-weight: bold;
            color: rgb(44, 155, 103);
            margin: 10px 0;
        }

        @media (max-width: 768px) {
            .total-number {
                font-size: 36px;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="logo-section">
                <img src="{{ asset('image/presi.jpg') }}" alt="Logo République du Sénégal" width="50" height="50">
                <div class="logo-text">
                    <h1>République du Sénégal</h1>
                    <p>Système de Parrainage Électoral</p>
                </div>
    </div>

            <!-- Menu de profil avec icône -->
            <div class="profile-menu">
                <div class="profile-icon" onclick="toggleMenu()">
                    <i class="fas fa-user"></i> <!-- Icône de bonhomme -->
                </div>
                <div class="dropdown-menu" id="dropdown-menu">
                    <a href="/login">Se déconnecter</a>
                </div>
            </div>
        </div>
    </header>

    <div class="dashboard">
        <div class="dashboard-header">
        <h1>Bienvenue,{{ \App\Models\candidats::find(Session::get('candidat_id'))->electeur->nom }} {{ \App\Models\candidats::find(Session::get('candidat_id'))->electeur->prenom }} </h1>
        </div>

        <div class="total-parrainages">
            <h2>Total des parrainages</h2>
            <div class="total-number">12,458</div>
        </div>

        <div class="chart-container">
            <h2>Évolution journalière des parrainages</h2>
            <canvas id="parrainage-chart"></canvas>
        </div>
    </div>

    <script>
        function toggleMenu() {
            let menu = document.getElementById('dropdown-menu');
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        }

        // Fermer le menu si on clique ailleurs
        document.addEventListener('click', function(event) {
            let menu = document.getElementById('dropdown-menu');
            let profile = document.querySelector('.profile-menu');

            if (!profile.contains(event.target)) {
                menu.style.display = 'none';
            }
        });

        // Configuration du graphique
        const ctx = document.getElementById('parrainage-chart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['1 Jan', '2 Jan', '3 Jan', '4 Jan', '5 Jan', '6 Jan', '7 Jan'],
                datasets: [{
                    label: 'Parrainages par jour',
                    data: [150, 230, 180, 0, 210, 290, 310],
                    fill: true,
                    borderColor: '#1a73e8',
                    backgroundColor: 'rgba(26, 115, 232, 0.1)',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Nombre de parrainages'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>