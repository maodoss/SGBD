<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <title>Liste des Candidats</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #f4f4f4;
    }

    .containerh {
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

    .container {
      max-width: 1200px;
      margin: 120px auto 40px;
      padding: 20px 30px;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }

    .candidats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); /* Augmenter la largeur des cartes */
      gap: 20px;
    }

    .candidat-card {
      background: white;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding: 20px;
      text-align: center;
      transition: transform 0.3s ease;
    }

    .candidat-card:hover {
      transform: scale(1.05);
    }

    .candidat-photo {
      width: 200px; /* Taille plus grande pour les photos */
      height: 200px; /* Taille plus grande pour les photos */
      border-radius: 10px; /* Carré avec des coins légèrement arrondis */
      object-fit: cover; /* Recadre l'image pour remplir le conteneur */
      margin-bottom: 15px;
      background-color: #f4f4f4; /* Couleur de fond si l'image ne remplit pas tout l'espace */
    }

    .candidat-info h2 {
      margin: 10px 0 5px;
      font-size: 1.4rem; /* Taille de police légèrement plus grande */
      color: #333;
    }

    .candidat-info p {
      margin: 5px 0;
      color: #666;
      font-size: 1rem; /* Taille de police légèrement plus grande */
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
            text-decoration: none; /* Assure que le texte n'est pas souligné */
        }

        .logo-text p {
            font-size: 0.875rem;
            color: #4A5568;
            text-decoration: none; /* Assure que le texte n'est pas souligné */
        }

    .nav-links {
      display: flex;
      gap: 2.5rem;
      align-items: center;
    }

    .nav-links a {
      color: #4A5568;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
    }
  </style>
</head>
<body>
<header class="header">
        <div class="container">
            <a href="/" class="logo-section">
                <img src="{{ asset('image/presi.jpg') }}" alt="Logo République du Sénégal" width="50" height="50">
                <div class="logo-text">
                    <h1>République du Sénégal</h1>
                    <p>Système de Parrainage Électoral</p>
                </div>
            </a>
        </div>
    </header>

  <div class="container">
    <h1>Candidats à l'Élection</h1>
    <div class="candidats-grid">
      @foreach($candidats as $candidat)
      <div class="candidat-card">
        <img src="{{ asset('storage/' . $candidat->photo) }}" alt="Photo du candidat" class="candidat-photo">
        <div class="candidat-info">
          <h2>{{ $candidat->electeur->nom }} {{ $candidat->electeur->prenom }}</h2>
          <p><strong>Parti:</strong> {{ $candidat->nom_parti }}</p>
          <p><small>{{ $candidat->couleur_parti }}</small></p>
          <p><strong>Slogan:</strong> {{ $candidat->slogan }}</p>
          <p><strong>Infos:</strong>{{ $candidat->urlInfos }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</body>
</html>