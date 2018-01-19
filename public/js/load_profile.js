function loadProfile() {
    var name = Cookies.get('userName');
    var lastname = Cookies.get('userLastname');
    var email = Cookies.get('userEmail');

    $('#pName').append(name);
    $('#pLastname').append(lastname);
    $('#pEmail').append(email);
}

loadProfile();