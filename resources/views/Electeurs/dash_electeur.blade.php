<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord - République du Sénégal</title>
    <style>
        :root {
            --primary-color: #00853f;
            --secondary-color: #ffd700;
            --text-color: #333;
            --background-color: #f5f5f5;
            --error-color:rgb(39, 151, 57);
            --success-color: #28a745;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
        }

        .header {
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 1rem;
            text-decoration: none;
        }

        .logo-text {
            color: var(--text-color);
        }

        .logo-text h1 {
            font-size: 1.25rem;
            margin: 0;
        }

        .logo-text p {
            font-size: 0.875rem;
            color: #666;
        }

        .user-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-info {
            text-align: right;
            font-size: 0.9rem;
        }

        .btn-logout {
            background-color: var(--error-color);
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 0.9rem;
            transition: background-color 0.2s;
        }

        .btn-logout:hover {
            background-color:rgb(4, 27, 8);
        }

        .main-container {
            max-width: 800px;
            margin: 100px auto 2rem;
            padding: 2rem;
        }

        .welcome-card {
            background: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            text-align: center;
        }

        .welcome-title {
            color: var(--primary-color);
            margin-bottom: 1rem;
            font-size: 1.8rem;
        }

        .status-card {
            background: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            text-align: center;
        }

        .status-message {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            padding: 1rem;
            border-radius: 4px;
        }

        .status-message.not-sponsored {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-message.sponsored {
            background-color: #d4edda;
            color: var(--success-color);
        }

        .btn-sponsor {
            background-color: var(--primary-color);
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1.2rem;
            transition: background-color 0.2s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-sponsor:hover {
            background-color: #006b32;
        }

        .info-section {
            background: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .info-title {
            color: var(--primary-color);
            margin-bottom: 1rem;
            font-size: 1.2rem;
            border-bottom: 2px solid var(--secondary-color);
            padding-bottom: 0.5rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .info-item {
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 4px;
        }

        .info-label {
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        @media (max-width: 768px) {
            .main-container {
                margin: 80px 1rem 1rem;
                padding: 1rem;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .header-content {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }

            .user-actions {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-content">
            <a class="logo-section">
                <img src="image/presi.jpg" alt="Logo République du Sénégal" width="50" height="50" />
                <div class="logo-text">
                    <h1>République du Sénégal</h1>
                    <p>Système de Parrainage Électoral</p>
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}} 
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger">
                      {{-- {{ $errors->first('error') }} --}}
                      {{ session('error') }}
                    </div>
                    @endif
                  
                </div>
            </a>
            <div class="user-actions">
                <a href="/" class="btn-logout">Déconnexion</a>
            </div>
        </div>
    </header>

    <main class="main-container">
        <div class="welcome-card">
            <h1 class="welcome-title">Bienvenue, sur le site de parrainage</h1>
        </div>

        <!-- Version non parrainée -->
        <div class="status-card">
            <div class="status-message not-sponsored">
                Vous n'avez pas encore effectué de parrainage pour les élections présidentielles de 2024.
            </div>
            <a href="Parrainage" class="btn-sponsor">
                Parrainer un candidat
            </a>
        </div>

        <!-- Version déjà parrainé (à afficher à la place du bloc précédent si l'électeur a déjà parrainé) -->
        <!--
        <div class="status-card">
            <div class="status-message sponsored">
                Vous avez déjà parrainé un candidat pour les élections présidentielles de 2024.
                <p style="margin-top: 1rem">
                    <strong>Date du parrainage :</strong> 15 février 2024<br>
                    <strong>Numéro de vérification :</strong> #12345
                </p>
            </div>
        </div>
        -->

    </main>
</body>
</html>