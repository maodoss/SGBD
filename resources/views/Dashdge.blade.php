<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard DGE</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

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
        }

        .logo-text h1 {
            font-size: 1.25rem;
            color: #1A202C;
        }

        .logo-text p {
            font-size: 0.875rem;
            color: #4A5568;
        }

        body {
            background-color: #f0f2f5;
            min-height: 100vh;
            padding-top: 100px;
        }

        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .dashboard-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            color: inherit;
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 1.2rem;
            color: rgb(48, 167, 137);
            margin-bottom: 10px;
        }

        .card-description {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logout-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgb(51, 133, 55);
            color: white;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            position: relative;
        }

        .logout-btn:hover::after {
            content: 'Se déconnecter';
            position: absolute;
            right: 50px;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 14px;
            white-space: nowrap;
        }

        .logout-btn:hover {
            background-color: rgb(3, 26, 11);
        }

        .welcome-section {
            background: linear-gradient(135deg, rgb(48, 167, 137), rgb(31, 107, 57));
            padding: 40px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            color: white;
        }

        .welcome-section h2 {
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .welcome-section p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .header-content {
                padding: 0 15px;
            }

            .welcome-section {
                padding: 30px;
            }

            .welcome-section h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo-section">
                    <img src="{{ asset('image/presi.jpg') }}" alt="Logo République du Sénégal" width="50" height="50">
                    <div class="logo-text">
                        <h1>République du Sénégal</h1>
                        <p>Système de Parrainage Électoral</p>
                    </div>
                </div>
                <div class="header-right">
                    <button class="logout-btn">
                        <i class="fas fa-user"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main class="main-content">
        <div class="welcome-section">
            <h2>Bienvenue sur le tableau de bord DGE</h2>
            <p>Gérez les parrainages et les candidatures pour les élections présidentielles.</p>
        </div>

        <div class="dashboard-grid">
            <a href="#" class="dashboard-card">
                <h3 class="card-title">Import Liste Électorale</h3>
                <p class="card-description">
                    Importez et validez le fichier CSV contenant la liste des électeurs avec vérification CHECKSUM.
                </p>
            </a>

            <a href="#" class="dashboard-card">
                <h3 class="card-title">Gestion des Candidats</h3>
                <p class="card-description">
                    Enregistrez et gérez les informations des candidats demandant un parrainage.
                </p>
            </a>

            <a href="/periode_parrainage" class="dashboard-card">
                <h3 class="card-title">Période de Parrainage</h3>
                <p class="card-description">
                    Définissez les dates de début et de fin de la période de parrainage.
                </p>
            </a>
        </div>
    </main>
</body>
</html>