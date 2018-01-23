@extends('master')

@section('title', 'Movie Catalog')

@section('section_title', 'Movies')

@section('css')
    @parent
    @component('imports.datatables_css')@endcomponent
@endsection

@section('page_content')
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
                    <tr>
                        <td>Rápido y Furioso 1</td>
                        <td>Action</td>
                        <td>2000</td>
                        <td>
                            <a class="btn btn-warning text-white">
                                <i class="fa fa-fw fa-pencil"></i>
                            </a>
                            <a class="btn btn-danger text-white"
                               data-toggle="modal"
                               data-target="#deleteMovieModal">
                                <i class="fa fa-fw fa-eraser"></i>
                            </a>
                        </td>
                    </tr>
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