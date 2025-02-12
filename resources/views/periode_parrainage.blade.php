<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ouverture de la Période de Parrainage</title>
  <style>
    /* Style global */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #f4f4f4;
    }

    /* En-tête */
    header {
      background-color: #fff;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 20px;
      box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
    }

    /* Logo */
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

    /* Container principal */
    .container {
      max-width: 500px;
      margin: 40px auto;
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

    .form-group input[type="date"] {
      width: 100%;
      padding: 8px;
      box-sizing: border-box;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    /* Bouton de validation */
    .btn-submit {
      display: inline-block;
      background: #089e35;
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

    /* Message d’aide ou d’erreur (optionnel) */
    .help-text {
      font-size: 14px;
      color: #777;
      margin-top: 4px;
    }

    /* Responsivité simple */
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
    <!-- Placez ici votre logo (modifiez le src pour pointer vers votre fichier) -->
    <div class="logo-section">
      <img src="{{ asset('image/presi.jpg') }}" alt="Logo République du Sénégal" width="50" height="50">
          <div class="logo-text">
              <h1>République du Sénégal</h1>
              <p>Système de Parrainage Électoral</p>
          </div>
      </div>

  </header>

  <div class="container">
    <h1>Ouverture de la Période de Parrainage</h1>
    <form>
      <div class="form-group">
        <label for="start-date">Date de Début :</label>
        <input type="date" id="start-date" name="start-date" required>
        <div class="help-text">
          Veuillez sélectionner une date de début (au moins 6 mois après la date actuelle).
        </div>
      </div>

      <div class="form-group">
        <label for="end-date">Date de Fin :</label>
        <input type="date" id="end-date" name="end-date" required>
        <div class="help-text">
          Veuillez sélectionner une date de fin (supérieure ou égale à la date de début).
        </div>
      </div>

      <button type="submit" class="btn-submit">Enregistrer</button>
    </form>
  </div>

</body>
</html>
