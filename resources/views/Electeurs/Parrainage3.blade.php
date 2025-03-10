<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Validation du parrainage - République du Sénégal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <style>
      /* style.css */
:root {
    --primary-color: #00853f;
    --secondary-color: #ffd700;
    --text-color: #333;
    --background-color: #f5f5f5;
    --error-color: #dc3545;
    --success-color: #28a745;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: var(--background-color);
    color: var(--text-color);
    line-height: 1.6;
}

.header {
    background: white;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000;
}

.header-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 1rem 2rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.logo-section {
    display: flex;
    align-items: center;
    gap: 1rem;
    text-decoration: none;
}

.logo-text {
    color: var(--text-color);
}

.logo-text h1 {
    font-size: 1.25rem;
    margin: 0;
}

.logo-text p {
    font-size: 0.875rem;
    color: #666;
}

.main-container {
    max-width: 800px;
    margin: 100px auto 2rem;
    padding: 2rem;
}

.step-container {
    background: white;
    border-radius: 8px;
    padding: 2rem;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    margin-bottom: 1rem;
}

.step-title {
    color: var(--primary-color);
    margin-bottom: 1.5rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid var(--secondary-color);
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: bold;
}

.form-group input {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1rem;
}

.form-group input:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 2px rgba(0,133,63,0.1);
}

.btn {
    background-color: var(--primary-color);
    color: white;
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 1rem;
    transition: background-color 0.2s;
}

.btn:hover {
    background-color: #006b32;
}

.info-display {
    background: #f8f9fa;
    padding: 1rem;
    border-radius: 4px;
    margin-bottom: 1.5rem;
}

.info-display p {
    margin-bottom: 0.5rem;
}

.candidate-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-top: 1.5rem;
}

.candidate-card {
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    transition: transform 0.2s;
    cursor: pointer;
    position: relative;
    padding-bottom: 1rem;
}

.candidate-card:hover {
    transform: translateY(-5px);
}

.candidate-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.candidate-info {
    padding: 1rem;
}

.candidate-info h3 {
    margin-bottom: 0.5rem;
    color: var(--primary-color);
}

.verification-code {
    font-size: 1.5rem;
    letter-spacing: 0.5rem;
    text-align: center;
}

.alert {
    padding: 1rem;
    border-radius: 4px;
    margin-bottom: 1rem;
}

.alert-success {
    background-color: #d4edda;
    color: var(--success-color);
}

@media (max-width: 768px) {
    .main-container {
        margin: 80px 1rem 1rem;
        padding: 1rem;
    }

    .step-container {
        padding: 1rem;
    }

    .candidate-grid {
        grid-template-columns: 1fr;
    }
}
    </style>
</head>
<body>
    <header class="header">
        <div class="header-content">
            <a href="/dash_electeur" class="logo-section">
                <img src="image/presi.jpg" alt="Logo République du Sénégal" width="50" height="50" />
                <div class="logo-text">
                    <h1>République du Sénégal</h1>
                    <p>Système de Parrainage Électoral</p>
                </div>
            </a>
        </div>
    </header>

    <main class="main-container">
        <div class="step-container">
            <h2 class="step-title">Validation du parrainage</h2>
            <div class="alert alert-success">
                Un code de vérification a été envoyé à votre email et téléphone.
            </div>
            <form action="/" method="POST" onsubmit="alert('Parrainage enregistré avec succès !'); return false;">
                <div class="form-group">
                    <label for="code-validation">Code de validation</label>
                    <input type="text" id="code-validation" class="verification-code" maxlength="5" required>
                </div>
                <input type="submit" value="Suivant" class="btn">
                {{-- <button type="button" class="btn" onclick="window.location.href='/ListeCandidatElec'">Valider mon choix</button> --}}
            </form>
        </div>
    </main>
</body>
</html>