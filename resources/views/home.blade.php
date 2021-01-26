<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{{ config('app.name', 'Covid-19 Vaccination Survey') }}</title>
    </head>
    <body>
    <div id="app"></div>
    <script type="text/javascript" src="{{ env('APP_URL') }}/js/home.js?id={{ rand() }}"></script>    
    </body>
</html>