<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="{{URL::asset('css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
        <link href="{{URL::asset('css/style.css')}}" rel='stylesheet' type='text/css' />
        <script src="{{URL::asset('js/jquery.min.js')}}"></script>
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap-icons.css')}}" />   
        <!-- Scripts -->
        <script type="text/javascript" src="{{URL::asset('js/index.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/jquery-3.3.1.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/popper.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>
        <title>Document</title>
        @vite('resources/js/app.js')
    </head>
<body>
    <div id="app">
		<navbar2></navbar2>
		<test></test>
	</div>
</body>
</html>