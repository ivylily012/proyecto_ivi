// Agregamos un evento de escucha al formulario
document.querySelector('.my-form').addEventListener('submit', function(event) {
    // Prevenimos que el formulario se envíe por defecto
    event.preventDefault();

    // Obtenemos los valores de los campos
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    // Validamos los campos
    if (validarEmail(email) && validarPassword(password)) {
        // Si las validaciones se cumplen, enviamos el formulario
        this.submit();
    }
});

// Función para validar el email
function validarEmail(email) {
    var regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (regex.test(email)) {
        return true;
    } else {
        alert('El email no es válido');
        return false;
    }
}

// Función para validar la contraseña
function validarPassword(password) {
    var regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;
    if (regex.test(password)) {
        return true;
    } else {
        alert('La contraseña no es válida');
        return false;
    }
}