<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="{{ env('APP_URL') }}/css/all.min.css" rel="stylesheet">
        <link href="{{ env('APP_URL') }}/css/adminlte.min.css" rel="stylesheet">
        <link href="{{ env('APP_URL') }}/css/animate-kontext.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">   

		<title>{{ config('app.name', 'Covid-19 Vaccination Survey') }}</title>
    </head>
    <body class="hold-transition layout-top-nav" ng-app="app" ng-controller="appCtrl">
    <div class="wrapper">
  
        <nav class="main-header navbar navbar-expand-md navbar-light" style="background-color: #215266; color: white;">
            <div class="container">
                <a href="{{env('APP_URL')}}" class="navbar-brand move-center">
                    <img src="{{env('APP_URL')}}/img/launion-logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light" style="color: white;"> La Union CoViD-19 Vaccination Survey</span>
                </a>
            </div>
        </nav>
        
		<div class="tab" style="display: none;">
		  <button class="tablinks" onclick="openCity(event, 'GetStarted')" id="defaultOpen">First</button>
		  <button class="tablinks" onclick="openCity(event, 'Register')">Second</button>
		  <button class="tablinks" onclick="openCity(event, 'Napanam')">Last</button>
		</div>

		<div id="GetStarted" class="tabcontent">
			<div class="row">
				<div class="col-lg-3 col-sm-2"></div>
				<div class="col-lg-6 col-sm-8">
					<div class="card">
							<div class="card-body login-card-body">
								
								<div class="row">
									<div class="col-lg-3 divhide">&nbsp;</div>

									<div class="col-lg-6">
										<img class="img-fluid launionlogo" src="img/Rugian.png">
									</div>

									<div class="col-lg-3 divhide">&nbsp;</div>
								</div>

								<div class="row mt-3">
									<div class="col-lg-12">
										<h2 style="text-align: center;"><label style="color: #163d4e;">CoViD-19 Free La Union</label></h2>
									</div>
								</div>

								<div class="row mt-2">
									<div class="col-lg-12">
										<h5 class="text-center"><label style="color: #163d4e;">Makibahagi sa unang hakbang!</label></h5>
									</div>
								</div>
								
								<div class="row mt-1">
									<div class="col-lg-12">
										<p class="text-center" style="color: #163d4e; font-weight: 550; font-size: 17px;">Share your thoughts on the CoViD-19 Vaccination through this survey.</p>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-3 divhide">&nbsp;</div>
								
									<div class="col-lg-6 mt-4">
										<button type="button" class="btn btn-block btn-lg" onclick="openCity(event, 'Register')" style="background-color: #68bca4; color: white;">GET STARTED </button>
									</div>
									
									<div class="col-lg-3 divhide">&nbsp;</div>
									
								</div>
							
							</div> <!--Card Body End-->
						
						<div class="first_line"></div>
					</div> <!--Card End-->
				</div>
			</div>
		</div>

		<div id="Register" class="tabcontent">
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
                                    <h2 style="text-align: center;"><label style="color: #163d4e;">NA<label style="color: #fa6248;">P</label>ANAM REGISTRATION</label></h2>
                                </div>

                                <div class="col-lg-2 divhide">&nbsp;</div>
                                
                            </div>

                            <div class="row">
                                    <div class="col-lg-2 divhide">&nbsp;</div>

                                    <div class="col-lg-8">
                                        <p class="text-dark text-center">To participate, please register to the NAPANAM.</p>
                                    </div>

                                    <div class="col-lg-2 divhide">&nbsp;</div>
                            </div>

                            <div class="row">

                                <div class="col-lg-2 divhide">&nbsp;</div>
                            
                                <div class="col-lg-8 mt-3">
                                    <button type="button" class="btn btn-block btn-lg" onclick="openCity(event, 'Napanam')" ng-click="privacyNotice()" style="background-color: #68bca4; color: white;">Yes, I already have a NAPANAM QR ID </button>
                                </div>
                                
                                <div class="col-lg-2 divhide">&nbsp;</div>
                                
                            </div>

                            <div class="row">
                                
                                <div class="col-lg-2 divhide">&nbsp;</div>
                            
                                <div class="col-lg-8 mt-3">
                                    <button type="button" class="btn btn-block btn-lg" ng-click="napanam()" style="background-color: #ffab5d; color: white;">No, I still do not have a NAPANAM QR ID </button>
                                </div>
                                
                                <div class="col-lg-2 divhide">&nbsp;</div>
                                
                            </div>
                        </div><!--Card Body End-->
                        <div class="second_line"></div>
                    </div>  <!--Card End-->
                </div>
            </div> 
		</div>
		
		<div id="Napanam" class="tabcontent">
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
									<h4 style="text-align: center;"><label style="color: #163d4e;">Enter Your</label></h4>
								</div>

								<div class="col-lg-2 divhide">&nbsp;</div>
								
							</div>
							
							<div class="row">
								<div class="col-lg-2 divhide">&nbsp;</div>

								<div class="col-lg-8">
									<h4 style="text-align: center;"><label style="color: #fa6248;">NAPANAM ID NO.</label></h4>
								</div>

								<div class="col-lg-2 divhide">&nbsp;</div>
								
							</div>

							<div class="row">
								<div class="col-lg-1 divhide">&nbsp;</div>

								<div class="col-lg-10">
									<form>
										<div class="input-group mb-3">
											<input type="number" class="form-control form-control-lg" placeholder="Napanam ID (e.g 123456)" ng-model="napanam_id">
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
							
							<div class="row" ng-hide="status=='200'">

								<div class="col-lg-3 divhide">&nbsp;</div>
							
								<div class="col-lg-6 mt-4">
									<a href="javascript:;" ng-click="proceed()"><button type="button" class="btn btn-block" style="background-color: #68bca4; color: white;">Next </button></a>
								</div>
								
								<div class="col-lg-3 divhide">&nbsp;</div>
								
							</div>
							
							<div class="row" ng-show="status=='200'">
								<div class="col-lg-2 divhide">&nbsp;</div>
								<div class="col-lg-8">
									<h5 style="text-align: center;"><label style="color: #163d4e;"><h6>For verification, please enter your</h6></label><label style="color: #fa6248;">&nbsp;BIRTH DATE</label></h5>
								</div>
								<div class="col-lg-2 divhide">&nbsp;</div>
							
								<div class="col-lg-1 divhide">&nbsp;</div>
								<div class="col-lg-10">
									<form>
										<div class="form-group mb-3">
											<input type="date" class="form-control form-control-lg" placeholder="Birthdate" ng-model="birthdate">
										</div>
									</form>
								</div>
								<div class="col-lg-1 divhide">&nbsp;</div>
						
								<div class="col-lg-3 divhide">&nbsp;</div>
								<div class="col-lg-6 mt-4">
									<a href="javascript:;" ng-click="checkBirthdate()"><button type="button" class="btn btn-block" style="background-color: #68bca4; color: white;">Proceed </button></a>
								</div>
								<div class="col-lg-3 divhide">&nbsp;</div>
							</div>
							
						</div>  <!--Card Body End-->
						<div class="third_line"></div> 
					</div>  <!--Card End-->
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
