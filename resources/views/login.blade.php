<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>

    @section('css')
        @component('imports.bootstrap_css')@endcomponent
        @component('imports.fontawesome_css')@endcomponent
        @component('imports.sbadmin_css')@endcomponent
    @show
</head>

<body class="bg-dark">
<div class="container">
    @component('errors_modal')@endcomponent

    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="txtEmail">Email address</label>
                    <input class="form-control" id="txtEmail"
                           type="email" aria-describedby="emailHelp"
                           placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="txtPassword">Password</label>
                    <input class="form-control" id="txtPassword"
                           type="password" placeholder="Password">
                </div>
                <button id="btnLogin" type="button"
                        class="btn btn-primary btn-block">Login
                </button>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="register.html">
                    Register an Account
                </a>
            </div>
        </div>
    </div>
</div>

@section('js')
    @component('imports.jquery_js')@endcomponent
    @component('imports.bootstrap_js')@endcomponent
    @component('imports.jqueryeasing_js')@endcomponent
    @component('imports.apisettings_js')@endcomponent
    @component('imports.login_js')@endcomponent
    @component('imports.jscookie_js')@endcomponent
@show
</body>

</html>
