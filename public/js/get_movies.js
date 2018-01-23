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

    $.each(movies, function (index, movie) {
        tbody.append('<tr>' +
            '<td>' + movie.title + '</td>' +
            '<td>' + movie.genre + '</td>' +
            '<td>' + movie.year + '</td>' +
            '<td>' +
            '<a class="btn btn-warning text-white">' +
            '<i class="fa fa-fw fa-pencil"></i>' +
            '</a> ' +
            '<a class="btn btn-danger text-white" data-toggle="modal" ' +
            'data-target="#deleteMovieModal">' +
            '<i class="fa fa-fw fa-eraser"></i>' +
            '</a>' +
            '</td>' +
            '</tr>');
    });

    setTimeout(function () {
        dataTable.DataTable();
    }, 300);
}

getMovieList();
