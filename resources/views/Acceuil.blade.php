<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Système de Parrainage - République du Sénégal</title>
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
            /* logo */
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
        }

        .btn-primary:hover {
            background: var(--hover-green);
        }

        .btn-secondary {
            background: white;
            color: var(--primary-green);
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
                    <a href="#service">Services disponibles</a>
                    <a href="#contact">Contact</a>
                    <a href="/login" class="login-btn">Se connecter</a>
                    <a href="/inscription" class="login-btn">S'inscrire</a>
                </nav>
            </div>
        </div>
    </header>

    <section class="hero" id="Acceuil">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h2>Plateforme de Parrainage Électoral</h2>
                    <p>Participez au processus démocratique en parrainant votre candidat pour l'élection présidentielle</p>
                    <div class="button-group">
                        <a href="/login" class="btn btn-primary">
                            Parrainer un candidat
                            <i class="fas fa-chevron-right" style="margin-left: 0.5rem;"></i>
                        </a>
                        <a href="/candidats" class="btn btn-secondary">
                            Consulter les candidats
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="service" class="services">
        <div class="container">
            <h3>Services disponibles</h3>
            <div class="services-grid">
                <a href="{{ route('inscription') }}" class="service-link">
                    <div class="service-card">
                        <i class="fas fa-user"></i>
                        <h4>Créer votre profil</h4>
                        <p>Inscrivez-vous en tant qu'électeur pour participer au parrainage</p>
                    </div>
                </a>
                <a href="{{ route('login') }}" class="service-link">
                <div class="service-card">
                    <i class="fas fa-calendar"></i>
                    <h4>Période de parrainage</h4>
                    <p>Consultez les dates importantes du processus de parrainage</p>
                </div>
                </a>
                <a href="{{ route('login') }}" class="service-link">
                <div class="service-card">
                    <i class="fas fa-sign-in-alt"></i>
                    <h4>Espace personnel</h4>
                    <p>Accédez à votre espace personnel pour gérer vos parrainages</p>
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
</body>
</html>