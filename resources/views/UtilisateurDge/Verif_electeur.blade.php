<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Vérification du Numéro d'Électeur</title>
  <style>
    /* Style global */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #f4f4f4;
    }

    /* En-tête fixe */
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

    /* Logo */
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

    /* Barre de navigation */
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
    .nav-links a:hover {
      color: #038d1a;
    }

    .logout-btn {
      background-color: #038d1a;
      color: #fff;
      padding: 0.75rem 1.5rem;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 500;
      transition: background-color 0.3s ease;
    }
    
    /* Conteneur principal */
    .container {
      max-width: 600px;
      margin: 120px auto 40px;
      background: #fff;
      padding: 20px 30px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 6px;
    }

    /* Titre */
    .container h1 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
      font-size: 24px;
    }

    /* Formulaire */
    .form-group {
      margin-bottom: 20px;
    }
    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
      color: #555;
    }
    .form-group input[type="text"] {
      width: 100%;
      padding: 10px;
      box-sizing: border-box;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .btn-check {
      display: inline-block;
      background: #038d1a;
      color: #fff;
      font-weight: bold;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      text-align: center;
      font-size: 16px;
      margin-top: 10px;
    }
    .btn-check:hover {
      background: #026b13;
    }
  </style>

  <script>
    function verifierNumeroElecteur() {
      var numElecteur = document.getElementById('numero-electeur').value;
      
      if (numElecteur.trim() !== "") {
        // Simulons une requête au serveur
        // En production, ceci serait une vraie requête AJAX
        
        // Redirection vers la page de saisie avec le numéro d'électeur en paramètre
        window.location.href = '/saisie_candidat?numero=' + encodeURIComponent(numElecteur);
      } else {
        alert("Veuillez entrer un numéro d'électeur valide !");
      }
    }
  </script>
</head>

<body>
  <!-- En-tête fixe -->
  <div class="header">
    <div class="containerh">
      <div class="header-content">
        <a href="/" class="logo-section">
          <img src="{{ asset('image/presi.jpg') }}" alt="Logo République du Sénégal" width="50" height="50">
          <div class="logo-text">
            <h1>République du Sénégal</h1>
            <p>Système de Parrainage Électoral</p>
          </div>
        </a>
        <nav class="nav-links">
          <a href="/dashdge">Dashboard</a>
          <a href="/Liste_candidat">Liste des candidats</a>
          <a href="/AdminLogin" class="logout-btn">Se déconnecter</a>
        </nav>
      </div>
    </div>
  </div>

  <div class="container">
    <h1>Vérification du Numéro d'Électeur</h1>
    
    <div class="form-group">
      <label for="numero-electeur">Numéro d'électeur :</label>
      <input type="text" id="numero-electeur" name="numero-electeur" placeholder="Entrez le numéro d'électeur" required>
      <button type="button" class="btn-check" onclick="verifierNumeroElecteur()">
        Vérifier
      </button>
    </div>
  </div>
</body>
</html>