<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin - Start Bootstrap Template</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet"
          type="text/css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
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
