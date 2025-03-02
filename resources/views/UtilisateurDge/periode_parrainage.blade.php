<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ouverture de la Période de Parrainage</title>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('periodeParrainageForm');
            const startDate = document.getElementById('start-date');
            const endDate = document.getElementById('end-date');
            const startDateError = document.getElementById('start-date-error');
            const endDateError = document.getElementById('end-date-error');

            // Calculer la date minimum (6 mois à partir d'aujourd'hui)
            const today = new Date();
            const minDate = new Date(today.setMonth(today.getMonth() + 6));
            startDate.min = minDate.toISOString().split('T')[0];

            startDate.addEventListener('change', function() {
                endDate.min = this.value;
                validateDates();
            });

            endDate.addEventListener('change', validateDates);

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

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                validateDates();

                if (!startDateError.textContent && !endDateError.textContent) {
                    // Soumission du formulaire si tout est valide
                    form.submit(); // Soumission du formulaire
                }
            });
        });
    </script>
</body>
</html>