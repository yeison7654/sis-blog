document.addEventListener('DOMContentLoaded', function () {
    login();
})
function login() {
    const loginForm = document.getElementById('loginForm');
    document.getElementById('loginForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        // Validar los datos
        if (username === 'admin' && password === '12345') {
            alert('Bienvenido!');
        } else {
            alert('Usuario o contraseña incorrectos');
        }
    });

}