<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Liste des Candidats</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #f4f4f4;
    }

    .header {
      background: white;
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 1000;
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
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
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
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 15px;
    }

    .candidat-info h2 {
      margin: 10px 0 5px;
      font-size: 1.2rem;
      color: #333;
    }

    .candidat-info p {
      margin: 5px 0;
      color: #666;
      font-size: 0.9rem;
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
  <div class="header">
    <div class="containerh">
      <div class="header-content">
        <a href="#" class="logo-section">
          <img src="{{ asset('image/presi.jpg') }}" alt="Logo République du Sénégal" width="50" height="50">
          <div class="logo-text">
            <h1>République du Sénégal</h1>
            <p>Système de Parrainage Électoral</p>
          </div>
        </a>
      </div>
    </div>
  </div>

  <div class="container">
    <h1>Candidats à l'Élection</h1>
    <div class="candidats-grid">
      @foreach($candidats as $candidat)
      <div class="candidat-card">
        <img src="{{ $candidat->photo_url ?? 'default-avatar.jpg' }}" alt="{{ $candidat->electeur->nom }} {{ $candidat->electeur->prenom }}" class="candidat-photo">
        <div class="candidat-info">
          <h2>{{ $candidat->electeur->nom }} {{ $candidat->electeur->prenom }}</h2>
          <p>{{ $candidat->nom_parti }}</p>
          <p>{{ $candidat->slogan }}</p>
          <p>{{ $candidat->urlInfos }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</body>
</html>