<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/animate-kontext.css') }}" rel="stylesheet">
	<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">   
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">   

	<title>{{ config('app.name', 'Covid-19 Vaccination Survey') }}</title>
</head>
<body class="hold-transition layout-top-nav" ng-app="survey" ng-controller="surveyCtrl">
	<div class="wrapper">
		<nav class="main-header navbar navbar-expand-md navbar-light" style="background-color: #215266; color: white;">
			<div class="container">
				<a href="http://localhost:8000/" class="navbar-brand move-center">
					<img src="/img/launion-logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
						style="opacity: .8">
					<span class="brand-text font-weight-light" style="color: white;"> Covid-19 Vaccination Survey</span>
				</a>
			</div>
		</nav>
		  
		<div class="row mt-2">
			<div class="col-lg-3 col-sm-2"></div>
				<div class="col-lg-6 col-sm-8">
					<div class="card">
						<form role="form">
							<div class="card-body">
							  
							  <div class="form-group">
								<h4 class="text-dark mb-3">1. Population Group</h4>
								
								<div class="col-sm-12">
								  <!-- radio -->
								  <div class="form-group">

									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="customRadio1" name="population_group" ng-model="survey.populationGroup" value="@{{ populationGroupValues.frontline_health_workers }}">
									  <label for="customRadio1" class="custom-control-label text-dark">@{{ populationGroup.frontline_health_workers }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="customRadio2" name="population_group" ng-model="survey.populationGroup">
									  <label for="customRadio2" class="custom-control-label text-dark">@{{ populationGroup.senior_citizens }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="uniformed_personnel" name="population_group" ng-model="survey.uniformed_personnel">
									  <label for="uniformed_personnel" class="custom-control-label text-dark">@{{ populationGroup.uniformed_personnel }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="teachers" name="population_group" ng-model="survey.teachers">
									  <label for="teachers" class="custom-control-label text-dark">@{{ populationGroup.teachers }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="social_workers" name="population_group" ng-model="survey.social_workers">
									  <label for="social_workers" class="custom-control-label text-dark">@{{ populationGroup.social_workers }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="government_employees" name="population_group" ng-model="survey.government_employees">
									  <label for="government_employees" class="custom-control-label text-dark">@{{ populationGroup.government_employees }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="agriculture_group" name="population_group" ng-model="survey.agriculture_group">
									  <label for="agriculture_group" class="custom-control-label text-dark">@{{ populationGroup.agriculture_group }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="food_industry" name="population_group" ng-model="survey.food_industry">
									  <label for="food_industry" class="custom-control-label text-dark">@{{ populationGroup.food_industry }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="transportation" name="population_group" ng-model="survey.tranportation">
									  <label for="transportation" class="custom-control-label text-dark">@{{ populationGroup.tranportation }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="tourism" name="population_group" ng-model="survey.tourism">
									  <label for="tourism" class="custom-control-label text-dark">@{{ populationGroup.tourism }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="person_deprived" name="population_group" ng-model="survey.persons_deprived_of_liberty">
									  <label for="person_deprived" class="custom-control-label text-dark">@{{ populationGroup.persons_deprived_of_liberty }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="pwd" name="population_group" ng-model="survey.persons_with_disability">
									  <label for="pwd" class="custom-control-label text-dark">@{{ populationGroup.persons_with_disability }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="ofw" name="population_group" ng-model="survey.ofw">
									  <label for="ofw" class="custom-control-label text-dark">@{{ populationGroup.ofw }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="others" name="population_group" ng-model="survey.others_population_group">
									  <label for="others" class="custom-control-label text-dark">@{{ populationGroup.others_population_group }}</label>
									</div>
									<hr>
								  </div>
								</div>
							  </div>

							  <hr>

							  <div class="form-group">
								<h4 class="text-dark mb-3">2. Have you ever had or do you have any of the following health conditions? *</h4>
								<div class="col-sm-12">
								  <!-- checkbox -->
								  <div class="form-group">
									<div class="custom-control custom-checkbox mb-2">
									  <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="health_conditions" ng-model="survey.lung_disease">
									  <label for="customCheckbox1" class="custom-control-label text-dark">@{{ healthConditions.lung_disease }}</label>
									</div>
									<hr>
									<div class="custom-control custom-checkbox mb-2">
									  <input class="custom-control-input" type="checkbox" id="customCheckbox2" name="health_conditions" ng-model="survey.heart_disease">
									  <label for="customCheckbox2" class="custom-control-label text-dark">@{{ healthConditions.heart_disease }}</label>
									</div>
									<hr>
									<div class="custom-control custom-checkbox mb-2">
									  <input class="custom-control-input" type="checkbox" id="customCheckbox3" name="health_conditions" ng-model="survey.kidney_disease">
									  <label for="customCheckbox3" class="custom-control-label text-dark">@{{ healthConditions.kidney_disease }}</label>
									</div>
									<hr>
									<div class="custom-control custom-checkbox mb-2">
									  <input class="custom-control-input" type="checkbox" id="customCheckbox4" name="health_conditions" ng-model="survey.diabetes">
									  <label for="customCheckbox4" class="custom-control-label text-dark">@{{ healthConditions.diabetes }}</label>
									</div>
									<hr>
									<div class="custom-control custom-checkbox mb-2">
									  <input class="custom-control-input" type="checkbox" id="customCheckbox5" name="health_conditions" ng-model="survey.high_blood_pressure">
									  <label for="customCheckbox5" class="custom-control-label text-dark">@{{ healthConditions.high_blood_pressure }}</label>
									</div>
									<hr>
									<div class="custom-control custom-checkbox mb-2">
									  <input class="custom-control-input" type="checkbox" id="customCheckbox6" name="health_conditions" ng-model="survey.cancer">
									  <label for="customCheckbox6" class="custom-control-label text-dark">@{{ healthConditions.cancer }}</label>
									</div>
									<hr>
									<div class="custom-control custom-checkbox mb-2">
									  <input class="custom-control-input" type="checkbox" id="customCheckbox11" name="health_conditions" ng-model="survey.leukemia">
									  <label for="customCheckbox11" class="custom-control-label text-dark">@{{ healthConditions.leukemia }}</label>
									</div>
									<hr>
									<div class="custom-control custom-checkbox mb-2">
									  <input class="custom-control-input" type="checkbox" id="customCheckbox7"  name="health_conditions" ng-model="survey.hiv">
									  <label for="customCheckbox7" class="custom-control-label text-dark">@{{ healthConditions.hiv }}</label>
									</div>
									<hr>
									<div class="custom-control custom-checkbox mb-2">
									  <input class="custom-control-input" type="checkbox" id="customCheckbox8"  name="health_conditions" ng-model="survey.mental_problem">
									  <label for="customCheckbox8" class="custom-control-label text-dark">@{{ healthConditions.mental_problem }}</label>
									</div>
									<hr>
									<div class="custom-control custom-checkbox mb-2">
									  <input class="custom-control-input" type="checkbox" id="customCheckbox9"  name="health_conditions" ng-model="survey.others_health_condition">
									  <label for="customCheckbox9" class="custom-control-label text-dark">@{{ healthConditions.others_health_condition }}</label>
									</div>
									<hr>
									<div class="custom-control custom-checkbox mb-2">
									  <input class="custom-control-input" type="checkbox" id="customCheckbox10"  name="health_conditions" ng-model="survey.none_of_the_above">
									  <label for="customCheckbox10" class="custom-control-label text-dark">@{{ healthConditions.none_of_the_above }}</label>
									</div>
									<hr>
								  </div>
								</div>
							  </div>
							  <hr>
							  
							  <div class="form-group">
								<h4 class="text-dark mb-3">3. Are you pregnant or planning to have a baby?</h4>
								
								<div class="row">
								  <div class="col-lg-4 col-sm-12">
									<!-- radio -->
									<div class="form-group">
									  <div class="custom-control custom-radio mb-2">
										<input class="custom-control-input" type="radio" id="baby_yes" name="baby" ng-model="survey.yes_pregnant_baby">
										<label for="baby_yes" class="custom-control-label text-dark">Yes</label>
									  </div>
									</div>
								  </div>

								  <div class="col-lg-4 col-sm-12">
									<!-- radio -->
									<div class="form-group">
									  <div class="custom-control custom-radio mb-2">
										<input class="custom-control-input" type="radio" id="baby_no" name="baby" ng-model="survey.no_pregnant_baby">
										<label for="baby_no" class="custom-control-label text-dark">No</label>
									  </div>
									</div>
								  </div>

								  <div class="col-lg-4 col-sm-12">
									<!-- radio -->
									<div class="form-group">
									  <div class="custom-control custom-radio mb-2">
										<input class="custom-control-input" type="radio" id="baby_not_sure" name="baby" ng-model="survey.not_sure_pregnant_baby">
										<label for="baby_not_sure" class="custom-control-label text-dark">Not Sure</label>
									  </div>
									</div>
								  </div>
								</div>

							  </div>

							  <hr>

							  <div class="form-group">
								<h4 class="text-dark mb-3">4. Are you willing to be vaccinated with any available Covid-19 vaccine?</h4>
								
								<div class="row">
								  <div class="col-lg-6 col-sm-12">
									<!-- radio -->
									<div class="form-group">
									  <div class="custom-control custom-radio mb-2">
										<input class="custom-control-input" type="radio" id="willing_yes" name="vaccinated" ng-model="survey.yes_vaccine">
										<label for="willing_yes" class="custom-control-label text-dark">Yes</label>
									  </div>
									</div>
								  </div>

								  <div class="col-lg-6 col-sm-12">
									<!-- radio -->
									<div class="form-group">
									  <div class="custom-control custom-radio mb-2">
										<input class="custom-control-input" type="radio" id="willing_no" name="vaccinated" ng-model="survey.no_vaccine">
										<label for="willing_no" class="custom-control-label text-dark">No</label>
									  </div>
									</div>
								  </div>
								</div>

							  </div>
							  
							  <hr>

							  <div class="form-group">
								<h4 class="text-dark mb-3">Are you willing to contribute to the vaccination fee?</h4>
								<div class="row">
								  <div class="col-lg-6 col-sm-12">
									<!-- radio -->
									<div class="form-group">
									  <div class="custom-control custom-radio mb-2">
										<input class="custom-control-input" type="radio" id="contribute_yes" name="vaccinated_fee" ng-model="survey.yes_contribute">
										<label for="contribute_yes" class="custom-control-label text-dark">Yes</label>
									  </div>
									</div>
								  </div>

								  <div class="col-lg-6 col-sm-12">
									<!-- radio -->
									<div class="form-group">
									  <div class="custom-control custom-radio mb-2">
										<input class="custom-control-input" type="radio" id="contribute_no" name="vaccinated_fee" ng-model="survey.no_contribute">
										<label for="contribute_no" class="custom-control-label text-dark">No</label>
									  </div>
									</div>
								  </div>
								</div>
							  </div>
							  
							   <hr>

							  <div class="form-group">
								<h4 class="text-dark mb-3">Why? State reasons.</h4>
								<div class="col-sm-12">
								  <!-- radio -->
								  <div class="form-group">
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="reasons" name="reasons" ng-model="survey.efficacy_rate_reason">
									  <label for="reasons" class="custom-control-label text-dark">@{{ reasons.efficacy_rate_reason }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="reasons1" name="reasons" ng-model="survey.vaccine_cost_reason">
									  <label for="reasons1" class="custom-control-label text-dark">@{{ reasons.vaccine_cost_reason }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="reasons2" name="reasons" ng-model="survey.side_effects_reason">
									  <label for="reasons2" class="custom-control-label text-dark">@{{ reasons.side_effects_reason }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="reasons3" name="reasons" ng-model="survey.lack_of_information_reason">
									  <label for="reasons3" class="custom-control-label text-dark">@{{ reasons.lack_of_information_reason }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="reasons4" name="reasons" ng-model="survey.others_reason">
									  <label for="reasons4" class="custom-control-label text-dark">@{{ reasons.others_reason }}</label>
									</div>
									<hr>
								  </div>
								</div>
							  </div>
							  
							</div>
							<!-- /.card-body -->

							<div class="card-footer">
							   <div class="row">
								  <div class="col-4"></div>
								  <div class="col-4">
									<button type="submit" class="btn btn-success btn-block" ng-click="submit()">Submit</button>
								  </div>
								  <div class="col-4"></div>
								</div>
							</div>
						</form>
					</div>
				</div>
			<div class="col-lg-3 col-sm-2"></div>
		</div>
	</div>

	<script type="text/javascript" src="{{ mix('angularjs/angular.min.js') }}"></script>
	<script type="text/javascript" src="{{ mix('jquery/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ mix('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script type="text/javascript" src="{{ mix('js/survey.js') }}"></script>

</body>
</html>
