<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Saisie d'un Candidat</title>
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
      white-space: nowrap;
    }
    .logout-btn:hover {
      background-color: #038d1a;
      color: #fff;
    }

    /* Conteneur principal du formulaire (margin-top compensé pour l'en-tête fixe) */
    .container {
      max-width: 600px;
      margin: 120px auto 40px; /* On laisse un espace en haut pour l'en-tête */
      background: #fff;
      padding: 20px 30px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 6px;
    }

    /* Titre principal */
    .container h1 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
      font-size: 24px;
    }

    /* Groupes de champs */
    .form-group {
      margin-bottom: 20px;
    }
    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
      color: #555;
    }
    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group input[type="tel"],
    .form-group input[type="url"],
    .form-group input[type="file"] {
      width: 100%;
      padding: 10px;
      box-sizing: border-box;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    /* Champs en lecture seule */
    .readonly-field {
      background-color: #e9ecef;
      cursor: not-allowed;
    }

    /* Boutons du formulaire (même vert) */
    .btn-check,
    .btn-submit {
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
      text-decoration: none;
    }
    .btn-check:hover,
    .btn-submit:hover {
      background: #026b13;
    }

    /* Bloc caché */
    .hidden {
      display: none;
    }

    /* Responsivité */
    @media (max-width: 600px) {
      .container {
        margin: 100px 20px 20px;
        padding: 15px;
      }
      .nav-links {
        display: none; /* On masque la barre de navigation sur mobile si besoin */
      }
    }
  </style>

  <!-- Script : simulation de vérification du numéro d'électeur -->
  <script>
    function verifierNumeroElecteur() {
      // Récupère la valeur du numéro d'électeur
      var numElecteur = document.getElementById('numero-electeur').value;

      // Simule la vérification (en réalité, requête serveur ou base de données)
      if (numElecteur.trim() !== "") {
        // Affiche le bloc "infosCandidat"
        document.getElementById('infosCandidat').classList.remove('hidden');
        // Simule le remplissage des champs
        document.getElementById('nom').value = "NDIAYE";
        document.getElementById('prenom').value = "Abdou";
        document.getElementById('dateNaiss').value = "1981-07-01";
        document.getElementById('lieuNaiss').value = "Dakar";
      } else {
        alert("Numéro d'électeur introuvable ou invalide !");
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
    <h1>Saisie d'un Candidat</h1>

    <!-- 1. Formulaire initial pour saisir le numéro d'électeur -->
    <div class="form-group">
      <label for="numero-electeur">Numéro d'électeur :</label>
      <input type="text" id="numero-electeur" name="numero-electeur" placeholder="Entrez le numéro d'électeur" required>
      <button type="button" class="btn-check" onclick="verifierNumeroElecteur()">
        Vérifier
      </button>
    </div>

    <!-- 2. Bloc caché qui apparaît après vérification du n° d'électeur -->
    <form id="infosCandidat" class="hidden" action="#" method="POST" enctype="multipart/form-data">
      
      <!-- Champs récupérés (lecture seule) -->
      <div class="form-group">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" class="readonly-field" readonly>
      </div>
      <div class="form-group">
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" class="readonly-field" readonly>
      </div>
      <div class="form-group">
        <label for="dateNaiss">Date de Naissance :</label>
        <input type="text" id="dateNaiss" name="dateNaiss" class="readonly-field" readonly>
      </div>
      <div class="form-group">
        <label for="lieuNaiss">Lieu de Naissance :</label>
        <input type="text" id="lieuNaiss" name="lieuNaiss" class="readonly-field" readonly>
      </div>

      <!-- Informations complémentaires du candidat -->
      <div class="form-group">
        <label for="email">Adresse Email :</label>
        <input type="email" id="email" name="email" placeholder="Entrez votre adresse email" required>
      </div>
      <div class="form-group">
        <label for="telephone">Numéro de Téléphone :</label>
        <input type="tel" id="telephone" name="telephone" placeholder="Entrez votre numéro de téléphone" required>
      </div>
      <div class="form-group">
        <label for="parti">Nom du Parti Politique (optionnel) :</label>
        <input type="text" id="parti" name="parti" placeholder="Entrez le nom du parti politique">
      </div>
      <div class="form-group">
        <label for="slogan">Slogan :</label>
        <input type="text" id="slogan" name="slogan" placeholder="Entrez votre slogan">
      </div>
      <div class="form-group">
        <label for="photo">Photo (format JPG/PNG) :</label>
        <input type="file" id="photo" name="photo" accept="image/*">
      </div>
      <div class="form-group">
        <label for="couleurs">Les 3 couleurs du parti (séparées par une virgule) :</label>
        <input type="text" id="couleurs" name="couleurs" placeholder="Ex: Vert,Jaune,Rouge">
      </div>
      <div class="form-group">
        <label for="urlInfos">URL de vos informations (site web ou page) :</label>
        <input type="url" id="urlInfos" name="urlInfos" placeholder="https://votresite.com">
      </div>

      <!-- Bouton final pour soumettre la candidature (vert) -->
      <button type="submit" class="btn-submit">Enregistrer la Candidature</button>
    </form>
  </div>

</body>
</html>
