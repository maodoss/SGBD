<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ouverture de la Période de Parrainage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f0f2f5;
            min-height: 100vh;
            padding-top: 80px;
        }

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
        }

        .logo-text p {
            font-size: 0.875rem;
            color: #4A5568;
        }

        .form-container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            color: rgb(48, 167, 137);
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.8rem;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            color: #2D3748;
            font-weight: 600;
            font-size: 1rem;
        }

        .date-input-wrapper {
            position: relative;
        }

        .date-input-wrapper i {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: rgb(48, 167, 137);
        }

        .form-control {
            width: 100%;
            padding: 12px 35px 12px 15px;
            border: 2px solid #E2E8F0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: rgb(48, 167, 137);
            box-shadow: 0 0 0 3px rgba(48, 167, 137, 0.2);
        }

        .help-text {
            font-size: 0.875rem;
            color: #718096;
            margin-top: 8px;
        }

        .btn-submit {
            width: 100%;
            background: rgb(48, 167, 137);
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-submit:hover {
            background: rgb(38, 147, 117);
            transform: translateY(-1px);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .error-message {
            color: #E53E3E;
            font-size: 0.875rem;
            margin-top: 8px;
            display: none;
        }

        /* Styles pour la notification de succès */
        .notification-box {
            position: fixed;
            top: 100px;
            right: 20px;
            background-color: rgb(48, 167, 137);
            color: white;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            gap: 10px;
            z-index: 1100;
            transform: translateX(120%);
            transition: transform 0.4s ease-in-out;
            max-width: 350px;
        }

        .notification-box.show {
            transform: translateX(0);
        }

        .notification-box i {
            font-size: 1.5rem;
        }

        .notification-content {
            flex-grow: 1;
        }

        .notification-title {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .notification-message {
            font-size: 0.875rem;
            opacity: 0.9;
        }

        .notification-close {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 1.2rem;
            opacity: 0.7;
            transition: opacity 0.2s;
        }

        .notification-close:hover {
            opacity: 1;
        }

        @media (max-width: 768px) {
            .form-container {
                margin: 20px;
                padding: 20px;
            }

            .header-container {
                padding: 0 15px;
            }

            .form-title {
                font-size: 1.5rem;
            }

            .notification-box {
                right: 10px;
                left: 10px;
                max-width: calc(100% - 20px);
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

    <main>
        <div class="form-container">
            <h1 class="form-title">Ouverture de la Période de Parrainage</h1>
            <!-- Formulaire avec action et méthode -->
            <form action="{{ route('periode.store') }}" method="POST" id="periodeParrainageForm">
                @csrf
                <div class="form-group">
                    <label for="start-date">Date de Début</label>
                    <div class="date-input-wrapper">
                        <input type="date" id="start-date" name="date_debut" class="form-control" required>
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="help-text">La date doit être au moins 6 mois après la date actuelle</div>
                    <div class="error-message" id="start-date-error"></div>
                </div>

                <div class="form-group">
                    <label for="end-date">Date de Fin</label>
                    <div class="date-input-wrapper">
                        <input type="date" id="end-date" name="date_fin" class="form-control" required>
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="help-text">Doit être postérieure à la date de début</div>
                    <div class="error-message" id="end-date-error"></div>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i>
                    Enregistrer la période
                </button>
            </form>
        </div>
    </main>

    <!-- Notification box -->
    <div class="notification-box" id="successNotification">
        <i class="fas fa-check-circle"></i>
        <div class="notification-content">
            <div class="notification-title">Succès!</div>
            <div class="notification-message">La période de parrainage a été enregistrée avec succès.</div>
        </div>
        <button class="notification-close" id="closeNotification">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('periodeParrainageForm');
            const startDate = document.getElementById('start-date');
            const endDate = document.getElementById('end-date');
            const startDateError = document.getElementById('start-date-error');
            const endDateError = document.getElementById('end-date-error');
            const successNotification = document.getElementById('successNotification');
            const closeNotification = document.getElementById('closeNotification');

            // Calculer la date minimum (6 mois à partir d'aujourd'hui)
            const today = new Date();
            const minDate = new Date(today.setMonth(today.getMonth() + 6));
            startDate.min = minDate.toISOString().split('T')[0];

            startDate.addEventListener('change', function() {
                endDate.min = this.value;
                validateDates();
            });

            endDate.addEventListener('change', validateDates);
            
            // Fermer la notification
            closeNotification.addEventListener('click', function() {
                successNotification.classList.remove('show');
            });

            function validateDates() {
                const start = new Date(startDate.value);
                const end = new Date(endDate.value);
                const valid = start <= end;

                if (!valid && endDate.value) {
                    endDateError.textContent = 'La date de fin doit être postérieure à la date de début';
                    endDateError.style.display = 'block';
                } else {
                    endDateError.style.display = 'none';
                }
            }

            // Si on reçoit un paramètre success dans l'URL, afficher la notification
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('success') === 'true') {
                showSuccessNotification();
            }

            form.addEventListener('submit', function(e) {
                // Pour démonstration seulement - dans un environnement réel, vous utiliseriez la redirection côté serveur
                // avec un paramètre success=true dans l'URL après la soumission et le traitement du formulaire
                if (startDate.value && endDate.value) {
                    if (e.submitter === form.querySelector('.btn-submit')) {
                        e.preventDefault(); // Prévenir la soumission réelle pour démonstration
                        
                        // Simulation d'une soumission réussie
                        setTimeout(function() {
                            showSuccessNotification();
                            // Réinitialiser le formulaire après "soumission"
                            form.reset();
                        }, 500);
                    }
                }
            });

            function showSuccessNotification() {
                successNotification.classList.add('show');
                
                // Masquer la notification après 5 secondes
                setTimeout(function() {
                    successNotification.classList.remove('show');
                }, 5000);
            }
        });
    </script>
</body>
</html>