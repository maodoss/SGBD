<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Système de Parrainage - République du Sénégal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-green: #006B3F;
            --secondary-green: #008D52;
            --hover-green: #005432;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Header Styles */
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

        .nav-links {
            display: flex;
            gap: 2.5rem;
            align-items: center;
        }

        .nav-links a {
            color: #4A5568;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: var(--primary-green);
        }

        /* Hero Section */
        .hero {
            height: 600px;
            position: relative;
            margin-top: 80px;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('../image/palaispresi.jpg');
            background-size: cover;
            background-position: center;
        }

        .hero-content {
            height: 100%;
            display: flex;
            align-items: center;
        }

        .hero-text {
            color: white;
            max-width: 600px;
        }

        .hero-text h2 {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .hero-text p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .button-group {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 1rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
        }

        .btn-primary {
            background: var(--primary-green);
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background: var(--hover-green);
        }

        .btn-secondary {
            background: white;
            color: var(--primary-green);
            border: 1px solid var(--primary-green);
        }

        .btn-secondary:hover {
            background: #f8f9fa;
        }

        /* Login Button */
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

        /* Services Section */
        .services {
            padding: 5rem 0;
            background: #f8f9fa;
        }

        .services h3 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 3rem;
            color: #1A202C;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .service-card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .service-card i {
            font-size: 2.5rem;
            color: var(--primary-green);
            margin-bottom: 1.5rem;
        }

        .service-card h4 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #1A202C;
        }

        .service-card p {
            color: #4A5568;
            line-height: 1.6;
        }

        /* Footer */
        .footer {
            background: #1A202C;
            color: white;
            padding: 4rem 0;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
        }

        .footer-section h5 {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.75rem;
        }

        .footer-section a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: #48BB78;
        }

        .contact-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .service-link {
            text-decoration: none;
            color: inherit;
        }

        .service-link:hover .service-card {
            transform: scale(1.05);
            transition: 0.3s;
        }

        /* How it Works Section */
        .how-it-works {
            padding: 5rem 0;
            background: white;
        }

        .how-it-works h3 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 3rem;
            color: #1A202C;
        }

        .steps-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .step {
            display: flex;
            margin-bottom: 3rem;
            align-items: flex-start;
        }

        .step-number {
            background-color: var(--primary-green);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin-right: 1.5rem;
            flex-shrink: 0;
        }

        .step-content {
            flex-grow: 1;
        }

        .step-content h4 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: #1A202C;
        }

        .step-content p {
            color: #4A5568;
            line-height: 1.6;
            margin-bottom: 0.5rem;
        }

        .step-content .note {
            background-color: #f8f9fa;
            padding: 1rem;
            border-left: 4px solid var(--primary-green);
            margin-top: 1rem;
            font-size: 0.9rem;
        }

        .divider {
            width: 2px;
            height: 40px;
            background-color: #e2e8f0;
            margin-left: 24px;
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .hero-text h2 {
                font-size: 2.5rem;
            }

            .button-group {
                flex-direction: column;
            }

            .services-grid {
                grid-template-columns: 1fr;
            }

            .step {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .step-number {
                margin-right: 0;
                margin-bottom: 1rem;
            }

            .divider {
                width: 2px;
                height: 40px;
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo-section">
                    <img src="{{ asset('image/presi.jpg') }}" alt="Logo République du Sénégal" width="50" height="50">
                    <div class="logo-text">
                        <h1>République du Sénégal</h1>
                        <p>Système de Parrainage Électoral</p>
                    </div>
                </div>
                <nav class="nav-links">
                    <a href="#Acceuil">Accueil</a>
                    <a href="#howItWorks">Comment ça marche</a>
                    <a href="#service">Services disponibles</a>
                    <a href="#contact">Contact</a>
                    {{-- <a href="/login" class="login-btn">Se connecter</a>
                    <a href="/inscription" class="login-btn">S'inscrire</a> --}}
                </nav>
            </div>
        </div>
    </header>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 80px;">
            <div class="container">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 80px;">
            <div class="container">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <section class="hero" id="Acceuil">
        <div class="container">
            @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}} 
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <div class="hero-content">
                <div class="hero-text">
                    <h2>Plateforme de Parrainage Électoral</h2>
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}} 
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    <p>Participez au processus démocratique en parrainant votre candidat pour l'élection présidentielle</p>
                    <div class="button-group">
                        <a href="Parrainage" class="btn btn-primary">
                            Parrainer un candidat
                            <i class="fas fa-chevron-right" style="margin-left: 0.5rem;"></i>
                        </a>
                        <a href="View_candidats" class="btn btn-secondary">
                            Consulter les candidats
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Nouvelle section "Comment ça marche" -->
    <section id="howItWorks" class="how-it-works">
        <div class="container">
            <h3>Comment ça marche ?</h3>
            <div class="steps-container">
                <div class="step">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h4>Activation de votre compte</h4>
                        <p>Commencez par activer votre compte en utilisant votre numéro de carte d'électeur, votre numéro de CNI, votre nom de famille et votre bureau de vote.</p>
                        <p>Une vérification sera effectuée pour confirmer votre identité sur les listes électorales.</p>
                        <div class="note">
                            <i class="fas fa-info-circle"></i> Cette étape est nécessaire une seule fois et sécurise le processus de parrainage.
                        </div>
                    </div>
                </div>
                
                <div class="divider"></div>
                
                <div class="step">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h4>Validation de vos coordonnées</h4>
                        <p>Renseignez votre numéro de téléphone et votre adresse email.</p>
                        <p>Un code de validation vous sera envoyé par email pour confirmer votre identité.</p>
                        <div class="note">
                            <i class="fas fa-info-circle"></i> Veillez à fournir une adresse email valide que vous consultez régulièrement.
                        </div>
                    </div>
                </div>
                
                <div class="divider"></div>
                
                <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h4>Choix de votre candidat</h4>
                        <p>Consultez la liste des candidats à l'élection présidentielle et choisissez celui que vous souhaitez parrainer.</p>
                        <p>Vous ne pouvez parrainer qu'un seul candidat conformément à la loi électorale.</p>
                    </div>
                </div>
                
                <div class="divider"></div>
                
                <div class="step">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <h4>Confirmation du parrainage</h4>
                        <p>Un nouveau code de validation vous sera envoyé pour confirmer votre parrainage.</p>
                        <p>Après confirmation, votre parrainage sera officiellement enregistré et ne pourra plus être modifié.</p>
                        <div class="note">
                            <i class="fas fa-exclamation-circle"></i> Le parrainage est définitif et ne peut être révoqué ou modifié après validation.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="service" class="services">
        <div class="container">
            <h3>Services disponibles</h3>
            <div class="services-grid">
                <a href="inscription" class="service-link">
                    <div class="service-card">
                        <i class="fas fa-user"></i>
                        <h4>Activer son Compte</h4>
                        <p>Inscrivez-vous en tant qu'électeur pour participer au parrainage</p>
                    </div>
                </a>
                <a href="affiche_periode" class="service-link">
                <div class="service-card">
                    <i class="fas fa-calendar"></i>
                    <h4>Période de parrainage</h4>
                    <p>Consultez les dates importantes du processus de parrainage</p>
                </div>
                </a>
                <a href="login" class="service-link">
                <div class="service-card">
                    <i class="fas fa-sign-in-alt"></i>
                    <h4>Espace Candidat</h4>
                    <p>Accédez à votre espace personnel pour gérer vos parrainages si vous etes un candidat</p>
                </div>
                </a>
            </div>
        </div>
    </section>

    <section id="contact">
        <footer class="footer">
            <div class="container">
                <div class="footer-grid">
                    <div class="footer-section">
                        <h5>Contact</h5>
                        <div class="contact-info">
                            <i class="fas fa-phone"></i>
                            <span>+221 33 889 41 50</span>
                        </div>
                        <p>Direction Générale des Élections</p>
                    </div>
                    <div class="footer-section">
                        <h5>Liens utiles</h5>
                        <ul>
                            <li><a href="/faq">FAQ</a></li>
                            <li><a href="/mentions-legales">Mentions légales</a></li>
                            <li><a href="/aide">Aide</a></li>
                        </ul>
                    </div>
                    <div class="footer-section">
                        <h5>Suivez-nous</h5>
                        <div class="social-links">
                            <a href="https://www.facebook.com/direction.generale.des.elections.Senegal" target="_blank"><i class="fab fa-facebook fa-lg"></i></a>
                            <a href="https://twitter.com/DgeSenegal" target="_blank"><i class="fab fa-twitter fa-lg"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>