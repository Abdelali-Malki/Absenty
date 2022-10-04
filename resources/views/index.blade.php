@extends('layout')
@section('nav')
<li class="nav-item active">
			                    <a class="nav-link" href="#home">Accueil</a>
			                </li>
							<li class="nav-item">
			                    <a class="nav-link" href="#connect">Se connecter</a>
			                </li>
@endsection
@section('content')
<div class="banner-area" >
</div>
<div class="content-area" id="connect">
    <div class="wrapper">
        <br>
        <center><font color="#1b9ad9"><h2>choisissez votre role</h2></font></center>
        <div class="ctt">
            <a href="{{url('Admin/login')}}"><div class="box">
                <div class="icon"><i class="fa fa-university"></i></div>
                <div class="cont" style="margin-left: 55px ;"><h3>Administration</h3></div>
            </div></a>
            <a href="{{url('/teacher/login')}}"><div class="box">
                <div class="icon"><i class="fa fa-user"></i></div>
                <div class="cont" style="margin-left: 85px ;"><h3>Professeur</h3></div>
            </div></a>
            <a href="{{url('/student/login')}}"><div class="box">
                <div class="icon"><i class="fa fa-graduation-cap"></i></div>
                <div class="cont" style="margin-left: 100px ;"><h3>Etudiant</h3></div>
            </div></a>
        </div>
    </div>
</div>
@endsection
   