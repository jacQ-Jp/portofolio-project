<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio Kreatif - UI/UX • Video • Music • Beauty</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        /* CSS Variables */
        :root {
            --neon-blue: #4dabf7;
            --neon-blue-glow: rgba(77, 171, 247, 0.3);
            --navy-dark: #0a0e27;
            --navy-light: #1a1f3a;
            --glass-bg: rgba(255, 255, 255, 0.05);
            --glass-border: rgba(255, 255, 255, 0.1);
            --text-primary: #ffffff;
            --text-secondary: #b8c0e0;
            --text-muted: #6c7293;
        }

        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: var(--navy-dark);
            color: var(--text-primary);
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* Animated Background */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #0a0e27 0%, #1a1f3a 50%, #0a0e27 100%);
            z-index: -2;
        }

        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .particle {
            position: absolute;
            width: 2px;
            height: 2px;
            background: var(--neon-blue);
            border-radius: 50%;
            box-shadow: 0 0 10px var(--neon-blue-glow);
            animation: float 20s infinite linear;
        }

        @keyframes float {
            0% {
                transform: translateY(100vh) translateX(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh) translateX(100px);
                opacity: 0;
            }
        }

        /* Navigation */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 20px 0;
            background: rgba(10, 14, 39, 0.8);
            backdrop-filter: blur(20px);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        nav.scrolled {
            padding: 15px 0;
            background: rgba(10, 14, 39, 0.95);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            background: linear-gradient(135deg, var(--neon-blue), #74c0fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-links {
            display: flex;
            gap: 40px;
            list-style: none;
        }

        .nav-links a {
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--neon-blue);
            transition: width 0.3s ease;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--neon-blue);
        }

        .nav-links a:hover::after,
        .nav-links a.active::after {
            width: 100%;
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 20px;
            position: relative;
        }

        .hero-content {
            text-align: center;
            max-width: 800px;
            z-index: 1;
        }

        .hero h1 {
            font-size: 72px;
            font-weight: 800;
            margin-bottom: 20px;
            background: linear-gradient(135deg, var(--text-primary), var(--neon-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from {
                text-shadow: 0 0 20px var(--neon-blue-glow);
            }
            to {
                text-shadow: 0 0 30px var(--neon-blue-glow), 0 0 40px var(--neon-blue-glow);
            }
        }

        .hero-subtitle {
            font-size: 24px;
            color: var(--text-secondary);
            margin-bottom: 30px;
            font-weight: 300;
        }

        .hero-description {
            font-size: 18px;
            color: var(--text-muted);
            margin-bottom: 40px;
            line-height: 1.8;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 15px 35px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            border: 2px solid transparent;
        }

        .btn-primary {
            background: var(--neon-blue);
            color: var(--navy-dark);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px var(--neon-blue-glow);
        }

        .btn-secondary {
            background: var(--glass-bg);
            color: var(--text-primary);
            border-color: var(--glass-border);
            backdrop-filter: blur(10px);
        }

        .btn-secondary:hover {
            background: var(--glass-border);
            transform: translateY(-3px);
        }

        /* Section Styles */
        .section {
            padding: 100px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-header h2 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
            background: linear-gradient(135deg, var(--text-primary), var(--neon-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .section-header p {
            font-size: 18px;
            color: var(--text-secondary);
        }

        /* Grid Layout */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }

        /* Glass Card */
        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .glass-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(77, 171, 247, 0.2);
            border-color: var(--neon-blue);
        }

        .card-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .glass-card:hover .card-image {
            transform: scale(1.05);
        }

        .card-content {
            padding: 25px;
        }

        .card-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--text-primary);
        }

        .card-description {
            color: var(--text-secondary);
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .card-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .card-badge {
            background: var(--neon-blue);
            color: var(--navy-dark);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        /* Video Card */
        .video-card {
            position: relative;
        }

        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 250px;
            background: rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .video-card:hover .video-overlay {
            opacity: 1;
        }

        .play-button {
            width: 70px;
            height: 70px;
            background: var(--neon-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--navy-dark);
            font-size: 24px;
            transition: all 0.3s ease;
        }

        .play-button:hover {
            transform: scale(1.1);
            box-shadow: 0 10px 30px var(--neon-blue-glow);
        }

        /* Audio Card */
        .audio-card {
            display: flex;
            align-items: center;
            padding: 20px;
            gap: 20px;
        }

        .audio-cover {
            width: 100px;
            height: 100px;
            border-radius: 10px;
            object-fit: cover;
        }

        .audio-info {
            flex: 1;
        }

        .audio-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .audio-artist {
            color: var(--text-secondary);
            margin-bottom: 15px;
        }

        .audio-player {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .play-pause {
            width: 40px;
            height: 40px;
            background: var(--neon-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--navy-dark);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .play-pause:hover {
            transform: scale(1.1);
        }

        .progress-bar {
            flex: 1;
            height: 4px;
            background: var(--glass-border);
            border-radius: 2px;
            overflow: hidden;
        }

        .progress {
            height: 100%;
            background: var(--neon-blue);
            width: 0%;
            transition: width 0.3s ease;
        }

        .duration {
            color: var(--text-muted);
            font-size: 14px;
        }

        /* See More Button */
        .see-more-container {
            text-align: center;
            margin-top: 40px;
        }

        .see-more-btn {
            background: var(--glass-bg);
            color: var(--text-primary);
            border: 1px solid var(--glass-border);
            padding: 12px 30px;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .see-more-btn:hover {
            background: var(--neon-blue);
            color: var(--navy-dark);
            border-color: var(--neon-blue);
            transform: translateY(-3px);
            box-shadow: 0 10px 30px var(--neon-blue-glow);
        }

        /* Biodata Section */
        .biodata {
            padding: 100px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .biodata-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
            margin-bottom: 80px;
        }

        .biodata-content {
            animation: fadeInLeft 1s ease;
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .biodata-header h2 {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 10px;
            line-height: 1.2;
        }

        .highlight {
            background: linear-gradient(135deg, var(--neon-blue), #74c0fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .biodata-subtitle {
            font-size: 20px;
            color: var(--neon-blue);
            margin-bottom: 30px;
            font-weight: 500;
        }

        .biodata-description {
            margin-bottom: 30px;
            line-height: 1.8;
            color: var(--text-secondary);
        }

        .biodata-description p {
            margin-bottom: 15px;
        }

        .biodata-info {
            margin-bottom: 30px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
            color: var(--text-secondary);
        }

        .info-item i {
            color: var(--neon-blue);
            width: 20px;
        }

        .biodata-skills h3 {
            font-size: 20px;
            margin-bottom: 15px;
            color: var(--text-primary);
        }

        .skill-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 30px;
        }

        .skill-tag {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            color: var(--text-secondary);
            transition: all 0.3s ease;
        }

        .skill-tag:hover {
            background: var(--neon-blue);
            color: var(--navy-dark);
            transform: translateY(-2px);
        }

        .biodata-cta {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .biodata-image {
            position: relative;
            animation: fadeInRight 1s ease;
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .image-container {
            position: relative;
        }

        .image-frame {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .profile-photo {
            width: 100%;
            height: auto;
            display: block;
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(77, 171, 247, 0.2), rgba(116, 192, 252, 0.1));
            pointer-events: none;
        }

        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }

        .float-element {
            position: absolute;
            width: 50px;
            height: 50px;
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--neon-blue);
            font-size: 20px;
            animation: float 6s ease-in-out infinite;
        }

        .float-1 {
            top: 10%;
            right: -10%;
            animation-delay: 0s;
        }

        .float-2 {
            top: 60%;
            right: -5%;
            animation-delay: 1s;
        }

        .float-3 {
            bottom: 20%;
            left: -10%;
            animation-delay: 2s;
        }

        .float-4 {
            top: 30%;
            left: -5%;
            animation-delay: 3s;
        }

        .biodata-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            padding: 40px;
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 36px;
            font-weight: 700;
            color: var(--neon-blue);
            margin-bottom: 10px;
        }

        .stat-label {
            color: var(--text-secondary);
            font-size: 14px;
        }

        /* Footer */
        footer {
            background: var(--navy-light);
            padding: 60px 20px 30px;
            text-align: center;
            border-top: 1px solid var(--glass-border);
        }

        .footer-content {
            max-width: 600px;
            margin: 0 auto;
        }

        .footer-logo {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
            background: linear-gradient(135deg, var(--neon-blue), #74c0fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .footer-text {
            color: var(--text-secondary);
            margin-bottom: 30px;
            font-size: 16px;
        }

        .footer-social {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .footer-social a {
            width: 45px;
            height: 45px;
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-social a:hover {
            background: var(--neon-blue);
            color: var(--navy-dark);
            transform: translateY(-5px);
            box-shadow: 0 10px 20px var(--neon-blue-glow);
        }

        .copyright {
            color: var(--text-muted);
            font-size: 14px;
            padding-top: 30px;
            border-top: 1px solid var(--glass-border);
        }

        /* Mobile Menu Toggle */
        .menu-toggle {
            display: none;
            flex-direction: column;
            gap: 4px;
            cursor: pointer;
        }

        .menu-toggle span {
            width: 25px;
            height: 3px;
            background: var(--neon-blue);
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        .menu-toggle.active span:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .menu-toggle.active span:nth-child(2) {
            opacity: 0;
        }

        .menu-toggle.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -6px);
        }

        /* Scroll to Top */
        .scroll-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: var(--neon-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--navy-dark);
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
        }

        .scroll-top.show {
            opacity: 1;
            visibility: visible;
        }

        .scroll-top:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px var(--neon-blue-glow);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background: rgba(10, 14, 39, 0.98);
                flex-direction: column;
                padding: 30px;
                gap: 20px;
                backdrop-filter: blur(20px);
            }

            .nav-links.active {
                display: flex;
            }

            .menu-toggle {
                display: flex;
            }

            .hero h1 {
                font-size: 48px;
            }

            .hero-subtitle {
                font-size: 18px;
            }

            .biodata-container {
                grid-template-columns: 1fr;
                gap: 50px;
            }

            .biodata-stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .section {
                padding: 60px 20px;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 200px;
                justify-content: center;
            }
        }

        /* Loading Animation */
        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--navy-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }

        .loader.hidden {
            opacity: 0;
            pointer-events: none;
        }

        .loader-circle {
            width: 60px;
            height: 60px;
            border: 3px solid var(--glass-border);
            border-top-color: var(--neon-blue);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Loading Screen -->
    <div class="loader" id="loader">
        <div class="loader-circle"></div>
    </div>

    <!-- Animated Background -->
    <div class="bg-animation"></div>
    <div class="particles" id="particles"></div>

    <!-- Navigation -->
    <nav id="navbar">
        <div class="nav-container">
            <div class="logo">Creative Studio</div>
            <div class="menu-toggle" id="menuToggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul class="nav-links" id="navLinks">
                <li><a href="#home" class="active">Beranda</a></li>
                <li><a href="#biodata">Biodata</a></li>
                <li><a href="#design">UI/UX Design</a></li>
                <li><a href="#video">Video Editing</a></li>
                <li><a href="#music">Music & Audio</a></li>
                <li><a href="#beauty">Beauty & Makeup</a></li>

                @auth
                    <li class="nav-auth">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-secondary" style="padding: 10px 18px;">
                                <i class="fas fa-right-from-bracket"></i>
                                Logout
                            </button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content" data-aos="fade-up">
            <h1>Portofolio</h1>
            <p class="hero-subtitle">UI/UX • Video • Music • Beauty</p>
            <p class="hero-description">
                Menciptakan pengalaman digital yang memukau dengan sentuhan kreatif 
                dan teknologi terkini. Dari desain interface hingga konten multimedia yang inspiratif.
            </p>
            <div class="hero-buttons">
                <a href="#design" class="btn btn-primary">
                    <i class="fas fa-palette"></i>
                    Jelajahi Karya
                </a>
                <a href="#contact" class="btn btn-secondary">
                    <i class="fas fa-envelope"></i>
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    <!-- Biodata Section -->
    <section class="biodata" id="biodata">
        <div class="biodata-container">
            <div class="biodata-content" data-aos="fade-right">
                <div class="biodata-header">
                    <h2>Halo, Saya <span class="highlight">Mita</span></h2>
                    <p class="biodata-subtitle">Creative Multi-Disciplinary Designer</p>
                </div>
                
                <div class="biodata-description">
                    <p>
                        Seorang kreator yang mengeksplorasi berbagai bidang kreatif mulai dari UI/UX Design,
                        Content Creation, hingga Music Production. Saya percaya bahwa kreativitas tidak memiliki batas,
                        dan setiap karya adalah ruang untuk bereksperimen, bercerita, dan menciptakan sesuatu yang bermakna.
                    </p>
                    <p>
                        Saya memiliki pengalaman dalam mengembangkan berbagai proyek visual dan digital,
                        dengan fokus pada desain yang tidak hanya aesthetic secara visual,
                        tetapi juga fungsional dan impactful. Setiap detail dalam karya saya dirancang
                        untuk memberikan pengalaman yang lebih dari sekadar tampilan.
                    </p>
                </div>

                <div class="biodata-info">
                    <div class="info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Nglarang Mulyodadi Bambanglipuro Bantul</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-envelope"></i>
                        <span>shelomita.wjp@gmail.com</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-phone"></i>
                        <span>+62 821-3895-6858</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-briefcase"></i>
                        <span>Available for Freelance</span>
                    </div>
                </div>

                <div class="biodata-skills">
                    <h3>Keahlian Utama</h3>
                    <div class="skill-tags">
                        <span class="skill-tag">UI/UX Design</span>
                        <span class="skill-tag">Video Editing</span>
                        <span class="skill-tag">Music Production</span>
                        <span class="skill-tag">Makeup Artistry</span>
                        <span class="skill-tag">Content Creation</span>
                    </div>
                </div>

                <div class="biodata-cta">
                    <a href="#contact" class="btn btn-primary">
                        <i class="fas fa-comment-dots"></i>
                        Mari Berdiskusi
                    </a>
                    <a href="#design" class="btn btn-outline">
                        <i class="fas fa-briefcase"></i>
                        Lihat Portfolio
                    </a>
                </div>
            </div>

            <div class="biodata-image" data-aos="fade-left">
                <div class="image-container">
                    <div class="image-frame">
                        <img src="assets/foto1.jpg" alt="Profile Photo" class="profile-photo">
                        <div class="image-overlay"></div>
                    </div>
                    <div class="floating-elements">
                        <div class="float-element float-1">
                            <i class="fas fa-palette"></i>
                        </div>
                        <div class="float-element float-2">
                            <i class="fas fa-music"></i>
                        </div>
                        <div class="float-element float-3">
                            <i class="fas fa-video"></i>
                        </div>
                        <div class="float-element float-4">
                            <i class="fas fa-magic"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="biodata-stats">
            <div class="stat-item" data-aos="zoom-in" data-aos-delay="100">
                <div class="stat-number" data-count="50">0</div>
                <div class="stat-label">Projects Completed</div>
            </div>
            <div class="stat-item" data-aos="zoom-in" data-aos-delay="200">
                <div class="stat-number" data-count="30">0</div>
                <div class="stat-label">Happy Clients</div>
            </div>
            <div class="stat-item" data-aos="zoom-in" data-aos-delay="300">
                <div class="stat-number" data-count="15">0</div>
                <div class="stat-label">Awards Won</div>
            </div>
            <div class="stat-item" data-aos="zoom-in" data-aos-delay="400">
                <div class="stat-number" data-count="5">0</div>
                <div class="stat-label">Years Experience</div>
            </div>
        </div>
    </section>

    <!-- Admin Bar (CRUD Projects) -->
    @auth
        <div style="position: fixed; bottom: 24px; right: 24px; z-index: 9998; display:flex; flex-direction:column; gap:12px;">
            @if(session('success'))
                <div style="background: rgba(16, 185, 129, 0.15); border: 1px solid rgba(16, 185, 129, 0.35); color: #d1fae5; padding: 12px 14px; border-radius: 14px; max-width: 320px; backdrop-filter: blur(10px);">
                    {{ session('success') }}
                </div>
            @endif
            <a href="{{ route('projects.create') }}" class="btn btn-primary" style="justify-content:center;">
                <i class="fas fa-plus"></i>
                Tambah Project
            </a>
        </div>
    @endauth

    <!-- UI/UX Design Section -->
    <section class="section" id="design">
        <div class="section-header" data-aos="fade-up">
            <h2>UI/UX Design</h2>
            <p>Koleksi desain interface yang modern dan user-friendly</p>
        </div>

        <div class="grid">
            @php
                $uiuxProjects = $projects->where('category', 'uiux');
            @endphp
            @forelse($uiuxProjects as $project)
                <div class="glass-card" data-aos="fade-up">
                    @php
                        $href = $project->figma_link ?: ($project->live_link ?: ($project->github_link ?: ($project->tiktok_link ?: null)));
                        $isImage = $project->media_type === 'image';
                        $isVideo = $project->media_type === 'video';
                        $cover = $project->media_path ? asset('storage/' . $project->media_path) : 'https://picsum.photos/seed/project-'.$project->id.'/400/250';
                    @endphp

                    @if($href)
                        <a href="{{ $href }}" target="_blank" style="text-decoration:none; color:inherit; display:block;">
                    @endif

                    @if($project->media_path)
                        @if($isImage)
                            <img src="{{ $cover }}" alt="{{ $project->title }}" class="card-image">
                        @elseif($isVideo)
                            <video class="card-image" muted playsinline preload="metadata" style="object-fit: cover; width:100%; height:250px;">
                                <source src="{{ $cover }}" type="video/mp4">
                            </video>
                        @endif
                    @else
                        <img src="{{ $cover }}" alt="{{ $project->title }}" class="card-image">
                    @endif

                    <div class="card-content">
                        <h3 class="card-title">{{ $project->title }}</h3>
                        <p class="card-description">{{ $project->description ?: '—' }}</p>

                        <div class="card-meta" style="flex-wrap: wrap; gap: 10px;">
                            @if($project->tags)
                                <span class="card-badge">{{ $project->tags }}</span>
                            @else
                                <span class="card-badge">UI/UX</span>
                            @endif

                            @auth
                                @if($project->user_id === auth()->id())
                                    <span style="display:inline-flex; gap:10px; margin-left:auto;">
                                        <a href="{{ route('projects.edit', $project) }}" class="card-badge" style="background: rgba(77,171,247,0.15); border:1px solid rgba(77,171,247,0.35); color: var(--neon-blue); text-decoration:none;">
                                            <i class="fas fa-pen" style="margin-right:6px;"></i>Edit
                                        </a>

                                        <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus project ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="card-badge" style="cursor:pointer; background: rgba(239, 68, 68, 0.12); border:1px solid rgba(239, 68, 68, 0.35); color: #fecaca;">
                                                <i class="fas fa-trash" style="margin-right:6px;"></i>Hapus
                                            </button>
                                        </form>
                                    </span>
                                @endif
                            @endauth
                        </div>
                    </div>

                    @if($href)
                        </a>
                    @endif
                </div>
            @empty
                <div class="glass-card" style="grid-column: 1 / -1;">
                    <div class="card-content">
                        <h3 class="card-title">Belum ada project UI/UX</h3>
                        <p class="card-description">Tambahkan project dengan kategori <strong>UI/UX Design</strong>.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="see-more-container" data-aos="fade-up">
            <button class="see-more-btn" onclick="loadMore('design')">
                <i class="fas fa-plus"></i> Lihat Selengkapnya
            </button>
        </div>
    </section>

    @php
        /**
         * Render card project untuk semua section.
         */
        function project_primary_href($project) {
            return $project->figma_link ?: ($project->live_link ?: ($project->github_link ?: ($project->tiktok_link ?: null)));
        }

        function project_cover($project) {
            return $project->media_path ? asset('storage/' . $project->media_path) : 'https://picsum.photos/seed/project-'.$project->id.'/400/250';
        }
    @endphp

    <!-- Video Editing Section -->
    <section class="section" id="video">
        <div class="section-header" data-aos="fade-up">
            <h2>Content & Video Editing</h2>
            <p>Konten kreatif dari TikTok hingga editan K-pop yang memukau</p>
        </div>
        <div class="grid">
            @php
                $videoProjects = $projects->where('category', 'video');
            @endphp
            @forelse($videoProjects as $project)
                @php
                    $href = project_primary_href($project);
                    $cover = project_cover($project);
                    $isImage = $project->media_type === 'image';
                    $isVideo = $project->media_type === 'video';
                @endphp
                <div class="glass-card video-card" data-aos="fade-up">
                    @if($href)
                        <a href="{{ $href }}" target="_blank" style="text-decoration:none; color:inherit; display:block;">
                    @endif

                    @if($project->media_path)
                        @if($isImage)
                            <img src="{{ $cover }}" alt="{{ $project->title }}" class="card-image">
                        @elseif($isVideo)
                            <video class="card-image" muted playsinline preload="metadata" style="object-fit: cover; width:100%; height:250px;">
                                <source src="{{ $cover }}" type="video/mp4">
                            </video>
                            <div class="video-overlay">
                                <div class="play-button"><i class="fas fa-play"></i></div>
                            </div>
                        @endif
                    @else
                        <img src="{{ $cover }}" alt="{{ $project->title }}" class="card-image">
                        <div class="video-overlay">
                            <div class="play-button"><i class="fas fa-play"></i></div>
                        </div>
                    @endif

                    <div class="card-content">
                        <h3 class="card-title">{{ $project->title }}</h3>
                        <p class="card-description">{{ $project->description ?: '—' }}</p>
                        <div class="card-meta" style="flex-wrap: wrap; gap: 10px;">
                            <span class="card-badge">Video</span>
                            @auth
                                @if($project->user_id === auth()->id())
                                    <span style="display:inline-flex; gap:10px; margin-left:auto;">
                                        <a href="{{ route('projects.edit', $project) }}" class="card-badge" style="background: rgba(77,171,247,0.15); border:1px solid rgba(77,171,247,0.35); color: var(--neon-blue); text-decoration:none;">
                                            <i class="fas fa-pen" style="margin-right:6px;"></i>Edit
                                        </a>
                                        <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus project ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="card-badge" style="cursor:pointer; background: rgba(239, 68, 68, 0.12); border:1px solid rgba(239, 68, 68, 0.35); color: #fecaca;">
                                                <i class="fas fa-trash" style="margin-right:6px;"></i>Hapus
                                            </button>
                                        </form>
                                    </span>
                                @endif
                            @endauth
                        </div>
                    </div>

                    @if($href)
                        </a>
                    @endif
                </div>
            @empty
                <div class="glass-card" style="grid-column: 1 / -1;">
                    <div class="card-content">
                        <h3 class="card-title">Belum ada project video</h3>
                        <p class="card-description">Tambahkan project dengan kategori <strong>Video Editing</strong>.</p>
                    </div>
                </div>
            @endforelse
        </div>
        <div class="see-more-container" data-aos="fade-up">
            <button class="see-more-btn" onclick="loadMore('video')">
                <i class="fas fa-plus"></i> Lihat Selengkapnya
            </button>
        </div>
    </section>

    <!-- Music & Audio Section -->
    <section class="section" id="music">
        <div class="section-header" data-aos="fade-up">
            <h2>Music & Audio</h2>
            <p>Hasil cover lagu dan editing audio dari BandLab</p>
        </div>
        <div class="grid">
            @php
                $musicProjects = $projects->where('category', 'music');
            @endphp
            @forelse($musicProjects as $project)
                @php
                    $href = project_primary_href($project);
                    $cover = project_cover($project);
                    $isImage = $project->media_type === 'image';
                    $isVideo = $project->media_type === 'video';
                @endphp
                <div class="glass-card" data-aos="fade-up">
                    @if($href)
                        <a href="{{ $href }}" target="_blank" style="text-decoration:none; color:inherit; display:block;">
                    @endif

                    @if($project->media_path)
                        @if($isImage)
                            <img src="{{ $cover }}" alt="{{ $project->title }}" class="card-image">
                        @elseif($isVideo)
                            <video class="card-image" muted playsinline preload="metadata" style="object-fit: cover; width:100%; height:250px;">
                                <source src="{{ $cover }}" type="video/mp4">
                            </video>
                        @endif
                    @else
                        <img src="{{ $cover }}" alt="{{ $project->title }}" class="card-image">
                    @endif

                    <div class="card-content">
                        <h3 class="card-title">{{ $project->title }}</h3>
                        <p class="card-description">{{ $project->description ?: '—' }}</p>
                        <div class="card-meta" style="flex-wrap: wrap; gap: 10px;">
                            <span class="card-badge">Music</span>
                            @auth
                                @if($project->user_id === auth()->id())
                                    <span style="display:inline-flex; gap:10px; margin-left:auto;">
                                        <a href="{{ route('projects.edit', $project) }}" class="card-badge" style="background: rgba(77,171,247,0.15); border:1px solid rgba(77,171,247,0.35); color: var(--neon-blue); text-decoration:none;">
                                            <i class="fas fa-pen" style="margin-right:6px;"></i>Edit
                                        </a>
                                        <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus project ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="card-badge" style="cursor:pointer; background: rgba(239, 68, 68, 0.12); border:1px solid rgba(239, 68, 68, 0.35); color: #fecaca;">
                                                <i class="fas fa-trash" style="margin-right:6px;"></i>Hapus
                                            </button>
                                        </form>
                                    </span>
                                @endif
                            @endauth
                        </div>
                    </div>

                    @if($href)
                        </a>
                    @endif
                </div>
            @empty
                <div class="glass-card" style="grid-column: 1 / -1;">
                    <div class="card-content">
                        <h3 class="card-title">Belum ada project music</h3>
                        <p class="card-description">Tambahkan project dengan kategori <strong>Music & Audio</strong>.</p>
                    </div>
                </div>
            @endforelse
        </div>
        <div class="see-more-container" data-aos="fade-up">
            <button class="see-more-btn" onclick="loadMore('music')">
                <i class="fas fa-plus"></i> Lihat Selengkapnya
            </button>
        </div>
    </section>

    <!-- Beauty & Makeup Section -->
    <section class="section" id="beauty">
        <div class="section-header" data-aos="fade-up">
            <h2>Beauty & Makeup</h2>
            <p>Transformasi makeup yang stunning dan inspiratif</p>
        </div>
        <div class="grid">
            @php
                $makeupProjects = $projects->where('category', 'makeup');
            @endphp
            @forelse($makeupProjects as $project)
                @php
                    $href = project_primary_href($project);
                    $cover = project_cover($project);
                    $isImage = $project->media_type === 'image';
                    $isVideo = $project->media_type === 'video';
                @endphp
                <div class="glass-card" data-aos="fade-up">
                    @if($href)
                        <a href="{{ $href }}" target="_blank" style="text-decoration:none; color:inherit; display:block;">
                    @endif

                    @if($project->media_path)
                        @if($isImage)
                            <img src="{{ $cover }}" alt="{{ $project->title }}" class="card-image">
                        @elseif($isVideo)
                            <video class="card-image" muted playsinline preload="metadata" style="object-fit: cover; width:100%; height:250px;">
                                <source src="{{ $cover }}" type="video/mp4">
                            </video>
                        @endif
                    @else
                        <img src="{{ $cover }}" alt="{{ $project->title }}" class="card-image">
                    @endif

                    <div class="card-content">
                        <h3 class="card-title">{{ $project->title }}</h3>
                        <p class="card-description">{{ $project->description ?: '—' }}</p>
                        <div class="card-meta" style="flex-wrap: wrap; gap: 10px;">
                            <span class="card-badge">Makeup</span>
                            @auth
                                @if($project->user_id === auth()->id())
                                    <span style="display:inline-flex; gap:10px; margin-left:auto;">
                                        <a href="{{ route('projects.edit', $project) }}" class="card-badge" style="background: rgba(77,171,247,0.15); border:1px solid rgba(77,171,247,0.35); color: var(--neon-blue); text-decoration:none;">
                                            <i class="fas fa-pen" style="margin-right:6px;"></i>Edit
                                        </a>
                                        <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus project ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="card-badge" style="cursor:pointer; background: rgba(239, 68, 68, 0.12); border:1px solid rgba(239, 68, 68, 0.35); color: #fecaca;">
                                                <i class="fas fa-trash" style="margin-right:6px;"></i>Hapus
                                            </button>
                                        </form>
                                    </span>
                                @endif
                            @endauth
                        </div>
                    </div>

                    @if($href)
                        </a>
                    @endif
                </div>
            @empty
                <div class="glass-card" style="grid-column: 1 / -1;">
                    <div class="card-content">
                        <h3 class="card-title">Belum ada project makeup</h3>
                        <p class="card-description">Tambahkan project dengan kategori <strong>Beauty & Makeup</strong>.</p>
                    </div>
                </div>
            @endforelse
        </div>
        <div class="see-more-container" data-aos="fade-up">
            <button class="see-more-btn" onclick="loadMore('beauty')">
                <i class="fas fa-plus"></i> Lihat Selengkapnya
            </button>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="footer-content">
            <div class="footer-logo">Creative Studio</div>
            <p class="footer-text">
                Mari wujudkan visi kreatif Anda bersama kami
            </p>
            <div class="footer-social">
                <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://tiktok.com" target="_blank"><i class="fab fa-tiktok"></i></a>
                <a href="https://youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
                <a href="https://dribbble.com" target="_blank"><i class="fab fa-dribbble"></i></a>
                <a href="https://behance.net" target="_blank"><i class="fab fa-behance"></i></a>
                <a href="https://figma.com" target="_blank"><i class="fab fa-figma"></i></a>
            </div>
            <div class="copyright">
                © 2024 Creative Studio. Crafted with <i class="fas fa-heart" style="color: var(--neon-blue);"></i> and creativity
            </div>
        </div>
    </footer>

    <!-- Scroll to Top -->
    <div class="scroll-top" id="scrollTop">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- AOS Animation Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Hide loader
        window.addEventListener('load', () => {
            setTimeout(() => {
                document.getElementById('loader').classList.add('hidden');
            }, 1000);
        });

        // Create particles
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            for (let i = 0; i < 20; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 20 + 's';
                particle.style.animationDuration = (15 + Math.random() * 10) + 's';
                particlesContainer.appendChild(particle);
            }
        }
        createParticles();

        // Mobile menu toggle
        const menuToggle = document.getElementById('menuToggle');
        const navLinks = document.getElementById('navLinks');

        menuToggle.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            menuToggle.classList.toggle('active');
        });

        // Close mobile menu on link click
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('active');
                menuToggle.classList.remove('active');
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            const scrollTop = document.getElementById('scrollTop');
            
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
                scrollTop.classList.add('show');
            } else {
                navbar.classList.remove('scrolled');
                scrollTop.classList.remove('show');
            }

            // Update active nav link
            const sections = document.querySelectorAll('section[id]');
            let current = '';
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (scrollY >= (sectionTop - 200)) {
                    current = section.getAttribute('id');
                }
            });
            
            document.querySelectorAll('.nav-links a').forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href').slice(1) === current) {
                    link.classList.add('active');
                }
            });
        });

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Scroll to top
        document.getElementById('scrollTop').addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Animated counter for stats
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px'
        };

        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.getAttribute('data-count'));
                    let count = 0;
                    const increment = target / 50;
                    
                    const updateCounter = () => {
                        if (count < target) {
                            count += increment;
                            counter.textContent = Math.ceil(count);
                            setTimeout(updateCounter, 30);
                        } else {
                            counter.textContent = target;
                        }
                    };
                    
                    updateCounter();
                    counterObserver.unobserve(counter);
                }
            });
        }, observerOptions);

        // Observe all stat numbers
        document.querySelectorAll('.stat-number').forEach(counter => {
            counterObserver.observe(counter);
        });

        // Audio player toggle
        function togglePlay(button) {
            const icon = button.querySelector('i');
            const progressBar = button.parentElement.querySelector('.progress');
            
            // Stop all other audio players
            document.querySelectorAll('.play-pause').forEach(btn => {
                if (btn !== button) {
                    btn.querySelector('i').classList.remove('fa-pause');
                    btn.querySelector('i').classList.add('fa-play');
                    btn.parentElement.querySelector('.progress').style.width = '0%';
                }
            });
            
            if (icon.classList.contains('fa-play')) {
                icon.classList.remove('fa-play');
                icon.classList.add('fa-pause');
                
                // Simulate progress
                let width = 0;
                const interval = setInterval(() => {
                    if (width >= 100) {
                        clearInterval(interval);
                        icon.classList.remove('fa-pause');
                        icon.classList.add('fa-play');
                        progressBar.style.width = '0%';
                    } else {
                        width += 2;
                        progressBar.style.width = width + '%';
                    }
                }, 100);
            } else {
                icon.classList.remove('fa-pause');
                icon.classList.add('fa-play');
                progressBar.style.width = '0%';
            }
        }

        // Load more function
        function loadMore(section) {
            const modal = document.createElement('div');
            modal.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(10, 14, 39, 0.95);
                backdrop-filter: blur(10px);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 9999;
                cursor: pointer;
            `;
            
            const content = document.createElement('div');
            content.style.cssText = `
                background: var(--glass-bg);
                backdrop-filter: blur(20px);
                border: 1px solid var(--glass-border);
                border-radius: 24px;
                padding: 40px;
                text-align: center;
                max-width: 500px;
            `;
            
            const sectionNames = {
                design: 'UI/UX Design',
                video: 'Video Editing',
                music: 'Music & Audio',
                beauty: 'Beauty & Makeup'
            };
            
            content.innerHTML = `
                <h2 style="margin-bottom: 20px; color: var(--neon-blue);">${sectionNames[section]}</h2>
                <p style="margin-bottom: 30px; color: var(--text-secondary);">Konten tambahan akan segera tersedia. Tetap ikuti update terbaru kami!</p>
                <button style="
                    padding: 12px 30px;
                    background: var(--neon-blue);
                    color: var(--navy-dark);
                    border: none;
                    border-radius: 50px;
                    cursor: pointer;
                    font-weight: 600;
                    font-size: 16px;
                " onclick="this.closest('div').parentElement.remove()">
                    Mengerti
                </button>
            `;
            
            modal.appendChild(content);
            document.body.appendChild(modal);
            
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.remove();
                }
            });
        }

        // Add parallax effect
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelector('.hero-content');
            if (parallax) {
                parallax.style.transform = `translateY(${scrolled * 0.3}px)`;
                parallax.style.opacity = 1 - scrolled / 800;
            }
        });

        // Console welcome message
        console.log('%c✨ Welcome to Creative Studio!', 'color: #4dabf7; font-size: 24px; font-weight: bold;');
        console.log('%cCrafted with passion and creativity', 'color: #74c0fc; font-size: 16px;');
    </script>
</body>
</html>