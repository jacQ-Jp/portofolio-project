<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Jeauonia - Portfolio')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #faf8f6 0%, #f8f5f2 50%, #f3f0ec 100%);
            color: #3a3a3a;
            letter-spacing: 0.5px;
            line-height: 1.6;
        }

        /* Navigation */
        nav {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 100;
            padding: 1.5rem 0;
        }

        .nav-brand {
            font-weight: 600;
            font-size: 24px;
            letter-spacing: 3px;
            color: #3a3a3a;
            text-transform: uppercase;
        }

        nav a {
            font-size: 13px;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        nav a:hover {
            color: #8b7d6f !important;
        }

        /* Main Container */
        main {
            min-height: calc(100vh - 200px);
        }

        /* Section Title */
        .section-title {
            font-size: 4rem;
            font-weight: 300;
            letter-spacing: 4px;
            color: #6b6b6b;
            margin-bottom: 2rem;
            text-align: center;
            text-transform: uppercase;
        }

        /* Project Card */
        .project-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
        }

        .project-card:hover {
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
            transform: translateY(-6px);
        }

        .project-card img {
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .project-card:hover img {
            transform: scale(1.08);
        }

        /* Footer */
        footer {
            background: rgba(80, 80, 80, 0.03);
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            margin-top: 8rem;
            padding: 4rem 0;
        }

        footer p {
            font-size: 13px;
            letter-spacing: 1px;
            color: #888;
            font-weight: 500;
        }

        /* Button Styles */
        .btn-primary {
            background: #3a3a3a;
            color: white;
            padding: 12px 28px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: all 0.3s ease;
            border: 1px solid #3a3a3a;
        }

        .btn-primary:hover {
            background: white;
            color: #3a3a3a;
        }

        .btn-secondary {
            background: transparent;
            color: #3a3a3a;
            padding: 12px 28px;
            border: 1px solid #3a3a3a;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: #3a3a3a;
            color: white;
        }

        /* Aesthetic Elements */
        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(0,0,0,0.1), transparent);
            margin: 3rem 0;
        }

        /* Smooth Transitions */
        a, button {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(0, 0, 0, 0.1);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(0, 0, 0, 0.2);
        }

        /* Social Icons */
        .social-icons a {
            font-size: 14px;
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 50%;
            color: #3a3a3a;
        }

        .social-icons a:hover {
            background: #3a3a3a;
            color: white;
            border-color: #3a3a3a;
        }

        /* Tags */
        .tag {
            display: inline-block;
            background: #f0f0f0;
            color: #666;
            padding: 6px 12px;
            border-radius: 3px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-right: 8px;
            margin-bottom: 8px;
        }

        /* Links Section */
        .links-row {
            display: flex;
            gap: 12px;
            align-items: center;
            border-top: 1px solid rgba(0, 0, 0, 0.08);
            padding-top: 12px;
            margin-top: 12px;
        }

        .links-row a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            color: #3a3a3a;
            font-size: 13px;
            transition: all 0.3s ease;
        }

        .links-row a:hover {
            background: #3a3a3a;
            color: white;
            border-color: #3a3a3a;
        }

        /* Form Enhancements */
        input[type="text"],
        input[type="email"],
        input[type="url"],
        textarea {
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="url"]:focus,
        textarea:focus {
            background-color: #fdf8f6;
        }

        /* Animations */
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        main {
            animation: fadeIn 0.3s ease-in;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <!-- Navigation -->
    <nav>
        <div class="container mx-auto px-8">
            <div class="flex justify-between items-center">
                <a href="{{ route('projects.index') }}" class="nav-brand">
                    JEAUONIA
                </a>
                <ul class="flex gap-8 items-center">
                    <li>
                        <a href="{{ route('projects.index') }}" class="text-gray-700 hover:text-gray-900">
                            PORTFOLIO
                        </a>
                    </li>

                    @auth
                        <li>
                            <a href="{{ route('projects.create') }}" class="btn-secondary">
                                + NEW DESIGN
                            </a>
                        </li>
                        <li class="text-xs tracking-[0.25em] uppercase text-gray-500 hidden sm:block">
                            {{ auth()->user()->name }}
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-gray-700 hover:text-gray-900 text-[13px] tracking-[1px] uppercase font-medium">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login.show') }}" class="text-gray-700 hover:text-gray-900">
                                LOGIN
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('register.show') }}" class="btn-secondary">
                                REGISTER
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container mx-auto px-8">
            <div class="text-center space-y-3">
                <p>FOLLOW & LIKE FOR SUPPORT ME & NEW DESIGN TO UPLOAD</p>
                <p>PLEASE DON'T COPY MY DESIGN IDEA</p>
                <p class="text-sm">&copy; 2026 JEAUONIA. ALL RIGHTS RESERVED.</p>
            </div>
        </div>
    </footer>
</body>
</html>
