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
</head>
<body class="hold-transition layout-top-nav" ng-app="survey" ng-controller="surveyCtrl">
		
	<div class="wrapper">
		<nav class="main-header navbar navbar-expand-md navbar-light" style="background-color: #215266; color: white;">
			<div class="container">
				<a href="{{ env('APP_URL') }}" class="navbar-brand move-center">
					<img src="{{env('APP_URL')}}/img/launion-logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
						style="opacity: .8">
					<span class="brand-text font-weight-light" style="color: white;"> Covid-19 Vaccination Survey</span>
				</a>
			</div>
		</nav>
		  
		<div class="row mt-2">
			<div class="col-lg-3 col-sm-2"></div>
				<div class="col-lg-6 col-sm-8">
				
					<form role="form">
						<div class="card" ng-class="{first_question_active: survey.population_group}">
							<div class="card-body">
							  <div class="form-group">
								<h4 class="text-dark mb-3"><i class="text-danger">*</i> 1. Population Group <i class="fa fa-check-circle fa-xs text-success" ng-show="survey.population_group"></i></h4>
								<div class="col-lg-12">
								  <!-- radio -->
								  <div class="form-group">

									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="frontline_health_workers" name="populationGroup" ng-model="survey.population_group" value="@{{ populationGroupValues.frontline_health_workers }}">
									  <label for="frontline_health_workers" class="custom-control-label text-dark">@{{ populationGroup.frontline_health_workers }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="senior_citizens" name="populationGroup" ng-model="survey.population_group" value="@{{ populationGroupValues.senior_citizens }}">
									  <label for="senior_citizens" class="custom-control-label text-dark">@{{ populationGroup.senior_citizens }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="uniformed_personnel" name="populationGroup" ng-model="survey.population_group" value="@{{ populationGroupValues.uniformed_personnel }}">
									  <label for="uniformed_personnel" class="custom-control-label text-dark">@{{ populationGroup.uniformed_personnel }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="teachers" name="populationGroup" ng-model="survey.population_group" value="@{{ populationGroupValues.teachers }}">
									  <label for="teachers" class="custom-control-label text-dark">@{{ populationGroup.teachers }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="social_workers" name="populationGroup" ng-model="survey.population_group" value="@{{ populationGroupValues.social_workers }}">
									  <label for="social_workers" class="custom-control-label text-dark">@{{ populationGroup.social_workers }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="government_employees" name="populationGroup" ng-model="survey.population_group" value="@{{ populationGroupValues.government_employees }}">
									  <label for="government_employees" class="custom-control-label text-dark">@{{ populationGroup.government_employees }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="agriculture_group" name="populationGroup" ng-model="survey.population_group" value="@{{ populationGroupValues.agriculture_group }}">
									  <label for="agriculture_group" class="custom-control-label text-dark">@{{ populationGroup.agriculture_group }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="food_industry" name="populationGroup" ng-model="survey.population_group" value="@{{ populationGroupValues.food_industry }}">
									  <label for="food_industry" class="custom-control-label text-dark">@{{ populationGroup.food_industry }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="transportation" name="populationGroup" ng-model="survey.population_group" value="@{{ populationGroupValues.tranportation }}">
									  <label for="transportation" class="custom-control-label text-dark">@{{ populationGroup.tranportation }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="tourism" name="populationGroup" ng-model="survey.population_group" value="@{{ populationGroupValues.tourism }}">
									  <label for="tourism" class="custom-control-label text-dark">@{{ populationGroup.tourism }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="person_deprived" name="populationGroup" ng-model="survey.population_group" value="@{{ populationGroupValues.persons_deprived_of_liberty }}">
									  <label for="person_deprived" class="custom-control-label text-dark">@{{ populationGroup.persons_deprived_of_liberty }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="pwd" name="populationGroup" ng-model="survey.population_group" value="@{{ populationGroupValues.persons_with_disability }}">
									  <label for="pwd" class="custom-control-label text-dark">@{{ populationGroup.persons_with_disability }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="ofw" name="populationGroup" ng-model="survey.population_group" value="@{{ populationGroupValues.ofw }}">
									  <label for="ofw" class="custom-control-label text-dark">@{{ populationGroup.ofw }}</label>
									</div>
									<hr>
									<div class="custom-control custom-radio mb-2">
									  <input class="custom-control-input" type="radio" id="others" name="populationGroup" ng-model="survey.population_group" value="@{{ populationGroupValues.others_population_group }}">
									  <label for="others" class="custom-control-label text-dark">@{{ populationGroup.others_population_group }}</label>
									</div>
									<hr>
									<div class="input-group" ng-show="survey.population_group=='others_population_group'">
										<input type="text" class="form-control" placeholder="Others" ng-model="survey.population_group_other">
									</div>
								  </div>
								</div>
							  </div>
							</div><!-- /.card-body -->
						</div><!-- /.card -->
						
						<div class="card" ng-class="{second_question_active: survey.lung_disease || survey.heart_disease || survey.kidney_disease || survey.diabetes || survey.high_blood_pressure || survey.cancer || survey.leukemia || survey.hiv || survey.mental_problem || survey.others_health_condition ||survey.none_of_the_above}">
							<div class="card-body">
							  <div class="form-group">
								<h4 class="text-dark mb-3"><i class="text-danger">*</i> 2. Have you ever had or do you have any of the following health conditions? <i class="fa fa-check-circle fa-xs text-success" aria-hidden="true" ng-show="survey.lung_disease || survey.heart_disease || survey.kidney_disease || survey.diabetes || survey.high_blood_pressure || survey.cancer || survey.leukemia || survey.hiv || survey.mental_problem || survey.others_health_condition ||survey.none_of_the_above"></i></h4>
								<div class="col-sm-12">
								  <!-- checkbox -->
								  <div class="form-group">
									<div class="custom-control custom-checkbox mb-2">
									  <input class="custom-control-input" type="checkbox" id="lung_disease" name="health_conditions" ng-model="survey.lung_disease">
									  <label for="lung_disease" class="custom-control-label text-dark">@{{ healthConditions.lung_disease }}</label>
									</div>
									<hr>
									<div class="custom-control custom-checkbox mb-2">
									  <input class="custom-control-input" type="checkbox" id="heart_disease" name="health_conditions" ng-model="survey.heart_disease">
									  <label for="heart_disease" class="custom-control-label text-dark">@{{ healthConditions.heart_disease }}</label>
									</div>
									<hr>
									<div class="custom-control custom-checkbox mb-2">
									  <input class="custom-control-input" type="checkbox" id="kidney_disease" name="health_conditions" ng-model="survey.kidney_disease">
									  <label for="kidney_disease" class="custom-control-label text-dark">@{{ healthConditions.kidney_disease }}</label>
									</div>
									<hr>
									<div class="custom-control custom-checkbox mb-2">
									  <input class="custom-control-input" type="checkbox" id="diabetes" name="health_conditions" ng-model="survey.diabetes">
									  <label for="diabetes" class="custom-control-label text-dark">@{{ healthConditions.diabetes }}</label>
									</div>
									<hr>
									<div class="custom-control custom-checkbox mb-2">
									  <input class="custom-control-input" type="checkbox" id="high_blood_pressure" name="health_conditions" ng-model="survey.high_blood_pressure">
									  <label for="high_blood_pressure" class="custom-control-label text-dark">@{{ healthConditions.high_blood_pressure }}</label>
									</div>
									<hr>
									<div class="custom-control custom-checkbox mb-2">
									  <input class="custom-control-input" type="checkbox" id="cancer" name="health_conditions" ng-model="survey.cancer">
									  <label for="cancer" class="custom-control-label text-dark">@{{ healthConditions.cancer }}</label>
									</div>
									<hr>
									<div class="custom-control custom-checkbox mb-2">
									  <input class="custom-control-input" type="checkbox" id="leukemia" name="health_conditions" ng-model="survey.leukemia">
									  <label for="leukemia" class="custom-control-label text-dark">@{{ healthConditions.leukemia }}</label>
									</div>
									<hr>
									<div class="custom-control custom-checkbox mb-2">
									  <input class="custom-control-input" type="checkbox" id="hiv"  name="health_conditions" ng-model="survey.hiv">
									  <label for="hiv" class="custom-control-label text-dark">@{{ healthConditions.hiv }}</label>
									</div>
									<hr>
									<div class="custom-control custom-checkbox mb-2">
									  <input class="custom-control-input" type="checkbox" id="mental_problem"  name="health_conditions" ng-model="survey.mental_problem">
									  <label for="mental_problem" class="custom-control-label text-dark">@{{ healthConditions.mental_problem }}</label>
									</div>
									<hr>
									<div class="custom-control custom-checkbox mb-2">
									  <input class="custom-control-input" type="checkbox" id="others_health_condition"  name="health_conditions" ng-model="survey.others_health_condition">
									  <label for="others_health_condition" class="custom-control-label text-dark">@{{ healthConditions.others_health_condition }}</label>
									</div>
									<div class="input-group" ng-show="survey.others_health_condition">
										<input type="text" class="form-control" placeholder="Others" ng-model="survey.health_condition_other">
									</div>
									<hr>
									<div class="custom-control custom-checkbox mb-2">
									  <input class="custom-control-input" type="checkbox" id="none_of_the_above"  name="health_conditions" ng-model="survey.none_of_the_above">
									  <label for="none_of_the_above" class="custom-control-label text-dark">@{{ healthConditions.none_of_the_above }}</label>
									</div>
									<hr>
								  </div>
								</div>
							  </div>
							</div><!-- /.card-body -->
						</div><!-- /.card -->
						
						<div class="card" ng-class="{ third_question_active:  survey.pregnancy}">
							<div class="card-body">
								<div class="form-group">
									<h4 class="text-dark mb-3"><i class="text-danger">*</i> 3. Are you pregnant or planning to have a baby? <i class="fa fa-check-circle fa-xs text-success" aria-hidden="true" ng-show="survey.pregnancy"></i></h4>
									<div class="row">
									  <div class="col-lg-4 col-sm-12">
										<!-- radio -->
										<div class="form-group">
										  <div class="custom-control custom-radio mb-2">
											<input class="custom-control-input" type="radio" id="baby_yes" name="baby" ng-model="survey.pregnancy" value="@{{ pregnancyValues.yes_pregnant_baby }}">
											<label for="baby_yes" class="custom-control-label text-dark">Yes</label>
										  </div>
										</div>
									  </div>

									  <div class="col-lg-4 col-sm-12">
										<!-- radio -->
										<div class="form-group">
										  <div class="custom-control custom-radio mb-2">
											<input class="custom-control-input" type="radio" id="baby_no" name="baby" ng-model="survey.pregnancy" value="@{{ pregnancyValues.no_pregnant_baby }}">
											<label for="baby_no" class="custom-control-label text-dark">No</label>
										  </div>
										</div>
									  </div>

									  <div class="col-lg-4 col-sm-12">
										<!-- radio -->
										<div class="form-group">
										  <div class="custom-control custom-radio mb-2">
											<input class="custom-control-input" type="radio" id="baby_not_sure" name="baby" ng-model="survey.pregnancy" value="@{{ pregnancyValues.not_sure_pregnant_baby }}">
											<label for="baby_not_sure" class="custom-control-label text-dark">Not Sure</label>
										  </div>
										</div>
									  </div>
									</div>
								</div>
							</div><!-- /.card-body -->
						</div><!-- /.card -->
						
						<div class="card" ng-class="{ third_question_active:  survey.vaccine}">
							<div class="card-body">
								<div class="form-group">
									<h4 class="text-dark mb-3"><i class="text-danger">*</i> 4. Are you willing to be vaccinated with any available Covid-19 vaccine? <i class="fa fa-check-circle fa-xs text-success" aria-hidden="true" ng-show="survey.vaccine"></i></h4>
									
									<div class="row">
										<div class="col-lg-6 col-sm-12">
											<!-- radio -->
											<div class="form-group">
											  <div class="custom-control custom-radio mb-2">
												<input class="custom-control-input" type="radio" id="yes_vaccine" name="vaccine" ng-model="survey.vaccine" value="@{{ vaccineValues.yes_vaccine }}">
												<label for="yes_vaccine" class="custom-control-label text-dark">Yes</label>
											  </div>
											</div>
										</div>

										<div class="col-lg-6 col-sm-12">
											<!-- radio -->
											<div class="form-group">
											  <div class="custom-control custom-radio mb-2">
												<input class="custom-control-input" type="radio" id="no_vaccine" name="vaccine" ng-model="survey.vaccine" value="@{{ vaccineValues.no_vaccine }}">
												<label for="no_vaccine" class="custom-control-label text-dark">No</label>
											  </div>
											</div>
										</div>
									</div>
									
									<div class="form-group" style="display: none;">
										<hr>
										<h4 class="text-dark mb-3">* How much are you willing to pay for the vaccine fee?. <i class="fa fa-check-circle fa-xs text-success" aria-hidden="true" ng-show="survey.contribution"></i></h4>
										<div class="col-sm-12">
											<div class="form-group">
												<div class="custom-control custom-radio mb-2">
												  <input class="custom-control-input" type="radio" id="one_hundred_percent_fee" name="contribution" ng-model="survey.contribution" value="@{{ contributionValues.one_hundred_percent_fee }}">
												  <label for="one_hundred_percent_fee" class="custom-control-label text-dark">@{{ contribution.one_hundred_percent_fee }}</label>
												</div>
												<hr>
												<div class="custom-control custom-radio mb-2">
												  <input class="custom-control-input" type="radio" id="seventy_five_percent_fee" name="contribution" ng-model="survey.contribution" value="@{{ contributionValues.seventy_five_percent_fee }}">
												  <label for="seventy_five_percent_fee" class="custom-control-label text-dark">@{{ contribution.seventy_five_percent_fee }}</label>
												</div>
												<hr>
												<div class="custom-control custom-radio mb-2">
												  <input class="custom-control-input" type="radio" id="fifty_percent_fee" name="contribution" ng-model="survey.contribution" value="@{{ contributionValues.fifty_percent_fee }}">
												  <label for="fifty_percent_fee" class="custom-control-label text-dark">@{{ contribution.fifty_percent_fee }}</label>
												</div>
												<hr>
												<div class="custom-control custom-radio mb-2">
												  <input class="custom-control-input" type="radio" id="twenty_five_percent_fee" name="contribution" ng-model="survey.contribution" value="@{{ contributionValues.twenty_five_percent_fee }}">
												  <label for="twenty_five_percent_fee" class="custom-control-label text-dark">@{{ contribution.twenty_five_percent_fee }}</label>
												</div>
												<hr>
												<div class="custom-control custom-radio mb-2">
												  <input class="custom-control-input" type="radio" id="none_fee" name="contribution" ng-model="survey.contribution" value="@{{ contributionValues.none_fee }}">
												  <label for="none_fee" class="custom-control-label text-dark">@{{ contribution.none_fee }}</label>
												</div>
												<hr>
											</div>
										</div>
									</div>
								  
									<div class="form-group" ng-show="survey.vaccine=='no_vaccine'">
										<hr>
										<h4 class="text-dark mb-3">* I'm interested with Covid-19 Immunization Program, however, I am concerned with: <i class="fa fa-check-circle fa-xs text-success" aria-hidden="true" ng-show="survey.reason"></i></h4>
										<div class="col-sm-12">
											<div class="form-group">
												<div class="custom-control custom-radio mb-2">
												  <input class="custom-control-input" type="radio" id="efficacy_rate_reason" name="reason" ng-model="survey.reason" value="@{{ reasonValues.efficacy_rate_reason }}">
												  <label for="efficacy_rate_reason" class="custom-control-label text-dark">@{{ reason.efficacy_rate_reason }}</label>
												</div>
												<hr>
												<div class="custom-control custom-radio mb-2">
												  <input class="custom-control-input" type="radio" id="vaccine_cost_reason" name="reason" ng-model="survey.reason" value="@{{ reasonValues.vaccine_cost_reason }}">
												  <label for="vaccine_cost_reason" class="custom-control-label text-dark">@{{ reason.vaccine_cost_reason }}</label>
												</div>
												<hr>
												<div class="custom-control custom-radio mb-2">
												  <input class="custom-control-input" type="radio" id="side_effects_reason" name="reason" ng-model="survey.reason" value="@{{ reasonValues.side_effects_reason }}">
												  <label for="side_effects_reason" class="custom-control-label text-dark">@{{ reason.side_effects_reason }}</label>
												</div>
												<hr>
												<div class="custom-control custom-radio mb-2">
												  <input class="custom-control-input" type="radio" id="lack_of_information_reason" name="reason" ng-model="survey.reason" value="@{{ reasonValues.lack_of_information_reason }}">
												  <label for="lack_of_information_reason" class="custom-control-label text-dark">@{{ reason.lack_of_information_reason }}</label>
												</div>
												<hr>
												<div class="custom-control custom-radio mb-2">
												  <input class="custom-control-input" type="radio" id="others_reason" name="reason" ng-model="survey.reason" value="@{{ reasonValues.others_reason }}">
												  <label for="others_reason" class="custom-control-label text-dark">@{{ reason.others_reason }}</label>
												</div>
												<hr>
												<div class="input-group" ng-show="survey.reason=='others_reason'">
													<input type="text" class="form-control" placeholder="Others" ng-model="survey.reason_other">
												</div>
											</div>
										</div>
									</div>
								</div>
								
							</div><!-- /.card-body -->
							<div class="card-footer">
							   <div class="row">
								  <div class="col-4"></div>
								  <div class="col-4">
									<button type="submit" class="btn btn-success btn-block" ng-click="submit()">Submit</button>
								  </div>
								  <div class="col-4"></div>
								</div>
							</div>
						</div><!-- /.card -->
						
					</form>
				</div>
			<div class="col-lg-3 col-sm-2"></div>
		</div>
	</div>

	<script type="text/javascript" src="{{ env('APP_URL') }}/angularjs/angular.min.js"></script>
	<script type="text/javascript" src="{{ env('APP_URL') }}/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="{{ env('APP_URL') }}/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="{{ env('APP_URL') }}/js/loader.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script type="text/javascript" src="{{ env('APP_URL') }}/js/survey.js?id={{ rand() }}"></script>

</body>
</html>
