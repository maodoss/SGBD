<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Électeur</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
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
            background-color:rgb(59, 179, 109);
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
            border-color:rgb(44, 134, 107);
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
            background-color:rgb(61, 151, 109);
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
    <!-- Premier formulaire -->
    <div class="container form-step active" id="step1">
        <div class="progress-bar">
            <div class="progress-step active">1</div>
            <div class="progress-step">2</div>
            <div class="progress-step">3</div>
        </div>
        <h2>Informations d'identification</h2>
        <form action="/register" method="POST">
            <div class="form-group">
                <label for="voter_card">Numéro de carte d'électeur</label>
                <input type="text" id="voter_card" name="voter_card" required>
            </div>
            <div class="form-group">
                <label for="national_id">Numéro de carte d'identité nationale</label>
                <input type="text" id="national_id" name="national_id" required>
            </div>
            <div class="form-group">
                <label for="family_name">Nom de famille</label>
                <input type="text" id="family_name" name="family_name" required>
            </div>
            <div class="form-group">
                <label for="voting_office">Numéro du bureau de vote</label>
                <input type="text" id="voting_office" name="voting_office" required>
            </div>
            <div class="button-group">
            <div class="register-link">
                    Vous avez un compte ?<a href="{{ route('login') }}">Se connecter</a>
                </div>
                <div></div>
                <button type="button" class="next" onclick="window.location.href='form2.html'">Suivant</button>
            </div>
        </form>
    </div>

    <!-- Deuxième formulaire -->
    <div class="container form-step" id="step2">
        <div class="progress-bar">
            <div class="progress-step active">1</div>
            <div class="progress-step active">2</div>
            <div class="progress-step">3</div>
        </div>
        <h2>Informations de contact</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="phone">Numéro de téléphone</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="button-group">
                <button type="button" class="previous" onclick="window.location.href='form1.html'">Précédent</button>
                <button type="button" class="next" onclick="window.location.href='form3.html'">Suivant</button>
            </div>
        </form>
    </div>

    <!-- Troisième formulaire -->
    <div class="container form-step" id="step3">
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
                <button type="button" class="previous" onclick="window.location.href='form2.html'">Précédent</button>
                <button type="submit" class="next">Finaliser l'inscription</button>
            </div>
        </form>
    </div>
</body>
</html>