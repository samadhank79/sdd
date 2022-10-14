<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="{{url('/assets/images/favicon.png')}}" />
        <link rel="stylesheet" href="{{url('/assets/css/bootstrap.min.css')}}" >
         <link href="{{ url('assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"  />
    </head>
    <body>
		<header class="sticky-header">
			<nav class="navbar navbar-expand-lg navbar-light">
			  	<div class="container">
			  		<a class="navbar-brand" href="{{url('/')}}">
			  			<img src="{{url('/assets/images/logo.png')}}" alt="Image"/>
			  		</a>
					  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					    <span class="navbar-toggler-icon"></span>
					  </button>
					  <div class="collapse navbar-collapse" id="navbarNavDropdown">
					    <ul class="navbar-nav ml-auto">
					      <li class="nav-item active">
					        <a class="nav-link" href="{{url('/')}}">SDD</a>
					      </li>
					      <li class="nav-item">
					        <a class="nav-link" href="{{ url('/signup')}}">Signup</a>
					      </li>
					      <li class="nav-item">
					        <a class="nav-link" href="{{url('/login')}}">Login</a>
					      </li>
					      
					    </ul>
					  </div>
			  	</div>
			</nav>
		</header>