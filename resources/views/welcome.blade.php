<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduSchedX</title>

    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="logo-container">
            <div class="logo-icon">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div class="logo-text">EduSchedX</div>
        </div>

        <div class="nav-buttons">
            <a href="{{ route('login') }}" class="nav-btn login-btn-nav">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>

            <a href="#" class="nav-btn register-btn-nav">
                <i class="fab fa-google"></i> Google Sign In
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="hero-section">

            <div class="hero-left">

                <h1>
                    Welcome to
                    <span>EduSchedX</span>
                </h1>

                <p>
                    An Academic Scheduling Management System designed to automate timetable generation,
                    optimize faculty workloads, manage room allocations, and improve scheduling
                    efficiency within educational institutions.
                </p>

                <div class="hero-buttons">

                    <a href="{{ route('login') }}" class="hero-btn hero-btn-primary">
                        <i class="fas fa-sign-in-alt"></i>
                        Login
                    </a>

                    <a href="#" class="hero-btn hero-btn-secondary">
                        <i class="fab fa-google"></i>
                        Google Sign In
                    </a>

                </div>

            </div>

           <div class="hero-right">

    <div class="ai-panel">

        <h2>🤖 EduSchedX AI</h2>

        <div class="status-card">
            <span>Schedule Status</span>
            <strong>Optimized ✓</strong>
        </div>

        <div class="status-card">
            <span>Fitness Score</span>
            <strong>95%</strong>
        </div>

        <div class="status-card">
            <span>Faculty Conflicts</span>
            <strong>0</strong>
        </div>

        <div class="status-card">
            <span>Room Conflicts</span>
            <strong>0</strong>
        </div>

    </div>

</div>

        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">

        <div class="footer-links">
            <a href="#">About EduSchedX</a>
            <a href="#">Features</a>
            <a href="#">Support</a>
        </div>

        <div class="footer-copyright">
            &copy; {{ date('Y') }} EduSchedX. All Rights Reserved.
        </div>

    </footer>

</body>
</html>
