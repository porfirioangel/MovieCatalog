var movieId = undefined;

setTimeout(function () {
    $('.btnDeleteMovie').click(function () {
        movieId = $(this).data('id_movie');
    });
}, 500);

$('#btnConfirmDeleteMovie').click(function () {
    deleteMovie(movieId)
});

function deleteMovie(movieId) {
    $.ajax({
        url: serverHost + '/delete_movie',
        type: 'DELETE',
        data: {movie_id: movieId},
        success: function (data) {
            console.log('Delete movie OK', data);
            $(location).attr('href', '/');
        }, error: function (error) {
            console.log('Delete movie ERROR', error);
        }
    });
}