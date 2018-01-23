/**
 * Event triggered when the user clicks the save movie button
 */
$('#btnSaveMovie').click(function () {
    var movieData = {
        title: $('#txtMovieName').val(),
        genre: $('#txtMovieGenre').val(),
        year: $('#txtMovieYear').val()
    };

    insertMovie(movieData);
});

function insertMovie(movieData) {
    $.ajax({
        url: serverHost + '/insert_movie',
        type: 'POST',
        data: movieData,
        success: function (data) {
            console.log('Insert movie OK', data);
            $(location).attr('href', '/');
        }, error: function (error) {
            if (error.responseJSON && error.responseJSON.error) {
                if (error.responseJSON.error instanceof Array) {
                    showErrorModal(error.responseJSON.error);
                } else {
                    showErrorModal([error.responseJSON.error]);
                }
            } else {
                showErrorModal(['Cannot insert movie']);
            }
        }
    });
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