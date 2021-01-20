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
                <img src="img/launion-logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
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
                          <input class="custom-control-input" type="radio" id="customRadio1" name="population_group">
                          <label for="customRadio1" class="custom-control-label text-dark">Frontline Health Workers</label>
                        </div>
                        <hr>
                        <div class="custom-control custom-radio mb-2">
                          <input class="custom-control-input" type="radio" id="customRadio2" name="population_group">
                          <label for="customRadio2" class="custom-control-label text-dark">Senior Citizens</label>
                        </div>
                        <hr>
                        <div class="custom-control custom-radio mb-2">
                          <input class="custom-control-input" type="radio" id="uniformed_personnel" name="population_group">
                          <label for="uniformed_personnel" class="custom-control-label text-dark">Uniformed Personnel (PNP, AFP, PCG, BFP, BJMP, ETC)</label>
                        </div>
                        <hr>
                        <div class="custom-control custom-radio mb-2">
                          <input class="custom-control-input" type="radio" id="teachers" name="population_group">
                          <label for="teachers" class="custom-control-label text-dark">Teachers</label>
                        </div>
                        <hr>
                        <div class="custom-control custom-radio mb-2">
                          <input class="custom-control-input" type="radio" id="social_workers" name="population_group">
                          <label for="social_workers" class="custom-control-label text-dark">Social Workers</label>
                        </div>
                        <hr>
                        <div class="custom-control custom-radio mb-2">
                          <input class="custom-control-input" type="radio" id="government_employees" name="population_group">
                          <label for="government_employees" class="custom-control-label text-dark">Government Employees</label>
                        </div>
                        <hr>
                        <div class="custom-control custom-radio mb-2">
                          <input class="custom-control-input" type="radio" id="agriculture_group" name="population_group">
                          <label for="agriculture_group" class="custom-control-label text-dark">Agriculture Group</label>
                        </div>
                        <hr>
                        <div class="custom-control custom-radio mb-2">
                          <input class="custom-control-input" type="radio" id="food_industry" name="population_group">
                          <label for="food_industry" class="custom-control-label text-dark">Food Industry</label>
                        </div>
                        <hr>
                        <div class="custom-control custom-radio mb-2">
                          <input class="custom-control-input" type="radio" id="transportation" name="population_group">
                          <label for="transportation" class="custom-control-label text-dark">Transportation</label>
                        </div>
                        <hr>
                        <div class="custom-control custom-radio mb-2">
                          <input class="custom-control-input" type="radio" id="tourism" name="population_group">
                          <label for="tourism" class="custom-control-label text-dark">Tourism</label>
                        </div>
                        <hr>
                        <div class="custom-control custom-radio mb-2">
                          <input class="custom-control-input" type="radio" id="person_deprived" name="population_group">
                          <label for="person_deprived" class="custom-control-label text-dark">Persons Deprived of Liberty</label>
                        </div>
                        <hr>
                        <div class="custom-control custom-radio mb-2">
                          <input class="custom-control-input" type="radio" id="pwd" name="population_group">
                          <label for="pwd" class="custom-control-label text-dark">Persons With Disability</label>
                        </div>
                        <hr>
                        <div class="custom-control custom-radio mb-2">
                          <input class="custom-control-input" type="radio" id="ofw" name="population_group">
                          <label for="ofw" class="custom-control-label text-dark">OFW</label>
                        </div>
                        <hr>
                        <div class="custom-control custom-radio mb-2">
                          <input class="custom-control-input" type="radio" id="others" name="population_group">
                          <label for="others" class="custom-control-label text-dark">Others</label>
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
                          <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="health_conditions">
                          <label for="customCheckbox1" class="custom-control-label text-dark">Lung Disease such as Asthma, pulmonary tuberculosis, etc.</label>
                        </div>
                        <hr>
                        <div class="custom-control custom-checkbox mb-2">
                          <input class="custom-control-input" type="checkbox" id="customCheckbox2"  name="health_conditions">
                          <label for="customCheckbox2" class="custom-control-label text-dark">Heart Disease</label>
                        </div>
                        <hr>
                        <div class="custom-control custom-checkbox mb-2">
                          <input class="custom-control-input" type="checkbox" id="customCheckbox3"  name="health_conditions">
                          <label for="customCheckbox3" class="custom-control-label text-dark">Kidney disease</label>
                        </div>
                        <hr>
                        <div class="custom-control custom-checkbox mb-2">
                          <input class="custom-control-input" type="checkbox" id="customCheckbox4"  name="health_conditions">
                          <label for="customCheckbox4" class="custom-control-label text-dark">Diabetes</label>
                        </div>
                        <hr>
                        <div class="custom-control custom-checkbox mb-2">
                          <input class="custom-control-input" type="checkbox" id="customCheckbox5"  name="health_conditions">
                          <label for="customCheckbox5" class="custom-control-label text-dark">High Blood Pressure</label>
                        </div>
                        <hr>
                        <div class="custom-control custom-checkbox mb-2">
                          <input class="custom-control-input" type="checkbox" id="customCheckbox6"  name="health_conditions">
                          <label for="customCheckbox6" class="custom-control-label text-dark">Cancer</label>
                        </div>
                        <hr>
                        <div class="custom-control custom-checkbox mb-2">
                          <input class="custom-control-input" type="checkbox" id="customCheckbox11"  name="health_conditions">
                          <label for="customCheckbox11" class="custom-control-label text-dark">Leukemia</label>
                        </div>
                        <hr>
                        <div class="custom-control custom-checkbox mb-2">
                          <input class="custom-control-input" type="checkbox" id="customCheckbox7"  name="health_conditions">
                          <label for="customCheckbox7" class="custom-control-label text-dark">HIV</label>
                        </div>
                        <hr>
                        <div class="custom-control custom-checkbox mb-2">
                          <input class="custom-control-input" type="checkbox" id="customCheckbox8"  name="health_conditions">
                          <label for="customCheckbox8" class="custom-control-label text-dark">Mental Problem/Seizure disorder</label>
                        </div>
                        <hr>
                        <div class="custom-control custom-checkbox mb-2">
                          <input class="custom-control-input" type="checkbox" id="customCheckbox9"  name="health_conditions">
                          <label for="customCheckbox9" class="custom-control-label text-dark">Others</label>
                        </div>
                        <hr>
                        <div class="custom-control custom-checkbox mb-2">
                          <input class="custom-control-input" type="checkbox" id="customCheckbox10"  name="health_conditions">
                          <label for="customCheckbox10" class="custom-control-label text-dark">None of the above</label>
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
                            <input class="custom-control-input" type="radio" id="baby_yes" name="baby">
                            <label for="baby_yes" class="custom-control-label text-dark">Yes</label>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-4 col-sm-12">
                        <!-- radio -->
                        <div class="form-group">
                          <div class="custom-control custom-radio mb-2">
                            <input class="custom-control-input" type="radio" id="baby_no" name="baby">
                            <label for="baby_no" class="custom-control-label text-dark">No</label>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-4 col-sm-12">
                        <!-- radio -->
                        <div class="form-group">
                          <div class="custom-control custom-radio mb-2">
                            <input class="custom-control-input" type="radio" id="baby_not_sure" name="baby">
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
                            <input class="custom-control-input" type="radio" id="willing_yes" name="vaccinated">
                            <label for="willing_yes" class="custom-control-label text-dark">Yes</label>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6 col-sm-12">
                        <!-- radio -->
                        <div class="form-group">
                          <div class="custom-control custom-radio mb-2">
                            <input class="custom-control-input" type="radio" id="willing_no" name="vaccinated">
                            <label for="willing_no" class="custom-control-label text-dark">No</label>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
				  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                   <div class="row">
                      <div class="col-4"></div>
                      <div class="col-4">
                        <button type="submit" class="btn btn-success btn-block">Submit</button>
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
  <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>

</body>
</html>
