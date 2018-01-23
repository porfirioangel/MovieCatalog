function getMovieList() {
    $.ajax({
        url: serverHost + '/movie_list',
        type: 'GET',
        success: function (data) {
            renderMovieList(data);
        }, error: function (error) {
            console.log('ERROR', error);
        }
    });
}

function renderMovieList(movies) {
    var dataTable = $('#dataTable');
    var tbody = dataTable.find('tbody');
    tbody.html('');

    $.each(movies, function (index, movie) {
        tbody.append('<tr>' +
            '<td>' + movie.title + '</td>' +
            '<td>' + movie.genre + '</td>' +
            '<td>' + movie.year + '</td>' +
            '<td>' +
            '<button class="btn btn-danger text-white btnDeleteMovie"' +
            ' data-toggle="modal" ' +
            'data-target="#deleteMovieModal" data-id_movie="' + movie.id +
            '">' +
            '<i class="fa fa-fw fa-eraser"></i>' +
            '</button>' +
            '</td>' +
            '</tr>');
    });

    setTimeout(function () {
        dataTable.DataTable();
    }, 300);
}

getMovieList();
