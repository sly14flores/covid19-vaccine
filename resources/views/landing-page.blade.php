<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="{{ env('APP_URL') }}/css/all.min.css" rel="stylesheet">
        <link href="{{ env('APP_URL') }}/css/adminlte.min.css" rel="stylesheet">
        <link href="{{ env('APP_URL') }}/css/animate-landing-page.css" rel="stylesheet">
		<link href="{{ env('APP_URL') }}/css/landing-page.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">   

		<title>{{ config('app.name', 'La Union CoViD-19 Vaccination') }}</title>
    </head>
    <body class="hold-transition layout-top-nav" ng-app="app" ng-controller="appCtrl">
    <div class="wrapper">
  
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-landing-page" style="background-color: #92c1bd;">
            <div class="container">
                <a href="{{env('APP_URL')}}" class="navbar-brand move-center">
                    <img src="{{env('APP_URL')}}/img/launion-logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light" style="color: #505050;"> La Union CoViD-19 Vaccination</span>
                </a>
            </div>
        </nav>

		<div class="row">
            <div class="col-lg-4 col-sm-12 remove-background">
                <div class="background">
                    <img alt="logo" src="img/launion-logo.png" class="lu-logo"/>
                    <div class="text-content">
                        <p class="p1">COVID-19</p>
						<p class="p1">VACCINATION</p>
						<p>PROGRAM</p>
                    </div>
                </div>
            </div>
			<div class="col-lg-2 col-sm-12"></div>
			<div class="col-lg-6 col-sm-12" style="margin-top: 1.2%;">
				<div class="col-lg-10 col-sm-12">
					<div class="card">
						<div class="card-body login-card-body">
							<div class="row">
								<div class="col-lg-1 div-hide">&nbsp;</div>
								<div class="col-lg-10">
									<img src="img/Bakuna-muna.png" class="bakuna-logo">
								</div>
								<div class="col-lg-1 divhide">&nbsp;</div>
							</div>

							<div class="row">
								<div class="col-lg-12 col-sm-12">
									<div class="text-content-card">
										<p class="p2">Kaisa tayo ng mundo tungo sa pagbangon.</p>
										<p class="p2">Makilahok sa vaccination program ng La Union.</p>
										<p class="p2">Para sa karagdagang impormasyon, bumisita sa <a href="https://doh.gov.ph/faqs/vaccines" style="color: #5c5c5c">https://doh.gov.ph/faqs/vaccines</a> o sa <a href="https://www.facebook.com/LGUlaunion" style="color: #5c5c5c">official PGLU Facebook Page.</a></p>
										<p class="p3">Register now, Kaprobinsiaan!</p>
										<center><a href="registration"><button class="button p-ml-2" style="vertical-align:middle"><span>VACCINE REGISTRATION</span></button></a></center>
									</div>
								</div>
							</div>
						</div>  <!--Card Body End-->
					</div>
				</div>
				<div class="col-lg-10 col-sm-12">
					<div class="card">
						<div class="card-body login-card-body">
							<div class="row">
								<div class="col-lg-1 div-hide">&nbsp;</div>
								<div class="col-lg-10">
									<img src="img/Rugian.png" class="rugian-logo">
								</div>
								<div class="col-lg-1 divhide">&nbsp;</div>
							</div>

							<div class="row">
								<div class="col-lg-12 col-sm-12">
									<div class="text-content-card">
										<p>COVID-19 FREE LA UNION</p>
										<p>MAKIBAHAGI SA UNANG HAKBANG!</p>
										<p>SHARE YOUR THOUGHTS ON THE COVID-19 VACCINATION THROUGH THIS SURVEY.</p>
										<center><a href="survey"><button class="button p-ml-2" style="vertical-align:middle"><span>TAKE THE SURVEY</span></button></a></center>
									</div>
								</div>
							</div>
						</div>  <!--Card Body End-->
					</div>
				</div>
			</div>
		</div>
        
	</div>
    <script type="text/javascript" src="{{ env('APP_URL') }}/angularjs/angular.min.js"></script>
    <script type="text/javascript" src="{{ env('APP_URL') }}/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="{{ env('APP_URL') }}/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="{{ env('APP_URL') }}/js/animate-kontext.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script type="text/javascript" src="{{ env('APP_URL') }}/js/tabs.js?id={{ rand() }}"></script>
    <script type="text/javascript" src="{{ env('APP_URL') }}/js/app.js?id={{ rand() }}"></script>
</body>
</html>
