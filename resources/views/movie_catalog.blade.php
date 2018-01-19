@extends('master')

@section('title', 'Movie Catalog')

@section('section_title', 'Movies')

@section('css')
    @parent
    @component('imports.datatables_css')@endcomponent
@endsection

@section('page_content')
    <a class="btn btn-primary btn-block text-white" href="movie_form.html">
        <i class="fa fa-fw fa-plus"></i>
        Add New Movie
    </a>
    <br>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Data Table Example
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
                    <tr>
                        <td>Rápido y Furioso 2</td>
                        <td>Action</td>
                        <td>2001</td>
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
                    <tr>
                        <td>Rápido y Furioso 3</td>
                        <td>Action</td>
                        <td>2002</td>
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
        <div class="card-footer small text-muted">
            Updated yesterday at 11:59 PM
        </div>
    </div>
@endsection

@section('js')
    @parent
    @component('imports.jquerydatatables_js')@endcomponent
    @component('imports.datatablesbootstrap4_js')@endcomponent
    @component('imports.sbadmindatatables_js')@endcomponent
@endsection