<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	@if(count($messages)>0)
    <title>({{count($messages)}}) Absenty || Moulay Smail</title>
    @else
	<title>Absenty || Moulay Smail</title>
	@endif
	<link rel="shortcut icon" href="/images/cd.png">
	<link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
	<!-- ==============================================
	CSS VENDOR
	=============================================== -->
	<link rel="stylesheet" type="text/css" href="/css/vendor/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/css/vendor/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/vendor/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="/css/vendor/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="/css/vendor/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="/css/vendor/animate.min.css">
	<link rel="stylesheet" type="text/css" href="/css/vendor/bootstrap-dropdownhover.min.css">
	<!-- ==============================================
	Bootstrap
	=============================================== -->
	<link rel="stylesheet" href="/assets/bootstrap-3.1.1/css/bootsstrap.min.css">
	
	<!-- ==============================================
	Custom Stylesheet
	=============================================== -->
	<link rel="stylesheet" type="text/css" href="/css/style.css" />
    <style>
        
        .banner-area{
            background-image: url(images/banner.jpg);
            background-size: cover;
            background-position: center center;
            top: 100px;
            height: 100vh;
            width: 100%;
            position: fixed;
        }
        
        

    </style>
</head>

<body data-spy="scroll" data-target="#navbar-example">

	<!-- HEADER -->
    <div class="header header-2" >

    	<!-- TOPBAR -->
    	<div class="topbar d-none d-md-block" id="home">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-5 col-md-5">
						<div class="text-light"><a href="{{url('/accueil')}}"> <font color="white"> Absenty | Lycee Moulay Smail</font></a> </div>
					</div>
					<div class="col-4 col-md-4">
						<div class="rs-icon-info float-right text-white mb-0">
							
						</div>
					</div>
					<div class="col-3 col-md-3">
						<div class="sosmed-icon float-right d-inline-flex">
						@if(session()->has('LoggedUserAdm'))
							<a id="aa" href="{{url('/admin/dashboard')}}"><strong>Admin</strong></a>
							<a href="{{url('/logoutadm')}}"><i class="fa fa-sign-out"></i></a>
							@endif
							@if(session()->has('LoggedUserStud'))
							<a id="aa" href="{{('/student/dashboard')}}"><strong>Etudiant</strong></a>
							<a href="{{url('/logoutstud')}}"><i class="fa fa-sign-out"></i></a>
							@endif
							@if(session()->has('LoggedUserTea'))
							<a id="aa" href="{{url('teacher/dashboard')}}"><strong>Professeur</strong></a>
							<a href="{{url('/logoutteach')}}"><i class="fa fa-sign-out"></i></a>
							@endif
						</div>
					</div>
				</div> 
			</div>
		</div>
		<!-- NAVBAR SECTION -->
		<div class="navbar-main">
			<div class="container">
			    <nav id="navbar-example" class="navbar navbar-expand-lg">
			        <a class="navbar-brand" href="{{url('/accueil')}}">
						<img src="/images/logo.png" alt="" />
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			            <span class="navbar-toggler-icon"></span>
			        </button>
			        <div class="collapse navbar-collapse" id="navbarNavDropdown">
			            <ul class="navbar-nav ml-auto">
			                
			                @yield('nav')

			            </ul>
			        </div>
			    </nav> <!-- -->

			</div>
		</div>

    </div>
    @yield('content')
    <br><br>

	

	<!-- FOOTER SECTION -->
	<footer>
		<div class="fcopy" >
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-6">
						<p class="ftex mt-1 text-white"><span class="color-primary">Absenty </span>Copyright 2022 &copy; </p> 
					</div>
					
				</div>
			</div>
		</div>
	</footer>	

	
	<!-- JS VENDOR -->
	<script src="/js/vendor/jquery.min.js"></script>
	<script src="/js/vendor/bootstrap.min.js"></script>
	<script src="/js/vendor/owl.carousel.js"></script>
	<script src="/js/vendor/jquery.magnific-popup.min.js"></script>

	<!-- SENDMAIL -->
	<script src="/js/vendor/validator.min.js"></script>
	<script src="/js/vendor/form-scripts.js"></script>

	<script src="/js/script.js"></script>

</body>
</html>