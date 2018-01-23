@extends('master')

@section('title', 'Movie Catalog')

@section('section_title', 'Movies')

@section('css')
    @parent
    @component('imports.datatables_css')@endcomponent
@endsection

@section('page_content')
    <div class="modal fade" id="deleteMovieModal" tabindex="-1" role="dialog"
         aria-labelledby="deleteMovieModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" >
                    <h5 class="modal-title" id="exampleModalLabel">
                        Confirmation
                    </h5>
                    <button class="close" type="button" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure that you want to delete the movie?

                    (This feature is not implemented yet)
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="button"
                            data-dismiss="modal">Cancel
                    </button>
                    <button id="btnConfirmDeleteMovie"
                            class="btn btn-primary" type="button"
                            data-dismiss="modal">Accept
                    </button>
                </div>
            </div>
        </div>
    </div>

    <a id="btnAddMovie" class="btn btn-primary btn-block text-white"
       href="{{url('insert_movie')}}">
        <i class="fa fa-fw fa-plus"></i>
        Add New Movie
    </a>
    <br>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i>
            Movie Catalog
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable"
                       width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Genre</th>
                        <th>Year</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
    @component('imports.jquerydatatables_js')@endcomponent
    @component('imports.datatablesbootstrap4_js')@endcomponent
    @component('imports.getmovies_js')@endcomponent
@endsection