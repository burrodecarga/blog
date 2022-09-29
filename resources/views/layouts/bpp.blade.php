<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Rokave') }}</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker3.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @yield('style')

  </head>
  <body>

   <div class="wrapper">
   	<nav id="sidebar">
   		<div class="sidebar-header">
   			<h3>Citas Médicas</h3>
   		</div>

           @include('layouts.partials.menu')



   		<ul class="list-unstyled CTAs">
   			<li>
   				<a href="#" class="download">Download code</a>
   			</li>
   			<li>
   				<a href="#" class="article">article</a>
   			</li>
   		</ul>
   	</nav>

   	<div class="content">
   		<nav class="navbar navbar-expand-lg navbar-light border-0 lateral">

   		<button type="button" id="sidebarCollapse" class="btn btn-info">
   			<i class="fa fa-align-justify"></i> <span>Menú</span>
   		</button>

  <!--<a class="navbar-brand" href="#">Navbar</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link text-white" href="#">{{auth()->user()->role}} <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  text-white disabled" href="#">Disabled</a>
      </li>

        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
        <li class="nav-item">
            <a class="nav-link text-white " href="#">{{ Auth::user()->name }} </a>
          </li>
        @endguest
    </ul>
  </div>
</nav>

  	<div id="app">


            @yield('content')


   	</div>





   </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/all.js') }}"></script>
<script src="{{asset('js/jquery-3.3.1.js')}} "></script>
<script src="{{asset('js/jquery.dataTables.min.js')}} "></script>
<script src="{{asset('js/dataTables.bootstrap4.min.js')}} "></script>
<script src="{{asset('js/bootstrap-select.js')}} "></script>
<script src="{{asset('js/bootstrap-datepicker.min.js')}} "></script>

@yield('script')
    <script>
	    $(document).ready(function(){
			$('#sidebarCollapse').on('click',function(){
				$('#sidebar').toggleClass('active');
			});
        });

        //$.fn.selectpicker.Constructor.BootstrapVersion = '4';

 </script>





  </body>
</html>
