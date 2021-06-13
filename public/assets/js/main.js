function logout() {
    document.getElementById('formlogin').style.display = 'flex';
    document.getElementById('btnlogout').style.display = 'none';
}

function login() {
    document.getElementById('formlogin').style.display = 'none';
    document.getElementById('btnlogout').style.display = 'flex';
}

function fadein(elementid) {
    $('#' + elementid).fadeIn();
}