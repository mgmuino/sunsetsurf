function logout() {
    document.getElementById('formlogin').style.display = 'flex';
    document.getElementById('btnlogout').style.display = 'none';
}

function login() {
    document.getElementById('formlogin').style.display = 'none';
    document.getElementById('btnlogout').style.display = 'flex';
}

function campovacio(campo) {
    if (campo.length === 0) {
        return true;
    } else {
        return false
    }
}
// Es texto
function esTexto(string) {
    if (/^[A-Za-z]+$/.test(string)) {
        return true;
    }
    return false;
}
//validacion telefono
function esTelefono(string) {
    if (/^[0-9]{9}$/.test(string)) {
        return true;
    }
    return false;
}

/* validación del DNI */
function validadni() {
    var dni = document.getElementsByName("dni").value;
    var error = document.getElementById("error_form");
    var erdni = /(^([0-9]{8,8}[A-Z])|^)$/;
    if (erdni.test(dni)) {
        return false;
    } else {
        document.getElementById("error_form").innerHTML = '<br>Contenido del dni no es un DNI válido.';
        return true;
    }
}
//Validar fec_nac
function validafec_nac() {
    var fec_nac = document.getElementsByName("email").value;
    var error = document.getElementById("error_form");
    var erfec_nac = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
    if (erfec_nac.test(fec_nac)) {
        return true;
    } else {
        error.innerHTML = '<br>Contenido del fecha no es un formato válido.';
        return false;
    }
}
/* validación del e-mail */
function validaemail() {
    var email = document.getElementsByName("email").value;
    var error = document.getElementById("error_form");
    var eremail = /^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/;
    if (eremail.test(email)) {
        return true;
    } else {
        error.innerHTML = '<br>Contenido del email no es un email válido.';
        return false;
    }
}
//Validacion final formulario
function validarForm() {
    var errores = false;
    document.getElementById("error_form").innerHTML = "";

    var nombre = document.getElementsByName("nombre").value;
    var apellidos = document.getElementsByName("apellidos").value;
    var telefono = document.getElementsByName("telefono").value;
    var nombre1 = document.getElementsByName("nombre1").value;
    var descripcion1 = document.getElementsByName("descripcion1").value;
    var telefono1 = document.getElementsByName("telefono1").value;

    if (!esTexto(nombre)) {
        document.getElementById("error_form").innerHTML = '<br>Nombre debe ser texto.';
        errores = true;
    }
    if (!esTexto(apellidos)) {
        document.getElementById("error_form").innerHTML = '<br>Apellidos debe ser texto.';
        errores = true;
    }
    if (!validadni()) {
        errores = true;
    }
    if (!validafec_nac()) {
        errores = true;
    }
    if (!esTelefono(telefono)) {
        document.getElementById("error_form").innerHTML = '<br>Telefono debe ser numeros enteros.';
        errores = true;
    }
    if (!validaemail()) {
        errores = true;
    }
    if (!esTexto(nombre1)) {
        document.getElementById("error_form").innerHTML = '<br>Nombre debe ser texto.';
        errores = true;
    }
    if (!esTexto(descripcion1)) {
        document.getElementById("error_form").innerHTML = '<br>Descripcion debe ser texto.';
        errores = true;
    }
    if (!esTelefono(telefono1)) {
        document.getElementById("error_form").innerHTML = '<br>Telefono debe ser numeros enteros.';
        errores = true;
    }
    if (!campovacio(nombre2)) {
        if (!esTexto(nombre2)) {
            document.getElementById("error_form").innerHTML = '<br>Nombre debe ser texto.';
            errores = true;
        }
    }
    if (!campovacio(descripcion2)) {
        if (!esTexto(descripcion2)) {
            document.getElementById("error_form").innerHTML = '<br>Descripcion debe ser texto.';
            errores = true;
        }
    }

    if (!campovacio(telefono2)) {
        if (!esTelefono(telefono2)) {
            document.getElementById("error_form").innerHTML = '<br>Telefono debe ser numeros enteros.';
            errores = true;
        }
    }

    if (errores) {
        return false;
    } else {
        alert("DATOS CORRECTOS");
        return true;
    }
}