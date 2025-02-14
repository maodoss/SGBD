<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Import Fichier Électeurs</title>
  <style>
    /* Style de base */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #f4f4f4;
    }

    /* En-tête avec logo (optionnel) */
    .header {
            background: white;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            padding: 15px 0;
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
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
            margin-bottom: 0;
        }

        .logo-text p {
            font-size: 0.875rem;
            color: #4A5568;
            margin-top: 0;
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

    /* Conteneur principal */
    .container {
      max-width: 500px;
      margin: 120px auto 40px; /* Marge supérieure augmentée */
      background: #fff;
      padding: 20px 30px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 6px;
    }

    /* Titre */
    h1 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
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

    .form-group input[type="file"],
    .form-group input[type="text"] {
      width: 100%;
      padding: 8px;
      box-sizing: border-box;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    /* Bouton d’import */
    .btn-submit {
      display: inline-block;
      background:rgb(62, 150, 74);
      color: #fff;
      font-weight: bold;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      text-align: center;
      margin-top: 10px;
      font-size: 16px;
    }

    .btn-submit:hover {
      background:rgb(10, 31, 15);
    }

    /* Message d’aide */
    .help-text {
      font-size: 14px;
      color: #777;
      margin-top: 5px;
    }

    /* Responsif */
    @media (max-width: 600px) {
      .container {
        margin: 100px 20px 20px; /* Réduire la marge supérieure sur les petits écrans */
        padding: 15px;
      }
    }

  </style>
</head>
<body>

<header class="header">
        <div class="header-container">
            <a href="/dashdge" class="logo-section">
                <img src="{{ asset('image/presi.jpg') }}" alt="Logo République du Sénégal" width="50" height="50">
                <div class="logo-text">
                    <h1>République du Sénégal</h1>
                    <p>Système de Parrainage Électoral</p>
                </div>
            </a>
        </div>
    </header>

  <div class="container">
    <h1>Importer Fichier CSV</h1>

    <form action="traitement_upload" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="csv-file">Fichier CSV :</label>
        <input type="file" id="csv-file" name="temp_file" accept=".csv" required>
        <div class="help-text">
          Veuillez sélectionner le fichier CSV des électeurs.
        </div>
      </div>

      <div class="form-group">
        <label for="checksum">Checksum (SHA256) :</label>
        <input type="text" id="checksum" name="checksum" placeholder="Entrez la valeur SHA256" required>
        <div class="help-text">
          Saisissez la valeur de l’empreinte SHA256 pour vérification.
        </div>
      </div>

      <button type="submit" class="btn-submit">Charger</button>
    </form>
  </div>

</body>
</html>