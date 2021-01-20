<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/animate-kontext.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">   

		<title>{{ config('app.name', 'Covid19 Vaccination Survey') }}</title>
    </head>
    <body class="hold-transition layout-top-nav" ng-app="survey" ng-controller="surveyCtrl">
    <div class="wrapper">
  
        <nav class="main-header navbar navbar-expand-md navbar-light" style="background-color: #215266; color: white;">
            <div class="container">
                <a href="http://localhost:8000/" class="navbar-brand move-center">
                    <img src="img/launion-logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light" style="color: white;"> Covid-19 Vaccination Survey</span>
                </a>
        </nav>

        <div class="row">
            <div class="col-lg-3 col-sm-2"></div>
                <div class="col-lg-6 col-sm-8">
                    <div class="card">

                        <div class="card-body login-card-body">

                            <div class="row">
                                <div class="col-lg-3 divhide">&nbsp;</div>

                                <div class="col-lg-6">
                                    <img class="img-fluid napanamgif" src="img/icons/napanam.gif">
                                </div>

                                <div class="col-lg-3 divhide">&nbsp;</div>
                                
                            </div>

                            <div class="row">
                                <div class="col-lg-2 divhide">&nbsp;</div>

                                <div class="col-lg-8">
                                    <h2 style="text-align: center;"><label style="color: #163d4e;">REGISTERED</label></h2>
                                </div>

                                <div class="col-lg-2 divhide">&nbsp;</div>
                                
                            </div>

                            <div class="row">
                                <div class="col-lg-2 divhide">&nbsp;</div>

                                <div class="col-lg-8">
                                    <h2 style="text-align: center;"><label style="color: #fa6248;">NAPANAM</label></h2>
                                </div>

                                <div class="col-lg-2 divhide">&nbsp;</div>
                                
                            </div>

                            <div class="row">
                                    <div class="col-lg-2 divhide">&nbsp;</div>

                                    <div class="col-lg-8">
                                        <p class="text-dark text-center">To enable to participate into this community survey, you must be registered to the <label style="color: #fa6248">NAPANAM</label>.</p>
                                    </div>

                                    <div class="col-lg-2 divhide">&nbsp;</div>
                            </div>

                            <div class="row">

                                <div class="col-lg-2 divhide">&nbsp;</div>
                            
                                <div class="col-lg-8 mt-3">
                                    <a href="http://localhost:8000/napanam"><button type="button" class="btn btn-block btn-outline-success btn-lg">Yes! I have NAPANAM QR ID </button></a>
                                </div>
                                
                                <div class="col-lg-2 divhide">&nbsp;</div>
                                
                            </div>

                            <div class="row">
                                
                                <div class="col-lg-2 divhide">&nbsp;</div>
                            
                                <div class="col-lg-8 mt-3">
                                    <button type="button" class="btn btn-block btn-outline-warning btn-lg">Not Yet! I don’t have NAPANAM QR ID </button>
                                </div>
                                
                                <div class="col-lg-2 divhide">&nbsp;</div>
                                
                            </div>
                        </div><!--Card Body End-->
                        <div class="second_line"></div>
                    </div>  <!--Card End-->
                </div>
            </div>
    <!--<ul class="bullets"></ul>-->
    </div>
    <script type="text/javascript" src="{{ mix('angularjs/angular.min.js') }}"></script>
    <script type="text/javascript" src="{{ mix('jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ mix('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/animate-kontext.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>

</body>
</html>
