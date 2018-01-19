/**
 * Event triggered when the user clicks the login button
 */
$('#btnLogin').click(function () {
    var credentials = {
        email: $('#txtEmail').val(),
        password: $('#txtPassword').val()
    };

    login(credentials);
});

/**
 * Tries to login the user and shows the obtained response
 */
function login(credentials) {
    var validation = validate(credentials);

    if (!validation.valid) {
        showErrorModal(validation.errors);
        return;
    }

    $.ajax({
        url: serverHost + '/login',
        type: 'POST',
        data: credentials,
        success: function (data) {
            saveLoginCookies(data);
            $(location).attr('href', '/');
        }, error: function (error) {
            showErrorModal(['User or password are incorrect']);
        }
    });
}

/**
 * Validates the user credentials are correct
 */
function validate(credentials) {
    var valid = true;
    var errors = [];

    if (!credentials.email) {
        errors.push('Email cannot be empty');
        valid = false;
    }

    if (!credentials.password) {
        errors.push('Password cannot be empty');
        valid = false;
    }

    return {
        valid: valid,
        errors: errors
    };
}

/**
 * Show a modal listing the errors obtained when the user tried to login
 */
function showErrorModal(errors) {
    var errorsModal = $('#errorsModal');
    var modalBody = errorsModal.find('.modal-body').find('ul');
    modalBody.html('');

    $.each(errors, function (index, value) {
        modalBody.append('<li>' + value + '</li>');
    });

    errorsModal.modal('show');
}

/**
 * Stores the user data in cookies
 */
function saveLoginCookies(user) {
    Cookies.set('userId', user.id);
    Cookies.set('userName', user.name);
    Cookies.set('userLastname', user.lastname);
    Cookies.set('userEmail', user.email);
}