// mostra senha
function setupPasswordToggle(passwordId, toggleId, iconId) {
    const togglePassword = document.getElementById(toggleId);
    const passwordField = document.getElementById(passwordId);
    const iconToggle = document.getElementById(iconId);

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
}

setupPasswordToggle('passwordLogin', 'togglePasswordLogin', 'iconToggleLogin');
setupPasswordToggle('passwordCadastro', 'togglePasswordCadastro', 'iconToggleCadastro');

// muda tela
const btnCadastro = document.getElementById('btnCadastro');
const btnLogin = document.getElementById('btnLogin');

let footer = document.querySelector('.footer');
footer.style = 'margin-top:5%!important;';

const contentLogin = document.querySelector('.contentLogin');
const contentCadastro = document.querySelector('.contentCadastro');

btnCadastro.addEventListener('click', (event) => {
    event.preventDefault();
    contentLogin.style.display = 'none';
    contentCadastro.style.display = 'flex';
    footer.style = 'margin-top:50%!important;';
});

btnLogin.addEventListener('click', (event) => {
    event.preventDefault();
    contentCadastro.style.display = 'none';
    contentLogin.style.display = 'flex';
    footer.style = 'margin-top:5%!important;';
});