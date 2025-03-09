<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Détail d'un Candidat</title>
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
      background-color:#038d1a;
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
    .container {
      max-width: 600px;
      margin: 40px auto;
      background: #fff;
      padding: 20px 30px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 6px;
    }
    h1 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }
    .detail-row {
      margin-bottom: 10px;
    }
    .detail-row span {
      font-weight: bold;
    }
    .btn {
      background: #3e8ed0;
      color: #fff;
      font-weight: bold;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      margin-top: 20px;
      display: inline-block;
    }
    .btn:hover {
      background: #337ab7;
    }
    .back-link {
      display: inline-block;
      margin-top: 20px;
      text-decoration: none;
      font-weight: bold;
      color: #3e8ed0;
    }
  </style>
  <script>
    // // Données fictives pour la démonstration, identiques ou plus riches que sur la page liste
    // const candidats = [
    //   {
    //     numeroElecteur: "100000001",
    //     nom: "NDIAYE",
    //     prenom: "Abdou",
    //     dateNaissance: "1981-07-01",
    //     lieuNaissance: "Dakar",
    //     email: "abdou.ndiaye@example.com",
    //     telephone: "+221770000001",
    //     parti: "Parti Exemplar",
    //     slogan: "L'espoir d'un pays",
    //     couleurs: "Vert, Jaune, Rouge",
    //     url: "https://exemple-candidat.sn"
    //   },
    //   {
    //     numeroElecteur: "100000002",
    //     nom: "BA",
    //     prenom: "Fatou",
    //     dateNaissance: "1982-04-12",
    //     lieuNaissance: "Thies",
    //     email: "fatou.ba@example.com",
    //     telephone: "+221770000002",
    //     parti: "Union pour la Paix",
    //     slogan: "Ensemble, pour le progrès",
    //     couleurs: "Bleu, Blanc, Rouge",
    //     url: "https://fatou-ba.sn"
    //   }
    // ];

    function getQueryParam(param) {
      const urlParams = new URLSearchParams(window.location.search);
      return urlParams.get(param);
    }

    function afficherDetails() {
      // Récupère la valeur du numéro d'électeur dans l'URL, ex: "?numeroElecteur=100000001"
      const numero = getQueryParam('numeroElecteur');

      // Trouver le candidat dans le tableau local (ou faire un fetch vers votre serveur)
      const candidat = candidats.find(c => c.numeroElecteur === numero);

      if (!candidat) {
        document.getElementById("detailContainer").innerHTML = 
          "<p style='color:red;'>Candidat introuvable !</p>";
        return;
      }

      // Remplir les champs de détail
      document.getElementById("dc-numElect").textContent = candidat.numeroElecteur;
      document.getElementById("dc-nom").textContent = candidat.nom;
      document.getElementById("dc-prenom").textContent = candidat.prenom;
      document.getElementById("dc-date").textContent = candidat.dateNaissance;
      document.getElementById("dc-lieu").textContent = candidat.lieuNaissance;
      document.getElementById("dc-email").textContent = candidat.email || "N/A";
      document.getElementById("dc-tel").textContent = candidat.telephone || "N/A";
      document.getElementById("dc-parti").textContent = candidat.parti || "N/A";
      document.getElementById("dc-slogan").textContent = candidat.slogan || "N/A";
      document.getElementById("dc-couleurs").textContent = candidat.couleurs || "N/A";
      document.getElementById("dc-url").textContent = candidat.url || "N/A";
      if (candidat.url) {
        document.getElementById("dc-url").setAttribute("href", candidat.url);
      } else {
        document.getElementById("dc-url").removeAttribute("href");
      }
    }

    function genererNouveauCode() {
      alert("Un nouveau code d’authentification a été généré pour ce candidat !");
      // Ici, vous appelleriez votre API côté serveur pour la génération/envoi
    }

    window.onload = afficherDetails;
  </script>
</head>
<body>
    <div class="header">
        <div class="containerh">
          <div class="header-content">
            <a href="/dashdge" class="logo-section">
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

  <div class="container" id="detailContainer">
    <h1>Détail du Candidat</h1>

    <div class="detail-row"><span>Numéro Électeur : </span><span id="dc-numElect"></span></div>
    <div class="detail-row"><span>Nom : </span><span id="dc-nom"></span></div>
    <div class="detail-row"><span>Prénom : </span><span id="dc-prenom"></span></div>
    <div class="detail-row"><span>Date de Naissance : </span><span id="dc-date"></span></div>
    <div class="detail-row"><span>Lieu de Naissance : </span><span id="dc-lieu"></span></div>
    <div class="detail-row"><span>Email : </span><span id="dc-email"></span></div>
    <div class="detail-row"><span>Téléphone : </span><span id="dc-tel"></span></div>
    <div class="detail-row"><span>Parti Politique : </span><span id="dc-parti"></span></div>
    <div class="detail-row"><span>Slogan : </span><span id="dc-slogan"></span></div>
    <div class="detail-row"><span>Couleurs : </span><span id="dc-couleurs"></span></div>
    <div class="detail-row">
      <span>URL d'Informations : </span>
      <a href="#" target="_blank" id="dc-url"></a>
    </div>

    <button class="btn" onclick="genererNouveauCode()">Générer Nouveau Code</button>

    <!-- Lien pour revenir à la liste -->
    <br>
    <a href="Liste_candidat" class="back-link">← Retour à la liste</a>
  </div>
</body>
</html>
