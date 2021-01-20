const app = angular.module('survey', []);

app.controller('surveyCtrl', function($scope,$http) {
	
	const queryString = window.location.href;
	
	const queryStringSplit = queryString.split("/");
	
	const napanam_id = queryStringSplit[queryStringSplit.length-1];
	
	
	
});