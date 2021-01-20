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
    <body class="hold-transition layout-top-nav" ng-app="napanam" ng-controller="napanamCtrl">
    <div class="wrapper">
  
        <nav class="main-header navbar navbar-expand-md navbar-light" style="background-color: #215266; color: white;">
            <div class="container">
                <a href="http://localhost:8000/" class="navbar-brand move-center">
                    <img src="img/launion-logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light" style="color: white;"> Covid19 Vaccination Survey</span>
                </a>
        </nav>

        <div class="row">
            <div class="col-lg-3 col-sm-2"></div>
                <div class="col-lg-6 col-sm-8">
                    <div class="card">
                        <div class="card-body login-card-body">
                            <div class="row">
                                <div class="col-lg-1 div-hide">&nbsp;</div>

                                <div class="col-lg-10">
                                <img class="img-fluid napanamlogo" src="img/napanam_logo.png">
                                </div>

                                <div class="col-lg-1 divhide">&nbsp;</div>
                                
                            </div>

                            <div class="row">
                                <div class="col-lg-2 divhide">&nbsp;</div>

                                <div class="col-lg-8">
                                    <h2 style="text-align: center;"><label style="color: #163d4e;">Enter Your</label></h2>
                                </div>

                                <div class="col-lg-2 divhide">&nbsp;</div>
                                
                            </div>

                            <div class="row">
                                <div class="col-lg-2 divhide">&nbsp;</div>

                                <div class="col-lg-8">
                                    <h2 style="text-align: center;"><label style="color: #fa6248;">NAPANAM ID NO.</label></h2>
                                </div>

                                <div class="col-lg-2 divhide">&nbsp;</div>
                                
                            </div>

                            <div class="row">
                                    <div class="col-lg-1 divhide">&nbsp;</div>

                                    <div class="col-lg-10">
                                    <form>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control form-control-lg" placeholder="Napanam ID" ng-model="napanam_id">
                                            <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-id-card"></span>
                                            </div>
                                            </div>
                                        </div>
                                    </form>
                                    </div>

                                    <div class="col-lg-1 divhide">&nbsp;</div>
                            </div>

                            <div class="row">

                                <div class="col-lg-3 divhide">&nbsp;</div>
                            
                                <div class="col-lg-6 mt-4">
                                    <a href="javascript:;" ng-click="proceed()"><button type="button" class="btn btn-block btn-outline-success">Proceed </button></a>
                                </div>
                                
                                <div class="col-lg-3 divhide">&nbsp;</div>
                                
                            </div>
                        </div>  <!--Card Body End-->
                        <div class="third_line"></div> 
                    </div>  <!--Card End-->
                </div>
            </div>
         <!--<ul class="bullets"></ul>-->
        </div>

    <script type="text/javascript" src="{{ mix('angularjs/angular.min.js') }}"></script>
    <script type="text/javascript" src="{{ mix('jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ mix('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" src="{{ mix('js/animate-kontext.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/napanam.js') }}"></script>

</body>
</html>
