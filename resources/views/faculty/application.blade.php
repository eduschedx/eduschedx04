<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Application | EduSchedX</title>

    <link rel="stylesheet" href="{{ asset('css/application.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<div class="application-container">

    <div class="application-card">

        <div class="application-header">
            <div class="logo-icon">
                <i class="fas fa-graduation-cap"></i>
            </div>

            <h1>Faculty Application</h1>

            <p>
                Complete your faculty profile to request access to EduSchedX.
                Your application will be reviewed by the administrator.
            </p>
        </div>

        @if ($errors->any())
            <div class="error-box">
                {{ $errors->first() }}
            </div>
        @endif


        <form method="POST" action="/faculty/application">
            @csrf

            <!-- Hidden Google Data -->
            <input type="hidden" name="google_id" value="{{ $google_id ?? '' }}">
            <input type="hidden" name="name" value="{{ $name ?? '' }}">
            <input type="hidden" name="email" value="{{ $email ?? '' }}">

             <div class="form-row">

                <div class="form-group">
                    <label>First Name</label>
                    <input
                        type="text"
                        name="first_name"
                        value="{{ old('first_name') }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Middle Name</label>
                    <input
                        type="text"
                        name="middle_name"
                        value="{{ old('middle_name') }}"
                    >
                </div>

                <div class="form-group">
                    <label>Last Name</label>
                    <input
                        type="text"
                        name="last_name"
                        value="{{ old('last_name') }}"
                        required
                    >
                </div>

            </div>

            <div class="form-group">
                <label>Email Address</label>
                <input
                    type="email"
                    value="{{ $email ?? '' }}"
                    readonly
                >
            </div>

            <div class="form-group">
                <label>Faculty ID</label>
                <input
                    type="text"
                    name="faculty_id"
                    placeholder="VA-00001"
                    value="{{ old('faculty_id') }}"
                    required
                >
                <small>Format: VA-XXXXX</small>
            </div>

            <div class="form-group">
                <label>Department</label>
                <select name="department" required>
                    <option value="">Select Department</option>
                    <option value="CCS">CCS</option>
                    <option value="COE">COE</option>
                    <option value="CAS">CAS</option>
                    <option value="COA">COA</option>
                    <option value="COEd">COEd</option>
                </select>
            </div>

           <div class="form-group">
             <label>Specialization</label>
            <input
                type="text"
                name="specialization"
                placeholder="Web Development"
                value="{{ old('specialization') }}"
                required
            >
        </div>

        <!-- Password -->
        <div class="form-group">
            <label>Password</label>

            <div class="password-wrapper">

                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                >

                <button
                    type="button"
                    id="togglePassword"
                    class="password-toggle"
                >
                    <i class="fas fa-eye"></i>
                </button>

            </div>

            <div class="password-meter">
                <div id="password-bar"></div>
            </div>

        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label>Confirm Password</label>

            <div class="password-wrapper">

                <input
                    type="password"
                    id="confirm_password"
                    name="password_confirmation"
                    required
                >

                <button
                    type="button"
                    id="toggleConfirmPassword"
                    class="password-toggle"
                >
                    <i class="fas fa-eye"></i>
                </button>

            </div>

        </div>
            <button type="submit" class="submit-btn">
                <i class="fas fa-paper-plane"></i>
                Submit Application
            </button>

        </form>

    </div>

</div>
<script src="{{ asset('js/application.js') }}"></script>
</body>
</html>
