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
    header {
      background-color: #fff;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 20px;
      box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
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
      margin: 40px auto;
      background: #fff;
      padding: 20px 30px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
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
      background: #017e12;
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
      background: #337ab7;
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
        margin: 20px;
        padding: 15px;
      }
    }

  </style>
</head>
<body>

  <header>
    <div class="logo-section">
        <img src="{{ asset('image/presi.jpg') }}" alt="Logo République du Sénégal" width="50" height="50">
            <div class="logo-text">
                <h1>République du Sénégal</h1>
                <p>Système de Parrainage Électoral</p>
            </div>
        </div>
  </header>

  <div class="container">
    <h1>Importer Fichier CSV</h1>

    <form action="#" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="csv-file">Fichier CSV :</label>
        <input type="file" id="csv-file" name="csv-file" accept=".csv" required>
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