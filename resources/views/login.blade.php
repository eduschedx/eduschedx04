<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduSchedX Login</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<div class="login-container">

    <!-- LEFT PANEL -->
    <div class="login-left">

        <div class="logo-container">
            <div class="logo-icon">
                <i class="fas fa-graduation-cap"></i>
            </div>

            <div class="logo-text">
                EduSchedX
            </div>
        </div>

        <div class="welcome-text">
            <h1>Welcome Back!</h1>

            <p>
                Access your academic scheduling dashboard and manage
                your institution efficiently.
            </p>
        </div>

        <ul class="features">
            <li>
                <i class="fas fa-calendar-check"></i>
                Smart Timetable Generation
            </li>

            <li>
                <i class="fas fa-users"></i>
                Faculty Management
            </li>

            <li>
                <i class="fas fa-building"></i>
                Room Allocation
            </li>

            <li>
                <i class="fas fa-shield-alt"></i>
                Secure Access
            </li>
        </ul>

    </div>

    <!-- RIGHT PANEL -->
    <div class="login-right">

        <div class="login-header">
            <h2>Login</h2>

            <p>
                Sign in using your Faculty ID
            </p>
        </div>


        <form method="POST" action="/login">
         @if(session('success'))
    <div class="alert-success">
        <i class="fas fa-circle-check"></i>
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert-error">
        <i class="fas fa-circle-xmark"></i>
        {{ session('error') }}
    </div>
@endif
            @csrf

            <div class="form-group">

                <label>Faculty ID</label>

                <div class="input-with-icon">
                    <i class="fas fa-user"></i>

                    <input
                        type="text"
                        id="faculty_id"
                        name="faculty_id"
                        class="form-control"
                        required>
                </div>

            </div>

            <div class="form-group">

                <label>Password</label>

                <div class="input-with-icon">

                    <i class="fas fa-lock"></i>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control"
                        placeholder="Enter password"
                        required>

                    <button
                        type="button"
                        id="togglePassword"
                        class="password-toggle">

                        <i class="fas fa-eye"></i>

                    </button>

                </div>

            </div>

            <button type="submit" class="login-btn">

                <i class="fas fa-sign-in-alt"></i>

                Login

            </button>

       <div class="divider">
    <p>Or continue with</p>
</div>

<div class="social-login">
    <a href="{{ route('google.login') }}" class="social-google">
    <i class="fab fa-google google-icon"></i>
    <span>Sign in with Google</span>
</a>
</div>

        </form>

    </div>

</div>

<script src="{{ asset('js/login.js') }}"></script>

</body>
</html>
