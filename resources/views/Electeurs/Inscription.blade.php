<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
            {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}

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
        .register-link {
            text-align: center;
            margin-top: 1rem;
            padding-top: 0;
            border-top: none;
            font-size: 14px;
            color: #555;
        }

        .register-link a {
            color: var(--primary-green);
            text-decoration: none;
            font-weight: 600;
            margin-left: 0.25rem;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
        
        /* Style pour les alertes */
        .alert {
            padding: 12px 15px;
            margin-bottom: 20px;
            border-radius: 6px;
            font-size: 14px;
            position: relative;
            animation: fadeInDown 0.5s ease-out forwards;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-left: 4px solid #28a745;
        }
        
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-left: 4px solid #dc3545;
        }
        
        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Pour faire disparaître l'alerte après quelques secondes */
        .alert.fade-out {
            animation: fadeOut 0.5s ease-in forwards;
        }
        
        @keyframes fadeOut {
            0% {
                opacity: 1;
                transform: translateY(0);
            }
            100% {
                opacity: 0;
                transform: translateY(-20px);
                display: none;
            }
        }
        
        /* Style pour le bouton suivant */
        input[type="submit"].next {
            background-color: rgb(61, 151, 109);
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        input[type="submit"].next:hover {
            background-color: rgb(44, 134, 95);
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

    <!-- Formulaire d'inscription -->
    <div class="form-container form-step active" id="step1">
        <div class="progress-bar">
            <div class="progress-step active">1</div>
            <div class="progress-step">2</div>
            <div class="progress-step">3</div>
        </div>
        <h2>Informations d'identification</h2>
        @if (session('status'))
        <div class="alert alert-success" id="successAlert">
            {{session('status')}} 
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger" id="errorAlert">
            {{ session('error') }}
        </div>
        @endif
      
        <form action="/verification" method="POST">
            @csrf
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
            <div class="register-link">
                Vous avez déjà un compte? <a href="{{ route('Parrainage') }}">Parrainez</a>
            </div>
            <div class="button-group">
                <div></div> <!-- Élément vide pour maintenir l'espacement -->
                <input type="submit" value="Suivant" class="next">
            </div>
        </form>
    </div>

    <script>
        // Script pour faire disparaître les alertes après 5 secondes
        document.addEventListener('DOMContentLoaded', function() {
            const successAlert = document.getElementById('successAlert');
            const errorAlert = document.getElementById('errorAlert');
            
            if (successAlert) {
                setTimeout(function() {
                    successAlert.classList.add('fade-out');
                    setTimeout(function() {
                        successAlert.style.display = 'none';
                    }, 500);
                }, 5000);
            }
            
            if (errorAlert) {
                setTimeout(function() {
                    errorAlert.classList.add('fade-out');
                    setTimeout(function() {
                        errorAlert.style.display = 'none';
                    }, 500);
                }, 5000);
            }
        });
    </script>
</body>
</html>