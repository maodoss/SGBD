{{-- image/presi.jpg --}}
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Enregistrement de Parrainage - République du Sénégal</title>
  <style>
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

    .btn:disabled {
      background-color: #ccc;
      cursor: not-allowed;
    }

    .verification-code {
      font-size: 1.5rem;
      letter-spacing: 0.5rem;
      text-align: center;
    }

    .hidden {
      display: none;
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

    .alert-error {
      background-color: #f8d7da;
      color: var(--error-color);
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
      <a href="/" class="logo-section">
        <img src="image/presi.jpg" alt="Logo République du Sénégal" width="50" height="50" />
        <div class="logo-text">
          <h1>République du Sénégal</h1>
          <p>Système de Parrainage Électoral</p>
        </div>
      </a>
    </div>
  </header>

  <main class="main-container">
    <!-- Étape 1: Identification -->
    <div class="step-container" id="step1">
      <h2 class="step-title">Identification de l'électeur</h2>
      <div class="form-group">
        <label for="num-electeur">Numéro de carte d'électeur</label>
        <input type="text" id="num-electeur" required>
      </div>
      <div class="form-group">
        <label for="num-cni">Numéro de carte d'identité nationale</label>
        <input type="text" id="num-cni" required>
      </div>
      <button class="btn" onclick="verifierIdentite()">Vérifier</button>
    </div>

    <!-- Étape 2: Confirmation identité -->
    <div class="step-container hidden" id="step2">
      <h2 class="step-title">Confirmation d'identité</h2>
      <div class="info-display">
        <p><strong>Nom:</strong> <span id="nom"></span></p>
        <p><strong>Prénom:</strong> <span id="prenom"></span></p>
        <p><strong>Date de naissance:</strong> <span id="date-naissance"></span></p>
        <p><strong>Bureau de vote:</strong> <span id="bureau-vote"></span></p>
      </div>
      <div class="form-group">
        <label for="code-auth">Code d'authentification</label>
        <input type="text" id="code-auth" required>
      </div>
      <button class="btn" onclick="verifierAuthentification()">Valider</button>
    </div>

    <!-- Étape 3: Choix du candidat -->
    <div class="step-container hidden" id="step3">
      <h2 class="step-title">Sélection du candidat</h2>
      <div class="candidate-grid">
        <!-- Les candidats seront ajoutés dynamiquement ici -->
      </div>
    </div>

    <!-- Étape 4: Validation finale -->
    <div class="step-container hidden" id="step4">
      <h2 class="step-title">Validation du parrainage</h2>
      <div class="alert alert-success">
        Un code de vérification a été envoyé à votre email et téléphone.
      </div>
      <div class="form-group">
        <label for="code-validation">Code de validation (5 chiffres)</label>
        <input type="text" id="code-validation" class="verification-code" maxlength="5" required>
      </div>
      <button class="btn" onclick="validerParrainage()">Valider mon choix</button>
    </div>

    <!-- Confirmation finale -->
    <div class="step-container hidden" id="confirmation">
      <h2 class="step-title">Parrainage enregistré</h2>
      <div class="alert alert-success">
        Votre parrainage a été enregistré avec succès. Un code de vérification vous a été envoyé par SMS et email.
      </div>
      <p>Conservez ce code pour vérifier ultérieurement votre choix de parrainage.</p>
    </div>
  </main>

  <script>
    function verifierIdentite() {
      // Simulation de vérification
      document.getElementById('step1').classList.add('hidden');
      document.getElementById('step2').classList.remove('hidden');
      
      // Simuler les données de l'électeur
      document.getElementById('nom').textContent = 'DIOP';
      document.getElementById('prenom').textContent = 'Mamadou';
      document.getElementById('date-naissance').textContent = '15/03/1980';
      document.getElementById('bureau-vote').textContent = 'Centre de vote de Dakar';
    }

    function verifierAuthentification() {
      // Simulation de vérification du code
      document.getElementById('step2').classList.add('hidden');
      document.getElementById('step3').classList.remove('hidden');
      
      // Simuler l'affichage des candidats
      const candidateGrid = document.querySelector('.candidate-grid');
      const candidates = [
        { nom: 'Candidat 1', slogan: 'Pour un Sénégal meilleur', couleurs: 'Vert, Jaune, Rouge' },
        { nom: 'Candidat 2', slogan: 'Ensemble pour l\'avenir', couleurs: 'Bleu, Blanc, Rouge' },
        // Ajouter plus de candidats ici
      ];

      candidates.forEach(candidate => {
        const card = `
          <div class="candidate-card" onclick="selectionnerCandidat(this)">
            <img src="/api/placeholder/250/200" alt="${candidate.nom}">
            <div class="candidate-info">
              <h3>${candidate.nom}</h3>
              <p>${candidate.slogan}</p>
              <p><small>Couleurs: ${candidate.couleurs}</small></p>
            </div>
          </div>
        `;
        candidateGrid.innerHTML += card;
      });
    }

    function selectionnerCandidat(element) {
      // Retirer la sélection précédente
      document.querySelectorAll('.candidate-card').forEach(card => {
        card.style.border = 'none';
      });
      
      // Marquer le candidat sélectionné
      element.style.border = '2px solid var(--primary-color)';
      
      // Passer à l'étape de validation
      document.getElementById('step3').classList.add('hidden');
      document.getElementById('step4').classList.remove('hidden');
    }

    function validerParrainage() {
      // Simulation de validation finale
      document.getElementById('step4').classList.add('hidden');
      document.getElementById('confirmation').classList.remove('hidden');
    }
  </script>
</body>
</html>