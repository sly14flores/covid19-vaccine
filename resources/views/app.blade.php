<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{{ config('app.name', 'Laravel') }}</title>
    </head>
    <body>
        <div ng-app="survey" ng-controller="surveyCtrl">
        </div>
    </body>
	<script type="text/javascript" src="{{ mix('angularjs/angular.min.js') }}"></script>
	<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
</html>
