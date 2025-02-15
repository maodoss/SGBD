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

    /* Bouton "Se déconnecter" en vert, texte blanc */
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
      background-color: #026b13; /* Teinte plus sombre au survol */
    }

    /* Logo et texte */
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

    /* Conteneur principal (avec marge-top pour éviter chevauchement) */
    .container {
      max-width: 800px;
      margin: 120px auto 40px; /* 120px en haut pour ne pas être derrière l'en-tête fixe */
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

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    th, td {
      text-align: left;
      padding: 12px;
      border-bottom: 1px solid #ccc;
    }
    th {
      background-color: #f9f9f9;
    }

    /* Bouton "Voir détails" */
    .btn-detail {
      background: #3e8ed0;
      color: #fff;
      font-weight: bold;
      padding: 8px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      text-align: center;
      font-size: 14px;
      text-decoration: none;
    }
    .btn-detail:hover {
      background: #337ab7;
    }
  </style>

  <script>
    // Liste d’exemple. En pratique, ces données seraient reçues d’un serveur
    const candidats = [
      {
        numeroElecteur: "100000001",
        nom: "NDIAYE",
        prenom: "Abdou",
        dateNaissance: "1981-07-01",
        lieuNaissance: "Dakar"
      },
      {
        numeroElecteur: "100000002",
        nom: "BA",
        prenom: "Fatou",
        dateNaissance: "1982-04-12",
        lieuNaissance: "Thies"
      }
    ];

    function chargerListe() {
      const tbody = document.getElementById('candidatsBody');
      candidats.forEach((cand) => {
        const tr = document.createElement('tr');

        // Colonne Numéro Électeur
        const tdNum = document.createElement('td');
        tdNum.textContent = cand.numeroElecteur;
        tr.appendChild(tdNum);

        // Colonne Nom
        const tdNom = document.createElement('td');
        tdNom.textContent = cand.nom;
        tr.appendChild(tdNom);

        // Colonne Prénom
        const tdPrenom = document.createElement('td');
        tdPrenom.textContent = cand.prenom;
        tr.appendChild(tdPrenom);

        // Colonne Action (lien vers detail_candidat.html)
        const tdAction = document.createElement('td');
        // On crée un lien avec le paramètre numeroElecteur dans l’URL
        const lienDetail = document.createElement('a');
        lienDetail.href = `detail_candidat.html?numeroElecteur=${cand.numeroElecteur}`;
        lienDetail.textContent = "Voir détails";
        lienDetail.className = "btn-detail";
        tdAction.appendChild(lienDetail);

        tr.appendChild(tdAction);
        tbody.appendChild(tr);
      });
    }

    window.onload = chargerListe;
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

  <!-- Conteneur principal -->
  <div class="container">
    <h1>Liste des Candidats Enregistrés</h1>

    <table>
      <thead>
        <tr>
          <th>Numéro Électeur</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="candidatsBody">
        <!-- Le tableau sera rempli par JS -->
      </tbody>
    </table>
  </div>
</body>
</html>
