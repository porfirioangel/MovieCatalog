@extends('master')

@section('title', 'New Movie')

@section('section_title', 'Movies')

@section('css')
    @parent
    @component('imports.datatables_css')@endcomponent
@endsection

@section('page_content')
    @component('errors_modal')@endcomponent

    <div class="card">
        <div class="card-header">Add a Movie</div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="txtMovieName">Movie name</label>
                    <input class="form-control" id="txtMovieName"
                           type="text" placeholder="Enter movie name">
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="txtMovieGenre">Genre</label>
                            <input class="form-control"
                                   id="txtMovieGenre" type="text"
                                   placeholder="Enter genre">
                        </div>
                        <div class="col-md-6">
                            <label for="txtMovieYear">Year</label>
                            <input class="form-control"
                                   id="txtMovieYear" type="number"
                                   placeholder="Enter year">
                        </div>
                    </div>
                </div>

                <button id="btnSaveMovie" type="button"
                        class="btn btn-primary btn-block">
                    Save
                </button>
            </form>
        </div>
    </div>
@endsection

@section('js')
    @parent
    @component('imports.insertmovie_js')@endcomponent
@endsection