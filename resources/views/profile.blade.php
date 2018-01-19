@extends('master')

@section('title', 'Profile')

@section('section_title', 'Profile')

@section('css')
    @parent
@endsection

@section('page_content')
    <p id="pName">
        <strong>Name:</strong>
    </p>
    <p id="pLastname">
        <strong>Lastname:</strong>
    </p>
    <p id="pEmail">
        <strong>Email:</strong>
    </p>
@endsection

@section('js')
    @parent
    @component('imports.loadprofile_js')@endcomponent
@endsection