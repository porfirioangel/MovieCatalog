<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>

    @section('css')
        @component('imports.bootstrap_css')@endcomponent
        @component('imports.fontawesome_css')@endcomponent
        @component('imports.sbadmin_css')@endcomponent
    @show
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="/">Movie Catalog</a>

    <button class="navbar-toggler navbar-toggler-right" type="button"
            data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-fw fa-file"></i>
                    <span class="nav-link-text">Blank</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="movies.html">
                    <i class="fa fa-fw fa-film"></i>
                    <span class="nav-link-text">Movies</span>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2"
                   id="userDropdown" href="#" data-toggle="dropdown">
                    <i class="fa fa-fw fa-user"></i>
                    <span class="d-lg-none">Profile</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right"
                     aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                        <div class="dropdown-message">
                            <i class="fa fa-fw fa-id-card"></i>
                            View Profile
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a id="btnLogout" class="dropdown-item" href="#"
                       data-toggle="modal"
                       data-target="#exampleModal">
                        <div class="dropdown-message">
                            <i class="fa fa-fw fa-sign-out"></i>
                            Logout
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a id="btnLogin" class="dropdown-item"
                       href="{{ url('login') }}">
                        <div class="dropdown-message">
                            <i class="fa fa-fw fa-sign-in"></i>
                            Login
                        </div>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<div class="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Movie Catalog</a>
            </li>
            <li class="breadcrumb-item active">@yield('section_title')</li>
        </ol>

        @section('page_content')
        @show
    </div>

    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright © Your Website 2017</small>
            </div>
        </div>
    </footer>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to
                        Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready
                    to end your current session.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button"
                            data-dismiss="modal">Cancel
                    </button>
                    <button id="btnConfirmLogout"
                            class="btn btn-primary">Logout
                    </button>
                </div>
            </div>
        </div>
    </div>

    @section('js')
        @component('imports.jquery_js')@endcomponent
        @component('imports.bootstrap_js')@endcomponent
        @component('imports.jqueryeasing_js')@endcomponent
        @component('imports.sbadmin_js')@endcomponent
        @component('imports.jscookie_js')@endcomponent
        @component('imports.sessionmanagement_js')@endcomponent
    @show
</div>
</body>

</html>