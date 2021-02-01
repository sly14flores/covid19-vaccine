<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ env('APP_URL') }}/css/all.min.css" rel="stylesheet">
        <link href="{{ env('APP_URL') }}/css/adminlte.min.css" rel="stylesheet">
        <link href="{{ env('APP_URL') }}/css/animate-kontext.css" rel="stylesheet">
        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">   
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
		<title>{{ config('app.name', 'Covid-19 Vaccination Survey') }}</title>
        <style type="text/css">
        
            *, html {
                margin: 0;
            }

        </style>
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ env('APP_URL') }}/login"><h4>Covid-19 Vaccination Survey</h4></a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="" method="post">
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-user"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script type="text/javascript" src="{{ env('APP_URL') }}/angularjs/angular.min.js"></script>
        <script type="text/javascript" src="{{ env('APP_URL') }}/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="{{ env('APP_URL') }}/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="{{ env('APP_URL') }}/js/loader.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    </body>
</html>