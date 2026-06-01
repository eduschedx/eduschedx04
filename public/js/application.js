alert('JS Loaded');
// Password strength meter
const passwordInput = document.getElementById('password');
const passwordBar = document.getElementById('password-bar');

if (passwordInput && passwordBar) {

    passwordInput.addEventListener('input', function () {

        const password = this.value;

        let score = 0;

        if (password.length >= 8) score++;
        if (/[A-Z]/.test(password)) score++;
        if (/[a-z]/.test(password)) score++;
        if (/[0-9]/.test(password)) score++;
        if (/[^A-Za-z0-9]/.test(password)) score++;

        if (score <= 2) {
            passwordBar.style.width = '33%';
            passwordBar.style.backgroundColor = '#ef4444';
        }
        else if (score <= 4) {
            passwordBar.style.width = '66%';
            passwordBar.style.backgroundColor = '#f59e0b';
        }
        else {
            passwordBar.style.width = '100%';
            passwordBar.style.backgroundColor = '#22c55e';
        }
    });
}

// Show/Hide Password
const togglePassword = document.getElementById('togglePassword');

if (togglePassword && passwordInput) {

    togglePassword.addEventListener('click', function () {

        const type =
            passwordInput.type === 'password'
                ? 'text'
                : 'password';

        passwordInput.type = type;

        const icon = this.querySelector('i');

        if (type === 'text') {
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    });
}

// Show/Hide Confirm Password
const toggleConfirmPassword =
    document.getElementById('toggleConfirmPassword');

const confirmPasswordInput =
    document.getElementById('confirm_password');

if (toggleConfirmPassword && confirmPasswordInput) {

    toggleConfirmPassword.addEventListener('click', function () {

        const type =
            confirmPasswordInput.type === 'password'
                ? 'text'
                : 'password';

        confirmPasswordInput.type = type;

        const icon = this.querySelector('i');

        if (type === 'text') {
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    });
}
