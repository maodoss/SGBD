<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Électeur</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-green: #006B3F;
            --hover-green: #005432;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            padding-top: 100px; /* Ajouté pour éviter que le contenu soit caché sous l'en-tête */
        }

        /* Styles de l'en-tête */
        .header {
            background: white;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .container {
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

        .logo-section {
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
        
        .logo-section {
            text-decoration: none;
        }
        
        .logo-section:hover {
            text-decoration: none;
        }


        .login-btn {
            background-color: var(--primary-green);
            color: #ffffff !important;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.3s ease;
            white-space: nowrap;
        }

        .login-btn:hover {
            background-color: var(--hover-green);
            color: #ffffff;
        }

        /* Styles du formulaire */
        .form-container {
            max-width: 500px;
            margin: 0 auto;
            margin-top: 20px;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .progress-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            position: relative;
        }

        .progress-step {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            z-index: 2;
        }

        .progress-step.active {
            background-color: rgb(59, 179, 109);
        }

        .progress-bar::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 2px;
            background-color: #e0e0e0;
            transform: translateY(-50%);
            z-index: 1;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        input:focus {
            outline: none;
            border-color: rgb(44, 134, 107);
            box-shadow: 0 0 0 2px rgba(41, 161, 131, 0.2);
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }

        button {
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button.next {
            background-color: rgb(61, 151, 109);
            color: white;
        }

        button.previous {
            background-color: #e0e0e0;
            color: #333;
        }

        button:hover {
            opacity: 0.9;
        }

        .form-step {
            display: none;
        }

        .form-step.active {
            display: block;
        }

        .message {
            text-align: center;
            color: #666;
            margin-top: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <!-- En-tête -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <a href="/" class="logo-section">
                    <img src="{{ asset('image/presi.jpg') }}" alt="Logo République du Sénégal" width="50" height="50">
                    <div class="logo-text">
                        <h1>République du Sénégal</h1>
                        <p>Système de Parrainage Électoral</p>
                    </div>
                </a>
            </div>
        </div>
    </header>

    <div class="form-container form-step active" id="step3">
        <div class="progress-bar">
            <div class="progress-step active">1</div>
            <div class="progress-step active">2</div>
            <div class="progress-step active">3</div>
        </div>
        <h2>Vérification</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="auth_code">Code d'authentification</label>
                <input type="text" id="auth_code" name="auth_code" required>
            </div>
            <p class="message">Un code d'authentification a été envoyé sur votre téléphone et email.</p>
            <div class="button-group">
                <button type="button" class="previous" onclick="window.location.href='/Inscription2'">Précédent</button>
                <button type="submit" class="next">Finaliser l'inscription</button>
            </div>
        </form>
    </div>
</body>
</html>