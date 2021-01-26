const app = angular.module('survey', []);

app.controller('surveyCtrl', function($scope,$http) {
	
	const queryString = window.location.href;
	
	const queryStringSplit = queryString.split("/");
	
	const napanam_id = queryStringSplit[queryStringSplit.length-1];
	
	const prod_url = "https://napanam.launion.gov.ph/lucovacs"
	const local_url = "http://vaccines.local"
	const api_url = prod_url

	const survey = {
        qr_pass_id: "",
        last_name: "",
        first_name: "",
        middle_name: "",
        birthdate: "",
        gender: "",
        province: "",
        town_city: "",
        barangay: "",
		population_group: "", // frontline_health_workers | senior_citizens | population_group_other
		population_group_other: "", // if population_group_other is selected this will be the value
        lung_disease: false,
		heart_disease: false,
        kidney_disease: false,
        diabetes: false,
        high_blood_pressure: false,
        cancer: false,
        leukemia: false,
        hiv: false,
        mental_problem: false,
        others_health_condition: false,
		health_condition_other: "", // if others_health_condition is checked this will be the value
        none_of_the_above: false,
		currently_pregnant: "",
		pregnancy: "", // yes_pregnant_baby | no_pregnant_baby | not_sure_pregnant_baby
		vaccine: "", // yes_vaccine | no_vaccine
		reason: "", // if no_vaccine this will be efficacy_rate_reason | vaccine_cost_reason | ... | others_reason
		reason_other: "", // if others_reason is selected this will be the value
		contribute: "", // yes_contribute | no_contribute
		contribution: "", // 	one_hundred_percent_fee | ...
	};
	
	$scope.survey = survey;
	
	const tagalogVersion = {
		// Population Group
		frontline_health_workers: "(Manggagawa sa Kalusugan)",
        senior_citizens: "(Nakatatandang Mamamayan)",
        uniformed_personnel: "",
        teachers: "(Guro)",
        social_workers: "(Manggagawang Panlipunan)",
        government_employees: "(Kawani ng Gobyerno)",
        agriculture_group: "(Agrikultura)",
        food_industry: "(Industriya ng Pagkain)",
        tranportation: "(Transportasyon)",
        tourism: "(Turismo)",
        persons_deprived_of_liberty: "(Taong pinagkaitan ng kalayaan)",
        persons_with_disability: "(Taong May Kapansanan)",
        ofw: "(Mga manggagawang Filipino sa ibang bansa)",
        others_population_group: "(Iba pa)",
		
		// Health Conditions
		health_conditions: "(Ikaw ba ay nagkaroon o mayroong kondisyon sa kalusugan?)",
		lung_disease: "(Kanser sa Baga – Hal. Hika, Tuberkulosis atbp.)",
		heart_disease: "(Sakit sa Puso)",
		kidney_disease: "(Sakit sa Atay)",
        diabetes: "(Diyabetes)",
        high_blood_pressure: "(Altapresyon)",
        cancer: "(Kanser)",
        leukemia: "(Lukemya)",
        hiv: "(HIV)",
        mental_problem: "(Sakit sa Pag-iisip)",
        others_health_condition: "(Iba pa)",
        none_of_the_above: "(Wala sa mga nabanggit)",
		
		// Currently Pregnant
		currently_pregnant: '(Nagplaplano ka bang mabuntis ngayong taon na ito?)',
		pregnancy: '(Ikaw ba ay buntis sa kasalukuyan?)',
		
		// Vaccine
		vaccine: "(Interesado ka bang mabakunahan ng bakuna para sa Covid-19?)",
		
		// Best Choice
		reason: "(Pumili ng isa na pinakamahusay na nalalapat sa iyo)",
		efficacy_rate_reason: "(bisa ng bakuna)",
        safety_reason: "(Profile sa kaligtasan at masamang epekto ng bakuna)",
        presence_reason: "(Pagkakaroon ng komorbididad at iba pang kundisyon sa kalusugan)",
        brand_reason: "(Aling tatak ng bakuna ang magagamit)",
        pregnant_reason: "(Kasalukuyang buntis o nagpaplano na mabuntis)",
        lack_of_information_reason: "(Kakulangan ng pangkalahatang impormasyon ng mga bakuna)",
        others_reason: "(Iba pa)",
	}
	$scope.tagalogVersion = tagalogVersion;
	
	// Population Group
	const populationGroup = {
        frontline_health_workers: "Frontline health workers",
        senior_citizens: "Senior citizens",
        uniformed_personnel: "Uniformed personnel (PNP, AFP, PCG, BFP, BJMP, ETC)",
        teachers: "Teachers",
        social_workers: "Social Workers",
        government_employees: "Government Employees",
        agriculture_group: "Agriculture Group",
        food_industry: "Food Industry",
        tranportation: "Transportation",
        tourism: "Tourism",
        persons_deprived_of_liberty: "Persons Deprived of Liberty",
        persons_with_disability: "Persons With Disability",
        ofw: "OFW",
        others_population_group: "Others",
	};
	$scope.populationGroup = populationGroup;
	
	const populationGroupValues = {
        frontline_health_workers: 'frontline_health_workers',
        senior_citizens: 'senior_citizens',
        uniformed_personnel: 'uniformed_personnel',
        teachers: 'teachers',
        social_workers: 'social_workers',
        government_employees: 'government_employees',
        agriculture_group: 'agriculture_group',
        food_industry: 'food_industry',
        tranportation: 'tranportation',
        tourism: 'tourism',
        persons_deprived_of_liberty: 'persons_deprived_of_liberty',
        persons_with_disability: 'persons_with_disability',
        ofw: 'ofw',
        others_population_group: 'others_population_group',
        lung_disease: 'lung_disease',
		heart_disease: 'heart_disease',
        kidney_disease: 'kidney_disease',
        diabetes: 'diabetes',
        high_blood_pressure: 'high_blood_pressure',
        cancer: 'cancer',
        leukemia: 'leukemia',
        hiv: 'hiv',
        mental_problem: 'mental_problem',
        others_health_condition: 'others_health_condition',		
	};
	$scope.populationGroupValues = populationGroupValues;	

	// Health Conditions
	const healthConditions = {
        lung_disease: "Lung Disease such as Asthma, pulmonary tuberculosis, etc",
		heart_disease: "Heart Disease",
		kidney_disease: "Kidney Disease",
        diabetes: "Diabetes",
        high_blood_pressure: "High Blood Pressure",
        cancer: "Cancer",
        leukemia: "Leukemia",
        hiv: "HIV",
        mental_problem: "Mental Problem/Seizure disorder",
        others_health_condition: "Others",
        none_of_the_above: "None of the above",
	};
	$scope.healthConditions = healthConditions;
	
	const currentlyPregnantValues = {
		yes_currently_pregnant: 'yes_currently_pregnant',
		no_currently_pregnant: 'no_currently_pregnant',
	}
	$scope.currentlyPregnantValues = currentlyPregnantValues;
	
	// Pregnancy
	const pregnancyValues = {
        yes_pregnant_baby: 'yes_pregnant_baby',
        no_pregnant_baby: 'no_pregnant_baby',
        not_sure_pregnant_baby: 'not_sure_pregnant_baby',
	};
	$scope.pregnancyValues = pregnancyValues;
	
	// Vaccine
	const vaccineValues = {
        yes_vaccine: 'yes_vaccine',
        no_vaccine: 'no_vaccine',
	};
	$scope.vaccineValues = vaccineValues
	
	// Contribute
	const contributeValues = {
        yes_contribute: 'yes_contribute',
        no_contribute: 'no_contribute',
	};
	$scope.contributeValues = contributeValues;

	// Reason
	const reason = {
        efficacy_rate_reason: "Efficacy of the vaccines",
        safety_reason: "Safety profile and adverse effect of the vaccines",
        presence_reason: "Presence of co-morbidites and other conditions",
        brand_reason: "Which vaccine brand will be available",
        pregnant_reason: "Currently pregnant or planning to get pregnant",
        lack_of_information_reason: "Lacking general infomation of vaccines",
        others_reason: "Others",
	};
	$scope.reason = reason;
	
	const reasonValues = {
        efficacy_rate_reason: 'efficacy_rate_reason',
        safety_reason: 'safety_reason',
        presence_reason: 'presence_reason',
        brand_reason: 'brand_reason',
        pregnant_reason: 'pregnant_reason',
        lack_of_information_reason: 'lack_of_information_reason',
        others_reason: 'others_reason',
		
	};
	$scope.reasonValues = reasonValues;
	
	// Contributions
	const contribution = {
        one_hundred_percent_fee: "100% of the vaccine fee",
        seventy_five_percent_fee: "75% of the vaccine fee",
        fifty_percent_fee: "50% of the vaccine fee",
        twenty_five_percent_fee: "25% of the vaccine fee",		
        none_fee: "None",		
	};
	$scope.contribution = contribution;
	
	const contributionValues = {
        one_hundred_percent_fee: 'one_hundred_percent_fee',
        seventy_five_percent_fee: 'seventy_five_percent_fee',
        fifty_percent_fee: 'fifty_percent_fee',
        twenty_five_percent_fee: 'twenty_five_percent_fee',	
        none_fee: 'none_fee',	
	};
	$scope.contributionValues = contributionValues;

	$http({
		method: 'GET',
		url: `${api_url}/api/napanam/check/registration/${napanam_id}`
	}).then(function mySucces(response) {
		
        $scope.survey.qr_pass_id = response.data.data.id;
        $scope.survey.last_name = response.data.data.lastname;
        $scope.survey.first_name = response.data.data.firstname;
        $scope.survey.middle_name = response.data.data.middlename;
        $scope.survey.birthdate = response.data.data.dob;
        $scope.survey.gender = response.data.data.gender;
        $scope.survey.province = response.data.data.province;
        $scope.survey.town_city = response.data.data.cityMun;
		$scope.survey.barangay = response.data.data.barangay;
		
	}, function myError(response) {

	});
	
	$scope.submit = function() {
		
		const survey = $scope.survey;
		
		// Validation required field
		
		if(survey.population_group=="" || survey.pregnancy=="" || survey.vaccine=="")	{
			
			//Sweetalert2
				Swal.fire({
				  title: '<p class="text-danger">NOTICE!</p>',
				  icon: 'warning',
				  html: "Please complete required fields",
				  showCancelButton: false,
				  focusConfirm: false,
				  showCloseButton: true,
				  focusCloseButton: true,
				  confirmButtonText: 'Confirm',
				}).then((result) => {
				  if (result.value) {
					// Close
				  }
				})	
			
			return;
			
		}
		
		if((survey.population_group=="others_population_group" && survey.population_group_other=="") || (survey.reason=="others_reason" && survey.reason_other=="") || (survey.others_health_condition==true && survey.health_condition_other=="")){
			
			console.log($scope);
			
			//Sweetalert2
			Swal.fire({
			  title: '<p class="text-danger">NOTICE!</p>',
			  icon: 'warning',
			  text: "Please complete required fields",
			  showCancelButton: false,
			  focusConfirm: false,
			  showCloseButton: true,
			  confirmButtonText: 'Confirm',
			}).then((result) => {
			  if (result.value) {
				// Close
			  }
			})	
			
			return;
			
		}
		
		$http({
			method: 'POST',
			url: `${api_url}/api/survey`,
			data: $scope.survey
		}).then(function mySucces(response) {
			
			Swal.fire({
			  title: '<p class="text-success" style="font-size: 25px;">YOUR RESPONSE HAS BEEN SUBMITTED!</p>',
			  icon: 'success',
			  html: 
				'<b>Thank you for your commitment in stopping the spread of Covid-19!!!! </b><br><br>' +
				'<b style="font-size: 15px;">For inquiries, please contact us at: </b> <br>' +
				'<b class="text-danger" style="font-size: 15px;">Tel. No. (072) 242-5550 loc. 299</b>',
			  showCancelButton: true,
			  focusConfirm: false,
			  confirmButtonText: 'View Summary Report',
			  cancelButtonText: 'Close',
			}).then((result) => {
			  if (result.value) {
				
				window.location = api_url;
				
			  } else if (result.dismiss === Swal.DismissReason.cancel) {
				
				window.location = api_url;
				
			  }
			})

		}, function myError(response) {

		});
	
    };
	
});