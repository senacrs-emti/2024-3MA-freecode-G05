const togglePassword = document.getElementById('togglePassword');
const passwordField = document.getElementById('password');
const iconToggle = document.getElementById('iconToggle');

togglePassword.addEventListener('click', function () {
    
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);

    
    if (type === 'password') {
        iconToggle.classList.remove('fa-eye-slash');
        iconToggle.classList.add('fa-eye');
    } else {
        iconToggle.classList.remove('fa-eye');
        iconToggle.classList.add('fa-eye-slash');
    }
});
