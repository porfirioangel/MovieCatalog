$('#btnConfirmLogout').click(function () {
    logout();
});

function verifySession() {
    var isUserLogged = Cookies.get('userId') !== undefined;

    if (isUserLogged) {
        $('#btnLogin').remove();
    } else {
        $('#btnLogout').remove();
        $('#btnProfile').remove();
    }
}

function logout() {
    Cookies.remove('userId');
    Cookies.remove('userName');
    Cookies.remove('userLastname');
    Cookies.remove('userEmail');
    $(location).attr('href', '/');
}

verifySession();