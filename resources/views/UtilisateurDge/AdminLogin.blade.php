<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion Administrateur</title>
  <style>
    /* Style global */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #f4f4f4;
    }

    /* En-tête avec logo et/ou titre */
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
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo-text h1 {
            font-size: 1.25rem;
            color: #1A202C;
            margin-bottom: 0;
            text-decoration: none; /* Assure que le texte n'est pas souligné */
        }

        .logo-text p {
            font-size: 0.875rem;
            color: #4A5568;
            text-decoration: none; /* Assure que le texte n'est pas souligné */
        }

    /* Container principal */
    .container {
      max-width: 400px;
      margin: 60px auto;
      background: #fff;
      padding: 20px 30px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 6px;
    }

    /* Titre de la page */
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
    .form-group input[type="password"] {
      width: 100%;
      padding: 10px;
      box-sizing: border-box;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    /* Bouton de connexion */
    .btn-login {
      display: block;
      width: 100%;
      background: #038d1a;
      color: #fff;
      font-weight: bold;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      text-align: center;
      font-size: 16px;
    }

    .btn-login:hover {
      background: #038d1a;
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
    <a href="/" class="logo-section">
        <img src="{{ asset('image/presi.jpg') }}" alt="Logo République du Sénégal" width="50" height="50">
        <div class="logo-text">
            <h1>République du Sénégal</h1>
            <p>Système de Parrainage Électoral</p>
        </div>
    </a>
  </header>

  <div class="container">
    <h1>Connexion Admin</h1>
    <form action="traitement_login" method="POST">
      @csrf
      <div class="form-group">
        <label for="username">Login :</label>
        <input type="text" id="username" name="email" placeholder="Entrez votre nom d'utilisateur" required>
      </div>
      <div class="form-group">
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
      </div>
      <button type="submit" class="btn-login">Se connecter</button>
    </form>
  </div>

</body>
</html>
