const formulario = document.getElementById('formulario');
const cedula = document.getElementById('cedula');
const nombre = document.getElementById('nombre');
const correo = document.getElementById('correo');
const contrasena = document.getElementById('contrasena');
const editar = document.getElementById('editar'); // Asegúrate de que el ID sea correcto

editar.addEventListener('click', () => {
    // Si los campos están habilitados, deshabilítalos; de lo contrario, habilítalos
    if (cedula.disabled) {
        cedula.disabled = false;
        nombre.disabled = false;
        correo.disabled = false;
        contrasena.disabled = false;
    } else {
        cedula.disabled = true;
        nombre.disabled = true;
        correo.disabled = true;
        contrasena.disabled = true;
    }
});
